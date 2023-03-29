<?php

require_once(APPROOT . "/app/libraries/database.php");
class User
{
    private $db;
    private $table = "users";
    private $id;
    private $username;
    private $password;	
    private $email;
    private $role;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function findUserbyEmail($email)
    {
        $sql = "SELECT * FROM $this->table WHERE email =   '$email'";
        $this->db->prepare($sql);
        return $this->db->rowCount() >= 1;
    }

    public function findUserbyID($userID){
        $sql = "SELECT * FROM $this->table WHERE id = '$userID'";
        $this->db->prepare($sql);
        return $this->db->rowCount() >= 1;
    }

    public function register($data){
        extract($data);
        $sql = "INSERT INTO $this->table (username, email, password, role) VALUES ('$username' , '$email', '". password_hash($password,PASSWORD_DEFAULT) . "', '$role')";
        $this->db->prepare($sql);
        if ($this->db->execute()){
            return true;
        }
        return false;
    }

    public function login($email, $pass)
    {
        $user = $this->findUserByEmail($email);
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