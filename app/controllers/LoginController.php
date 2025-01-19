<?php 
include 'C:\xampp\htdocs\AJAR\app\models\LoginModel.php';


class LoginController {
    private $loginModel;

    public function __construct($conn) {
        $this->loginModel = new LoginModel($conn);
    }

    public function handleLogin() {
        if (isset($_POST['submit-btn'])) {
            $message = [];

            // Get input values
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Authenticate user using the model
            $user = $this->loginModel->authenticate($email, $password);

            if ($user) {
                // Store session variables
                session_start();
                if ($user['user_type'] == 'admin') {
                    $_SESSION['admin_name'] = $user['name'];
                    $_SESSION['admin_email'] = $user['email'];
                    $_SESSION['admin_id'] = $user['id'];
                    header('Location: /AJAR/public/admin_panel.php');  // Use absolute path
                    exit();
                } elseif ($user['user_type'] == 'user') {
                    $_SESSION['user_name'] = $user['name'];
                    $_SESSION['user_email'] = $user['email'];
                    $_SESSION['user_id'] = $user['id'];
                    header('Location: /AJAR/public/Home.php');  // Use absolute path
                    exit();
                }
            } else {
                $message[] = "Incorrect email or password.";
            }

            return $message;
        }
    }
}
?>
