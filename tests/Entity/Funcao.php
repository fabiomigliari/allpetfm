<<<<<<< HEAD
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
    public $id_funcao;

    /**
     * @var
     */
    public $nome_funcao;

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
    public $hora_de_trab;

    /**
     * @var
     */
    public $dia_folga;

    public function cadastrar(){
//INSERIR SERVIÇO NO BANCO
        $obDatabase = new Database('funcao');
        $this->id_funcao = $obDatabase->insert([
            'id_funcao'      => $this->id_funcao,
            'nome_funcao'    => $this->nome_funcao,
            'salario'        => $this->salario,
            'perfil'         => $this->perfil,
            'hora_de_trab'   => $this->hora_de_trab,
            'dia_folga'      => $this->dia_folga
        ]);
//RETORNAR SUCESSO
        return true;
    }



    /**
     * Método responsável por atualizar o servico no banco
     * @return boolean
     */
    public function atualizar(){
        return (new Database('endereco'))->update('id_funcao = '.$this->id_funcao,[
            'id_funcao'      => $this->id_funcao,
            'nome_funcao'    => $this->nome_funcao,
            'salario'        => $this->salario,
            'perfil'         => $this->perfil,
            'hora_de_trab'   => $this->hora_de_trab,
            'dia_folga'      => $this->dia_folga


        ]);
    }





    /**
     * Método responsável por excluir o serviço do banco
     * @return boolean
     */
    public function excluir(){
        return (new Database('endereco'))->delete('id = '.$this->id_funcao);
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
    public static function getEnderecos($id_funcao){
        return (new Database('endereco'))->select('id_funcao = '.$id_funcao)
            ->fetchObject(self::class);
    }

=======
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

>>>>>>> origin/main
}