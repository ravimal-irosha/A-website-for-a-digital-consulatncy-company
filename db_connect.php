<?php
// --- DATABASE CONNECTION ---

// Prefer environment variables (Railway/Render). Supports both custom names and Railway defaults.
$envHost = getenv('DB_HOST') ?: getenv('MYSQLHOST');
$envPort = getenv('DB_PORT') ?: getenv('MYSQLPORT') ?: '3306';
$envName = getenv('DB_NAME') ?: getenv('MYSQLDATABASE');
$envUser = getenv('DB_USER') ?: getenv('MYSQLUSER');
$envPass = getenv('DB_PASS') ?: getenv('MYSQLPASSWORD');

if ($envHost && $envName && $envUser) {
    $conn = new mysqli($envHost, $envUser, $envPass, $envName, (int)$envPort);
} else {
    // Fallback to Platform.sh / Upsun relationship variables
    $relationships = getenv('PLATFORM_RELATIONSHIPS');

    if ($relationships) {
        $relationshipsDecoded = json_decode(base64_decode($relationships), true);

        if (isset($relationshipsDecoded['database'][0])) {
            $databaseInfo = $relationshipsDecoded['database'][0];

            $dbHost = $databaseInfo['host'];
            $dbPort = $databaseInfo['port'];
            $dbName = $databaseInfo['path'];
            $dbUser = $databaseInfo['username'];
            $dbPass = $databaseInfo['password'];

            $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName, (int)$dbPort);
        } else {
            die('Database relationship not found in Platform.sh environment.');
        }
    } else {
        // Local development (XAMPP) fallback
        $conn = new mysqli('localhost', 'root', '1234@', 'webprojects2');
    }
}

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>