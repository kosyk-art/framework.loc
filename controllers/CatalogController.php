<?php

namespace controllers;
use vendors\kosyk_art\base\Controller;

class CatalogController extends Controller{
    public function actionCatalog(){
        $this->view->render('catalog');
    }
    
    public function actionCategory(){
        $this->view->render('category');
    }
    
    public function actionProduct(){
        $this->view->render('product');
    }
}
