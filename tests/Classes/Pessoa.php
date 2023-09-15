<?php

    require_once "./pessoaRepositorio.php";
    require_once "../tests/Classes/Endereco.php";

/*Criando a Classe PESSOA, sendo ela uma SuperClasse e herdando para as Classes TUTOR E FUNCIONÁRIO*/
class Pessoa{
    
  //Criando os ATRIBUTOS da Classe PESSOA.
    private string $nome;
    private string $dt_nasc;
    private string $rg;
    private string $cpf;
    private string $email;
    private string $telefone;
    private int $tipo;
    private Endereco $endereco;
    

  //Criando o método CONSTRUTOR da classe PESSOA  
  public function __construct(string $nome, string $dt_nasc, string $rg, string $cpf, string $email, string $telefone, int $tipo, Endereco $endereco)
  {
    $this->nome = $nome;
    $this->dt_nasc = $dt_nasc;
    $this->rg = $rg;
    $this->cpf = $cpf;
    $this->email = $email;
    $this->telefone = $telefone;
    $this->tipo = $tipo;
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