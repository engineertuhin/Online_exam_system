
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
error_reporting(0);


include_once "config/header.php";
spl_autoload_register(function($name){
include_once "lib/".$name.'.php';
});
new admin;
if(isset($_COOKIE['email'])){
    $email= $_COOKIE['email'];
}else{
    $email= $_SESSION['email'];
} 
  $get=admin::getdata($email);

if(isset($_REQUEST['Active'])){
    $value="Active";
    $id= $_REQUEST['id'];
    $geta=admin::updatesatus($value,$id);
    
        
    
}
if(isset($_REQUEST['unactive'])){
   $values="Unactive";
   $ids=$_REQUEST['ids'];
   admin::Unactivestatus($values,$ids);
}



?>


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
                                                    <a href="#" class="font-bold">Admin Activity</a> 
                                                </div>

                                                <div class="panel-body"> 
                                                <!-- MAIN CODE GOES HERE  -->
                            <table class='table table-active'>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <Th>Status</Th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <?php foreach($get as $values) { ?>
                                <td><?php echo  $values['Name']?></td>
                                        <td><?php echo  $values['Email']?>
                                        
                                        </td>
                                        <Td>
                                       <form action="lib/test.php" method="post">
                                       <?php if($values['status']=='Active'){?>
                                        <input type="submit" Class='btn btn-success' name="unactive" value="Active">
                                        <input type="hidden" name="ids" value='<?php echo $values['id']?>'>

                                       <?php } else {?>
                                        <input type="submit" id='active' name='Active' Class='btn btn-danger' value="UnActive">
                                        <input type="hidden" name="id" value='<?php echo $values['id']?>'>
                                       <?php }?>
                                      
                                        </Td>
                                        <td><input type="submit" class="btn btn-danger" name="delete"  value="Delete">
                                        <input type="hidden" name="id" value='<?php echo $values['id']?>'>
                                        </td>
                                </tr> </form>
                                    <?php }?>
                                </tbody>


                            </table>


                                                     


                                                </div>

                                                <div class="clearfix panel-footer"> 

                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                  

<?php include_once "config/footer.php"?>


