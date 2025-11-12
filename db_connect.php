<?php
// --- DATABASE CONNECTION ---
// This script automatically detects if it's running on Railway or locally
// by checking for the presence of Railway's environment variables.

// Check for a Railway environment variable.
if (getenv('MYSQLHOST')) {
    // --- Railway Configuration ---
    $host = getenv('MYSQLHOST');
    $user = getenv('MYSQLUSER');
    $password = getenv('MYSQLPASSWORD');
    $dbname = getenv('MYSQLDATABASE');
    $port = getenv('MYSQLPORT');
} else {
    // --- Local Development (XAMPP) Configuration ---
    // Update these values to match your local setup if needed.
    $host = 'localhost';
    $user = 'root';
    $password = '1234@'; // Or an empty string '' if you have no password
    $dbname = 'webprojects2';
    $port = '3306';
}

// Establish the database connection.
// The @ suppresses PHP's default warning on connection failure,
// allowing us to handle it cleanly below.
$conn = @new mysqli($host, $user, $password, $dbname, (int)$port);

// Check for connection errors.
if ($conn->connect_error) {
    // Log the detailed error to the server's error log for debugging.
    error_log('MySQL Connection Error: ' . $conn->connect_error);
    
    // Show a generic, user-friendly message on the website.
    die('Failed to connect to the database. Please check configuration.');
}

// The connection is now available as the $conn variable for any script that includes this file.
?>
