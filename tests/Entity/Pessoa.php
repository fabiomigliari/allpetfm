<?php

namespace tests\Entity;
use tests\db\Database;
use PDO;
class Pessoa

{
   ///**
   // * Identificador do serviço
   // * @var integer
   // */
   //public $id;


    /**
     * chave primaria da tabela pessoa
     * cpf da pessoa
     * @var string
     */
    public $cpf;

    /**
     * rg da pessoa
     * @var string
     */
    public $rg;


    /**
     * telefone
     * @var string
     */
    public $fone;


    /**
     * email da pessoa
     * @var string
     */
    public $email;


    /**
     * data de nascimento da pessoa => date("d/m/Y")
     * @var string
     */
    public $dtnasc;




    /**
     * @param função que valida se o cpf é valido (e nao se existe)
     * @return bool (se true = insere no banco)
     */
    function validaCPF($cpf) {

        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;

    }

    /**
     * cria instancia de objeto no bd
     * @return bool
     */
    public function cadastrar(){
//INSERIR SERVIÇO NO BANCO
        $obDatabase = new Database('pessoa');
        $this->cpf = $obDatabase->insert([
            'cpf'       => $this->cpf,
            'rg'        => $this->rg,
            'fone'      => $this->fone,
            'email'     => $this->email,
            'dtnasc'    => $this->dtnasc

        ]);
//RETORNAR SUCESSO
        return true;
    }

    /**
     * Método responsável por atualizar a pessoa no banco
     * @return boolean
     */
    public function atualizar(){
        return (new Database('pessoa'))->update('cpf = '.$this->cpf,[
            'cpf'       => $this->cpf,
            'rg'        => $this->rg,
            'fone'      => $this->fone,
            'email'     => $this->email,
            'dtnasc'    => $this->dtnasc
        ]);
    }


    /**
     * Método responsável por excluir pessoa do banco
     * @return boolean
     */
    public function excluir(){
        return (new Database('pessoa'))->delete('cpf = '.$this->cpf);
    }

    /**
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function getPessoa($where = null, $order = null, $limit = null){
        return (new Database('pessoa'))->select($where,$order,$limit)
            ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    /**
     * @param integer $id
     * @return pessoas
     */
    public static function getPessoas($cpf){
        return (new Database('pessoa'))->select('cpf = '.$cpf)
            ->fetchObject(self::class);
    }
}