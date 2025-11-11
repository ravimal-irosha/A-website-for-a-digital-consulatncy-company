<?php
session_start();

// --- Authentication Check ---
// If the user is not logged in, redirect to the login page
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - BizBud</title>
    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1>Admin Dashboard</h1>
        </div>
        <nav class="admin-nav">
            <a href="admin_view_appointments.php">View All Appointments</a>
            <!-- You can add more admin links here in the future -->
            <a href="index.php">Back to Website</a>
            <a href="logout.php" style="background-color: #d9534f;">Logout</a>
        </nav>
    </div>
</body>
</html>
