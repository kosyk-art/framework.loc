<?php

namespace controllers;
use vendors\kosyk_art\base\Controller;

class TeamController extends Controller{
    public function actionTeam(){
        $this->view->render('team');
    }
    
    public function actionEmployee(){
        $this->view->render('employee');
    }
}
