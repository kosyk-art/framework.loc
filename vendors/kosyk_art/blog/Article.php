<?php

namespace vendors\kosyk_art\blog;
use vendors\kosyk_art\base\Database;

class Article {
    public $id = NULL;
    public $title = '';
    public $description = '';
    public $text = '';
    public $keywords = '';
    public $video = '';
    public $date = '';
    public $priority = 0;
    public $translit = '';
    public $author = [];
    public $comments = [];
    public $images = [];
    private $db;
    private $config;
    
    public function __construct($db, $config) {
        $this->db = $db;
        $this->config = $config;
    }
    
    public function load($translit){
        $sql = "SELECT a.*, t.".LANG." AS title, d.".LANG." AS description, txt.".LANG." AS text"
                . " FROM articles AS a "
                . " INNER JOIN titles AS t ON t.id = a.title "
                . " INNER JOIN descriptions AS d ON d.id = a.description "
                . " INNER JOIN texts AS txt ON txt.id = a.text "                
                . " WHERE a.translit=:translit";
        $params = [
            'translit' => $translit
        ];
        
        $res = $this->db->read($sql, $params);
        if(!empty($res)){
            $this->id = $res[0]['id'];
            $this->title = $res[0]['title'];
            $this->description = $res[0]['description'];
            $this->text = $res[0]['text'];
            $this->keywords = $res[0]['keywords'];
            $this->video = $res[0]['video'];
            $this->date = $res[0]['date'];
            $this->priority = $res[0]['priority'];
            $this->translit = $res[0]['translit'];
        }
    }

    public function save(){
        
    }
    
    public function delete(){
        
    }
}
