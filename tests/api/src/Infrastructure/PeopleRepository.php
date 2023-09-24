<?php

class PeopleRepository implements PeopleRepositoryInterface{
    private PDO $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        
    }

    public function checkTable(): bool
    {
        try {
            
                $query = "CREATE TABLE IF NOT EXISTS pessoas (
                    cpf VARCHAR(11) NOT NULL PRIMARY KEY,
                    nome VARCHAR(50) NOT NULL,
                    rg VARCHAR(11) NOT NULL,
                    telefone VARCHAR(30) NOT NULL,
                    email VARCHAR(255) NOT NULL,
                    fkendereco INT(11) , 
                    tipo TINYINT(1) NOT NULL,
                    dtnasc DATE NOT NULL,
                    FOREIGN KEY (fkendereco) REFERENCES enderecos(id_endereco)
                    
    
    
    
                )";
                    
                 
                $stmt = $this->pdo->prepare($query);
                $stmt->execute();
                
            

             return true;
         } catch (PDOException $e) {
             echo 'something is wrong';
             return false;
         }
    }

    public function save(People $pessoa): void
    {
        $json = [];
        
        
        
        // try {
            $query = 'INSERT INTO pessoas (cpf, nome, rg, telefone, email, fkendereco, tipo, dtnasc) VALUES (?,?,?,?,?,?,?,?)';
            $stmt = $this->pdo->prepare($query);
        
            // Check if the prepare statement was successful
            if ($stmt) {
                $result = $stmt->execute([
                    $pessoa->get_cpf(),
                    $pessoa->get_nome(),
                    $pessoa->get_rg(),
                    $pessoa->get_telefone(),
                    $pessoa->get_email(),
                    $pessoa->get_endereco()->getId(),
                    $pessoa->get_tipo(),
                    $pessoa->get_dt_nasc()
                ]);
        
                if ($result) {

        
                    // Define and return the message
                    $json['CPF'] = $pessoa->get_cpf();
                    $json['Nome'] = $pessoa->get_nome();
                    $json['RG'] = $pessoa->get_rg();
                    $json['Telefone'] = $pessoa->get_telefone();
                    $json['Email'] = $pessoa->get_email();
                    $json['Endereco'] = $pessoa->get_endereco()->getId();
                    $json['Tipo'] = $pessoa->get_tipo();
                    $json['Data de Nascimento'] = $pessoa->get_dt_nasc();
                    
                    $data = mb_convert_encoding($json, 'UTF-8', 'ISO-8859-1');
                    echo json_encode($data);
                } else {
                    echo 'Erro ao executar a inserção';
                }
            } else {
                echo 'Erro na preparação da query';
            }
        // } catch (PDOException $e) {
        //     echo 'Erro: ' . $e->getMessage();
        // }
        
        // Ensure you return a valid JSON response even in case of errors
        // echo json_encode(['error' => 'An error occurred']);
        
    }

    public function search(string $query): array
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM pessoas WHERE nome LIKE ?');
            $stmt->execute(["%$query%"]);
            $pessoasData = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $pessoas = [];
            foreach($pessoasData as $pessoaData){
                $pessoas[] = new People(
                $pessoaData['cpf'],
                $pessoaData['nome'],
                $pessoaData['rg'],
                $pessoaData['telefone'],
                $pessoaData['email'],
                $pessoaData['fkendereco'],
                $pessoaData['tipo'],
                $pessoaData['dtnasc']);
            }
            return $pessoas;
        } catch (PDOException $e) {
            // Handle the database error
            echo 'Error: ' . $e->getMessage();
            return [];
        }
    }

    public function delete(People $pessoa): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM pessoas WHERE cpf = ?");
        $stmt->execute([$pessoa->get_cpf()]);
    }

    public function update(People $pessoa): void
    {
        $stmt = $this->pdo->prepare("UPDATE pessoas SET 
        cpf = ?, 
        nome = ?, 
        rg = ?, 
        telefone = ?, 
        email = ?, 
        fkendereco = ?, 
        tipo = ?,
        dtnasc = ? WHERE cpf = ?");

$stmt->execute([
    $pessoa->get_cpf(),
        $pessoa->get_nome(),
        $pessoa->get_rg(),
        $pessoa->get_telefone(),
        $pessoa->get_email(),
        $pessoa->get_endereco()->getId(),
        $pessoa->get_tipo(),
        $pessoa->get_dt_nasc()]);
    }
    
    

    public function getByCpf(string $cpf): ?People
    {
        $stmt = $this->pdo->prepare('SELECT * FROM pessoas WHERE cpf = ?');
        $stmt->execute([$cpf]);

        $pessoaData = $stmt->fetch(PDO::FETCH_ASSOC);

        if($pessoaData)
        {
            return new People(
            $pessoaData['cpf'],
            $pessoaData['nome'],
            $pessoaData['rg'],
            $pessoaData['telefone'],
            $pessoaData['email'],
            $pessoaData['fkendereco'],
            $pessoaData['tipo'],
            $pessoaData['dtnasc']);
        }else {return null;}
        
    }
    
    public function getAll(): array{
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM enderecos');
            $stmt->execute();
            $pessoasData = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $pessoas = [];
            foreach($pessoasData as $pessoaData){
                $pessoas[] = new People(
                    $pessoaData['cpf'],
                    $pessoaData['nome'],
                    $pessoaData['rg'],
                    $pessoaData['telefone'],
                    $pessoaData['email'],
                    $pessoaData['fkendereco'],
                    $pessoaData['tipo'],
                    $pessoaData['dtnasc']);
            }
            return $pessoas;
        } catch (PDOException $e) {
            // Handle the database error
            echo 'Error: ' . $e->getMessage();
            return [];
        }
    }
}
