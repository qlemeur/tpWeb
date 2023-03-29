<?php

class Database
{
    
    // private $host = DB_HOST;
    // private $dbname = DB_NAME;
    // private $username = DB_USER;
    // private $password = DB_PASS;
    private $host = "localhost";
    private $dbname = "blog";
    private $username = "root";
    private $password = "root";
    

    private $_connection;
    public $stmt;

    public function __construct()
    {
        try {
            $this->_connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
            return $this->_connection;
        } catch (PDOException $exception) {
            echo "Error:" . $exception->getMessage();
            return null;
        }
    }

    //prepare query
    public function prepare($sql)
    {
        $stmt = $this->_connection->prepare($sql);
    }

    //execute query
    public function execute()
    {
        return $this->stmt->execute();
    }

    //get single result
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch();
    }

    //get all results
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll();
    }

    //get the nb of rows
    public function rowCount()
    {
        $this->execute();
        return $this->stmt->rowCount();
    }

}

$db = new Database();
$db->prepare("SELECT * FROM users");
$dbr = $db->resultSet();
var_dump($dbr);
echo "<br>";
var_dump($db->rowCount());
echo "<br>";
var_dump($db->single());