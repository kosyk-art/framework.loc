<?php

function __autoload($class_name){       
    $path = ROOT.'/'.str_replace('\\', '/', $class_name).".php";
    if(is_file($path)){
        include_once $path;
    }
}