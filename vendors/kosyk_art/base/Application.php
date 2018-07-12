<?php

namespace vendors\kosyk_art\base;

class Application {
    public $config;
    public $route;
    
    public function __construct() {
        $this->config = (new Config())->run();
    }
    
    public function run(){        
        $this->route = (new Router($this->config))->run();        
        if($this->route){
            $controllerName = '\controllers\\'.ucfirst($this->route['controller']).'Controller';
            $actionName = 'action'.ucfirst($this->route['action']);
            (new $controllerName($this->route, $this->config))->$actionName($this->config);
            exit();
        }
        $controllerName = '\controllers\ErrorController';
        $actionName = 'actionNotfounded';
        (new $controllerName(array('controller'=>'error', 'action'=>'notfounded'), $this->config))->$actionName($this->config);
    }
}
