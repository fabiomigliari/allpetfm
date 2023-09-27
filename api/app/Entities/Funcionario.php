<?php

/*Criando a Classe FUNCIONARIO que herda da Classe PESSOA sendo acrescentada alguns atributos, 
   sendo praticado aqui a herança da SuperClasse PESSOA.*/
class Funcionario extends Pessoa{

  //Criação dos ATRIBUTOS da Classe FUNCIONARIO.
  private ?int $id_funcionario;
  private  $horario_de_trabalho;
  private string $dia_de_folga;
  private string $perfil;
  private Funcao $funcao;

  //Criação dos MÉTODOS GETTERS da Classe FUNCIONARIO.
 
  public function set_id_funcionario(int $id_funcionario)
  {
    $this->id_funcionario = $id_funcionario;
  }
  
  public function get_id_funcionario()
  {
    return $this->id_funcionario;
  }
  
  public function set_horario_de_trabalho( $horario_de_trabalho)
  {
    $this->horario_de_trabalho = $horario_de_trabalho;
  }
  
  public function get_horario_de_trabalho()
  {
    return $this->horario_de_trabalho;
  }
  
  public function set_dia_de_folga(string $dia_de_folga)
  {
    $this->dia_de_folga = $dia_de_folga;
  }
  
  public function get_dia_de_folga()
  {
    return $this->dia_de_folga;
  }
  
  public function set_perfil(string $perfil)
  {
    $this->perfil = $perfil;
  }
  
  public function get_perfil()
  {
    return $this->perfil;
  }
  
  public function set_funcao(Funcao $funcao)
  {
    $this->funcao = $funcao;
  }
  
  public function get_funcao()
  {
    return $this->funcao;
  }
  
}