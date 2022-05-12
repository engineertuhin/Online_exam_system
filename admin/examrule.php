<?php include_once "config/header.php";  

spl_autoload_register(function($name){
    include_once "lib/".$name.'.php';
    });
    new admin;
  $get=  admin::allrues();



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
                                                    <a href="#" class="font-bold">Exam rules</a> 
                                                </div>

                                                <div class="panel-body"> 

                                            <form action="lib/test.php" method="post">
                                            <input type="text" style="width:40%" class='from-control' name='text'  value="">
                                            <input type="Submit" class='btn btn-success' name="add" value="Add">
                                            
                                            
                                            </form>
                                            <hr>
                                            <table class='table table-active '>
                                            <thead>
                                            <tr>
                                            <th>No</th>
                                            <th>Rules</th>
                                            <th>Action</th>
                                            <th>All Rules Delete-> <a href="lib/test.php?delete_rules"  class="btn btn-danger">Delete_All</a></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i=1; foreach($get as $value) {?>
                                            <tr>
                                            <td><?php echo $i;$i++;?></td>
                                            <td><?php echo $value['rules']?></td>
                                            <td><a href="edit.php?editrules=<?php echo $value['id']?>" class="btn btn-success">Edit</a>||<a href="lib/test.php?deleterules=<?php echo $value['id']?>" class='btn btn-danger'>Delete</a></td>
                                            
                                            
                                            </tr>
                                            
                                            
                                            </tbody>
                                            <?php }?>
                                            
                                            </table>

                                                </div>

                                                <div class="clearfix panel-footer"> 

                                                </div>
                                            </section>
                                        </div>
                                    </div>







<?php include_once "config/footer.php";  ?>