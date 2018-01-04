<?php

class News {
    public static function getNewsItemById($id) {
        
        $id = intval($id);
        
        if($id) {
            $host = 'localhost';
            $dbname = 'phpstartdb';
            $user = 'root';
            $password = '';
            $charset = 'utf8';
            $db = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $password);

            $result = $db->query('SELECT * '
                    . 'FROM publication '
                    . 'WHERE id='
                    . $id
                    );
//            $result->setFetchMode(PDO::FETCH_NUM);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $newsItem = $result->fetch();
            return $newsItem;
        }
    }
    
    public static function getNewsList(){
        $host = 'localhost';
        $dbname = 'phpstartdb';
        $user = 'root';
        $password = '';
        $charset = 'utf8';
        $db = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $password);
        
        $newsList = array();
        
        $result = $db->query('SELECT id, title, date, short_content '
                . 'FROM publication '
                . 'ORDER BY date DESC '
                . 'LIMIT 10'
                );
        $i = 0;        
        while($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $i++;
        }
        
        return $newsList;
    }
}
