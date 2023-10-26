<<<<<<< HEAD
<?php

namespace tests\Entity;

use tests\db\Database;
use PDO;

class   Servico
{
    /**
     * Identificador do serviço
     * @var integer
     */
    public $id;
    /**
     * nome do serviço
     * @var string
     */
    public $nomeservico;
    /**
     * duração do servico
     * @var string
     */
    public $duracao;
    /**
     * preço do servico
     * @var float
     */
    public $preco;
    /**
     * fluxo de agenda (select com as opções "Em andamento", "Pendente" e "Finalizado")
     * @var string
     */
    public $fluxoag;
    /**
     * periodização recomendada para realização do serviço
     * @var string
     */
    public $periodorec;
    /**
     * descrição do serviço
     * @var string
     */
    public $modatend;


    /**
     * AS DUAS FUNÇOES ABAIXO NAO ESTÃO CORRETAS
     */

   // private function formarObjeto($dados)
   // {
   //     return new Servico(
   //         $dados['nomeservico'],
   //         $dados['duracao'],
   //         $dados['preco'],
   //         $dados['fluxoag'],
   //         $dados['periodorec'],
   //         $dados['modatend']
   //     );
   // }



  // public function salvarServico(Servico $servico)
  // {
  //     $sql = "INSERT INTO servico (nomeservico, duracao, preco, fluxoag, periodorec, modatend) VALUES (?,?,?,?,?,?)";
  //     $statement = $this->pdo->prepare($sql);
  //     $statement->bindValue(1, $servico->nomeservico);
  //     $statement->bindValue(2, $servico->duracao);
  //     $statement->bindValue(3, $servico->preco);
  //     $statement->bindValue(4, $servico->fluxoag);
  //     $statement->bindValue(5, $servico->periodorec);
  //     $statement->bindValue(6, $servico->modatend);
  //     $statement->execute();
  // }






    /**
     * metodo responsavel por cadastrar novo serviço no banco
     * @return void
     */
    public function cadastrar(){
//INSERIR SERVIÇO NO BANCO
         $obDatabase = new Database('servico');
         $this->id = $obDatabase->insert([
                                'nomeservico'   => $this->nomeservico,
                                'duracao'       => $this->duracao,
                                'preco'         => $this->preco,
                                'fluxoag'       => $this->fluxoag,
                                'periodorec'    => $this->periodorec,
                                'modatend'      => $this->modatend

                            ]);
//RETORNAR SUCESSO
        return true;
    }



        /**
         * Método responsável por atualizar o servico no banco
         * @return boolean
         */
        public function atualizar(){
            return (new Database('servico'))->update('id = '.$this->id,[
                'nomeservico'   => $this->nomeservico,
                'duracao'       => $this->duracao,
                'preco'         => $this->preco,
                'fluxoag'       => $this->fluxoag,
                'periodorec'    => $this->periodorec,
                'modatend'      => $this->modatend
            ]);
        }





    /**
     * Método responsável por excluir o serviço do banco
     * @return boolean
     */
    public function excluir(){
        var_dump("Método excluir chamado para o serviço com ID: " . $this->id);

        $result = (new Database('servico'))->delete('id = '.$this->id);

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
    public static function getServico($where = null, $order = null, $limit = null){
        return (new Database('servico'))->select($where,$order,$limit)
                                             ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    /**
     * @param integer $id
     * @return servicos
     */
    public static function getServicos($id){
        return (new Database('servico'))->select('id ='.$id)
                                             ->fetchObject(self::class);
    }


}
?>
=======
<?php

namespace tests\Entity;

use tests\db\Database;
use PDO;

class Servico
{
    /**
     * Identificador do serviço
     * @var integer
     */
    public $id;
    /**
     * nome do serviço
     * @var string
     */
    public $nomeservico;
    /**
     * duração do servico
     * @var string
     */
    public $duracao;
    /**
     * preço do servico
     * @var float
     */
    public $preco;
    /**
     * fluxo de agenda (select com as opções "Em andamento", "Pendente" e "Finalizado")
     * @var string
     */
    public $fluxoag;
    /**
     * periodização recomendada para realização do serviço
     * @var string
     */
    public $periodorec;
    /**
     * descrição do serviço
     * @var string
     */
    public $modatend;


    /**
     * AS DUAS FUNÇOES ABAIXO NAO ESTÃO CORRETAS
     */

   // private function formarObjeto($dados)
   // {
   //     return new Servico(
   //         $dados['nomeservico'],
   //         $dados['duracao'],
   //         $dados['preco'],
   //         $dados['fluxoag'],
   //         $dados['periodorec'],
   //         $dados['modatend']
   //     );
   // }



  // public function salvarServico(Servico $servico)
  // {
  //     $sql = "INSERT INTO servico (nomeservico, duracao, preco, fluxoag, periodorec, modatend) VALUES (?,?,?,?,?,?)";
  //     $statement = $this->pdo->prepare($sql);
  //     $statement->bindValue(1, $servico->nomeservico);
  //     $statement->bindValue(2, $servico->duracao);
  //     $statement->bindValue(3, $servico->preco);
  //     $statement->bindValue(4, $servico->fluxoag);
  //     $statement->bindValue(5, $servico->periodorec);
  //     $statement->bindValue(6, $servico->modatend);
  //     $statement->execute();
  // }






    /**
     * metodo responsavel por cadastrar novo serviço no banco
     * @return void
     */
    public function cadastrar(){
//INSERIR SERVIÇO NO BANCO
         $obDatabase = new Database('servico');
         $this->id = $obDatabase->insert([
                                'nomeservico'   => $this->nomeservico,
                                'duracao'       => $this->duracao,
                                'preco'         => $this->preco,
                                'fluxoag'       => $this->fluxoag,
                                'periodorec'    => $this->periodorec,
                                'modatend'      => $this->modatend

                            ]);
//RETORNAR SUCESSO
        return true;
    }



        /**
         * Método responsável por atualizar o servico no banco
         * @return boolean
         */
        public function atualizar(){
            return (new Database('servico'))->update('id = '.$this->id,[
                'nomeservico'   => $this->nomeservico,
                'duracao'       => $this->duracao,
                'preco'         => $this->preco,
                'fluxoag'       => $this->fluxoag,
                'periodorec'    => $this->periodorec,
                'modatend'      => $this->modatend
            ]);
        }





    /**
     * Método responsável por excluir o serviço do banco
     * @return boolean
     */
    public function excluir(){
        return (new Database('servico'))->delete('id = '.$this->id);
    }

    /**
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function getServico($where = null, $order = null, $limit = null){
        return (new Database('servico'))->select($where,$order,$limit)
                                             ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    /**
     * @param integer $id
     * @return servicos
     */
    public static function getServicos($id){
        return (new Database('servico'))->select('id = '.$id)
                                             ->fetchObject(self::class);
    }


}
>>>>>>> origin/main
