<?php
session_start();
if(!isset($_SESSION['name']) or !isset($_SESSION['email']) or !isset($_SESSION['roll'])){
    header('location:index.php');
}
spl_autoload_register(function($classname){

	include_once "admin/lib/".$classname.'.php';
	
	});
    new admin;
    $name= $_SESSION['name'];
    $roll= $_SESSION['roll'];
     $email= $_SESSION['email'];
     $id= $_SESSION['id'];
    $instaction=admin::getallinstaction();
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Exam</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
 <!--background -image-->
<body class=" a">
  <!--heading-tag -->
  <div class="container">
      <div class="text-center">
          <a href="profile.php?id=<?php echo $id?>" style="margin-top:30px" class="btn btn-sm btn-info">Profile</a>
      </div>
      <div class="row " >
          <div class="col-md-12 mt-3 ">
              <h1 class="text-white text-center size ">What do you know about computer scince</h1>
              <hr>
          </div>
         
          <div  class="col-md-12 mt-4 col-lg-10 col-sm-12 text-center siz ">
            <?php foreach($instaction as $value) {?>
              <h3 class="text-white  mt-4  size2"><?php echo $value['rules']?></h3>
            <?php }?>
          </div>
          <div id='load' class="col-md-12 mt-4  text-right ">
         
        </div>
      </div>
  </div>

     





    <script src="bootstrap-js/bootstrap.bundle.min"></script>
    <script src="bootstrap-js/bootstrap"></script>
    <script src="bootstrap-js/bootstrap.min"></script>
    <script src="bootstrap-js/bootstrap.bundle"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
<script>
(function($){

$(document).ready(function(){
  function autoload(){
$.ajax({
url :'conditionexam.php',
success : function(data){

$('#load').html(data);
}

});
} 
setInterval(function() {
  autoload();
},1000);
  


});



})(jQuery)




</script>