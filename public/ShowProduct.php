<?php
include_once 'C:\xampp\htdocs\AJAR\app\controllers\ProductController.php';
require_once 'C:\xampp\htdocs\AJAR\app\connection.php';
include_once 'C:\xampp\htdocs\AJAR\app\Models\ProductModel.php';

// Route handler
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id']; // Get the product ID
    
    ProductController::showProduct($conn, $id); // Call the controller to show the product
} else {
    echo "<p class='text-center text-red-500'>Invalid Product ID.</p>";
}
?>