<?php

session_start();
spl_autoload_register(function($name){

  include_once "admin/lib/".$name.'.php';
  
  });
  
  
  $object=new admin;

 $get=admin::settime();
$_SESSION['Examname']=$get['Examname'];

 $durition=$get['examtime'];
$_SESSION['durition']=$durition;
 $_SESSION['start_time']=date('Y-M-d H:i:s');
  $end_time=$end_time=date('Y-m-d H:i:s',strtotime('+'.$_SESSION['durition'].'minutes',strtotime($_SESSION['start_time'])));

  $_SESSION['end_time']=$end_time;
 header("location:Exam_paper.php");


?>