<?php

class AddressRepository implements AddressRepositoryInterface{
    private PDO $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        
    }

    public function checkTable(): bool
    {
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
                $stmt->execute();
                
            

             return true;
         } catch (PDOException $e) {
             echo 'something is wrong';
             return false;
         }
    }

    public function save(Address $address): array
    {
        $json = [];
        
        
        
        try {
            $query = 'INSERT INTO enderecos (cep, rua, num_da_casa, cidade, estado, bairro) VALUES (?,?,?,?,?,?)';
            $stmt = $this->pdo->prepare($query);
        
            // Check if the prepare statement was successful
                $stmt->execute([
                    $address->get_cep(),
                    $address->get_logradouro(),
                    $address->get_num_casa(),
                    $address->get_cidade(),
                    $address->get_estado(),
                    $address->get_bairro(),
                ]);
        
                    // Define and return the message
                    $json['id'] = $this->pdo->lastInsertId();
                    $json['cep'] = $address->get_cep();
                    $json['logradouro'] = $address->get_logradouro();
                    $json['numero'] = $address->get_num_casa();
                    $json['cidade'] = $address->get_cidade();
                    $json['estado'] = $address->get_estado();
                    $json['bairro'] = $address->get_bairro();
                    
                
        } catch (PDOException $e) {
            $errorCode = $stmt->errorCode();
                    if ($errorCode === '23000') {
                        $json['message'] = 'Duplicate entry: This record already exists.';
                    } else {
                        $json['message'] = 'Erro: ' . $e->getMessage();
                    }
        }
        return $json;
        
    }

    public function search(string $query): array
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM enderecos WHERE rua LIKE ?');
            $stmt->execute(["%$query%"]);
            $addressData = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $address = [];
            foreach($addressData as $addData){
                $address[] = new Address(
                $addData['id_endereco'],
                $addData['cep'],
                $addData['rua'],
                $addData['num_da_casa'],
                $addData['cidade'],
                $addData['estado'],
                $addData['bairro']);
            }
            return $address;
        } catch (PDOException $e) {
            // Handle the database error
            echo 'Error: ' . $e->getMessage();
            return [];
        }
    }

    public function delete(Address $address): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM enderecos WHERE id_endereco = ?");
        $stmt->execute([$address->getId()]);
    }

    public function update(Address $address): void
    {
        $stmt = $this->pdo->prepare("UPDATE enderecos SET 
        id_endereco = ?, 
        cep = ?, 
        rua = ?, 
        num_da_casa = ?, 
        cidade = ?, 
        estado = ?, 
        bairro = ? WHERE id_endereco = ?");

$stmt->execute([
    $address->getId(),
    $address->get_cep(),
    $address->get_logradouro(),
    $address->get_num_casa(),
    $address->get_cidade(),
    $address->get_estado(),
    $address->get_bairro(),]);
    }
    
    

    public function getById(int $addressId): ?Address
    {
        $stmt = $this->pdo->prepare('SELECT * FROM enderecos WHERE id_endereco = ?');
        $stmt->execute([$addressId]);

        $addData = $stmt->fetch(PDO::FETCH_ASSOC);

        if($addData)
        {
            return new Address(
            $addData['id_endereco'],
            $addData['cep'],
            $addData['rua'],
            $addData['num_da_casa'],
            $addData['cidade'],
            $addData['estado'],
            $addData['bairro']);
        }else {return null;}
        
    }
    
    public function getAll(): array{
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM enderecos');
            $stmt->execute();
            $addressData = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $address = [];
            foreach($addressData as $addData){
                $address[] = new Address(
                $addData['cep'],
                $addData['rua'],
                $addData['num_da_casa'],
                $addData['cidade'],
                $addData['estado'],
                $addData['bairro'],
                $addData['id_endereco']);
            }
            return $address;
        } catch (PDOException $e) {
            // Handle the database error
            echo 'Error: ' . $e->getMessage();
            return [];
        }
    }
}
