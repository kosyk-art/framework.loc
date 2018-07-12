<?php

namespace vendors\kosyk_art\base;
use PDO;

class Database {
    public $config;
    public $pdo;

        public function __construct($config) {
        $this->config = $config;        
    }
    
    public function connect(){
        $db = new PDO($this->config['database']['dsn'], $this->config['database']['user'], $this->config['database']['password']);
        $db->exec("set names utf8");
        $this->pdo = $db;
        return $this;
    }
    
    public function query($sql, $params){
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function create($table='', $data=[]){
        $fields = '';
        $values = '';
        $params = array();
        foreach ($data as $key => $value){
            $fields .= $key.', ';
            $values .= ':'.$key.', ';
            $params[':'.$key] = $value;
        }
        $fields = trim($fields, ', ');
        $values = trim($values, ', ');
        $sql = "INSERT INTO $table ($fields) VALUES ($values)";
        if($this->query($sql, $params)){
            return $this->pdo->lastInsertId();
        }else{
            return FALSE;
        }
    }

    public function read($sql, $params){        
        $res = $this->query($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
        if($res){
            return $res;
        }else{
            return [];
        }
    }
    
    public function update($sql, $params){
        $this->query($sql, $params);
    }
    
    public function delete($mainTable, $relativeTables = [], $condition = '', $limit = ''){
        $relativeTablesList = '';
        $joinRelative = '';
        $params = [];
        if(!empty($relativeTables)){
            foreach ($relativeTables as $key=>$table){
                $relativeTablesList .= ', '.$table;
                $joinRelative .= ' INNER JOIN '.$table.' ON '.$mainTable.'.'.$key.' = '.$table.'.id';
            }
        }
        $sql = "DELETE $mainTable$relativeTablesList FROM $mainTable $joinRelative $condition $limit";
        $this->query($sql, $params);
    }
}
