
<?php session_start() ;

spl_autoload_register(function($name){
  include_once 'admin/lib/'.$name.'.php';
  });
  new admin;
  $name= $_SESSION['name'];
  $roll= $_SESSION['roll'];
   $email= $_SESSION['email'];
  $date= date('Y-m-d');
  $dublicateprofile=admin::dublicateprofile($name,$email);
 $con= $dublicateprofile['date'];
 $convert=explode(' ',$con);
if($date==$convert['0']){
  header('location:resualtboard.php');
}

 $getallquestion= admin::getallquestion();



  $id=$_SESSION['id'];


?>


<!DOCTYPE HTML>
<html>
    <head>
      <title>Exam start</title>
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    
        <link rel="stylesheet" href="bootstrap.min.css">
      <link rel="stylesheet" href="css/redio.css">
      </head>
 
    <body class=" f"> 
       <div class='row text-white text-center'>
       <div class='container'>
       <div class='col-12 col-md-12 '>
       <div class='mt-4 ml-5 navbar  fixed-top' id='ok'></div>
       <h2 class=' mt-2'>Chooch the Currect Answer</h2>
       <h4>1 To 20 Question </h4>
       </div>
       
       </div>
       
    </div>
<div class=' container text-white'>

<form action="resualtboard.php?name=<?php echo $name?> && email=<?php echo $email?> && roll=<?php echo $roll?> && id=<?php echo $id?>" method='POST'>


  <?php $i=1; $j=1; foreach($getallquestion as $value) {
    $a=$j;$j++;?>
  <div class='a mt-3'> 
  <p><?php echo $i;$i++?>) <?php echo $value['question'];?></p>
  <input type="radio" id="a1" name="option<?php echo $a ?>" value="<?php echo $value['option1']?>">
  <label for="a1"><?php echo $value['option1']?></label><br>
  <input type="radio" id="female" name="option<?php echo  $a?>" value="<?php echo $value['option2']?>">
  <label for="female"><?php echo $value['option2']?></label><br>
  <?php if(($value['option3']=='?')==false){?>
  <input type="radio" id="other" name="option<?php echo $a?>" value="<?php echo $value['option3']?>">
  <label for="other"><?php echo $value['option3']?></label><br>
  <?php }?>
  <?php if(($value['option4']=='?')==false){?>
  <input type="radio" id="other4" name="option<?php echo $a?>" value="<?php echo $value['option4']?>">
  <label for="other4"><?php echo $value['option4']?></label><br>
  <?php }?>
  <?php if(($value['option5']=='?')==false){?>
  <input type="radio" id="other5" name="option<?php echo $a?>" value="<?php echo $value['option5']?>">
  <label for="other5"><?php echo $value['option5']?></label><br>
  <?php }?>
  <?php if(($value['option6']=='?')==false){?>
  <input type="radio" id="other6" name="option<?php echo $a?>" value="<?php echo $value['option6']?>">
  <label for="other6"><?php echo $value['option6']?></label><br>
  <?php }?>
  <?php if(($value['option7']=='?')==false){?>
  <input type="radio" id="other7" name="option<?php echo $a?>" value="<?php echo $value['option7']?>">
  <label for="other7"><?php echo $value['option7']?></label>
  <?php }?>
  
  </div>

  <?php  }?>
  <input  type="submit" name="submitexam" class='b btn btn-info' value="Submit">

  
  </form>
</div>


    <script src="admin/js/app.v1.js"></script>
    <script src="admin/js/app.plugin.js"></script>
    <script src="admin/jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
     

        <script>

$(document).ready(function(){

function c() {
$.ajax({

url:'condition.php',
success : function(data){
    $('#ok').html(data)
}

});
}
 setInterval(function(){
   c();

 
},1000);


});

        </script>
        
       
      
    </body>
</html>
