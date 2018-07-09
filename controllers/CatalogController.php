<?php

namespace controllers;
use vendors\kosyk_art\base\Controller;

class CatalogController extends Controller{
    public function actionCategory(){
        echo $this->route['params'][1];
    }
}
