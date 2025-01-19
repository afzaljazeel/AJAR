<?php
class LogoutController {
    public static function logout() {
        // Start the session
        session_start();
        
        // Unset all session variables and destroy the session
        session_unset();
        session_destroy();
        
        // Redirect to the login page or admin panel
        header("Location: index.php");
        exit();
    }
}
?>
