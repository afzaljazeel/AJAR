<?php
// Include necessary files
require_once 'C:\xampp\htdocs\AJAR\app\connection.php';
require_once 'C:\xampp\htdocs\AJAR\app\controllers\ProductController.php';
require_once 'C:\xampp\htdocs\AJAR\app\views\Admin\AdminPLView.php';

// Initialize Controller
$productController = new ProductController($conn);

// Handle delete action
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    if ($productController->deleteProduct($conn, $id)) { // Pass $conn here
        header("Location: AdminPL.php");
        exit;
    } else {
        echo "<p class='text-red-500'>Failed to delete product.</p>";
    }
}

// Handle view action
if (isset($_GET['view'])) {
    $id = intval($_GET['view']);
    $product = $productController->getProductById($conn, $id); // Fetch the product by ID
    if ($product) {
        require_once 'C:\xampp\htdocs\AJAR\public\ShowProduct.php'; // Load the view
        renderProductDetails($product); // Call the render function
        exit;
    } else {
        echo "<p class='text-red-500'>Product not found.</p>";
        exit;
    }
}

// Fetch products for the list view
$products = $productController->getAllProducts($conn); // Pass $conn here

// Render the product list view
renderProductList($products);
?>
