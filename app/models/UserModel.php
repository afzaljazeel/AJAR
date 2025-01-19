<?php

class UserModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function userExists($email) {
        $email = mysqli_real_escape_string($this->conn, $email);
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($this->conn, $query);
        return mysqli_num_rows($result) > 0;
    }

    public function registerUser($name, $email, $hashed_password) {
        $name = mysqli_real_escape_string($this->conn, $name);
        $email = mysqli_real_escape_string($this->conn, $email);

        $query = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss", $name, $email, $hashed_password);

        return $stmt->execute();
    }

    public static function getUserById($conn, $user_id) {
        $query = $conn->prepare("SELECT * FROM users WHERE id = ?");
        $query->bind_param("i", $user_id);
        $query->execute();
        return $query->get_result()->fetch_assoc();
    }
}
?>
