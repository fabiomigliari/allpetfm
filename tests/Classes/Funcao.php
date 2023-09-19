<?php 

//Criando a classe FUNCAO sendo uma classe assockativa com a Classe FUNCIONARIO.
Class Funcao{

   //Criando os atributos da classe FUNCAO.
    private ?int $id;
    private string $nome_funcao;
    private string $departamento;
    private string $descricao_funcao;
    private float $salario;

    //Criando os métodos Getters e Setters da classe FUNCAO.
    public function set_idFuncao(int $id)
  {
    $this->id = $id;
  }
  
  public function get_idFuncao()
  {
    return $this->id;
  }

    public function set_nomeFuncao(string $nome_funcao)
  {
    $this->nome_funcao = $nome_funcao;
  }
  
  public function get_nomeFuncao()
  {
    return $this->nome_funcao;
  }

    public function set_departamento(string $departamento)
  {
    $this->departamento = $departamento;
  }
  
  public function get_departamento()
  {
    return $this->departamento;
  }

    public function set_descFuncao(string $descricao_funcao)
  {
    $this->descricao_funcao = $descricao_funcao;
  }
  
  public function get_descFuncao()
  {
    return $this->descricao_funcao;
  }
  
    public function set_salario(float $salario)
  {
    $this->salario = $salario;
  }
  
  public function get_salario()
  {
    return $this->salario;
  }
}