<?php
// --- DATABASE CONNECTION (Railway) ---

// Read environment variables for the database connection.
// Supports both custom DB_* variables and Railway's default MYSQL* variables.
$host = getenv('DB_HOST') ?: getenv('MYSQLHOST');
$port = getenv('DB_PORT') ?: getenv('MYSQLPORT');
$dbname = getenv('DB_NAME') ?: getenv('MYSQLDATABASE');
$user = getenv('DB_USER') ?: getenv('MYSQLUSER');
$password = getenv('DB_PASS') ?: getenv('MYSQLPASSWORD');

// Ensure all required variables are present before attempting connection.
if (!$host || !$dbname || !$user || !$password || !$port) {
    // Log detailed error for debugging on Railway.
    error_log('Database environment variables are not fully set.');
    // Provide a generic error to the client.
    die('Service is not configured correctly. Please contact support.');
}

// Establish the database connection.
// The error suppression operator (@) prevents default warnings from being displayed to the user.
$conn = @new mysqli($host, $user, $password, $dbname, (int)$port);

// Check for connection errors and provide a clean error message.
if ($conn->connect_error) {
    // Log the actual error for debugging.
    error_log('MySQL Connection Error: ' . $conn->connect_error);
    // Show a generic message to the user.
    die('Failed to connect to the database. Please try again later.');
}
?>
