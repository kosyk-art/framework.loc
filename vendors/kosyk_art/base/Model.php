<?php

namespace vendors\kosyk_art\base;

abstract class Model{
    public $db;
    
    public function __construct($config){
        $this->db = (new Database($config))->connect();
    }
}
