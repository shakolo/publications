<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class NewsController {
    public function actionIndex () {
        echo 'NewsController-index()';
        return true;
    }
    public function actionView () {
        echo 'NewsController->view()';
        return true;
    }
}