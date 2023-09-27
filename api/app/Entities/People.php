<?php
require_once('../autoload.php');

class People {
    protected ?string $nome;
    protected ?string $dt_nasc;
    protected ?string $rg;
    protected ?string $cpf;
    protected ?string $email;
    protected ?string $telefone;
    protected ?int $tipo;
    protected ?Address $endereco;


    public function __construct(string $cpf, string $nome, string $rg, string $telefone, string $email, Address $endereco, int $tipo, string $dt_nasc) {

        $this->nome = $nome;
        $this->dt_nasc = $dt_nasc;
        $this->rg = $rg;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->tipo = $tipo;
        $this->endereco = $endereco;
        
    }



    // GETTERS and SETTERS.
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