<?php
include 'db_connect.php';

header('Content-Type: application/json');

// Basic validation
if (empty($_POST['appointment_date']) || empty($_POST['client_name']) || empty($_POST['client_email'])) {
    echo json_encode(['success' => false, 'message' => 'Please fill in all required fields.']);
    exit;
}

// Sanitize and prepare data
$date = $_POST['appointment_date'];
$name = trim($_POST['client_name']);
$email = trim($_POST['client_email']);
$phone = trim($_POST['client_phone']) ?? '';

// --- Insert the new appointment (without time) ---
$stmt_insert = $conn->prepare("INSERT INTO appointments (client_name, client_email, client_phone, appointment_date) VALUES (?, ?, ?, ?)");
$stmt_insert->bind_param("ssss", $name, $email, $phone, $date);

if ($stmt_insert->execute()) {
    // --- Success ---
    echo json_encode(['success' => true, 'message' => 'Appointment booked successfully!']);
} else {
    // --- Failure ---
    // In a real app, log the detailed error: $stmt_insert->error
    error_log('Appointment Insert Error: ' . $stmt_insert->error);
    echo json_encode(['success' => false, 'message' => 'Could not save the appointment. Please try again.']);
}

$stmt_insert->close();
$conn->close();
?>