<?php
session_start();

// If the user is not logged in, destroy the session and redirect to the login page
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    session_unset();
    session_destroy();
}

header('Location: login.php');
exit;
