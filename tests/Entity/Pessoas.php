<?php

namespace tests\Entity;

use tests\db\Database;
use PDO;

class Pessoas
{
    public $cpf;
    /**
     * cpf // chave primaria da tabela pessoa
     * @var integer
     */
    /**
     * nome da pessoa
     * @var integer
     */
    public $nome;
    /**
     * nome da pessoa
     * @var string
     */

    public $rg;
    /**
     * telefone
     * @var float
     */
    public $telefone;
    /**
     * @var string
     */
    public $email;
    /**
     * @var string
     */
    public $dtnasc;
    /**
     * @var string
     */
    public function cadastrar(){
//INSERIR PESSOA NO BANCO
        $PeDatabase = new Database('pessoas');
        $this->cpf = $PeDatabase->insert([
            'nome'      => $this->nome,
            'cpf'       => $this->cpf,
            'rg'        => $this->rg,
            'telefone'  => $this->telefone,
            'email'     => $this->email,
            'dtnasc'   => $this->dtnasc
        ]);
//RETORNAR SUCESSO
        return true;
    }



    /**
     * Método responsável por atualizar a pessoa cadastrada no banco
     * @return boolean
     */
    public function atualizar(){
        return (new Database('pessoas'))->update('cpf = '.$this->cpf,[
            'nome'      => $this->nome,
            'cpf'       => $this->cpf,
            'rg'        => $this->rg,
            'telefone'  => $this->telefone,
            'email'     => $this->email,
            'dtnasc'   => $this->dtnasc
        ]);
    }





    /**
     * Método responsável por excluir a pessoa cadastrada do banco
     * @return boolean
     */
    public function excluir(){
        var_dump("Método excluir chamado para a pessoa com cpf: " . $this->cpf);

        $result = (new Database('pessoas'))->delete('id = '.$this->cpf);

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
    public static function getPessoa($where = null, $order = null, $limit = null){
        return (new Database('pessoas'))->select($where,$order,$limit)
            ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    /**
     * @param string $cpf
     * @return Pessoas
     */
    public static function getPessoas($cpf){
        return (new Database('pessoas'))->select('cpf ='.$cpf)
            ->fetchObject(self::class);
    }


}
//quando for getServico é getPessoa
//quando for getServicos é getPessoas
?>

