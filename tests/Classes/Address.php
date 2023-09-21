<?php

class Address{

    private $pdo;

    private $id_endereco;
    private string $cep;
    private string $logradouro;
    private $num_casa;
    private string $cidade;
    private string $estado;  
    private string $bairro;

    public function __construct($pdo, $id_endereco, string $cep,  string $logradouro,  string $num_casa, string $cidade,  string $estado, string $bairro) {
        $this->pdo = $pdo;
        $this->id_endereco = $id_endereco;
        $this->cep = $cep;
        $this->logradouro = $logradouro;
        $this->num_casa = $num_casa;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->bairro = $bairro;
    }
    

    public function getId()
    {
        return $this->id_endereco;
    }
    public function get_cep(){
        return $this->cep;
     }
   
      public function get_logradouro(){
         return $this->logradouro;
      }
  
      public function get_num_casa(){
        return $this->num_casa;
     }
  
     public function get_cidade(){
        return $this->cidade;
     }
  
     public function get_estado(){
        return $this->estado;
     }
  
    public function get_bairro(){
       return $this->bairro;
    }
      
    
    public function setId($id_endereco)
    {
        $this->id_endereco = $id_endereco;
    }
    public function set_cep($cep){
        $this->cep = $cep;
     }
   
      public function set_logradouro($logradouro){
        $this->logradouro = $logradouro;
      }
  
      public function set_num_casa($num_casa){
        $this->num_casa = $num_casa;
     }
  
     public function set_cidade($cidade){
        $this->cidade = $cidade;
     }
  
     public function set_estado($estado){
        $this->estado = $estado;
     }
  
    public function set_bairro($bairro){
        $this->bairro = $bairro;
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
                    
                 
                $stmt = $this->pdo->prepare($query);
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


    public function getAllonDB() {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM enderecos');
            $stmt->execute();
            $data = mb_convert_encoding($stmt->fetchAll(PDO::FETCH_ASSOC), 'UTF-8', 'ISO-8859-1');
            return json_encode($data);
        } catch (PDOException $e) {
            // Handle the database error
            echo 'Error: ' . $e->getMessage();
            return [];
        }
    }
    public function getById($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM enderecos WHERE id_endereco = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return json_encode($stmt->fetch(PDO::FETCH_ASSOC));
    }

    // Insert a new address into the "endereco" table
    public function insertAddress(Address $endereco) {
        $json = [];
        
        
        
        try {
            $query = 'INSERT INTO enderecos (id_endereco, cep, rua, num_da_casa, cidade, estado, bairro) VALUES (?,?,?,?,?,?,?)';
            $stmt = $this->pdo->prepare($query);
        
            // Check if the prepare statement was successful
            if ($stmt) {
                $result = $stmt->execute([
                    $endereco->getId(),
                    $endereco->get_cep(),
                    $endereco->get_logradouro(),
                    $endereco->get_num_casa(),
                    $endereco->get_cidade(),
                    $endereco->get_estado(),
                    $endereco->get_bairro(),
                ]);
        
                if ($result) {

        
                    // Define and return the message
                    $json['id'] = $endereco->getId();
                    $json['cep'] = $endereco->get_cep();
                    $json['logradouro'] = $endereco->get_logradouro();
                    $json['numero'] = $endereco->get_num_casa();
                    $json['cidade'] = $endereco->get_cidade();
                    $json['estado'] = $endereco->get_estado();
                    $json['bairro'] = $endereco->get_bairro();
                    
                    $data = mb_convert_encoding($json, 'UTF-8', 'ISO-8859-1');
                    return json_encode($data);
                } else {
                    echo 'Erro ao executar a inserção';
                }
            } else {
                echo 'Erro na preparação da query';
            }
        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
        }
        
        // Ensure you return a valid JSON response even in case of errors
        return json_encode(['error' => 'An error occurred']);
        
    }
}
