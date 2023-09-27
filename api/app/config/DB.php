<?php 
 ini_set('display_errors', 1);
 error_reporting(E_ALL);
 class DB {

    private $host = '172.22.0.2';
    private $port = '3306';
    private $username = 'root';
    private $password = 'root';
    private $database_name = 'allpet';

    public $conn;

    public function getConnection(){

        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";
                port=" . $this->port . ";
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
