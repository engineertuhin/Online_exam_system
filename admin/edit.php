<?php include_once "config/header.php"; 

spl_autoload_register(function($name){
    include_once "lib/".$name.'.php';
    });
    new admin;
    $getid=$_REQUEST['editrules'];
  $get=  admin::updateruls($getid);
  if(isset($_REQUEST['editquestion'])){
    $question_number=$_REQUEST['number'];
    $question=$_REQUEST['question'];
    $id=$_REQUEST['editquestion1'];
  $option1=$_REQUEST['option0'];
  $option2=$_REQUEST['option1'];
    if(isset($_REQUEST['option2'])){
      $optiontw=$_REQUEST['option2'];

    }else{
      $optiontw="?";
    }
    if(isset($_REQUEST['option3'])){
      $option3=$_REQUEST['option3'];

    }else{
      $option3="?";
    }
    if(isset($_REQUEST['option4'])){
     $option4=$_REQUEST['option4'];

    }else{
      $option4="?";
    }
    if(isset($_REQUEST['option5'])){
      $option5=$_REQUEST['option5'];

    }else{
      $option5="?";
    }
    if(isset($_REQUEST['option6'])){
      $option6=$_REQUEST['option6'];

    }else{
       $option6="?";
    }
    if(empty($question_number) or empty($question) or empty($option1) or empty($optiontw) or empty($option2) or empty($option3) or empty($option4) or empty($option5) or empty($option6)  ){
        $mas="<p class='alert alert-danger'>from must not be empty<button class='close' data-dismiss='alert'>&times</button></p>";

    }else{
        admin::updatequestion($question_number,$question,$option1,$option2,$optiontw,$option3,$option4,$option5,$option6,$id);
        header('location:../question.php');
    }


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
                                                    <a href="#" class="font-bold"><?php if(isset($getid)){
                                                        echo "Update rules";
                                                    }elseif(isset($_REQUEST['editquestion1'])){
                                                        echo "Edit question";
                                                     } ?></a> 
                                                </div>

                                                <div class="panel-body"> 
<?php if(isset($getid)) {?>
         
                                         <form action="lib/test.php" method="post">
                                            <input type="text" style="width:40%" class='from-control' name='text'  value="<?php echo $get['rules']?>">
                                            <input type="hidden" name='updateid' value="<?php echo $getid?>">
                                            <input type="Submit" class='btn btn-success' name="update_rules" value="Update">                                   
                                            </form>
<?php }?>
<?php if(isset($_REQUEST['editquestion1'])) {
    
    $ids= $_REQUEST['editquestion1'];
   $get= admin::editquestion1($ids);
   foreach($get as $value){
    echo $mas;
    ?>

    <form action="" method="post">
<div class='form-group'>
<label for="">Question number</label>
<input type="number" style='width:10%' name='number' value='<?php echo $value['question_no']?>' class="form-control">

</div>
<div class='form-group'>
<label for="">Question </label>
<input type="text" style='width:25%' name='question' value='<?php echo $value['question']?>' class="form-control">

</div>
<div class='form-group'>
<label for="">option 1</label>
<input type="text" style='width:20%' name='option0' value='<?php echo $value['option1']?>' class="form-control">

</div>
<div class='form-group'>
<label for="">option 2</label>
<input type="text" style='width:20%' name='option1' value='<?php echo $value['option2']?>' class="form-control">

</div>
<?php if(($value['option3']=='?')==false){ ?>
    <div class='form-group'>
<label for="">option 3</label>
<input type="text" style='width:20%' name='option2' value='<?php echo $value['option3']?>' class="form-control">

</div>

<?php   }?>
<?php if(($value['option4']=='?')==false){ ?>
    <div class='form-group'>
<label for="">option 4</label>
<input type="text" style='width:20%' name='option3' value='<?php echo $value['option4']?>' class="form-control">

</div>
<?php if(($value['option5']=='?')==false){ ?>
    <div class='form-group'>
<label for="">option 5</label>
<input type="text" style='width:20%' name='option4' value='<?php echo $value['option5']?>' class="form-control">

</div>
<?php if(($value['option6']=='?')==false){ ?>
    <div class='form-group'>
<label for="">option 6</label>
<input type="text" style='width:20%' name='option5' value='<?php echo $value['option6']?>' class="form-control">

</div>
<?php if(($value['option7']=='?')==false){ ?>
    <div class='form-group'>
<label for="">option 7</label>
<input type="text" style='width:20%' name='option6' value='<?php echo $value['option7']?>' class="form-control">

</div>
<?php }}}  }?>

<input type="submit" name='editquestion' class='btn btn-sm btn-info' value='Update'>
<a href="question.php" class='btn btn-sm btn-danger'>Back</a>
</form>
<?php } }?>                                 </div>

<div class="clearfix panel-footer"> 

</div>
</section>
</div>
</div>

</table>






<?php include_once "config/footer.php";  ?>