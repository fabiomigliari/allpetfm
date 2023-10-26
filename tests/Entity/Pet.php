<?php

namespace tests\Entity;

use tests\db\Database;
use PDO;

class   Pet
{

    public $id;

    public $pet_nome;

    public $especie;

    public $raca;

    public $pelagem;

    public $sexo;

    public $dt_nasc;

    public $observacoes;



    /**
     * metodo responsavel por cadastrar novo pet no banco
     * @return void
     */
    public function cadastrar(){
//INSERIR PET NO BANCO
        $obDatabase = new Database('pet');
        $this->id = $obDatabase->insert([
            'id'             => $this->id,
            'pet_nome'       => $this->pet_nome,
            'especie '       => $this->especie,
            'raca '          => $this->raca,
            'pelagem'        => $this->pelagem,
            'sexo'           => $this->sexo,
            'dt_nasc'        => $this->dt_nasc,
            'observacoes'    => $this->observacoes

        ]);
//RETORNAR SUCESSO
        return true;
    }



    /**
     * Método responsável por atualizar o pet no banco
     * @return boolean
     */
    public function atualizar(){
        return (new Database('pet'))->update('id = '.$this->id,[
            'id'             => $this->id,
            'pet_nome'       => $this->pet_nome,
            'especie '       => $this->especie,
            'raca '          => $this->raca,
            'pelagem'        => $this->pelagem,
            'sexo'           => $this->sexo,
            'dt_nasc'        => $this->dt_nasc,
            'observacoes'    => $this->observacoes
        ]);
    }





    /**
     * Método responsável por excluir o pet do banco
     * @return boolean
     */
    public function excluir(){
        var_dump("Método excluir chamado para o pet com ID: " . $this->id);

        $result = (new Database('pet'))->delete('id = '.$this->id);

        if ($result) {
            var_dump("Exclusão bem-sucedida!");
        } else {
            var_dump("Erro ao excluir o pet.");
        }

        return $result;
    }

    /**
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function getPet($where = null, $order = null, $limit = null){
        return (new Database('pet'))->select($where,$order,$limit)
            ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    /**
     * @param integer $id
     * @return pets
     */
    public static function getPets($id){
        return (new Database('pet'))->select('id ='.$id)
            ->fetchObject(self::class);
    }


}
?>