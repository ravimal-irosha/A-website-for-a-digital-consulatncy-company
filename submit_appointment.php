<?php
include 'db_connect.php';

header('Content-Type: application/json');

// --- Validation ---
if (
    empty($_POST['appointment_date']) ||
    empty($_POST['appointment_time']) || // Added time validation
    empty($_POST['client_name']) ||
    empty($_POST['client_email'])
) {
    echo json_encode(['success' => false, 'message' => 'Please fill in all required fields.']);
    exit;
}

// More specific server-side validation
$name = trim($_POST['client_name']);
$email = trim($_POST['client_email']);
if (strlen($name) < 2) {
    echo json_encode(['success' => false, 'message' => 'Full Name must be at least 2 characters long.']);
    exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Please enter a valid email address.']);
    exit;
}


// Sanitize and prepare data
$date = $_POST['appointment_date'];
$time = $_POST['appointment_time'];
$phone = trim($_POST['client_phone']) ?? '';

// --- Check for existing appointment at the same date and time ---
$stmt_check = $conn->prepare("SELECT id FROM appointments WHERE appointment_date = ? AND appointment_time = ?");
$stmt_check->bind_param("ss", $date, $time);
$stmt_check->execute();
$stmt_check->store_result();

if ($stmt_check->num_rows > 0) {
    // This slot just got booked by someone else
    echo json_encode(['success' => false, 'message' => 'Sorry, this time slot is no longer available. Please select a different time.']);
    $stmt_check->close();
    $conn->close();
    exit;
}
$stmt_check->close();


// --- Insert the new appointment ---
$stmt_insert = $conn->prepare("INSERT INTO appointments (client_name, client_email, client_phone, appointment_date, appointment_time) VALUES (?, ?, ?, ?, ?)");
$stmt_insert->bind_param("sssss", $name, $email, $phone, $date, $time);

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