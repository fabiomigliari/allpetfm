<?php 

//Criando a classe FUNCAO sendo uma classe assockativa com a Classe FUNCIONARIO.
Class Funcao{

   //Criando os atributos da classe FUNCAO.
    private ?int $id;
    private string $nome_funcao;
    private string $departamento;
    private string $descricao_funcao;
    private float $salario;

    //Construtor
    public function __construct(string $nome_funcao, string $departamento, string $descricao_funcao, float $salario,)
    {
      $this->nome_funcao = $nome_funcao;     
      $this->departamento = $departamento;     
      $this->descricao_funcao = $descricao_funcao;     
      $this->salario = $salario;     
    }
    //Criando os métodos Getters e Setters da classe FUNCAO.
  public function get_idFuncao()
  {
    return $this->id;
  }
  
  public function get_nomeFuncao()
  {
    return $this->nome_funcao;
  }
  
  public function get_departamento()
  {
    return $this->departamento;
  }
  
  public function get_descFuncao()
  {
    return $this->descricao_funcao;
  }
  
  public function get_salario()
  {
    return $this->salario;
  }
}