<<<<<<< HEAD
<?php

namespace tests\Entity;
use tests\db\Database;
use PDO;
class Endereco
{
    /**
     * chave primaria da tabela endereço
     * @var int
     */
        public $id_endereco;
            /**
             * @var string
             */
        public $logradouro;

            /**
             * @var string
             */
        public $bairro;

            /**
             * @var string
             */
        public $cidade;

            /**
             * @var string
             */
        public $estado;

            /**
             * @var string
             */
        public $cep;

            /**
             * @var string
             */
        public $numero;

            /**
             * @var string
             */
        public $complemento;

            /**
             * @var string
             */
        public $ponto_ref;


    public function cadastrar(){
//INSERIR SERVIÇO NO BANCO
        $obDatabase = new Database('endereco');
        $this->id = $obDatabase->insert([
            'logradouro'         => $this->logradouro,
            'bairro'        => $this->bairro,
            'cidade'        => $this->cidade,
            'estado'        => $this->estado,
            'cep'           => $this->cep,
            'numero'        => $this->numero,
            'complemento'   => $this->complemento,
            'ponto_ref'      => $this->ponto_ref

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
            'logradouro'         => $this->logradouro,
            'bairro'        => $this->bairro,
            'cidade'        => $this->cidade,
            'estado'        => $this->estado,
            'cep'           => $this->cep,
            'numero'        => $this->numero,
            'complemento'   => $this->complemento,
            'ponto_ref'      => $this->ponto_ref
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

=======
<?php

namespace tests\Entity;
use tests\db\Database;
use PDO;
class Endereco
{
    /**
     * chave primaria da tabela endereço
     * @var int
     */
        public $id;
            /**
             * @var string
             */
        public $logra;

            /**
             * @var string
             */
        public $bairro;

            /**
             * @var string
             */
        public $cidade;

            /**
             * @var string
             */
        public $estado;

            /**
             * @var string
             */
        public $cep;

            /**
             * @var string
             */
        public $numero;

            /**
             * @var string
             */
        public $complemento;

            /**
             * @var string
             */
        public $pontoref;


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