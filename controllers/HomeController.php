<?php

namespace controllers;
use vendors\kosyk_art\base\Controller;

class HomeController extends Controller{
    public function actionIndex(){
        $this->view->render('index');        
    }
}
