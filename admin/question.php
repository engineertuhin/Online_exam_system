<?php include_once "config/header.php";  
spl_autoload_register(function($name){
    include_once 'lib/'.$name.'.php';
    });
    new admin;
   $getallquestion= admin::getallquestion();
    if(isset($_REQUEST['fromisrequerd'])){
        $mass="<p  class='alert alert-danger'>Fild Must not be empty<button class='close' data-dismiss='alert'>&times</button></p>";
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
                                                    <a href="#" class="font-bold">Question Paper</a> 
                                                </div>

                                                <div class="panel-body"> 
                                                <div class="col-md-5" > 
         <label for="cars">How Option You Add -></label>
       
       <select id="value" name="mark5"  style="width:90px;" >
       <option  value="">----</option>
       <option  id='valuegete1' value="2">2</option>
         <option  id='valuegete2' value="3">3</option>
         <option  id='valuegete3' value="4">4</option>
         <option  id='valuegete4' value="5">5</option>
         <option  id='valuegete5' value="6">6</option>
         <option  id='valuegete6' value="7">7</option>
     
       
       </select>
       <?php echo $mass?>
       <hr>
       <form action="lib/test.php" method="post">
       
       <div id='get'>
  
                                                </div>
       
       </form>
        <div class="clearfix panel-footer"> 

                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                    <div class='col-md-12'>
                                                <table class='table'>
       <thead>
       
       <th>NO</th>
       <th>Question</th>
       <th>Action</th>
       <form action="lib/test.php" method="post">
       <th>Delete all Data -> <button type="submit" name="deleteallquestion" class='btn btn-danger'>Delete_all</button></form> </th>
       </tr>
       </thead>
       <tbody>
       <?php $i=1; foreach($getallquestion as $value) {?>
       
       <td><?php echo $i;$i++?>
       </td>
       <td>
       <h3><?php echo $value['question']?></h3>
     
       <div class="form-check">
      <ol>
      <li>
      <?php if($value['option1']==$value['currect'] ) {
          $print="style=' font-weight: bold;color:green;'";
      }else{
          $print="style=''";
      }
          ?>
       <a <?php echo $print?>   href="lib/test.php?curect=<?php echo $value['option1']?>&&id=<?php echo $value['id']?>" > <?php echo $value['option1']?>  </a></li>
       
       <input id='id' type="hidden" value="<?php echo $value['id']?>">
       </ol>
       </div>
       <ol>
       <?php if($value['option2']==$value['currect'] ) {
          $print="style=' font-weight: bold;color:green;'";
      }else{
          $print="style=''";
      }
          ?>
      <li>
       <a <?php echo $print;?> href="lib/test.php?curect=<?php echo $value['option2']?>&&id=<?php echo $value['id']?>" > <?php echo $value['option2']?>  </a></li>
    
       <input  id='id' type="hidden" value="<?php echo $value['id']?>">
       </ol>
       </div>
       
       <?php if(($value['option3']=='?')==false){?>
        <div class="form-check">
        <ol>
      <li>
      <?php if($value['option3']==$value['currect'] ) {
          $print="style=' font-weight: bold;color:green;'";
      }else{
          $print="style=''";
      }
          ?>
       <a <?php echo $print?>  href="lib/test.php?curect=<?php echo $value['option3']?>&&id=<?php echo $value['id']?>" > <?php echo $value['option3']?>  </a></li>
       
       <input  id='id' type="hidden" value="<?php echo $value['id']?>">
       </ol>
       </div>
       <?php }?>
       <?php if(($value['option4']=='?')==false){?>
        <div class="form-check"> <ol>
      <li>
      <?php if($value['option4']==$value['currect'] ) {
          $print="style=' font-weight: bold;color:green;'";
      }else{
          $print="style=''";
      }
          ?>
       <a <?php echo $print?> href="lib/test.php?curect=<?php echo $value['option4']?>&&id=<?php echo $value['id']?>" > <?php echo $value['option4']?>  </a></li>
     
       <input  id='id' type="hidden" value="<?php echo $value['id']?>">
       </ol>
       </div>
       <?php }?>
       <?php if(($value['option5']=='?')==false){?>
        <div class="form-check">
        <ol>
      <li>
      <?php if($value['option5']==$value['currect'] ) {
          $print="style=' font-weight: bold;color:green;'";
      }else{
          $print="style=''";
      }
          ?>
       <a <?php echo $print?>  href="lib/test.php?curect=<?php echo $value['option5']?>&&id=<?php echo $value['id']?>" > <?php echo $value['option5']?>  </a></li>
       
       <input id='id' type="hidden" value="<?php echo $value['id']?>">
       </ol>
       </div>
       <?php }?>
       <?php if(($value['option6']=='?')==false){?>
        <div class="form-check">
        <ol>
        <?php if($value['option6']==$value['currect'] ) {
          $print="style=' font-weight: bold;color:green;'";
      }else{
          $print="style=''";
      }
          ?>
      <li>
       <a <?php echo $print?>  href="lib/test.php?curect=<?php echo $value['option6']?>&&id=<?php echo $value['id']?>" > <?php echo $value['option6']?>  </a></li>
       
       <input id='id' type="hidden" value="<?php echo $value['id']?>">
       </ol>
       </div>
       <?php }?>
       <?php if(($value['option7']=='?')==false){?>
        <div class="form-check">
        <ol>
        <?php if($value['option7']==$value['currect'] ) {
          $print="style=' font-weight: bold;color:green;'";
      }else{
          $print="style=''";
      }
          ?>
      <li>
       <a <?php echo $print?> href="lib/test.php?curect=<?php echo $value['option7']?>&&id=<?php echo $value['id']?>" > <?php echo $value['option7']?>  </a></li>
       
       <input id='id' type="hidden" value="<?php echo $value['id']?>">
       </ol>
       </div>
       <?php }?>
       </td>

       <td>
       <a href="edit.php?editquestion1=<?php echo $value['id']?>" class="btn btn-info">Edit</a>||<a href="lib/test.php?deletequestion1=<?php echo $value['id']?>" class="btn btn-danger">Delete</a>
       </td>
       
       </tr>
       
       </tbody>
       <?php }?>
       
       </table>
                                                </div>







<?php include_once "config/footer.php";  ?>
<script>

(function($){

$(document).ready(function(){


$(document).on('click','#valuegete1',function(){
let getvalue=$('#valuegete1').val();
$.ajax({

url: 'lib/test.php',
data : { questionoption : getvalue },
method : 'POST',
success : function(data){
$('#get').html(data);

}

});

});
$(document).on('click','#valuegete2',function(){
let getvalue=$('#valuegete2').val();
$.ajax({

url: 'lib/test.php',
data : { questionoption : getvalue },
method : 'POST',
success : function(data){
$('#get').html(data);
}

});

});
$(document).on('click','#valuegete3',function(){
let getvalue=$('#valuegete3').val();
$.ajax({

url: 'lib/test.php',
data : { questionoption : getvalue },
method : 'POST',
success : function(data){
$('#get').html(data);
}

});

});
$(document).on('click','#valuegete4',function(){
let getvalue=$('#valuegete4').val();
$.ajax({

url: 'lib/test.php',
data : { questionoption : getvalue },
method : 'POST',
success : function(data){
$('#get').html(data);
}

});

});
$(document).on('click','#valuegete5',function(){
let getvalue=$('#valuegete5').val();
$.ajax({

url: 'lib/test.php',
data : { questionoption : getvalue },
method : 'POST',
success : function(data){
$('#get').html(data);
}

});

});
$(document).on('click','#valuegete6',function(){
let getvalue=$('#valuegete6').val();
$.ajax({

url: 'lib/test.php',
data : { questionoption : getvalue },
method : 'POST',
success : function(data){
$('#get').html(data);
}

});

});



});

})(jQuery)


</script>