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
    public $lang_files = array();
    
    public function __construct($route){
        $this->route = $route;
    }


    public function render($page, $data = []){
        extract($data);
        $this->lang_files[] = $this->layout;
        $this->lang_files[] = $page;
        foreach($this->lang_files as $file){
            if(file_exists(ROOT.'/lang/'.$file.'.php')){
                $lang_array = include_once ROOT.'/lang/'.$file.'.php';
                foreach ($lang_array as $key=>$value){
                    if(isset($value[LANG])){
                        extract($value[LANG], EXTR_PREFIX_ALL, $file.'_'.$key);
                    }
                }
            }
        }
        ob_start();        
        include_once ROOT.'/templates/'.$this->route['controller'].'/'.$page.'.php';        
        $content = ob_get_clean();
        if(file_exists(ROOT.'/templates/layouts/'.$this->layout.'.php')){
            include_once ROOT.'/templates/layouts/'.$this->layout.'.php';
        }
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
