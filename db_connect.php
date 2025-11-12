<?php
// --- DATABASE CONNECTION ---
// This file prefers Railway's environment variables when available.
// When running locally (XAMPP) it will fall back to sensible local defaults.

// Railway / production variables
$host = getenv('MYSQLHOST') ?: getenv('DB_HOST');
$port = getenv('MYSQLPORT') ?: getenv('DB_PORT') ?: '3306';
$dbname = getenv('MYSQLDATABASE') ?: getenv('DB_NAME');
$user = getenv('MYSQLUSER') ?: getenv('DB_USER') ?: 'root';
$password = getenv('MYSQLPASSWORD') ?: getenv('DB_PASS');

// Local development fallback (XAMPP)
if (empty($host) || empty($dbname) || $password === false || $password === null) {
    // Use these local defaults for development. Change as needed for your environment.
    $host = $host ?: 'localhost';
    $port = $port ?: '3306';
    $dbname = $dbname ?: 'webprojects2';
    $user = $user ?: 'root';
    $password = $password ?: '1234@';
}

// Establish the database connection. Suppress warnings and provide a clean error on failure.
$conn = @new mysqli($host, $user, $password, $dbname, (int)$port);

if ($conn->connect_error) {
    error_log('MySQL Connection Error: ' . $conn->connect_error);
    // Show a user-friendly message; keep details in server logs.
    die('Failed to connect to the database. Please check configuration.');
}

// Connection is available via $conn for the rest of the app.
?>
