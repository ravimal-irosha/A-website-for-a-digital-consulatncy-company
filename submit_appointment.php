<?php
include 'db_connect.php';

header('Content-Type: application/json');

// Basic validation
if (empty($_POST['appointment_date']) || empty($_POST['appointment_time']) || empty($_POST['client_name']) || empty($_POST['client_email'])) {
    echo json_encode(['success' => false, 'message' => 'Please fill in all required fields.']);
    exit;
}

// Sanitize and prepare data
$date = $_POST['appointment_date'];
$time_str = $_POST['appointment_time']; // e.g., "2:00 PM"
$name = trim($_POST['client_name']);
$email = trim($_POST['client_email']);
$phone = trim($_POST['client_phone']) ?? '';

// Convert time to 24-hour format for database
$time_24h = date('H:i:s', strtotime($time_str));

// --- Server-side check for availability ---
// This is a crucial step to prevent double-booking if two users try to book the same slot simultaneously.
$stmt_check = $conn->prepare("SELECT id FROM appointments WHERE appointment_date = ? AND appointment_time = ?");
$stmt_check->bind_param("ss", $date, $time_24h);
$stmt_check->execute();
$stmt_check->store_result();

if ($stmt_check->num_rows > 0) {
    echo json_encode(['success' => false, 'message' => 'Sorry, this time slot was just booked by someone else. Please select a different time.']);
    $stmt_check->close();
    $conn->close();
    exit;
}
$stmt_check->close();


// --- Insert the new appointment ---
$stmt_insert = $conn->prepare("INSERT INTO appointments (client_name, client_email, client_phone, appointment_date, appointment_time) VALUES (?, ?, ?, ?, ?)");
$stmt_insert->bind_param("sssss", $name, $email, $phone, $date, $time_24h);

if ($stmt_insert->execute()) {
    // --- Success ---
    echo json_encode(['success' => true, 'message' => 'Appointment booked successfully!']);
} else {
    // --- Failure ---
    // In a real app, log the detailed error: $stmt_insert->error
    echo json_encode(['success' => false, 'message' => 'Could not save the appointment. Please try again.']);
}

$stmt_insert->close();
$conn->close();
?>