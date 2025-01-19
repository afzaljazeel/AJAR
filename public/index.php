<?php 
include 'C:\xampp\htdocs\AJAR\app\connection.php';
include 'C:\xampp\htdocs\AJAR\app\controllers\LoginController.php';
include 'C:\xampp\htdocs\AJAR\app\views\login.php';

// Initialize the controller and view
$loginController = new LoginController($conn);
$loginView = new LoginView();

// Handle login logic
$messages = $loginController->handleLogin();

// Display the login form view
$loginView->displayLoginForm($messages);
?>

