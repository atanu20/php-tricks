<?php
include('db.php');
//echo "<pre>";
//print_r($_SERVER['DOCUMENT_ROOT']);
//die();
if(isset($_SESSION['IS_DOWNLAOD'])){
	unset($_SESSION['IS_DOWNLAOD']);
	$alias=$_SESSION['alias'];
	$row=mysqli_fetch_assoc(mysqli_query($con,"select file from files where alias='$alias'"));
	$file=$row['file'];
	header('Content-disposition: attachment;filename='.$file);
	header('Content-type: application/zip');
	$path=$_SERVER['DOCUMENT_ROOT']."/php/download_code/code/".$file;
	readfile($path);
}else{
	header('location:index.php');
	die();
}
?>