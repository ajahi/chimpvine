
<?php

class Database
{
    private $hostname;
    private $username;
    private $password;
    private $database;

    public $conn;

    public function __construct()
    {
        $this->hostname = '127.0.0.1';
        $this->username = "ajahi";
        $this->password = "Password1@";
        $this->database = 'role22';//name of the table

        $this->conn = new PDO("mysql:host={$this->hostname};dbname={$this->database}", "{$this->username}", "{$this->password}");
        if ($this->conn->errorCode()) {
            die("Connection failed: (" . $this->conn->errorCode() . ") " . $this->conn->errorInfo());
        }
        return $this->conn;
    }
}