<?php

namespace controllers;
use vendors\kosyk_art\base\Controller;

class BlogController  extends Controller{
    public function actionBlog(){
        $this->view->render('blog');
    }
    
    public function actionTopic(){
        $this->view->render('topic');
    }
    
    public function actionArticle(){
        $this->view->render('article');
    }
}
