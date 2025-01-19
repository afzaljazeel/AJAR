<?php
session_start();
require_once 'C:\\xampp\\htdocs\\AJAR\\app\\connection.php';
require_once 'C:\\xampp\\htdocs\\AJAR\\app\\controllers\\ProductController.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: /AJAR/public/admin_product_panel.php');
    exit;
}

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $detail = $_POST['detail'];
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];

    $product = ProductController::getProductForEditing($conn, $id);

    if (!$product) {
        echo "Product not found.";
        exit;
    }

    $response = ProductController::handleUpdateProduct($conn, $id, $name, $price, $detail, $image, $image_tmp_name, $product['image']);

    if ($response) {
        header('Location: /AJAR/public/AdminPL.php');
        exit;
    } else {
        echo "<p class='text-red-500'>Failed to update the product. Try again.</p>";
    }
} else {
    $product = ProductController::getProductForEditing($conn, $id);
    if (!$product) {
        echo "Product not found.";
        exit;
    }

    include 'C:\\xampp\\htdocs\\AJAR\\app\\views\\Admin\\EditProduct.php';
}
?>
