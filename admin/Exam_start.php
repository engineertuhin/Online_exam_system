<?php
session_start();
include_once  "config/header.php";  
spl_autoload_register(function($name){

    include_once "lib/".$name.'.php';
    
    });
    
    
    $object=new admin;
    $active='active';
    $get=admin::startcheck($active);
    if(isset($_REQUEST['active'])){
        $mass="<p class='alert alert-danger'>You can only One time data insert<button class='close' data-dismiss='alert'>&times</button></p>";
    }




?><section id="content">
                    <section class="hbox stretch">
                        <section>
                            <section class="vbox">
                                <section class="scrollable padder">


                                    <section class="row m-b-md">

                                        <div class="col-sm-6">
                                            <h3 class="m-b-xs text-black">Dashboard</h3>  
                                        </div>

                                    </section>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <section class="panel b-a">

                                                <div class="panel-heading b-b">  
                                                    <a href="#" class="font-bold">Exam Time </a> 
                                                </div>

                                                <div class="panel-body"> 
                                                <div class="col-md-5" > 
                                                    <?php echo  $mass?>

<form action="lib/test.php" method="post">



<div class=' form-group' >
<label for="">exam name</label>
<input width='40%'; type="text" class=' form-control' name='examname' required>

</div>
<div class=' form-group' >
<label for="">exam Time set</label>
<input width='40%'; type="number" class=' form-control' name='exam_Time' required>

</div>
<div class=' form-group' >
<label for="">How Time continue Exam</label>
<input width='40%'; type="number" class=' form-control' name='timecon' required>

</div>
<div class=' form-group' >

<input type="submit" class=' btn btn-info form-control' name='examsubmit' value='Start Exam'>

</div>






</form>
<table class='table '>
    <thead>
<tr>
    <td>Exam name</td>
    <td>Exam Time</td>
    <td>Runing Time</td>
    <td>Action</td>
</tr>


    </thead> 
    <tbody>
<tr>
    <td><?php echo $get['Examname']?></td>
    <td><?php echo $get['examtime']?></td>
    <td> <div  id='ok'>


</div></td>
    <td><a href="lib/test.php?exmaid=<?php echo $get['id']?>" class='btn btn-danger'>Delete</a></td>
</tr>

    </tbody>




</table>







<?php include_once "config/footer.php" ;     ?>

<script src="js/app.v1.js"></script>
    <script src="js/app.plugin.js"></script>
    <script src="jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
<script>

$(document).ready(function(){

function c() {
$.ajax({

url:'timecount.php',
success : function(data){
  let sss=  $('#ok').html(data)
}

});
}
 setInterval(function(){
   c();

 
},1000);


});


</script>