<?php
include('db.php');
if(isset($_POST['name']) && isset($_POST['email'])){
	$name=mysqli_real_escape_string($con,$_POST['name']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$download_file=$_SESSION['alias'];
	mysqli_query($con,"insert into users(name,email,download_file) values('$name','$email','$download_file')");
	if(mysqli_insert_id($con)>0){
		$status='success';
	}else{
		$status='error';
	}
	$_SESSION['IS_DOWNLAOD']='yes';
	echo json_encode(array('status'=>$status));
}
?>