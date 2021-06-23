<?php
include('db.php');
if(isset($_GET['id']) && $_GET['id']>0){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	mysqli_query($con,"update email_list set open=1 where id='$id'");
	//mysqli_query($con,"update email_list set open=open+1 where id='$id'");
}
?>