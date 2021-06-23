<?php
include('database.php');
$id=$_POST['id'];
$sql="select * from student where id='$id'";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($res)){
	$arr=$row;
}
echo json_encode($arr);
?>