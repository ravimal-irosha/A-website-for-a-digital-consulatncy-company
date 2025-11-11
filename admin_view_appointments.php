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
    <title>View Appointments - Admin</title>
    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body>

    <div class="appointments-list-container">
        <div class="appointments-header">
            <h1>All Appointments</h1>
            <a href="admin.php">Back to Dashboard</a>
        </div>

        <?php
        include 'db_connect.php';

        // Fetch all appointments, ordering by the most recent first
        $sql = "SELECT id, client_name, client_email, client_phone, appointment_date, appointment_time, created_at FROM appointments ORDER BY appointment_date DESC, appointment_time DESC";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            echo "<table>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Client Name</th>";
            echo "<th>Email</th>";
            echo "<th>Phone</th>";
            echo "<th>Appointment Date</th>";
            echo "<th>Appointment Time</th>";
            echo "<th>Booked On</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            // Loop through results and display each appointment
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['client_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['client_email']) . "</td>";
                echo "<td>" . htmlspecialchars($row['client_phone']) . "</td>";
                echo "<td>" . date('D, M j, Y', strtotime($row['appointment_date'])) . "</td>";
                echo "<td>" . date('g:i A', strtotime($row['appointment_time'])) . "</td>";
                echo "<td>" . date('M j, Y, g:i A', strtotime($row['created_at'])) . "</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p class='no-appointments'>There are currently no appointments booked.</p>";
        }

        $conn->close();
        ?>
    </div>

</body>
</html>
