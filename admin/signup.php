<?php

spl_autoload_register(function($name){

include_once "lib/".$name.'.php';

});


$object=new admin;


if(isset($_REQUEST['submit'])){

 $name=$_REQUEST['name'];
 $email=$_REQUEST['email'];
 $password=$_REQUEST['password'];
 $chackbox=$_REQUEST['chackbox'];
 /*Password Convert to hash password*/
 $convert=password_hash($password,PASSWORD_DEFAULT);
  /*Only one email insert in database*/
  $sendemail=admin::emailone($email);

if(empty($name) or empty($password) or empty($email) ){


   $mass="<p class='alert alert-danger'>From must not be Empty....<button class='close' data-dismiss='alert'>&times</button></p>";


}else if(!$chackbox=='on'){

   $mass="<p class='alert alert-danger'>Agree to Chackbox<button class='close' data-dismiss='alert'>&times</button></p>";
}elseif($sendemail==$email){
    $mass="<p class='alert alert-danger'>Email is already exest<button class='close' data-dismiss='alert'>&times</button></p>";


}else{
  $insert=admin::Datainsert($name,$email,$convert);

if($insert==true){

    $mass="<p class='alert alert-success'>Registation successfull<button class='close' data-dismiss='alert'>&times</button></p>";

}else{

   $mass="<p class='alert alert-danger'>Registation Not Successfull<button class='close' data-dismiss='alert'>&times</button></p>";
}
}


    
}

?>
<!DOCTYPE html>
<html lang="en" class=" ">
<!-- Mirrored from flatfull.com/themes/scale/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jul 2019 15:15:07 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Scale | Web Application</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="css/app.v1.css" type="text/css" />
    <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
</head>

<body class="">





    <section id="content" class="m-t-lg wrapper-md animated fadeInDown">
        <div class="container aside-xl"> <a class="navbar-brand block" href="index.html">Create an account</a>
            <section class="m-b-lg">
<?php echo $mass?>

                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">


                    <div class="list-group">
                        <div class="list-group-item">
                            <input placeholder="Name" name="name" type="text" class="form-control no-border"> 
                        </div>
                       
                        <div class="list-group-item">
                            <input type="email" placeholder="Email" name="email" type="text" class="form-control no-border"> 
                        </div>
                        <div class="list-group-item">
                            <input  placeholder="Password " name="password" type="password" class="form-control no-border"> 
                        </div>
                    </div>


                    <div class="checkbox m-b">
                        <label>
                            <input type="checkbox" name="chackbox"> Agree the <a href="#">terms and policy</a> </label>
                    </div>


                    <button type="submit" name="submit" class="btn btn-lg btn-primary btn-block">Sign up</button>


                    <div class="line line-dashed"></div>


                    <p class="text-muted text-center"><small>Already have an account?</small></p> <a href="index.php" class="btn btn-lg btn-default btn-block">Sign in</a> 
                </form>





            </section>
        </div>
    </section>



















    <!-- Bootstrap -->
    <!-- App -->
    <script src="js/app.v1.js"></script>
    <script src="js/app.plugin.js"></script>
</body>
<!-- Mirrored from flatfull.com/themes/scale/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jul 2019 15:15:07 GMT -->

</html>