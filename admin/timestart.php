<?php

session_start();
spl_autoload_register(function($name){

    include_once "lib/".$name.'.php';
    
    });
    
    
    $object=new admin;
    $active='active';
    $get=admin::startcheck($active);

$duritionz=$get['continue'];
$_SESSION['duritions']=$duritionz;
 $_SESSION['start_times']=date('Y-M-d H:i:s');
  $end_times=$end_times=date('Y-m-d H:i:s',strtotime('+'.$_SESSION['duritions'].'minutes',strtotime($_SESSION['start_times'])));

  $_SESSION['end_times']=$end_times;
  header("location:Exam_start.php");


?>