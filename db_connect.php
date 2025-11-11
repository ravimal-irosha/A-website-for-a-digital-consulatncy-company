<?php
// --- DATABASE CONNECTION ---
// Replace with your actual database credentials
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '1234@');
define('DB_NAME', 'webprojects2'); // I'm assuming this is your database name

// Create connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    // In a real application, you would log this error and show a generic message
    die("Connection failed: " . $conn->connect_error);
}
?>