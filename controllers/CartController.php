<?php

namespace controllers;
use vendors\kosyk_art\base\Controller;

class CartController  extends Controller{
    public function actionCart(){
        $this->view->render('cart');
    }
    
    public function actionCheckout(){
        $this->view->render('checkout');
    }
    
    public function actionCongratulations(){
        $this->view->render('congratulations');
    }
}
