<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Ensure no output before this line
if (!isset($_SESSION['admin_name']) || !isset($_SESSION['admin_email']) || (isset($_SESSION['user_type']) && $_SESSION['user_type'] !== 'admin')) {
    header('Location: /AJAR/public/index.php');
    exit;
}

include 'C:\xampp\htdocs\AJAR\app\connection.php';
require_once 'C:\xampp\htdocs\AJAR\app\controllers\ProductController.php';
require_once 'C:\xampp\htdocs\AJAR\app\controllers\LogoutController.php';
require_once 'C:\xampp\htdocs\AJAR\app\models\ProductModel.php';
require_once 'C:\xampp\htdocs\AJAR\app\views\Admin\admin_products.php';

// Fetch admin ID from the session
if (!isset($_SESSION['admin_id'])) {
    header('Location: /AJAR/public/index.php');
    exit();
}

$admin_id = $_SESSION['admin_id'];

// Handle logout functionality
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    LogoutController::logout();
    exit(); // Ensures the script stops after logout
}

// Handle product form submission
$response = ProductController::handleProductForm($conn);

// Delete product if requested
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete_response = ProductController::deleteProduct($conn, $id);
}

// Get all products
$products = ProductController::getAllProducts($conn);

// Load the view (admin_products.php)

?>
