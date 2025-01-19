<?php

require_once 'C:\\xampp\\htdocs\\AJAR\\app\\connection.php';
require_once 'C:\\xampp\\htdocs\\AJAR\\app\\controllers\\HomeController.php';
require_once 'C:\\xampp\\htdocs\\AJAR\\app\\controllers\\UserController.php';
require_once 'C:\\xampp\\htdocs\\AJAR\\app\\controllers\\ProductController.php';

// Start the session and check if the user is logged in
UserController::checkLogin(); // Redirects to login if user is not authenticated

// Fetch user details (optional, if needed for personalization)
$user_id = $_SESSION['user_id'];
$user = UserController::getUserDetails($conn, $user_id);

// Fetch products for the gallery
$products = ProductController::getAllProducts($conn);

// Include the home view
include_once 'C:\\xampp\\htdocs\\AJAR\\app\\views\\home.php';

?>
