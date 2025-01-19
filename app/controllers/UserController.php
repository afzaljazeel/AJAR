<?php
include_once 'C:\xampp\htdocs\AJAR\app\models\UserModel.php';

class UserController {
    private $userModel;

    public function __construct($conn) {
        $this->userModel = new UserModel($conn);
    }

    public function handleRegister() {
        $messages = [];

        if (isset($_POST['submit-btn'])) {
            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
            $cpassword = filter_var($_POST['cpassword'], FILTER_SANITIZE_STRING);

            if ($this->userModel->userExists($email)) {
                $messages[] = 'User already exists';
            } else {
                if ($password != $cpassword) {
                    $messages[] = 'Passwords do not match';
                } else {
                    // Hash the password
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    if ($this->userModel->registerUser($name, $email, $hashed_password)) {
                        $messages[] = 'Registered successfully';
                        header('Location: index.php');
                        exit;
                    } else {
                        $messages[] = 'Registration failed. Please try again.';
                    }
                }
            }
        }

        return $messages;
    }

    public static function checkLogin() {
        // Start the session
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Check if the user is logged in
        if (!isset($_SESSION['user_id'])) {
            // Redirect to the login page if not authenticated
            header('Location: /AJAR/public/index.php');
            exit;
        }
    }

    public static function getUserDetails($conn, $user_id) {
        return UserModel::getUserById($conn, $user_id);
    }
}
?>
