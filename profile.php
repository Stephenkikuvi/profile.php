<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "auth";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM profiles";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
        echo "<p><strong>First Name:</strong> " . $row["first_name"] . "</p>";
        echo "<p><strong>Last Name:</strong> " . $row["last_name"] . "</p>";
        echo "<p><strong>Email:</strong> " . $row["email"] . "</p>";
        echo "<p><strong>Phone:</strong> " . $row["phone"] . "</p>";
        echo "<p><strong>Address:</strong> " . $row["address"] . "</p>";
        echo "<p><strong>Family Information:</strong> " . $row["family_info"] . "</p>";
        echo "<p><strong>Engagement History:</strong> " . $row["engagement_history"] . "</p>";
        echo "<p><strong>Membership Status:</strong> " . $row["membership_status"] . "</p>";

        echo "<form action='update_profile.php' method='post'>";
        echo "<input type='hidden' name='member_id' value='" . $row["id"] . "'>";
        echo "<button type='submit'>Update Profile</button>";
        echo "</form>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
