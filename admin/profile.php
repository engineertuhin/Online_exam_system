<?php

 $id=$_REQUEST['id'];

 spl_autoload_register(function($classname){

	include_once "lib/".$classname.'.php';
	
	});
    new admin;
   $get=admin::getforstutedntprofile($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../bootstrap.min.css">
 
</head>

<body>
<table class='table'>
<thead>
<tr>
<th>Si No</th>
<th>Name</th>
<th>Roll</th>
<th>Registation</th>
<th>Department</th>
<th>Email</th>
<th>Section</th>
<th>Semester</th>
<th>Exam</th>
<th>Point</th>
<th>Date</th>
</tr>
</thead>
<tbody>
<tr>
<?php $i=1; foreach($get as $value) { ?>

<td><?php echo  $i;$i++?></td>
<td><?php echo $value['name']?></td>
<td><?php echo $value['roll']?></td>
<td><?php echo $value['registation']?></td>
<td><?php echo $value['department']?></td>
<td><?php echo $value['email']?></td>
<td><?php echo $value['section']?></td>
<td><?php echo $value['semester']?></td>
<td><?php echo $value['exam_name']?></td>
<td><?php echo $value['point']?></td>
<td><?php $con= $value['date'];
$convert=explode(' ',$con);
echo $convert['0'];
?></td>

</tr>
<?php }?>
</tbody>


</table>
    
</body>
</html>