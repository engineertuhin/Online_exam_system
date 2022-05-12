<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
error_reporting(0);


include_once "config/header.php";
spl_autoload_register(function($name){
include_once $name.'.php';
});
new admin;


if(isset($_REQUEST['Active'])){
    $value="Active";
    $id= $_REQUEST['id'];
    $geta=admin::updatesatus($value,$id);
    header('location:../deshboard.php');
  
}
if(isset($_REQUEST['unactive'])){
   $values="Unactive";
   $ids=$_REQUEST['ids'];
   admin::Unactivestatus($values,$ids);
   header('location:../deshboard.php');

}
if(isset($_REQUEST['delete'])){
     $ids=$_REQUEST['id'];
     admin::deleteadmin($ids);
     header('location:../deshboard.php');
}
if(isset($_REQUEST['add'])){


 $text= $_REQUEST['text'];
 admin::addrules($text);
 header('location:../examrule.php');

}
if(isset($_REQUEST['delete_rules'])){
    admin::deleterules();
    header('location:../examrule.php');
}
if(isset($_REQUEST['update_rules'])){
$id=$_REQUEST['updateid'];
$text=$_REQUEST['text'];
    admin::updaterules($id,$text);
    header('location:../examrule.php');

}
if(isset($_REQUEST['deleterules'])){

$id=$_REQUEST['deleterules'];
admin::deleterules2($id);
header('location:../examrule.php');


}
/* question paper option create*/
if(isset($_REQUEST['questionoption'])){
    $questionoption= $_REQUEST['questionoption'];
   # code...

?>
<div class='row'>
<?php for ($i=0; $i <$questionoption ; $i++) {  ?>
 
<?php   if($i==0){ ?>

    <div class='col-md-6'>
<levle>Question Number : </levle>
<input type="number" name="question_number" style='width:50px' required>
</div>
<br>
<br>
<div class='col-md-12'>
<levle>Question : </levle>
<input type="text" name="question" style='width:200px' required>
</div>
<input name="numberofoption" type="hidden" value="<?php echo $questionoption;?>">
<?php    }?>
<br>
<br>

<div class='col-md-12'>
<levle>Option <?php echo $i?>: </levle>
<input type="text" name='option<?php echo $i?>' style='width:150px' required>
</div>


<br>
<?php  }?>
<br>
<div class='col-md-12'>
<input type="submit" name='question_add' class='btn btn-success ' value='Add'></div>
</div>
<?php }
#end ajax option add
?>
<?php

if(isset($_REQUEST['question_add'])){
    $question_number=$_REQUEST['question_number'];
    $question=$_REQUEST['question'];
    
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
        header('location:../question.php?fromisrequerd');

    }else{
        admin::addquestion($question_number,$question,$option1,$option2,$optiontw,$option3,$option4,$option5,$option6);
        header('location:../question.php');
    }

   
   }
   if(isset($_REQUEST['deleteallquestion'])){


admin::deleteallquestion();
header('location:../question.php');

   }
   if(isset($_REQUEST['curect'])){

$qustion=$_REQUEST['curect'];
 $id=$_REQUEST['id'];
 admin::currectans($qustion,$id);
 header('location:../question.php');
   
   }
   if(isset($_REQUEST['deletequestion1'])){

$id=$_REQUEST['deletequestion1'];;

admin::deletequestion1($id);
 header('location:../question.php');

   }
   if(isset($_REQUEST['studentid'])){

$id=$_REQUEST['studentid'];
    admin::deletestudent($id);
    header('location:../student.php');
   }
   if(isset($_REQUEST['exmaid'])){

$id=$_REQUEST['exmaid'];
admin::examdatadelete($id);
header('location:../Exam_start.php');
   }
if(isset($_REQUEST['examsubmit'])){

  $exam_name=$_REQUEST['examname'];
  $examtie=$_REQUEST['exam_Time'];
  $contine=$_REQUEST['timecon'];
  $active='active';
  $get=   admin::startcheck($active);


if(empty($exam_name) or empty($examtie) or empty($contine)){

$mas='empty';

}elseif($get['examstart']==$active){

$mas='active';

}
else{
    admin::examtimeset($exam_name,$examtie,$contine);

}

header("location:../timestart.php");

}
?>
