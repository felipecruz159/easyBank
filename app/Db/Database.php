<?php

namespace App\Db;

use \PDO;
use \PDOException;

class Database{

    /**
     * HOST database
     * @var string
     */
    const HOST = "localhost";

    /**
     * NAME database
     * @var string
     */
    const NAME = "easyBank";

    /**
     * USERNAME database
     * @var string
     */
    const USER = "root";

    /**
     * PASSWORD database
     * @var string
     */
    const PASS = "";

    /**
     * Nome da tabela
     * @var string
     */
    private $table;

    /**
     * Instancia de conexão
     * @var PDO
     */
    private $connection;

    public function __construct($table = null){
        $this->table = $table;
        $this->setConnection();
    }

    /**
     * Criar conexao com o banco de dados
     */
    private function setConnection(){
        try {
            $this->connection = new PDO("mysql:host=".self::HOST.";dbname=".self::NAME,self::USER,self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }

    /**
     * Executar queries dentro do banco de dados
     * @param string
     * @param array
     * @return PDOStatement
     */
    public function execute($query, $params = []){
        try{
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }

    /**
     * Inserir dados no BD
     * @param array $values [ field => value ]
     * @return integer id inserido
     */
    public function insert($values){
        //DADOS
        $fields = array_keys($values);
        $binds  = array_pad([],count($fields), '?');

        //MONTA QUERY
        $query = "INSERT INTO ".$this->table." (".implode(',',$fields).") VALUES (".implode(",", $binds).")";
        
        //EXECUTA INSERT
        $this->execute($query, array_values($values));

        //RETORNA ID
        return $this->connection->lastInsertId();
    }

    /**
     * Realizar consulta no banco
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return PDOStatement
     */
    public function select($where = null, $order = null, $limit = null, $fields = "*"){
        //DADOS DA QUERY
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';

        $query = "SELECT ".$fields." FROM ".$this->table." ".$where." ".$order." ".$limit;

        //EXECUTA QUERY
        return $this->execute($query);
    }

    /**
     * Método responsável por executar atualizações no banco de dados
     * @param string $where
     * @param array $values [ field => value ]
     * @return boolean
     */
    public function update($where, $values){
        //DADOS DA QUERY
        $fields = array_keys($values);

        //MONTA QUERY
        $query = 'UPDATE '.$this->table.' SET '.implode('=?,', $fields).'=? WHERE '.$where;

        //EXECUTAR QUERY
        $this->execute($query, array_values($values));

        return true;
    }

    /**
     * Excluir dados do banco de dados
     * @param string $where
     * @return boolean
     */
    public function delete($where){
        //MONTA QUERY
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

        //EXECUTA QUERY
        $this->execute($query);

        return true;
    }
}