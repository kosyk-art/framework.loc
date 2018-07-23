<?php

namespace vendors\kosyk_art\base;

abstract class Model{
    public $db;
    public $config;
    
    public function __construct($config){
        $this->config = $config;
        $this->db = (new Database($config))->connect();
    }
}
