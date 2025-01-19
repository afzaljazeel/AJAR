<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start session only if it hasn't been started already
}

// Check if the admin session is set
if (!isset($_SESSION['admin_name']) || !isset($_SESSION['admin_email'])) {
    // Redirect to login page
    header('Location: /AJAR/public/index.php');
    exit;
}
