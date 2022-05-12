<?php
session_start();

spl_autoload_register(function($classname){

	include_once "admin/lib/".$classname.'.php';
	
	});
    new admin;
    $countnumber=admin::getallcolumnmber();

$getallculom= $countnumber['COUNT(id)'];

if(isset($_REQUEST['submitexam'])){


   
    $ids= $_SESSION['id'];
    $name= $_SESSION['name'];
   
     $email= $_SESSION['email'];
     $examname=$_SESSION['Examname'];
     $dublicate=admin::dublicateuniqe($name,$email);
     
for ($i=1; $i <=$getallculom ; $i++) { 
    $a=$i;
    $get=$optin.$a=$_REQUEST['option'.$a];
    if(($dublicate['name']==$name or $dublicate['email']==$email)==false){
        admin::limittime($get,$name,$email);
    }
    
}
$allquestionget=admin::allquestionget($name,$email);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
<table class='table'>
<thead><tr>
<th>Exam Question</th>
<th>Write Answer</th>
<th>Your Answer</th>
<th>Point</th>
</tr></thead>
<tbody>
<?php foreach($allquestionget as $value) {?>
<tr>
<td><?php echo $value['question']?></td>

<td><?php echo $value['currect']?></td>
<td><?php 

if($value['currect']==$value['getall'] and !empty($value['getall'])){
   $currect= $value['getall'];
   $insert=$point=1;
    echo "<p style='color:green'>$currect</p>";
}else if(empty($value['getall'])){
    $point=0;
    echo "<p style='color:red'>Your Answer is rong</p>";
}else{
    $currect= $value['getall'];
    $point=0;
    echo "<p style='color:red'>$currect</p>";
}

?>
</td>
<td><?php echo $point
?></td>

</tr>

</tbody>
<?php
$get=admin::allquestionfound($name,$email);
$getcol= $get['get'];
$pointget=admin::pointget($name,$email);
for ($i=1; $i<=$getcol; $i++) { 
    if(($pointget['name']==$name or $pointget['email']==$email)==false){
        admin::pointcalculation( $insert,$name,$email);
      
      }
}
$sumvalue=admin::getallpoint($name,$email);
$finalmark=$sumvalue['sum(point)'];
 $date= date('Y-m-d');
 $dublicateprofile=admin::dublicateprofile($name,$email);
$con= $dublicateprofile['date'];
$convert=explode(' ',$con);
if(($convert['0']==$date)==false){
     admin::addresult($name,$email,$examname,$finalmark,$ids);
}else{
     admin::deletedatalimit($name,$email);
     admin::deletpoint($name,$email);
}





} ?>
</table>
    
</body>
</html>

<?php




}elseif(isset($_REQUEST['examclose'])){
    $ids= $_SESSION['id'];
    $name= $_SESSION['name'];
   
     $email= $_SESSION['email'];
     $examname=$_SESSION['Examname'];
     $point="0";
     
    admin::profilelestdata($name,$email,$ids,$examname,$point);

    echo "Your Time is over ,You can Attend exam text time .best of luck";
}elseif(isset($_REQUEST['emptyboard'])){
    $ids= $_SESSION['id'];
    $name= $_SESSION['name'];
   
     $email= $_SESSION['email'];
     $examname=$_SESSION['Examname'];
     $point="0";
     
    admin::profilelestdata($name,$email,$ids,$examname,$point);

    echo "Your Time is over ,You can Attend exam text time .best of luck";
}else{
    header('location:instruction.php');
}

?>