<?php 
 ini_set('display_errors', 1);
 error_reporting(E_ALL);
 class DB {

    private $host = 'localhost';
    private $username = 'root';
    private $password = 'root';
    private $database_name = 'allpet';

    public $conn;

    public function getConnection(){

        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";
                dbname=" . $this->database_name,
                $this->username, 
                $this->password
            );
        } catch (PDOException $e) {
            // Handle the exception here
            echo "Connection failed: " . $e->getMessage();
        }
        return $this->conn;
    }
 }
