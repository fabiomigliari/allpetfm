<?php

class Address{

    private $pdo;

    private $id_endereco;

    public function getId()
    {
        return $this->id_endereco;
    }
    public function setId($id_endereco)
    {
        $this->id_endereco = $id_endereco;
    }

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Create the Address table if it doesn't exist
    public function createTableIfNotExists() {
        $message = [];
        
        try {
            
                
            // if($result === false){
                $query = "CREATE TABLE IF NOT EXISTS enderecos (
                    id_endereco INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    cep VARCHAR(50),
                    rua VARCHAR(255),
                    num_da_casa INT(11),
                    cidade VARCHAR(40),
                    estado VARCHAR(40), 
                    bairro VARCHAR(40)
                    
    
    
    
                )";
                    
                 
                $stmt = $this->pdo->query($query);
                if($stmt->execute())
                {
                    $message[] = 'Successfuly created table or Already exists';
                }
                else{$message[] = 'Error' ;}
            

             return json_encode($message);
         } catch (PDOException $e) {
             echo 'something is wrong';
             return json_encode($message);;
         }
        // return json_encode($message);
    }   

}
