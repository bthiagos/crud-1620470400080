<?php

namespace App\Db;

use \PDO;
use PDOException;

class Database{

    const HOST = 'localhost';
    const NAME = '1620470400080';
    const USER = 'root';
    const PASS = '';

    private $table;
    private $connection;


    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection(){
        try{
            $this->connection=new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }

    public function execute($query,$params = []){
        try{
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }

    public function insert($values){
        
        #dados da query
        $fields = array_keys($values);
        $binds = array_pad([],count($fields),'?');
        
        #monta a query
        $query = 'INSERT INTO '.$this->table.'('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';

        #executa o insert
        $this->execute($query,array_values($values));

        #retorna o id inserido
        return $this->connection->lastInsertId();
    }

    public function select($where=null, $order=null, $limit=null, $fields = '*'){
        
        $where=strlen($where) ? 'WHERE '.$where : '';
        $order=strlen($order) ? 'ORDER BY '.$order : '';
        $limit=strlen($limit) ? 'LIMIT '.$limit: '';
        
        $query='SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

        return $this->execute($query);
    }

    public function update($where, $values){
        $fields = array_keys($values);
        

        $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;

        $this->execute($query, array_values($values));

        return true;
    }

    public function delete($where){
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

        $this->execute($query);

        return true;
    }

}