<?php
require_once 'classes.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$publications = array();

//$news1 = new NewsPublication;
//$article1 = new ArticlePublication;
//$photoreport1 = new PhotoReportPublication;


//$publications = array($news1,$article1, $photoreport1);

$con = mysqli_connect('localhost', 'root', '', 'phpstartdb');
$result = mysqli_query($con, "SELECT * FROM publication");

while($row = mysqli_fetch_array($result)){
    $publications[]= new $row['type']($row);
//    echo '<pre>';
//    print_r($row);
}

?>