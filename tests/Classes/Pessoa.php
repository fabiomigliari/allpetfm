<?php

    require_once "./pessoaRepositorio.php";
    require_once "../tests/Classes/Endereco.php";

/*Criando a Classe PESSOA, sendo ela uma SuperClasse e herdando para as Classes TUTOR E FUNCIONÁRIO*/
class Pessoa{
    
  //Criando os ATRIBUTOS da Classe PESSOA.
    protected string $nome;
    protected string $cpf;
    protected string $rg;
    protected string $telefone;
    protected string $email;
    protected string $dt_nasc;
    protected Endereco $endereco;
    protected string $tipo;
    

  //Criando o método CONSTRUTOR da classe PESSOA  
  public function __construct(string $nome, string $cpf, string $rg, string $telefone, string $email, string $dt_nasc,  Endereco $endereco)
  {
    $this->nome = $nome;
    $this->cpf = $cpf;
    $this->rg = $rg;
    $this->telefone = $telefone;
    $this->email = $email;
    $this->dt_nasc = $dt_nasc;
    $this->endereco = $endereco;
    
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
  

   //Criação do METODO...
}