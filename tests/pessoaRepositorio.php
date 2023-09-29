<?php

class pessoaRepositorio
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }



/*---------->   MÉTODOS DE BUSCA DE DADOS    <----------*/

    //método para buscar todos os Tutores no banco de dados.
    public function buscarTutores()
    {
        $sql = "SELECT * FROM tutor AS t
                INNER JOIN pessoas AS p ON p.cpf = t.cpf_pessoa ORDER BY nome";
        $statement = $this->pdo->query($sql);
        $tutores = $statement->fetchAll(PDO::FETCH_ASSOC);

        $dadosTutor = array_map(function ($pessoa){
            
            $endereco = $this->buscarEnderecoPorId($pessoa['fkendereco']);

            $tutor =  new Tutor(
                $pessoa['nome'],
                $pessoa['dtnasc'],
                $pessoa['rg'],
                $pessoa['cpf'],
                $pessoa['email'],
                $pessoa['telefone'],
                $endereco,
                $pessoa['status'],
                $pessoa['dtregistro']
            );
                $tutor->set_idTutor($pessoa['id_tutor']);
                $tutor->set_status($pessoa['status']);
                $tutor->set_dtRegistro($pessoa['dtregistro']);
            return $tutor;
        }, $tutores);

        return $dadosTutor;
    }

     //método para buscar todos os Tutores no banco de dados.
     public function buscarFuncionarios()
     {
         $sql = "SELECT * FROM funcionarios AS f
                 INNER JOIN pessoas AS p ON p.cpf = f.cpf_pessoa 
                 ORDER BY nome";
         $statement = $this->pdo->query($sql);
         $funcionarios = $statement->fetchAll(PDO::FETCH_ASSOC);
 
         $dadosFuncionario = array_map(function ($pessoa){
             
             $endereco = $this->buscarEnderecoPorId($pessoa['fkendereco']);
             $funcao = $this->buscarFuncaoPorId($pessoa['fkfuncao']);
             
             
             $funcionario =  new Funcionario(
                 $pessoa['nome'],
                 $pessoa['dtnasc'],
                 $pessoa['rg'],
                 $pessoa['cpf'],
                 $pessoa['email'],
                 $pessoa['telefone'],
                 $pessoa['tipo'],
                 $endereco,
                 
                );

                $funcionario->set_id_funcionario($pessoa['id']);
                $funcionario->set_horario_de_trabalho($pessoa['hora_de_trab']);
                $funcionario->set_dia_de_folga($pessoa['diadefolga']);
                $funcionario->set_perfil($pessoa['perfil']);
                

             return $funcionario;
         }, $funcionarios);
 
         return $dadosFuncionario;
     }

      //método para buscar todos os PETS no banco de dados.
    public function buscarPets()
    {
        $sql = "SELECT * FROM pet AS pt
                        INNER JOIN tutor AS t ON t.id_tutor = pt.fkid_tutor 
                        INNER JOIN pessoas AS pes ON pes.cpf = pt.fktutor_cpf 
                        INNER JOIN especie AS e ON e.id_especie = pt.fk_especie
                        INNER JOIN raca AS r ON r.id_raca = pt.fk_raca ORDER BY pet_nome";
        $statement = $this->pdo->query($sql);
        $pets = $statement->fetchAll(PDO::FETCH_ASSOC);

        $dadosPet = array_map(function ($animal){

            $pet =  new Pet(
                $animal['cod_pet'],
                $animal['pet_nome'],
                $animal['fktutor_cpf'],
                $animal['nome'],
                $animal['sexo'],
                $animal['pelagem'],
                $animal['cor'],
                $animal['fkid_tutor'],
                $animal['fk_especie'],
                $animal['fk_raca'],
                $animal['dt_nasc']
            );

            return $pet;
        }, $pets);

        return $dadosPet;
    }

    //método para buscar todos os Endereços no banco de dados.
    public function buscarEnderecoPorId(?int $id)
    {
        if (is_null($id)) {
            return null;
        }

        $sql = "SELECT * FROM endereco where id_endereco = {$id} limit 1";
        $statement = $this->pdo->query($sql);
        $endereco = $statement->fetch();


        if (empty($endereco)) {
            return null; 
        }
        
        return new Endereco(
            $endereco['id_endereco'],
            $endereco['cep'],
            $endereco['rua'],
            $endereco['num_da_casa'],
            $endereco['cidade'],
            $endereco['estado'],
            $endereco['bairro']
        );

        return $endereco;
    }

    //método para buscar todas as funcoes no banco de dados.
    public function buscarFuncaoPorId(?int $id_f)
    {
        if (is_null($id_f)) {
            return null;
        }

        $sql = "SELECT * FROM funcao where id = {$id_f} limit 1";
        $statement = $this->pdo->query($sql);
        $funcao = $statement->fetch();


        if (empty($funcao)) {
            return null; 
        }
        
        return new Funcao(
            $funcao['id'],
            $funcao['nome_funcao'],
            $funcao['departamento'],
            $funcao['descricao_funcao'],
            $funcao['salario']
        );

        return $funcao;
    }

/*---------->   MÉTODOS DE EXCLUSÃO DE DADOS    <----------*/

    //Método para deletar o TUTOR do banco de dados cadastrado.
    public function deletarTutor(int $id)
    {
        $sql = "DELETE FROM tutor WHERE id_tutor = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();
    }

    //Método para deletar o Funcionário do banco de dados cadastrado.
    public function deletarFuncionario(int $id_f)
    {
        $sql = "DELETE FROM funcionarios WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id_f);
        $statement->execute();
    }

    //Método para deletar o PET do banco de dados cadastrado.
    public function deletarPet(int $id)
    {
        $sql = "DELETE FROM pet WHERE cod_pet = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();
    }


/*---------->   MÉTODOS DE INSERÇÃO DE DADOS    <----------*/

#Método de Inserção de dados
public function salvarTutor(Tutor $tutor)
{   
    $sql = "INSERT INTO endereco (cep, rua, num_da_casa, cidade, estado, bairro ) VALUES (?, ?, ?, ?, ?, ?)";
    $statement = $this->pdo->prepare($sql);
    $statement->bindValue(1, $tutor->get_endereco()->get_cep()); 
    $statement->bindValue(2, $tutor->get_endereco()->get_logradouro()); 
    $statement->bindValue(3, $tutor->get_endereco()->get_num_casa()); 
    $statement->bindValue(4, $tutor->get_endereco()->get_cidade()); 
    $statement->bindValue(5, $tutor->get_endereco()->get_estado()); 
    $statement->bindValue(6, $tutor->get_endereco()->get_bairro()); 
    $statement->execute();  
    
    $sql = "INSERT INTO pessoas (cpf, nome, rg, telefone, email, fkendereco, dtnasc ) VALUES ( ?, ?, ?, ?, ?, ?, ?)";
    $statement = $this->pdo->prepare($sql);
     
    $statement->execute([$tutor->get_cpf(), 
    $tutor->get_nome(), 
    $tutor->get_rg(),
    $tutor->get_telefone(), 
    $tutor->get_email(),
    $this->pdo->lastInsertId(),
    $tutor->get_dt_nasc()]);

   $sql = "INSERT INTO tutor (status, cpf_pessoa, dtregistro) VALUES (?, ?, ?)";
    $statement = $this->pdo->prepare($sql);
    $statement->execute([$tutor->get_status(), 
    $tutor->get_cpf(),
    $tutor->get_dtregistro()]);          
}
}