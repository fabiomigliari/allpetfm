<?php

class TutorRepository implements TutorRepositoryInterface{
    private PDO $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        
    }

    public function checkTable(): bool
    {
        try {
            
                $query = "CREATE TABLE IF NOT EXISTS tutores (
                    id_tutor int(9) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    status tinyint(1) NOT NULL,
                    cpf_pessoa varchar(11) NOT NULL,
                    dtregistro date NOT NULL,
                    FOREIGN KEY (cpf_pessoa) REFERENCES pessoas(cpf)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    
    
                )";
                    
                 
                $stmt = $this->pdo->prepare($query);
                $stmt->execute();
                
            

             return true;
         } catch (PDOException $e) {
             echo 'something is wrong';
             return false;
         }
    }

    public function save(Tutor $tutor): void
    {
        $json = [];
        
        
        
        try {
            $query = 'INSERT INTO tutores (id_tutor, status, cpf_pessoa, dtregistro) VALUES (?,?,?,?)';
            $stmt = $this->pdo->prepare($query);
        
            // Check if the prepare statement was successful
            if ($stmt) {
                $result = $stmt->execute([
                    $tutor->get_idTutor(),
                    $tutor->get_status(),
                    $tutor->get_cpf(),
                    $tutor->get_dtregistro()
                ]);
        
                if ($result) {

        
                    // Define and return the message
                    $json['id_tutor'] = $tutor->get_idTutor();
                    $json['status'] = $tutor->get_status();
                    $json['cpf_pessoa'] = $tutor->get_cpf();
                    $json['dtregistro'] = $tutor->get_dtregistro();
                    
                    $data = mb_convert_encoding($json, 'UTF-8', 'ISO-8859-1');
                    echo json_encode($data);
                } else {
                    echo 'Erro ao executar a inserção';
                }
            } else {
                echo 'Erro na preparação da query';
            }
        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
        }
        
        
        
    }

    public function search(string $query): array
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM tutores WHERE nome LIKE ?');
            $stmt->execute(["%$query%"]);
            $tutoresData = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $tutores = [];
            foreach($tutoresData as $tutorData){
                $tutores[] = new Tutor(
                $tutorData['id_tutor'],
                $tutorData['status'],
                $tutorData['cpf_pessoa'],
                $tutorData['dtregistro'],);
            }
            return $tutores;
        } catch (PDOException $e) {
            // Handle the database error
            echo 'Error: ' . $e->getMessage();
            return [];
        }
    }

    public function delete(Tutor $tutor): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM tutores WHERE id_tutor = ?");
        $stmt->execute([$tutor->get_idTutor()]);
    }

    public function update(Tutor $tutor): void
    {
        $stmt = $this->pdo->prepare("UPDATE tutores SET 
        id_tutor = ?, 
        status = ?, 
        cpf_pessoa = ?, 
        dtregistro = ? WHERE id_tutor = ?");

        $stmt->execute([
            $tutor->get_idTutor(),
            $tutor->get_status(),
            $tutor->get_cpf(),
            $tutor->get_dtregistro()]);
    }
    
    

    public function getByid(int $id): ?Tutor
    {
        $stmt = $this->pdo->prepare('SELECT * FROM tutores WHERE id_tutor = ?');
        $stmt->execute([$id]);

        $tutorData = $stmt->fetch(PDO::FETCH_ASSOC);

        if($tutorData)
        {
            return new Tutor(
                $tutorData['id_tutor'],
                $tutorData['status'],
                $tutorData['cpf'],
                $tutorData['dtregistro']);
        }else {return null;}
        
    }
    
    public function getAll(): array{
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM tutores');
            $stmt->execute();
            $tutoresData = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $tutores = [];
            foreach($tutoresData as $tutorData){
                $tutores[] = new Tutor(
                    $tutorData['id_tutor'],
                    $tutorData['status'],
                    $tutorData['cpf'],
                    $tutorData['dtregistro']);
            }
            return $tutores;
        } catch (PDOException $e) {
            // Handle the database error
            echo 'Error: ' . $e->getMessage();
            return [];
        }
    }
}
