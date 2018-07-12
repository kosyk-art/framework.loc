<?php

namespace models;
use vendors\kosyk_art\base\Model;

class Site extends Model{
    public function db(){        
        return $this->db->delete('titles');
    }
}
