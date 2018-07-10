<?php

namespace controllers;
use vendors\kosyk_art\base\Controller;

class HomeController extends Controller{
    public function actionIndex(){
        $data = [
            'title' => 'Название',
        ];
        $this->view->render('index', $data);        
    }
}
