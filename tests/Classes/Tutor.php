<?php

/*Criando a Classe TUTOR que herda da Classe PESSOA sendo acrescentada alguns atributos, 
   sendo praticado aqui a herança da SuperClasse PESSOA.*/
class Tutor extends Pessoa{
    
    //Criando os ATRIBUTOS da Classe TUTOR.
    private ?int $id_tutor;
    private bool $status;
    private string $dtregistro;

    public function __construct(?string $nome = null, ?string $cpf=null,
    ?string $rg = null,
    ?string $telefone = null,
    ?string $email = null, 
    ?string $dt_nasc = null,
    ?Endereco $endereco = null, bool $status, string $dtregistro)
    {   
        parent::__construct(
            $this->nome = $nome,
            $this->cpf = $cpf,
            $this->rg = $rg,
            $this->telefone = $telefone,
            $this->email = $email,
            $this->dt_nasc = $dt_nasc,
            $this->endereco = $endereco);
            $this->status = $status;
            $this->dtregistro = $dtregistro;
    }

    public function set_idTutor(int $id_tutor)
    {
        $this->id_tutor = $id_tutor;

    }

    public function set_status(bool $status)
    {
        $this->status = $status;

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
        return $this->status;
    }

    public function get_dtregistro()
    {
        return $this->dtregistro;
    }


}