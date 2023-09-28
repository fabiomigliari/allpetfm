<?php

namespace tests\Entity;
use tests\db\Database;
use PDO;
class Funcao
{
    /**
     * id da funcao do funcionario [1 <= ID <= 4]
     * @var int
     */
    public $id;

    /**
     * @var
     */
    public $funcao;

    /**
     * @var
     */
    public $salario;

    /**
     *
     * @var
     */
    public $perfil;

    /**
     * @var
     */
    public $htrab;

    /**
     * @var
     */
    public $ddf;

    public function cadastrar(){
//INSERIR SERVIÇO NO BANCO
        $obDatabase = new Database('endereco');
        $this->id = $obDatabase->insert([
            'logra'         => $this->logra,
            'bairro'        => $this->bairro,
            'cidade'        => $this->cidade,
            'estado'        => $this->estado,
            'cep'           => $this->cep,
            'numero'        => $this->numero,
            'complemento'   => $this->complemento,
            'pontoref'      => $this->pontoref

        ]);
//RETORNAR SUCESSO
        return true;
    }



    /**
     * Método responsável por atualizar o servico no banco
     * @return boolean
     */
    public function atualizar(){
        return (new Database('endereco'))->update('id = '.$this->id,[
            'logra'         => $this->logra,,
            'bairro'        => $this->bairro,
            'cidade'        => $this->cidade,
            'estado'        => $this->estado,
            'cep'           => $this->cep,
            'numero'        => $this->numero,
            'complemento'   => $this->complemento,
            'pontoref'      => $this->pontoref
        ]);
    }





    /**
     * Método responsável por excluir o serviço do banco
     * @return boolean
     */
    public function excluir(){
        return (new Database('endereco'))->delete('id = '.$this->id);
    }

    /**
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function getEndereco($where = null, $order = null, $limit = null){
        return (new Database('endereco'))->select($where,$order,$limit)
            ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    /**
     * @param integer $id
     * @return integer recuperar registro de um objeto de endereco
     */
    public static function getEnderecos($id){
        return (new Database('endereco'))->select('id = '.$id)
            ->fetchObject(self::class);
    }

}