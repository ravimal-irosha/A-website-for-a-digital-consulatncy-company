<?php
// --- DATABASE CONNECTION (Railway-Hybrid) ---

// Read the critical environment variables that change for each deployment.
$host = getenv('MYSQLHOST');
$dbname = getenv('MYSQLDATABASE');
$password = getenv('MYSQLPASSWORD');

// Use the static default values for user and port.
$user = 'root';
$port = '3306';

// Ensure the dynamic variables are present.
if (!$host || !$dbname || !$password)     
{MYSQLHOST={{MySQL-MlSY.MYSQLHOST}}
MYSQLDATABASE={{MySQL-MlSY.MYSQLDATABASE}}
MYSQLPASSWORD={{MySQL-MlSY.MYSQLPASSWORD}}
    die('Service is not configured correctly. Missing critical database environment variables (host, dbname, password).');
}

// Establish the database connection.
$conn = @new mysqli($host, $user, $password, $dbname, (int)$port);

// Check for connection errors.
if ($conn->connect_error) {
    error_log('MySQL Connection Error: ' . $conn->connect_error);
    die('Failed to connect to the database. Error: ' . $conn->connect_error);
}
?>
