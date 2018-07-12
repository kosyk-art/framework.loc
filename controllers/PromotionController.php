<?php

namespace controllers;
use vendors\kosyk_art\base\Controller;

class PromotionController extends Controller{
    public function actionPromotions(){
        $this->view->render('promotions');
    }
    
    public function actionPromotion(){
        $this->view->render('promotion');
    }
}
