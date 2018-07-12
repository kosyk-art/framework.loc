<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace controllers;
use vendors\kosyk_art\base\Controller;

class ServicesController extends Controller{
    public function actionServices(){
        $this->view->render('services');
    }
    
    public function actionService(){
        $this->view->render('service');        
    }
}
