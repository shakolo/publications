<?php
include_once ROOT . '/models/News.php';;
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
    public function actionView ($category, $id) {
        echo 'NewsController->view()';
        echo  $category ." " . $id;
        return true;
    }
}