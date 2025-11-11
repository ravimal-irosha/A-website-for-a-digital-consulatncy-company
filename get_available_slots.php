<?php
// --- Enhanced Error Reporting (for development) ---
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include 'db_connect.php';

header('Content-Type: application/json');

$date = $_GET['date'] ?? '';

if (empty($date)) {
    echo json_encode([]);
    exit;
}

// Define all possible time slots for a day (e.g., from 10:00 to 19:00, every hour)
$all_slots = [];
$start_time = new DateTime('10:00');
$end_time = new DateTime('19:00'); // Last slot is 19:00 (7 PM)
$interval = new DateInterval('PT1H'); // 1-hour interval

$period = new DatePeriod($start_time, $interval, $end_time);
foreach ($period as $time) {
    $all_slots[] = $time->format('H:i:s');
}

// Fetch already booked slots for the selected date
$booked_slots = [];
$stmt = $conn->prepare("SELECT appointment_time FROM appointments WHERE appointment_date = ?");
$stmt->bind_param("s", $date);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $booked_slots[] = $row['appointment_time'];
}

$stmt->close();

// Determine available slots by finding the difference
$available_slots = array_diff($all_slots, $booked_slots);

// Format for the frontend
$formatted_slots = [];
foreach ($available_slots as $slot) {
    $formatted_slots[] = date('g:i A', strtotime($slot)); // e.g., "10:00 AM"
}

echo json_encode(array_values($formatted_slots));

$conn->close();
?>