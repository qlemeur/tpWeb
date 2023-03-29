<?php
class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function login($email, $pass)
    {
        $user = $this->db->getUserByEmail($email);
        if (!$user) {
            return false;
        }
        if (password_verify($pass, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }
}
?>