<?php
spl_autoload_register(function($classname){

include_once "admin/lib/".$classname.'.php';

});
new admin;

if(isset($_REQUEST['submit'])){

  $name=$_REQUEST['name'];

  $roll=$_REQUEST['roll'];

  $registation=$_REQUEST['registation'];

  $number=$_REQUEST['number'];

  $email=$_REQUEST['email'];

  $section=$_REQUEST['section'];
   $department=$_REQUEST['Department'];
     $semester=$_REQUEST['semester'];
     if(empty($name) or empty($roll) or empty($registation) or empty($number) or empty($email) or empty($section) or empty($department) or empty($semester) ){

      $mass="<p class='alert alert-danger'>From must not be empty<button class='close' data-dismiss='alert'>&times</button></p>";
     }else{
       $get=admin::addstudentinfo($name,$roll,$registation,$number,$email,$department,$section,$semester);
       if($get==true){
        $mass="<p class='alert alert-success'>Your registation Successfull<button class='close' data-dismiss='alert'>&times;</button></p>";


       }else{
        $mass="<p class='alert alert-danger'>Your registation is not Successfull<button class='close' data-dismiss='alert'>&times;</button></p>";
       }
     }
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Infomation</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="css/info.css">
  <link rel="stylesheet" href="TimeCircles.css">
  <script src="TimeCircles.js"></script>
</head>
<!--background -image-->
<body class="img-fluid">

    <div class="container " >
    <?php echo $mass ?>
        <div class="row">
            <div class="col-sm-12 col-md-12 mt-5">
                <h1 class="text-center text-white">Fill up your Registation From</h1>
            </div>
                          <!--student-from-->
                <form class="needs-validation text-white " action="<?php echo $_SERVER['PHP_SELF']?>" method='POST' >
                    <div class="form-row ">
                      <div class="col-lg-2" ></div><!--for responsive-->
                      <div class="col-sm-12 mt-2 col-lg-9 ">
                        <label for="validationCustom01">Name</label>
                        <input type="text" name='name' class="form-control " id="validationCustom01" placeholder="Enter your name" value=""
                          required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Enter your name
                          </div>
                      </div>
                      <div class="col-lg-2" ></div><!--for responsive-->
                      <div class="col-sm-12 -3 mt-2 col-lg-9">
                        <label for="validationCustom02">Roll</label>
                        <input type="number" name='roll' class="form-control" id="validationCustom02" placeholder="Enter your roll number" value=""
                          required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Enter your roll no
                          </div>
                      </div>
                      <div class="col-lg-2" ></div><!--for responsive-->
                      <div class="col-sm-12 mb-3 mt-2 col-lg-9">
                        <label for="validationCustomUsername">registation No:</label>
                       
                          <input type="number" name='registation' class="form-control" id="validationCustomUsername" placeholder="Enter your registation"
                            aria-describedby="inputGroupPrepend" required>
                          <div class="invalid-feedback">
                            Enter your registation no
                          </div>
                          <div class="valid-feedback">
                        now you can go next level
                          </div>
                        </div>
                        <div class="col-lg-2" ></div><!--for responsive-->
                        <div class="col-sm-12 mb-3 mt-1 col-lg-9">
                          <label for="validationCustomUsername">Mobile Number:</label>
                         
                            <input type="number" name="number" class="form-control" id="validationCustomUsername" placeholder="Enter your number"
                              aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                              Enter your number
                            </div>
                            <div class="valid-feedback">
                             need your personal phone number
                            </div>
                          </div>
                          <div class="col-lg-2" ></div><!--for responsive-->
                          <div class="col-sm-12 mb-3  col-lg-9">
                            <label for="validationCustomUsername">Email</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                              </div>
                              <input name='email' type="Email" class="form-control" id="validationCustomUsername" placeholder="Enter your Email address"
                                aria-describedby="inputGroupPrepend" required>
                              <div class="invalid-feedback">
                              Ender your email address
                              </div>
                              <div class="valid-feedback">
                                need your personal Email address
                               </div>
                            </div>
                          </div>
                        
                          <div class="col-lg-2"></div><!--for responsive-->
                          <div class=" mb-3 col-sm-3  md-form">
                            <label for="validationCustomUsername">Department</label>
                            <select name="Department"  class="mdb-select" required>
                            <option  value="" value="">---</option>
                              <option  value="Computer">Computer</option>
                              <option  value="Civil">Civil</option>
                              <option  value="Elcetrical">Elcetrical</option>
                              <option value="Garments">Garments</option>
                              <option  value="TeleCommonication">Tele Commonication</option>
                            </select>
                            <div class="invalid-feedback">Please select a Department.</div>
                          </div>
                         <!--for responsive-->
                          <div class="  mb-3 col-sm-3   md-form" style="margin-left: 60px;">
                            <label for="validationCustomUsername">Section</label>
                            <select name='section'  class="mdb-select" required>
                             <option   value="">---</option>
                              <option  value="A">A</option>
                              <option  value="B">B</option>
                              <option  value="C">C</option>
                              <option  value="D">D</option>
                            </select>
                            <div class="invalid-feedback">Please select a Section.</div>
                          </div>
                          <div class="mb-3   md-form">
                                      
                            <label for="validationCustomUsername">Semester</label>
                                <select name='semester' class="mdb-select" required>
                                <option  value=''>---</option>
                                    <option  value="1st Semester">1st Semester</option>
                                  <option  value="2nd Semester">2nd Semester</option>
                                  <option  value="3rd Semester">3rd Semester</option>
                                  <option   value="4th Semester">4th Semester</option>
                                  <option  value="5th Semester">5th Semester</option>
                                  <option  value="6th Semester">6th Semester</option>
                                  <option  value="7th Semester">7th Semester</option>
                                </select>
                                <div class="invalid-feedback">Please select a Semester.</div>
                              </div>
                        <div class="col-lg-2" ></div><!--for responsive-->
                        <div class="col-sm-10 col-lg-6">
                        <button name='submit' class="btn btn-primary btn-sm text-center mt-2 a" type="submit">Submit </button> ||
                        <a href="index.php" class="btn btn-danger btn-sm text-center  a" >Back</a>
                        
                        </div>
                        <div class="col-lg-2" >
                          
                        </div><!--for responsive-->
                        <div class="col-sm-3 col-lg-1">
                          
                        
                      
                        </div>
                      </div>
                      
                    </div>
                    
                     
                    </div>
                    
                  </form>
                 
                 
            </div>
        </div>
    </div>
    

<script>
    (function() {
    'use strict';
    window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
    form.addEventListener('submit', function(event) {
    if (form.checkValidity() === false) {
    event.preventDefault();
    event.stopPropagation();
    }
    form.classList.add('was-validated');
    }, false);
    });
    }, false);
    })();
</script>






    <script src="bootstrap-js/bootstrap.bundle.min"></script>
    <script src="bootstrap-js/bootstrap"></script>
    <script src="bootstrap-js/bootstrap.min"></script>
    <script src="bootstrap-js/bootstrap.bundle"></script>
    <script src="js/app.v1.js"></script>
    <script src="js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
    <script src="js/charts/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/charts/flot/jquery.flot.min.js"></script>
    <script src="js/charts/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/charts/flot/jquery.flot.spline.js"></script>
    <script src="js/charts/flot/jquery.flot.pie.min.js"></script>
    <script src="js/charts/flot/jquery.flot.resize.js"></script>
    <script src="js/charts/flot/jquery.flot.grow.js"></script>
    <script src="js/charts/flot/demo.js"></script>
    <script src="js/calendar/bootstrap_calendar.js"></script>
    <script src="js/calendar/demo.js"></script>
    <script src="js/sortable/jquery.sortable.js"></script>
    <script src="js/app.plugin.js"></script>
    
</body>
</html>