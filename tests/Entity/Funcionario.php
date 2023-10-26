<?php

namespace tests\Entity;

use tests\db\Database;
use PDO;

class Funcionario
{
    /**
     * @var integer
     * chave primaria da tabela
     */
    public $id;
    /**
     *  // chave estrangeira referenciando a tabela pessoas//
     * @var integer
     */

    public $cpf;
    /**
     * horario de trabalho
     * @var string
     */

    public $hora_de_trab;
    /**
     * perfil/tipo de funcionario
     * @var float
     */
    public $perfil;

    /**
     * dia de folga do funcionario
     * @var float
     */
    public $dia_folga;

    /**
     * funcao//foreign key
     * @var float
     */
    public $nome_funcao;


    /**
     * @var string
     */
    public function cadastrar(){
//INSERIR PESSOA NO BANCO
        $PeDatabase = new Database('funcionarios');
        $this->id = $PeDatabase->insert([
            'id'                => $this->id,
            'cpf'               => $this->cpf,
            'hora_de_trab'      => $this->hora_de_trab,
            'diadefolga'         => $this->dia_folga,
            'perfil'            => $this->perfil,
            'fkfuncao'       => $this->fkfuncao
        ]);
//RETORNAR SUCESSO
        return true;
    }



    /**
     * Método responsável por atualizar a pessoa cadastrada no banco
     * @return boolean
     */
    public function atualizar(){
        return (new Database('funcionarios'))->update('id = '.$this->id,[
           'id'                => $this->id,
           'cpf'               => $this->cpf,
           'hora_de_trab'      => $this->hora_de_trab,
           'diadefolga'         => $this->dia_folga,
           'perfil'            => $this->perfil,
           'fkfuncao'       => $this->fkfuncao
        ]);
    }





    /**
     * Método responsável por excluir a pessoa cadastrada do banco
     * @return boolean
     */
    public function excluir(){
        var_dump("Método excluir chamado para a pessoa com cpf: " . $this->id);

        $result = (new Database('funcionarios'))->delete('id = '.$this->id);

        if ($result) {
            var_dump("Exclusão bem-sucedida!");
        } else {
            var_dump("Erro ao excluir o serviço.");
        }

        return $result;
    }

    /**
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function getFuncionario($where = null, $order = null, $limit = null){
        return (new Database('funcionarios'))->select($where,$order,$limit)
            ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    /**
     * @param string $id
     * @return Funcao
     */
    public static function getFuncionarios($id){
        return (new Database('funcionarios'))->select('id ='.$id)
            ->fetchObject(self::class);
    }


}
//quando for getServico é getPessoa
//quando for getServicos é getPessoas
?>

