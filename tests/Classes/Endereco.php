<?php

/*Criando a Classe ENDERECO para se relacionar com a Classe PESSOA através de uma associação, 
   para incluirem dados de seus endereços.*/
class Endereco{

  //Criação dos ATRIBUTOS da Classe ENDERECO.
    private int $id_endereco;
    private string $cep;
    private string $logradouro;
    private string $num_casa;
    private string $cidade;
    private string $estado;  
    private string $bairro;
    
    

  //Criação dos MÉTODO CONSTRUTOR da Classe ENDERECO.
    public function __construct( string $cep,  string $logradouro,  string $num_casa, string $cidade,  string $estado, string $bairro)
    {
      $this->cep = $cep;
      $this->logradouro = $logradouro;
      $this->num_casa = $num_casa;
      $this->cidade = $cidade;
      $this->estado = $estado;
      $this->bairro = $bairro;
      
    }

    //Criação dos MÉTODOS GETTERS da Classe ENDERECO.
    public function get_id_endereco(){
      return $this->id_endereco;
   }
    
    public function get_cep(){
      return $this->cep;
   }
 
    public function get_logradouro(){
       return $this->logradouro;
    }

    public function get_num_casa(){
      return $this->num_casa;
   }

   public function get_cidade(){
      return $this->cidade;
   }

   public function get_estado(){
      return $this->estado;
   }

  public function get_bairro(){
     return $this->bairro;
  }
    
  //Criação do METODO...

}