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
        echo '<pre>';
        print_r($newsList);
        echo '</pre>';
        
        return true;
    }
    public function actionView ($id) {
//        echo 'NewsController->view()';
        if($id) {
            $newsItem = News::getNewsItemById($id);
            echo '<pre>';
            print_r($newsItem);
            echo '</pre>';
        }
//        echo  $category ." " . $id;
        return true;
    }
}