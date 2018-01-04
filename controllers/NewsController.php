<?php
include_once ROOT . '/models/News.php';;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class NewsController {
    public function actionIndex () {
//        echo 'NewsController->index()';
        $newsList = array();
        $newsList = News::getNewsList();
//        echo 'News->actionIndex';
        require_once ROOT.'/views/news/index.php';
        return true;
    }
    public function actionView ($id) {
//        echo 'NewsController->view()';
        if($id) {
            $newsItem = News::getNewsItemById($id);
            require_once ROOT.'/views/news/view.php';      
        }
//        echo  $category ." " . $id;
        return true;
    }
}