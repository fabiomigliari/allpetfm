<?php

namespace tests\Entity;

use tests\db\Database;
use PDO;

class Tutor
{
    /**
     * @var integer
     * chave primaria da tabela
     */
    public $id;
    /**
     *  // status do pet (servico) sendo realizado//
     * @var integer
     */

    public $status;
    /**
     * cpf do dono
     * @var string
     */

    public $cpf_pessoa;
    /**
     * data de registro do tutor
     * @var float
     */
    public $dtregistro;
    /**
     * @var string
     */
    public function cadastrar(){
//INSERIR PESSOA NO BANCO
        $PeDatabase = new Database('tutor');
        $this->id = $PeDatabase->insert([
            'id'               => $this->id,
            'status'                 => $this->status,
            'cpf_pessoa'             => $this->cpf_pessoa,
            'dtregistro'             => $this->dtregistro
        ]);
//RETORNAR SUCESSO
        return true;
    }



    /**
     * Método responsável por atualizar a pessoa cadastrada no banco
     * @return boolean
     */
    public function atualizar(){
        return (new Database('tutor'))->update('id = '.$this->id,[
            'id'               => $this->id,
            'status'                 => $this->status,
            'cpf_pessoa'             => $this->cpf_pessoa,
            'dtregistro'             => $this->dtregistro
        ]);
    }





    /**
     * Método responsável por excluir a pessoa cadastrada do banco
     * @return boolean
     */
    public function excluir(){
        var_dump("Método excluir chamado para o tutor com id: " . $this->id);

        $result = (new Database('tutor'))->delete('id = '.$this->id);

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
    public static function getTutor($where = null, $order = null, $limit = null){
        return (new Database('tutor'))->select($where,$order,$limit)
            ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    /**
     * @param int $id
     * @return tutor
     */
    public static function getTutores($id){
        return (new Database('tutor'))->select('id ='.$id)
            ->fetchObject(self::class);
    }


}
//quando for getServico é getPessoa
//quando for getServicos é getPessoas
?>

