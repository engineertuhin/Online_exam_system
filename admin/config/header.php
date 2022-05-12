<?php
session_start();

if(!empty($_COOKIE['email'])){
    
    if(empty($_COOKIE['email']) or empty($_COOKIE['name'])){
        header("location:index.php");
    }
}
elseif(!isset($_SESSION['email'])){
    if(!isset($_SESSION['email']) or !isset($_SESSION['name'])){
        header("location:index.php");
    }
}
if($_REQUEST['logout']){
   session_destroy();
   setcookie('email',$emails,time()-22);
            setcookie('pass',$pass,time()-22);
            setcookie('name',$name,time()-22);
   header("location:index.php");

}


?>


<!DOCTYPE html>
<html lang="en" class="app">
<head>
    <meta charset="utf-8" />
    <title>Online exam</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="css/app.v1.css" type="text/css" />
    <link rel="stylesheet" href="js/calendar/bootstrap_calendar.css" type="text/css" />
    <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
</head>

<body class="">


    <section class="vbox">




        <!-- HEADER PART  -->
        <header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">
            <div class="navbar-header aside-md dk">
                <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html"> <i class="fa fa-bars"></i> </a>
                <a href="index.html" class="navbar-brand"> <img src="images/logo.png" class="m-r-sm" alt="scale"> <span class="hidden-nav-xs">Scale</span> </a>
                <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user"> <i class="fa fa-cog"></i> </a>
            </div>
            <ul class="nav navbar-nav hidden-xs">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="i i-grid"></i> </a>
                    <section class="dropdown-menu aside-lg bg-white on animated fadeInLeft">
                        <div class="row m-l-none m-r-none m-t m-b text-center">
                            <div class="col-xs-4">
                                <div class="padder-v">
                                    <a href="#"> <span class="m-b-xs block"> <i class="i i-mail i-2x text-primary-lt"></i> </span> <small class="text-muted">Mailbox</small> </a>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="padder-v">
                                    <a href="#"> <span class="m-b-xs block"> <i class="i i-calendar i-2x text-danger-lt"></i> </span> <small class="text-muted">Calendar</small> </a>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="padder-v">
                                    <a href="#"> <span class="m-b-xs block"> <i class="i i-map i-2x text-success-lt"></i> </span> <small class="text-muted">Map</small> </a>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="padder-v">
                                    <a href="#"> <span class="m-b-xs block"> <i class="i i-paperplane i-2x text-info-lt"></i> </span> <small class="text-muted">Trainning</small> </a>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="padder-v">
                                    <a href="#"> <span class="m-b-xs block"> <i class="i i-images i-2x text-muted"></i> </span> <small class="text-muted">Photos</small> </a>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="padder-v">
                                    <a href="#"> <span class="m-b-xs block"> <i class="i i-clock i-2x text-warning-lter"></i> </span> <small class="text-muted">Timeline</small> </a>
                                </div>
                            </div>
                        </div>
                    </section>
                </li>
            </ul>
            <form class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" role="search">
                <div class="form-group">
                    <div class="input-group"> <span class="input-group-btn"> <button type="submit" class="btn btn-sm bg-white b-white btn-icon"><i class="fa fa-search"></i></button> </span>
                        <input type="text" class="form-control input-sm no-border" placeholder="Search apps, projects..."> </div>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
                <li class="hidden-xs">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="i i-chat3"></i> <span class="badge badge-sm up bg-danger count">2</span> </a>
                    <section class="dropdown-menu aside-xl animated flipInY">
                        <section class="panel bg-white">
                            <div class="panel-heading b-light bg-light"> <strong>You have <span class="count">2</span> notifications</strong> </div>
                            <div class="list-group list-group-alt">
                                <a href="#" class="media list-group-item"> <span class="pull-left thumb-sm"> <img src="images/a0.png" alt="..." class="img-circle"> </span> <span class="media-body block m-b-none"> Use awesome animate.css<br> <small class="text-muted">10 minutes ago</small> </span> </a>
                                <a href="#" class="media list-group-item"> <span class="media-body block m-b-none"> 1.0 initial released<br> <small class="text-muted">1 hour ago</small> </span> </a>
                            </div>
                            <div class="panel-footer text-sm"> <a href="#" class="pull-right"><i class="fa fa-cog"></i></a> <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a> </div>
                        </section>
                    </section>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb-sm avatar pull-left"> <img src="images/a0.png" alt="..."> </span><?php if(isset($_COOKIE['name'])){
                        echo $_COOKIE['name'];
                    }else{
                        echo $_SESSION['name'];
                    } ?><b class="caret"></b> </a>
                    <ul class="dropdown-menu animated fadeInRight">
                        <li> <span class="arrow top"></span> <a href="#">Settings</a> </li>
                        <li> <a href="profile.html">Profile</a> </li>
                        <li>
                            <a href="#"> <span class="badge bg-danger pull-right">3</span> Notifications </a>
                        </li>
                        <li> <a href="docs.html">Help</a> </li>
                        <li class="divider"></li>
                        <li> <a href="?logout=logout" data-toggle="ajaxModal">Logout</a> </li>
                    </ul>
                </li>
            </ul>
        </header>



        <section>
            <section class="hbox stretch">




                <!-- MENU LEFT  -->
                <!-- .aside -->
                <aside class="bg-black aside-md hidden-print hidden-xs" id="nav">
                    <section class="vbox">
                        <section class="w-f scrollable">
                            <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                                




                                <div class="clearfix wrapper dk nav-user hidden-xs">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                                            <span class="thumb avatar pull-left m-r"> 
                                                <img src="images/a0.png" class="dker" alt="..."> 
                                                <i class="on md b-black"></i> 
                                            </span> 

                                            <span class="hidden-nav-xs clear"> 
                                                <span class="block m-t-xs"> 
                                                    <strong class="font-bold text-lt"><?php if(isset($_COOKIE['name'])){
                        echo $_COOKIE['name'];
                    }else{
                        echo $_SESSION['name'];
                    }?></strong> 
                                                    <b class="caret"></b> 
                                                </span> 
                                                <span class="text-muted text-xs block">Art Director</span> 
                                            </span>
                                        </a>
                                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                            <li> <span class="arrow top hidden-nav-xs"></span> <a href="#">Settings</a> </li>
                                            <li> <a href="profile.html">Profile</a> </li>
                                            <li>
                                                <a href="#"> <span class="badge bg-danger pull-right">3</span> Notifications </a>
                                            </li>
                                            <li> <a href="docs.html">Help</a> </li>
                                            <li class="divider"></li>
                                            <li> <a href="modal.lockme.html" data-toggle="ajaxModal">Logout</a> </li>
                                        </ul>
                                    </div>
                                </div>





                                <!-- nav -->
                                <nav class="nav-primary hidden-xs">
                                    
                                    <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm">Menu Section</div>


                                    <ul class="nav nav-main" data-ride="collapse">
                                        <li class="active">
                                            <a href="deshboard.php" class="auto"> 
                                                <i class="i i-statistics icon"> </i> 
                                                <span class="font-bold">Overview</span> 
                                            </a>
                                        </li>

                                        
                                        <li>
                                            <a href="#" class="auto">                                              
                                                <span class="font-bold">Layouts</span> 
                                            </a>
                                            <ul class="nav dk">
                                                <li>
                                                    <a href="examrule.php" class="auto"> <i class="i i-dot"></i> <span>Exam Rules</span> </a>
                                                </li>
                                                <li>
                                                    <a href="question.php" class="auto"> <i class="i i-dot"></i> <span>Question</span> </a>
                                                </li>
                                                <li>
                                                    <a href="layout-boxed.html" class="auto"> <i class="i i-dot"></i> <span>Boxed layout</span> </a>
                                                </li>
                                                <li>
                                                    <a href="layout-fluid.html" class="auto"> <i class="i i-dot"></i> <span>Fluid layout</span> </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="student.php" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <i class="i i-lab icon"> </i> <span class="font-bold">Student Info</span> </a>

                                            </li>
                                        
                                        </li>
                                        <li>

                                    <a href="timestart.php" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <i class="i i-docs icon"> </i> <span class="font-bold">Exam_start</span> </a>
                                            <ul class="nav dk">
                                                <li>
                                                </ul>
                                </nav>
                                <!-- / nav -->
                            </div>
                        </section>




                        <footer class="footer hidden-xs no-padder text-center-nav-xs">
                            <a href="modal.lockme.html" data-toggle="ajaxModal" class="btn btn-icon icon-muted btn-inactive pull-right m-l-xs m-r-xs hidden-nav-xs"> <i class="i i-logout"></i> </a>
                            <a href="#nav" data-toggle="class:nav-xs" class="btn btn-icon icon-muted btn-inactive m-l-xs m-r-xs"> <i class="i i-circleleft text"></i> <i class="i i-circleright text-active"></i> </a>
                        </footer>



                    </section>
                </aside>
                <!-- /.aside -->

