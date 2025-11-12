<?php
header('Content-Type: text/plain');

echo "--- Checking Environment Variables ---\n\n";

$variables = [
    'MYSQLHOST',
    'MYSQLDATABASE',
    'MYSQLPASSWORD',
    'MYSQLUSER',
    'MYSQLPORT'
];

$found_any = false;

foreach ($variables as $var) {
    $value = getenv($var);
    if ($value !== false) {
        echo "Found variable '$var' with value: " . $value . "\n";
        $found_any = true;
    } else {
        echo "Variable '$var' is NOT SET.\n";
    }
}

if (!$found_any) {
    echo "\n--- NO DATABASE VARIABLES FOUND ---\n";
}

echo "\n--- All Environment Variables ---\n";
print_r($_ENV);
?>
