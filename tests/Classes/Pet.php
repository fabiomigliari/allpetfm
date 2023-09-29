<?php

/*Criando a Classe PET.*/
class Pet{

  //Criação dos ATRIBUTOS da Classe ENDERECO.
    private ?int $id_pet; 
    private string $nome_pet;
    private string $cpf_tutor;
    private string $sexo;
    private string $dt_nasc;
    private string $pelagem;
    private string $cor;
    private int $fktutor;
    private string $raca;
    private string $especie;


  //Criação dos MÉTODO CONSTRUTOR da Classe ENDERECO.

  public function __construct(int $id_pet, string $nome_pet, string $cpf_tutor, string $dt_nasc, string $sexo,  string $pelagem, string $cor, int $fktutor, string $raca, string $especie)
  {
    $this->id_pet = $id_pet;    
    $this->nome_pet = $nome_pet;    
    $this->cpf_tutor = $cpf_tutor;    
    $this->sexo = $sexo;    
    $this->dt_nasc = $dt_nasc;    
    $this->pelagem = $pelagem;    
    $this->cor = $cor;    
    $this->fktutor = $fktutor;
    $this->raca = $raca;    
    $this->especie = $especie;    
  }

  //Criação dos Métodos Getters dos atributos da classe PET.
  public function get_idPet()
  {
    return $this->id_pet;
  }

  public function get_nomePet()
  {
    return $this->nome_pet;
  }

  public function get_cpfTutor()
  {
    return $this->cpf_tutor;
  }
  
  public function get_sexo()
  {
    return $this->sexo;
  }
  
  public function get_dtNasc()
  {
    return $this->dt_nasc;
  }
  
  public function get_pelagem()
  {
    return $this->pelagem;
  }
  
  public function get_cor()
  {
    return $this->cor;
  }
  
  public function get_fktutor()
  {
    return $this->fktutor;
  }
  
  public function get_raca()
  {
    return $this->raca;
  }
  
  public function get_especie()
  {
    return $this->especie;
  }




}