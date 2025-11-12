<?php
// --- DATABASE CONNECTION ---

// Check for Platform.sh/Upsun environment variables
$relationships = getenv('PLATFORM_RELATIONSHIPS');

if ($relationships) {
    // --- Live Server Environment (Upsun/Platform.sh) ---
    $relationships_decoded = json_decode(base64_decode($relationships), true);
    
    // The name 'database' here must match the name of the relationship 
    // defined in your .platform.app.yaml file.
    if (isset($relationships_decoded['database'][0])) {
        $database_info = $relationships_decoded['database'][0];
        
        $db_host = $database_info['host'];
        $db_port = $database_info['port'];
        $db_name = $database_info['path'];
        $db_user = $database_info['username'];
        $db_pass = $database_info['password'];

        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);
    } else {
        die("Database relationship not found in Platform.sh environment.");
    }

} else {
    // --- Local Development Environment (XAMPP) ---
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '1234@');
    define('DB_NAME', 'webprojects2');

    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
}

// Check connection
if ($conn->connect_error) {
    // In a real application, you would log this error and show a generic message
    die("Connection failed: " . $conn->connect_error);
}
?>