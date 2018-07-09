<?php

namespace vendors\kosyk_art\base;

class View {
    public $title = 'No title';
    public $description = false;
    public $keywords = false;
    public $css = array();
    public $js = array();
    public $layout = 'main';
    public $content = false;
    public $route;
    
    public function __construct($route){
        $this->route = $route;
    }


    public function render($page){
        ob_start();
        include_once ROOT.'/templates/'.$this->route['controller'].'/'.$page.'.php';
        $content = ob_get_clean();
        include_once ROOT.'/templates/layouts/'.$this->layout.'.php';
    }
    
    public function begin(){
        echo 'begin';
    }
    
    public function insertCss(){
        if(isset($this->css['layout'])){
            foreach ($this->css['layout'] as $path){                
                echo '<link rel = "stylesheet" href="'.SITE.'/public/'.$path.'.css">';
            }
        }
        if(isset($this->css['template'])){
            foreach ($this->css['template'] as $path){
                echo '<link rel = "stylesheet" href="'.SITE.'/public/'.$path.'.css">';
            }
        }
    }
    
    public function insertJs(){
        if(isset($this->js['layout'])){
            foreach ($this->js['layout'] as $path){
                echo '<script src="'.SITE.'/public/'.$path.'.js"></script>';
            }
        }
        if(isset($this->js['template'])){
            foreach ($this->js['template'] as $path){
                echo '<script src="'.SITE.'/public/'.$path.'.js"></script>';
            }
        }
    }
}
