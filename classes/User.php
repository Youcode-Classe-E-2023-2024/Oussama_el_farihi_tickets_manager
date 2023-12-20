<?php

require_once 'Database.php';

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function register($name, $email, $password)
    {
        $name = $this->db->escape($name);
        $email = $this->db->escape($email);
        $password = $this->db->escape($password);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$hashedPassword');";

        return $this->db->query($sql);
    }

    public function login($email, $password)
    {
        $email = $this->db->escape($email);
        $sql = "SELECT * FROM user WHERE email = '$email'";

        $user = $this->db->fetch($sql);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['name'] = $user['name'];

            return true;
        }
        return false;
    }

    public function logout()
    {
        session_unset();
        session_destroy();
    }

    public function getUsers() {
        $sql = "SELECT id_user, name FROM user";
        return $this->db->fetchAll($sql);
    }
    
}

?>