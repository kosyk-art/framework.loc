<?php

namespace vendors\kosyk_art\base;

class Config {
    public function run(){
        return array(
            'routes' => include_once ROOT.'/config/routes.php',
            'languages' => include_once ROOT.'/config/languages.php',
            'database' => include_once ROOT.'/config/database.php',
        );
    }
}
