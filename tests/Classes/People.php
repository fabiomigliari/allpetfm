<?php
require_once('autoload.php');

class People {
    protected $pdo;

    protected string $nome;
    protected string $dt_nasc;
    protected string $rg;
    protected string $cpf;
    protected string $email;
    protected string $telefone;
    protected int $tipo;
    protected Address $endereco;


    public function __construct($pdo, string $nome, string $dt_nasc, string $rg, string $cpf, string $email, string $telefone, int $tipo, Address $endereco) {
        $this->pdo = $pdo;

        $this->nome = $nome;
        $this->dt_nasc = $dt_nasc;
        $this->rg = $rg;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->tipo = $tipo;
        $this->endereco = $endereco;
        
    }

    // Create the "people" table if it doesn't exist
    public function createTableIfNotExists() {
        $message = [];
        
        try {
            
                
            // if($result === false){
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

    

    // Insert a new person into the "people" table
    public function insertPerson(People $pessoa) {
        $json = [];
        
        
        

        
        
        
        try {
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
                    // NULL,
                    $pessoa->get_tipo(),
                    $pessoa->get_dt_nasc(),
                ]);
        
                if ($result) {

        
                    // Define and return the message
                    $json['CPF'] = $pessoa->get_cpf();
                    $json['Nome'] = $pessoa->get_nome();
                    $json['RG'] = $pessoa->get_rg();
                    $json['Telefone'] = $pessoa->get_telefone();
                    $json['Email'] = $pessoa->get_email();
                    $json['Endereço'] = $pessoa->get_endereco()->getId();
                    $json['Tipo'] = $pessoa->get_tipo();
                    $json['Data de Nascimento'] = $pessoa->get_dt_nasc();
                    
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

    public function getAllonDB() {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM pessoas');
            $stmt->execute();
            $data = mb_convert_encoding($stmt->fetchAll(PDO::FETCH_ASSOC), 'UTF-8', 'ISO-8859-1');
            return json_encode($data);
        } catch (PDOException $e) {
            // Handle the database error
            echo 'Error: ' . $e->getMessage();
            return [];
        }
    }

    public function getById($cpf) {
        $stmt = $this->pdo->prepare('SELECT * FROM pessoas WHERE cpf = :cpf');
        $stmt->bindParam(':cpf', $cpf, PDO::PARAM_INT);
        $stmt->execute();
        return json_encode($stmt->fetch(PDO::FETCH_ASSOC));
    }


    //Criando os MÉTODOS GETTERS  da Classe PESSOA.
  public function get_nome()
  {
    return $this->nome;
  }

  public function get_dt_nasc()
  {
   return $this->dt_nasc;
    
  }

  public function get_rg()
  {
    return $this->rg;
  }

  public function get_cpf()
  {
    return $this->cpf;
  }

  public function get_email()
  {
    return $this->email;
  }

  public function get_telefone()
  {
    return $this->telefone;
  }
 
  public function get_tipo()
  {
    return $this->tipo;
  }
  
  public function get_endereco()
  {
    return $this->endereco;
  }
  // setters
  public function setNome(string $nome) {
    $this->nome = $nome;
}

public function setDtNasc(string $dt_nasc) {
    $this->dt_nasc = $dt_nasc;
}

public function setRg(string $rg) {
    $this->rg = $rg;
}

public function setCpf(string $cpf) {
    $this->cpf = $cpf;
}

public function setEmail(string $email) {
    $this->email = $email;
}

public function setTelefone(string $telefone) {
    $this->telefone = $telefone;
}

public function setTipo(int $tipo) {
    $this->tipo = $tipo;
}

public function setEndereco(Address $endereco) {
    $this->endereco = $endereco;
}

}
?>