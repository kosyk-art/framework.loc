<?php

namespace vendors\kosyk_art\base;

abstract class Controller {
    public $route;
    public $config;
    public $model;
    public $view;
    
    public function __construct($route, $config) {
        $this->config = $config;
        $this->route = $route;
        $modelName = '\models\\'.ucfirst($route['controller']);
        $this->model = new $modelName($config);
        $this->view = new View($route);
    }
}
