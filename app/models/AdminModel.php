<?php
class AdminModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function checkAdminSession($admin_id) {
        // Check if the session admin_id exists and is an admin in the users table
        $query = "SELECT * FROM users WHERE id = '$admin_id' AND user_type = 'admin'";
        $result = mysqli_query($this->conn, $query);
    
        // Check for query errors
        if (!$result) {
            die('Query failed: ' . mysqli_error($this->conn));
        }
    
        return mysqli_num_rows($result) > 0;
    }
    
}
?>
