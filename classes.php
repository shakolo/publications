<?php

abstract class Publication {
    public $id;
    public $title;
    public $date;
    public $short_content;
    public $content;
    public $preview;
    public $author_name;
    public $type;
    
    abstract public function printItem();
            
    function __construct($row) {
        $this->id = $row['id'];
        $this->title = $row['title'];
        $this->date = $row['date'];
        $this->short_content = $row['short_content'];
        $this->content = $row['content'];
        $this->preview = $row['preview'];
        $this->author_name = $row['author_name'];
        $this->type = $row['type'];
    }
    
}

class AudioPublication extends Publication {
    
}

class NewsPublication extends Publication {
    public function printItem(){
        echo 'это новость<br>';
        echo $this->title;
        echo '<br>';
        echo $this->date;
    }
}

class ArticlePublication extends Publication {
    public function printItem(){
        echo 'это статья<br>';
        echo $this->title;
        echo '<br>';
        echo $this->content;
        
    }
}

class PhotoReportPublication extends Publication {
    public function printItem(){
        echo 'это фотоотчет<br>';
        echo $this->title;
        echo '<br><img src=' . $this->preview . ' >';
    }
}

