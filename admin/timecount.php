<?php

session_start();

spl_autoload_register(function($name){

    include_once "lib/".$name.'.php';
    
    });
    
    
    $object=new admin;
    $active='active';
    $get=admin::startcheck($active);
    if($get['examstart']==$active){

$from_time=date('Y-m-d H:i:s');
$to_time=$_SESSION['end_times'];

$timefast=strtotime($from_time);
$timesecond=strtotime($to_time);
$defrernts=$timesecond-$timefast;
 

echo $v=gmdate('H:i:s',$defrernts);
if($v=='00:00:00'){
   admin::deletetimesection();
   
}

    }


?>

