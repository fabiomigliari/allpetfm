<?php

class Address{

    private $id_endereco;
    private string $cep;
    private string $logradouro;
    private $num_casa;
    private string $cidade;
    private string $estado;  
    private string $bairro;

    public function __construct($id_endereco, ?string $cep = null,  ?string $logradouro = null,  ?string $num_casa = null, ?string $cidade = null,  ?string $estado = null, ?string $bairro = null) {
        $this->id_endereco = $id_endereco;
        if($cep !== null){$this->cep = $cep;
        $this->logradouro = $logradouro;
        $this->num_casa = $num_casa;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->bairro = $bairro;
        }
    }
    

    public function getId()
    {
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
      
    
    public function setId($id_endereco)
    {
        $this->id_endereco = $id_endereco;
    }
    public function set_cep($cep){
        $this->cep = $cep;
     }
   
      public function set_logradouro($logradouro){
        $this->logradouro = $logradouro;
      }
  
      public function set_num_casa($num_casa){
        $this->num_casa = $num_casa;
     }
  
     public function set_cidade($cidade){
        $this->cidade = $cidade;
     }
  
     public function set_estado($estado){
        $this->estado = $estado;
     }
  
    public function set_bairro($bairro){
        $this->bairro = $bairro;
    }
      

}
