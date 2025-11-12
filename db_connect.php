<?php
// --- DATABASE CONNECTION (Railway-Optimized) ---

// Read Railway's default environment variables for the database connection.
$host = getenv('MYSQLHOST');
$port = getenv('MYSQLPORT');
$dbname = getenv('MYSQLDATABASE');
$user = getenv('MYSQLUSER');
$password = getenv('MYSQLPASSWORD');

// Ensure all required variables are present before attempting connection.
if (!$host || !$dbname || !$user || !$password || !$port) {
    // Provide a generic error to the client.
    die('Service is not configured correctly. Missing database environment variables.');
}

// Establish the database connection.
// The error suppression operator (@) prevents default warnings from being displayed to the user.
$conn = @new mysqli($host, $user, $password, $dbname, (int)$port);

// Check for connection errors and provide a clean error message.
if ($conn->connect_error) {
    // Log the actual error for debugging.
    error_log('MySQL Connection Error: ' . $conn->connect_error);
    // Show a generic message to the user.
    die('Failed to connect to the database. Error: ' . $conn->connect_error);
}
?>
