<?php

namespace models;
use vendors\kosyk_art\base\Model;
use vendors\kosyk_art\blog\Article;

class Blog extends Model{
    public function getArticle($translit){
        $article = new Article($this->db, $this->config);
        $article->loadFromDb($translit);
    }
}
