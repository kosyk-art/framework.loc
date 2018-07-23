<?php

namespace vendors\kosyk_art\blog;
use vendors\kosyk_art\base\Database;

class ArticleComment {
    public $id;
    public $name;
    public $text;
    public $author;
    public $date;
    public $mark;
    private $db;
    private $config;
    
    public function __construct($db, $config) {
        $this->db = $db;
        $this->config = $config;
    }
    
    public function loadFromDb($id){
    }
}
