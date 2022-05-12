<?php

session_start();
spl_autoload_register(function($name){
    include_once 'admin/lib/'.$name.'.php';
    });
    new admin;
    
    $active='active';
    $get=admin::startcheck($active);
    if($get['examstart']==$active){
$from_time=date('Y-m-d H:i:s');
$to_time=$_SESSION['end_time'];

$timefast=strtotime($from_time);
$timesecond=strtotime($to_time);
$defrernt=$timesecond-$timefast;

echo $v=gmdate('H:i:s',$defrernt);
if($v=='00:00:00'){
    ?>
    <script>
    window.location='resualtboard.php?examclose';
    
    </script>
  
    <?php
}
    }
    elseif(empty($get['examstart'])){

        ?>
        <script>
        window.location='resualtboard.php?emptyboard';
        
        </script>
        <?php
        
    }
   

?>

