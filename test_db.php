<?php
// Database credentials (same as in your db.php)
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "elearn_login";

// Try to connect to the database
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}
echo "✅ Connected successfully to database: " . $dbName . "<br>";

// Test if we can retrieve data from the 'credentials' table
$username = "test_user"; // You can set this to any username
$sql = "SELECT password FROM credentials WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Check if the user exists
if ($result->num_rows > 0) {
    // User found: fetch the password
    $row = $result->fetch_assoc();
    echo "✅ User found: " . $username . "<br>";
    echo "Stored password: " . $row['password'] . "<br>";
} else {
    // User not found
    echo "❌ User not found: " . $username . "<br>";
}

// Close connection
$stmt->close();
$conn->close();
?>
