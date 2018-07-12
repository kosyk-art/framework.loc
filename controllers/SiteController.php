<?php

namespace controllers;
use vendors\kosyk_art\base\Controller;

class SiteController extends Controller{
    public function actionHome(){
        echo $this->model->db();
        $this->view->render('home');        
    }
    
    public function actionContacts(){
        $this->view->render('contacts');        
    }
    
    public function actionAbout(){
        $this->view->render('about');        
    }
    
    public function actionDeliveryAndPayment(){
        $this->view->render('delivery-and-payment');        
    }
    
    public function actionSearch(){
        $this->view->render('search');
    }
    
    public function actionSchedule(){
        $this->view->render('schedule');
    }
    
    public function actionGallery(){
        $this->view->render('gallery');
    }
}
