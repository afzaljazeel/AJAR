<?php
// Include necessary files
include_once 'C:\xampp\htdocs\AJAR\app\connection.php';
include_once 'C:\xampp\htdocs\AJAR\app\controllers\UserController.php';
include_once 'C:\xampp\htdocs\AJAR\app\views\RegisterView.php';


// Initialize Controller
$userController = new UserController($conn);

// Handle Register
$messages = $userController->handleRegister();

// Initialize View and display the form
$registerView = new RegisterView();
$registerView->displayForm($messages);
?>
