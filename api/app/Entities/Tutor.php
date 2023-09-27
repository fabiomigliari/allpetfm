<?php

/*Criando a Classe TUTOR que herda da Classe PESSOA sendo acrescentada alguns atributos, 
   sendo praticado aqui a herança da SuperClasse PESSOA.*/
class Tutor extends People{
    

    //Criando os ATRIBUTOS da Classe TUTOR.
    private ?int $id_tutor;
    private ?bool $sts;
    private ?string $dtregistro;

    public function __construct( 
    bool $status,
    string $dtregistro,
    string $cpf,
    
    ?string $nome = null,
    ?string $rg = null,
    ?string $telefone = null,
    ?string $email = null, 
    ?int $tipo = null, 
    ?string $dt_nasc = null,
    ?Address $endereco = null,
    ?int $id_tutor = null)
    {   
        if($id_tutor !== null)
        {
            $this->id_tutor = $id_tutor;
        }
        $this->sts = $status;
        $this->dtregistro = $dtregistro;
        $this->cpf = $cpf;

        
        $this->nome = $nome;
        $this->dt_nasc = $dt_nasc;
        $this->rg = $rg;
        
        $this->email = $email;
        $this->telefone = $telefone;
        $this->tipo = $tipo;
        $this->endereco = $endereco;
        
        
    }

    public function set_idTutor(int $id_tutor)
    {
        $this->id_tutor = $id_tutor;

    }

    public function set_status(bool $status)
    {
        $this->sts = $status;

    }

    public function set_dtRegistro(string $dtregistro)
    {
        $this->dtregistro = $dtregistro;

    }   

    public function get_idTutor()
    {
        return $this->id_tutor;
    }
    
    public function get_status()
    {
        return $this->sts;
    }

    public function get_dtregistro()
    {
        return $this->dtregistro;
    }

    // public function getAllonDB(?int $pessoa = null) {
    
    //     try {
    //         // Return Tutor and people data
    //         if($pessoa !== null && $pessoa === 1)
    //         {
    //         $stmt = $this->pdo->prepare('SELECT * FROM tutor AS T INNER JOIN pessoas AS P ON T.cpf_pessoa = P.cpf');
    //         $stmt->execute();
    //         $data = mb_convert_encoding($stmt->fetchAll(PDO::FETCH_ASSOC), 'UTF-8', 'ISO-8859-1');
    //         }else if($pessoa !== null && $pessoa ===2)
    //         {
    //         // Return TUtor, people and address data
    //         $stmt = $this->pdo->prepare('SELECT * FROM tutores AS T INNER JOIN pessoas AS P ON T.cpf_pessoa = P.cpf
    //         INNER JOIN enderecos AS E ON P.fkendereco = E.id_endereco');
    //         $stmt->execute();
    //         $data = mb_convert_encoding($stmt->fetchAll(PDO::FETCH_ASSOC), 'UTF-8', 'ISO-8859-1');
    //         }else
    //         {
    //         // Return Tutor data
    //         $stmt = $this->pdo->prepare('SELECT * FROM tutores');
    //         $stmt->execute();
    //         $data = mb_convert_encoding($stmt->fetchAll(PDO::FETCH_ASSOC), 'UTF-8', 'ISO-8859-1');
    //         }
    //         return json_encode($data);
    //     } catch (PDOException $e) {
    //         // Handle the database error
    //         echo 'Error: ' . $e->getMessage();
    //         return [];
    //     }
    // }
    

    //  // Insert a new address into the "endereco" table
    //  public function insertTutor(Tutor $tutor, ?string $cpf = null) {
    //     $json = [];

    //     if($cpf !== null)
    //     {
    //         $tutor->setCpf($cpf);
    //     }else
    //     {
    //         $tutor->insertPerson($tutor);
    //     }
        
        
    //     try {
    //         $query = 'INSERT INTO tutores (id_tutor, status, cpf_pessoa, dtregistro) VALUES (?,?,?,?)';
    //         $stmt = $this->pdo->prepare($query);
        
    //         // Check if the prepare statement was successful
    //         if ($stmt) {
    //             $result = $stmt->execute([
    //                 $tutor->get_idTutor(),
    //                 $tutor->get_status(),
    //                 $tutor->get_cpf(),
    //                 $tutor->get_dtregistro(),
    //             ]);
        
    //             if ($result) {
        
    //                 // Define and return the message
    //                 $json['id_tutor'] = $tutor->get_idTutor();
    //                 $json['status'] = $tutor->get_status();
    //                 $json['cpf_pessoa'] = $tutor->get_cpf();
    //                 $json['dtregistro'] = $tutor->get_dtregistro();
    //                 $json['Insert'] = 'Success';
                    
                    
    //                 $data = mb_convert_encoding($json, 'UTF-8', 'ISO-8859-1');
    //                 return json_encode($data);
    //             } else {
    //                 echo 'Erro ao executar a inserção';
    //             }
    //         } else {
    //             echo 'Erro na preparação da query';
    //         }
    //     } catch (PDOException $e) {
    //         echo 'Erro: ' . $e->getMessage();
    //     }
        
    //     // Ensure you return a valid JSON response even in case of errors
    //     return json_encode(['error' => 'An error occurred']);
        
    // }


}