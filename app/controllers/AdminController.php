<?php
include 'C:\xampp\htdocs\AJAR\app\models\AdminModel.php';
include 'C:\xampp\htdocs\AJAR\app\connection.php';


class AdminController {
    private $adminModel;

    public function __construct($conn) {
        $this->adminModel = new AdminModel($conn);
    }

    public function checkSession($admin_id) {
        return $this->adminModel->checkAdminSession($admin_id);
    }

    public function handleLogout() {
        session_start();
        session_destroy();
        header('Location: login.php');
        exit();
    }
}
?>
