<?php
include 'C:\xampp\htdocs\AJAR\app\connection.php';
include 'C:\xampp\htdocs\AJAR\app\controllers\AdminController.php';
include 'C:\xampp\htdocs\AJAR\app\views\Admin\AdminView.php';



// Get admin ID from the session
$admin_id = $_SESSION['admin_id'] ?? null;

$adminController = new AdminController($conn);

if (!$adminController->checkSession($admin_id)) {
    header('Location: index.php');
    exit();
}

// Handle logout
if (isset($_POST['logout'])) {
    $adminController->handleLogout();
}

$adminView = new AdminView();
$adminView->displayAdminPanel();
?>
