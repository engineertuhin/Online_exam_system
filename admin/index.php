<?php
session_start();

if(!empty($_COOKIE['email'])){
    
    if(!empty($_COOKIE['email']) or !empty($_COOKIE['name'])){
        header("location:deshboard.php");
}else if(isset($_SESSION['email'])){
    if(isset($_SESSION['name']) or isset($_SESSION['email'])){
        header("location:deshboard.php");
    }
}
}
spl_autoload_register(function($name){

    include_once "lib/".$name.'.php';
    
    });
    
    
    $object=new admin;
  
    
if(isset($_REQUEST['submit'])){
   $email=$_REQUEST['email'];
    $password=$_REQUEST['password'];
      $get= admin::email_chack($email);
    $getpass= admin::pass_chack($email,$password);
    $getstatus=admin::status_chack($email);
    

 
    if(empty($email) or empty($password)){


        $mass="<p class='alert alert-danger'>From Must Not be empty<button class='close' data-dismiss='alert'>&times</button></p>";

    }elseif(($get==$email)==false){

        $mass="<p class='alert alert-danger'>Your Email is wrong<button class='close' data-dismiss='alert'>&times</button></p>";

    }elseif(!$getpass==true){
        $mass="<p class='alert alert-danger'>Password is wrong<button class='close' data-dismiss='alert'>&times</button></p>";
    }elseif( $getstatus['status']=='Unactive'){

        $mass="<p class='alert alert-danger'>Your status is not Active<button class='close' data-dismiss='alert'>&times</button></p>";

    }else{
        $emails=$getstatus['Email'];
        $pass=$getstatus['password'];
        $name=$getstatus['Name'];
     
        if(isset($_REQUEST['chackbox'])=='on'){
            setcookie('email',$emails,time()+60*60*4);
            setcookie('pass',$pass,time()+60*60*4);
            setcookie('name',$name,time()+60*60*4);
        }else{
            $_SESSION['name']=$getstatus['Name'];
            $_SESSION['email']=$getstatus['Email'];
        }
           
        
       
      
        header("location:deshboard.php");
      
    }

    
}


?>
<!DOCTYPE html>
<html lang="en" class=" ">
<head>
    <meta charset="utf-8" />
    <title>Scale | Web Application</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="css/app.v1.css" type="text/css" />
    <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
</head>

<body class="">
    <section id="content" class="m-t-lg wrapper-md animated fadeInUp">
        <div class="container aside-xl"> <a class="navbar-brand block" href="index.html">Sign in from here</a>
            <section class="m-b-lg">
               <?php echo $mass?>
                <form action="<?php echo $_SERVER['PHP_SELF']?>" Method="POST">
                    <div class="list-group">
                        <div class="list-group-item">
                            <input type="email" placeholder="Email " name="email" class="form-control no-border"> 
                        </div>
                        <div class="list-group-item">
                            <input type="password" placeholder="Password" name="password" class="form-control no-border"> 
                        </div>
                    </div>

                    <div class="checkbox m-b">
                        <label>
                            <input type="checkbox" name="chackbox"> Remember Me <a href="#">for next time login</a> </label>
                    </div>
                    <button type="submit" name="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>

                    <div class="text-center m-t m-b"><a href="#"><small>Forgot password?</small></a></div>


                    <div class="line line-dashed"></div>
                    <p class="text-muted text-center"><small>Do not have an account?</small></p> 
                    <a href="signup.php" class="btn btn-lg btn-default btn-block">Create an account</a> 
                </form>


            </section>
        </div>
    </section>
   

    <!-- / footer -->
    <!-- Bootstrap -->
    <!-- App -->
    <script src="js/app.v1.js"></script>
    <script src="js/app.plugin.js"></script>
</body>

</html>