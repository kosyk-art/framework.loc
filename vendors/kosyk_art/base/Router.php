<?php

namespace vendors\kosyk_art\base;

class Router {
    private $routes;
    private $languages;
    private $uri;

    public function __construct($config) {
        $this->routes = $config['routes'];
        $this->languages = $config['languages'];
        $this->getURI()->detectLanguage();
    }
    
    private function getURI(){
        $this->uri = trim($_SERVER['REQUEST_URI'], '/');
        return $this;
    }

    private function detectLanguage(){
        $patterns = explode('/', $this->uri);
        $firstPattern = array_shift($patterns);
        foreach ($this->languages as $language=>$default){
            if($firstPattern == $language && !$default){
                define('LANG', $firstPattern);
                $this->uri = implode('/', $patterns);
            }elseif($firstPattern == $language && $default){
                header('Location: '.SITE.'/'.implode('/', $patterns));
            }
        }
        if(!defined('LANG')){
            define('LANG', array_search(1, $this->languages));
        }
        if($this->uri == 'home'){
            header('Location: '.SITE);
        }elseif($this->uri == '') {
            $this->uri = 'home';
        }
        return $this;
    }

    public function run() {
        $patterns = array();
        foreach($this->routes as $path=>$route){
            if(preg_match("~$path~", $this->uri)){
                $patterns = explode('/', preg_replace("~$path~", $route, $this->uri));
                break;
            }
        }        
        $route = 0;
        if(!empty($patterns)){            
            $route = array();
            $route['controller'] = array_shift($patterns);
            $action = str_replace('-', ' ', array_shift($patterns));
            $action = ucwords($action);
            $action = str_replace(' ', '', $action);
            $route['action'] = $action;            
            $route['params'] = $patterns;
        }
        return $route;
    }
}
