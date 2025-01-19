<?php 
class LoginModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function authenticate($email, $password) {
        // Sanitize inputs
        $filter_email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $email = mysqli_real_escape_string($this->conn, $filter_email);
    
        // Query to check user credentials
        $query = "SELECT * FROM users WHERE email = '$email'";
        $select_user = mysqli_query($this->conn, $query);
    
        if ($select_user && mysqli_num_rows($select_user) > 0) {
            $user = mysqli_fetch_assoc($select_user);
    
            // Verify the password
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return false;
    }
    
}
?>
