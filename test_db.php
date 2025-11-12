<?php
// --- Database Connection Test ---

echo "Attempting to connect to the database...<br>";

// Include the standard database connection script.
// The @ suppresses warnings so we can provide a cleaner message.
@include 'db_connect.php';

// If the script reaches this point without dying, the connection was successful.
if (isset($conn) && $conn->ping()) {
    echo "<strong>Database connection successful!</strong><br>";
    echo "Server version: " . $conn->server_info;
    $conn->close();
} else {
    echo "<strong style='color: red;'>Database connection failed.</strong><br>";
    echo "Please check your environment variables on Railway and ensure the service is deployed correctly.";
}
?>
