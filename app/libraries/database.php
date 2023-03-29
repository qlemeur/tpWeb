<?php

//modèle des données de haut niveau
class Database
{
    private $host = 'localhost';
    private $dbname = 'blog';
    private $username = 'root';
    private $password = 'root';

    protected $_connection;
    public $table;
    public $id;

    public function getConnection()
{
    try {
        $this->_connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
        return $this->_connection;
    } catch (PDOException $exception) {
        echo "Error:" . $exception->getMessage();
        return null;
    }
}


    public function getALL()
    {
        $sql = "SELECT * FROM " . $this->table;
        $querry = $this->_connection->prepare($sql);
        $querry->execute();
        return $querry->fetchAll();
    }

    public function getOne()
    {
        $sql = "SELECT * FROM " . $this->table . $this->id;
        $querry = $this->_connection->prepare($sql);
        $querry->execute();
        return $querry->fetch();
    }

    public function getUserByEmail($email){
        $sql = "SELECT * FROM " . $this->table . $this->id . "WHERE email=" . $email;
        $querry = $this->_connection->prepare($sql);
        $querry->execute();
        return $querry->fetch();
    }
}
?>