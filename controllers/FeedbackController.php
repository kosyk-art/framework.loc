<?php

namespace controllers;
use vendors\kosyk_art\base\Controller;

class FeedbackController extends Controller{
    public function actionCallback(){
        echo 'callback';
    }
    
    public function actionRecording(){
        echo 'recording';
    }
    
    public function actionQuestion(){
        echo 'question';
    }
}
