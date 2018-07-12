<?php

namespace controllers;
use vendors\kosyk_art\base\Controller;

class ErrorController extends Controller{
    public function actionNotfounded(){
        header('HTTP/1.0 404 Not Found');
        $this->view->render('not-founded');
    }
}
