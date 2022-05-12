
 <?php include_once('config/header.php');

spl_autoload_register(function($classname){

  include_once "lib/".$classname.'.php';
  
  });
  new admin;
  $get=admin::cullectstudentinfo();
 ?>



 <link rel="stylesheet" href="css/new.css">
                              <!-- MAIN CONTENT  -->
                <section id="content">
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
                                                    <a href="#" class="font-bold">All student Information</a> 
                                                </div>

                                                <div class="panel-body"> 



<div class="col-md-12">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/2762528b24.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/2762528b24.js" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<form  action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">

<input id="myInput" type="text" placeholder="Search.."   style="margin-top:20px; margin-left:83%"  >
<br><br>

<table  class="table table-hover " >
  <thead>
  <tr>
    <th>SI on</th>
    <th>Name</th>
    <th>Roll</th>
    <th>Regestation</th>
    <th>Department</th>
    <th>Email</th>
    <th>Section</th>
    <th>Semester</th>
    <th>Action</th>
  
  </tr>
  </thead>
  <tbody id="myTable">
    <?php $i=1; foreach($get as $value) {?>
  <tr>
   <td><?php echo $i;$i++?></td>
   <td><a href="profile.php?id=<?php echo $value['id']?>"><?php echo $value['name']?></td>
   <td><?php echo $value['roll']?></td>
   <td><?php echo $value['registation']?></td>
   <td><?php echo $value['department']?></td>
   <td><?php echo $value['email']?></td>
   <td><?php echo $value['section']?></td>
   <td><?php echo $value['semester']?> </a></td>
   <td><a href="lib/test.php?studentid=<?php echo $value['id']?>" class="btn btn-danger">Delete</a></td>


   
  
 </tr>
 

    <?php }?>


  
 

</div>



</form >




 <?php include_once('config/footer.php');

 
 
 ?>
