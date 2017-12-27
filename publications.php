<?php
require_once 'data.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//
foreach ($publications as $item){
    echo '<pre>';
    print_r($item->printItem());
    echo '</pre>';
}

?>