<?php

namespace controllers;
use vendors\kosyk_art\base\Controller;

class UserController extends Controller{
    public function actionLogin(){
        $this->view->render('login');
    }
    
    public function actionLogout(){
        $this->view->render('logout');
    }
    
    public function actionRegistration(){
        $this->view->render('registration');
    }
    
    public function actionProfile(){
        $this->view->render('profile');
    }
    
    public function actionActivation(){
        $this->view->render('activation');
    }
    
    public function actionActivationSuccess(){
        $this->view->render('activation-success');
    }
}
