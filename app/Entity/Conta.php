<?php

namespace App\Entity;

use App\Db\Database;
use \PDO;

class Conta
{

    /**
     * Identificador
     * @var integer
     */
    public $id;

    /**
     * Nome da conta
     * @var string
     */
    public $nome;

    /**
     * Valor inicial da conta
     * @var float
     */
    public $saldo;

    /**
     * Tipo do cartão
     * @var string(Padrão/Premium)
     */
    public $cartao;

    /**
     * Data da criação da conta
     * @var string
     */
    public $data;

    /**
     * Cadastrar vaga
     * @return boolean
     */
    public function cadastrar()
    {
        //DEFINIR DATA
        $this->data = date("Y:m:d, H:i:s");

        //INSERIR NO BANCO
        $obDatabase = new Database("contas");
        $this->id = $obDatabase->insert([
                                        'nome'   => $this->nome,
                                        'saldo'  => $this->saldo,
                                        'cartao' => $this->cartao,
                                        'data'   => $this->data
                                        ]);
        
        //RETURN OK

        return true;  
    }

    /**
     * Método responsável por atualizar a vaga no banco
     * @return boolean
     */
    public function atualizar(){
        return (new Database('contas'))->update('id = '.$this->id,[
                                                                    'nome'   => $this->nome,
                                                                    'saldo'  => $this->saldo,
                                                                    'cartao' => $this->cartao,
                                                                    'data'   => $this->data
                                                                  ]);
    }

    /**
     * Método responsável por excluir a vaga no banco
     * @return boolean
     */
    public function excluir(){
        return (new Database('contas'))->delete('id = '.$this->id);
    }

    public function sacar($valor){

        $this->saldo -= $valor;
        return (new Database('contas'))->update('id = '.$this->id,[
                                                                    'saldo' => $this->saldo
                                                                  ]);
    }

    public function depositar($valor){

        $this->saldo += $valor;
        return (new Database('contas'))->update('id = '.$this->id,[
                                                                    'saldo' => $this->saldo
                                                                  ]);
    }

    /**
     * Obter as contas do banco de dados
     * @param string where
     * @param string order
     * @param string limit
     * @return array 
     */
    public static function getContas($where = null, $order = null, $limit = null){
        return (new Database('contas'))->select($where, $order, $limit)
                                       ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    /**
     * Buscar uma vaga com base no id
     * @param integer $id
     * @return Conta
     */
    public static function getConta($id){
        return (new Database('contas'))->select('id = '.$id)
                                       ->fetchObject(self::class);
    }

}
