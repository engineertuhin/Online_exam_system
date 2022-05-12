<?php
session_start();

spl_autoload_register(function($classname){

include_once "admin/lib/".$classname.'.php';
});
new admin;
$name= $_SESSION['name'];
$roll= $_SESSION['roll'];
$email= $_SESSION['email'];
$id= $_SESSION['id'];
$gettime= admin::timeset();
$date= date('Y-m-d');
$dublicateprofile=admin::dublicateprofile($name,$email);
$con= $dublicateprofile['date'];
$convert=explode(' ',$con);
$convert['0'];
?>
<?php
if(($convert['0']==$date)){
?> 
<?php
}elseif(isset($gettime['examstart'])=='active') {?>
<a href="sessionset.php" class="btn btn-info btn1 "> Start</a>
<?php }?>
