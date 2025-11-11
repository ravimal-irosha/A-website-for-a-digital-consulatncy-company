<?php
session_start();

// Hardcoded credentials for demonstration. 
// In a real-world application, you should use a database and hashed passwords.
define('ADMIN_USERNAME', 'admin');
define('ADMIN_PASSWORD', 'password123');

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === ADMIN_USERNAME && $password === ADMIN_PASSWORD) {
        // --- Authentication successful ---
        $_SESSION['admin_logged_in'] = true;
        header('Location: admin.php');
        exit;
    } else {
        // --- Authentication failed ---
        $error_message = 'Invalid username or password.';
    }
}

// If already logged in, redirect to the admin dashboard
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: admin.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body class="app-page">
    <div class="appointment-container" style="max-width: 400px;">
        <div class="appointment-header">
            <h1>Admin Login</h1>
        </div>
        <form action="login.php" method="POST">
            <div class="form-step">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <?php if ($error_message): ?>
                    <p style="color: red; text-align: center;"><?php echo $error_message; ?></p>
                <?php endif; ?>
                <button type="submit" class="btn-submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
