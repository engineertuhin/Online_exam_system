<?php


session_start();

include_once "databese.php";
class admin extends database{


public static function   Datainsert($name,$email,$convert){

$query="INSERT INTO `admin`( `Name`, `Email`, `password`, `status`) VALUES (?,?,?,?)";
$send=parent::get($query);
$send->bindparam(1,$name);
$send->bindparam(2,$email);
$send->bindparam(3,$convert);
$send->bindvalue(4,"Unactive");
$get=$send->execute();
if($get==true){
    return true;
}

}
public static function emailone($email){
    
    $query="select * from admin where Email=?";
    $send=parent::get($query);
    $send->bindparam(1,$email);
  $send->execute();
  $get= $send->fetch();
return  $get['Email'];


}
public static function email_chack($email){

    $query="select Email from admin where Email=?";
    $send=parent::get($query);
    $send->bindparam(1,$email);
  $send->execute();
  $get= $send->fetch();
return  $get['Email'];

}
public static function pass_chack($email,$password){
    $query="select * from admin where Email=?";
    $send=parent::get($query);
    $send->bindparam(1,$email);
  $send->execute();
  $get= $send->fetch();
  
if(password_verify($password,$get['password'])){
    return true;
}

}
public static function status_chack($email){
    $query="select * from admin where Email=? ";
    $send=parent::get($query);
    $send->bindparam(1,$email);
    
 $send->execute();
  $get= $send->fetch();
return  $get;
}
public static function getdata($email){
  $query="select * from admin  where Email!='$email'";
  $send=parent::get($query);  
  $send->execute();
return  $send->fetchAll();
 

  }
  public static function updatesatus($value,$id){
$query="update admin set status=:value where id=:id ";
$send=parent::get($query); 
$send->bindparam(':value',$value);
$send->bindparam(':id',$id);
$gets=$send->execute();



  }
  public static function Unactivestatus($values,$ids){
    $query="update admin set status=:value where id=:id ";
    $send=parent::get($query); 
    $send->bindparam(':value',$values);
    $send->bindparam(':id',$ids);
    $send->execute();
    
    
      }
      public static function deleteadmin($ids){
$query="delete from admin where id='$ids'";
$send=parent::get($query); 
$send->execute();

      }
public static function addrules($text){
  $query="insert into rules(rules)values(?)";
  $send=parent::get($query);
  $array=array($text);
  $send->execute($array);
}
public static function allrues(){
$query="select * from rules";
$send=parent::get($query);
$send->execute();
return $send->fetchAll();


}
public function deleterules(){
  $query="truncate table rules";
  $send=parent::get($query);
$send->execute();
}
public function updateruls($getid){
$query="select * from rules where id=?";
$send=parent::get($query);
$send->bindparam('1',$getid);
$send->execute();
return $send->fetch();


}
public static function updaterules($id,$text){
  $query="update rules set rules='$text' where id='$id'";
  $send=parent::get($query);
  $send->execute();
}
public static function deleterules2($id){

$query="delete from rules where id='$id'";
$send=parent::get($query);
$send->execute();



}
public static function addquestion($question_number,$question,$option1,$option2,$optiontw,$option3,$option4,$option5,$option6){

$query="INSERT INTO `exam_question`( `question_no`, `question`, `option1`, `option2`, `option3`, `option4`, `option5`, `option6`, `option7`, `currect`) VALUES ('$question_number','$question','$option1','$option2','$optiontw','$option3','$option4','$option5','$option6','?')";
$send=parent::get($query);
$send->execute();

  
}
public static function getallquestion(){
  $query="select * from exam_question order by question_no";
  $send=parent::get($query);
$send->execute();
return $send->fetchAll();

}
public static function deleteallquestion(){
  $query="truncate table exam_question";
  $send=parent::get($query);
$send->execute();

} 
public static function currectans($question,$id){
$query="UPDATE `exam_question` SET  currect='$question' where id='$id' ";
$send=parent::get($query);
$send->execute();

}
public static function deletequestion1($id){

$query="delete from  exam_question where id='$id'";
$send=parent::get($query);
$send->execute();

}
public static function editquestion1($ids){

$query="select * from exam_question where id='$ids'";
$send=parent::get($query);
$send->execute();
return $send->fetchAll();

}
public static function updatequestion($question_number,$question,$option1,$option2,$optiontw,$option3,$option4,$option5,$option6,$getid){
  $query="UPDATE `exam_question` SET `question_no`='$question_number',`question`='$question',`option1`='$option1',`option2`='$option2',`option3`='$optiontw',`option4`='$option3',`option5`='$option4',`option6`='$option5',`option7`='$option6' WHERE id='$getid'";
  $send=parent::get($query);
  $send->execute();


} 
public static function addstudentinfo($name,$roll,$registation,$number,$email,$department,$section,$semester){

$query="INSERT INTO `stuentinfo`( `name`, `roll`, `registation`, `mobile`, `email`, `department`, `section`, `semester`) VALUES (:namea,:roll,:registation,:mobile,:email,:department,:section,:semester)";
$send=parent::get($query);
$send->bindparam(':namea',$name);
$send->bindparam(':roll',$roll);
$send->bindparam(':registation',$registation);
$send->bindparam(':mobile',$number);
$send->bindparam(':email',$email);
$send->bindparam(':department',$department);
$send->bindparam(':section',$section);
$send->bindparam(':semester',$semester);
$get=$send->execute();
if($get==true){
  return true;
}

}
public static function cullectstudentinfo(){
$query="select * from stuentinfo order by semester";
$send=parent::get($query);
$send->execute();
return $send->fetchAll();

}
public static function deletestudent($id){
  $query="delete from stuentinfo where id='$id'";
  $send=parent::get($query);
$send->execute();
}
public static function logingstudentemail($email){

$query="select * from stuentinfo where email='$email'";
$send=parent::get($query);
$send->execute();
 $get=$send->fetch();
 return $get;

}
public static function logingstudentroll($roll){
  
  $query="select roll from stuentinfo where roll='$roll'";
  $send=parent::get($query);
  $send->execute();
   $get=$send->fetch();
   return $get['roll'];


}
public static function getallinstaction(){
  $query="select * from rules ";
  $send=parent::get($query);
  $send->execute();
return  $send->fetchAll();

}
public static function examtimeset($exam_name,$examtie,$contine){

$query="INSERT INTO `examstart`( `Examname`, `examtime`, `examstart`, `continue`) VALUES('$exam_name','$examtie','active','$contine') ";
$send=parent::get($query);
$send->execute();
}
public static function startcheck($active){
$query="select * from examstart where examstart='$active'";
$send=parent::get($query);
$send->execute();
return $send->fetch();


}
public static function examdatadelete($id){
  $query="delete from examstart where id='$id' ";
  $send=parent::get($query);
$send->execute();
}
public static function settime(){
  $query="select * from examstart";
  $send=parent::get($query);
  $send->execute();
  return $send->fetch();

}
public static function getallcolumnmber(){
  $query="SELECT COUNT(id) FROM exam_question";
  $send=parent::get($query);
  $send->execute();
  return $send->fetch();
}
public static function allquestionget($name,$email){

$query="SELECT exam_question.question,exam_question.currect ,limittime.getall from exam_question left JOIN limittime on exam_question.currect=limittime.getall and limittime.name='$name' and limittime.email='$email' ";
$send=parent::get($query);
   $send->execute();
 return  $send->fetchAll();


}
public static function limittime($get,$name,$email){
$query="INSERT INTO `limittime`( `getall`,name,email) VALUES ('$get','$name','$email')";
$send=parent::get($query);
   $send->execute();


}
public static function dublicateuniqe($name,$email){

  $query="select * from limittime where name='$name' or email='$email'";
  $send=parent::get($query);
   $send->execute();
 return  $send->fetch();
}
public static function addresult($name,$email,$examname,$point,$ids){

$query="INSERT INTO `profile`(`name`, `email`, `exam_name`, `point`, `ids`) VALUES ('$name','$email','$examname','$point',$ids)";
$send=parent::get($query);
$send->execute();

}
public static function dublicateprofile($name,$email){
$query="select * from profile where name='$name' or email='$email' ORDER BY id DESC ";
$send=parent::get($query);
   $send->execute();
 return  $send->fetch();


}
public static function pointcalculation($point,$name,$email){


$query="INSERT INTO `pointcalculation`( `name`, `email`, `point`) VALUES ('$name','$email',$point)";
$send=parent::get($query);
   $send->execute();
}
public static function pointget($name,$email){

  $query="select * from pointcalculation where name='$name' or email='$email'";
  $send=parent::get($query);
     $send->execute();
   return  $send->fetch();

}
public static function allquestionfound($name,$email){
  $query="SELECT COUNT(currect) as 'get' from exam_question RIGHT JOIN limittime on exam_question.currect=limittime.getall and limittime.name='$name' and limittime.email='$email'";
  $send=parent::get($query);
     $send->execute();
   return  $send->fetch();


}
public static function getallpoint($name,$email){
 $query="select sum(point) from pointcalculation where name='$name' or email='$email'";
  $send=parent::get($query);
     $send->execute();
   return  $send->fetch();

}
public static function deletedatalimit($name,$email){

  $query="delete from limittime where name='$name' or email='$email'";
  $send=parent::get($query);
  $send->execute();
}
public static function deletpoint($name,$email){

  $query="delete from pointcalculation where name='$name' or email='$email'";
  $send=parent::get($query);
  $send->execute();
}
public static function profilelestdata($name,$email,$ids,$examname,$point){

$query="INSERT INTO `profile`(`name`, `email`, `exam_name`, `point`, `ids`) VALUES ('$name','$email','$examname','$point',$ids)";
$send=parent::get($query);
$send->execute();


}
public static function timeset(){
$query="select * from examstart";
$send=parent::get($query);
$send->execute();
return $send->fetch();
 

}public static function getforstutedntprofile($id){
  $query="SELECT stuentinfo.name,stuentinfo.roll,stuentinfo.registation,stuentinfo.email,profile.date,stuentinfo.department,stuentinfo.section,stuentinfo.semester,profile.exam_name,profile.point from stuentinfo join profile on stuentinfo.id=profile.ids  and stuentinfo.id='$id' and  profile.ids='$id';";
  $send=parent::get($query);
$send->execute();
return $send->fetchAll();
}
public static function deletetimesection(){
$query="TRUNCATE TABLE examstart";
$send=parent::get($query);
$send->execute();

}


}





?>