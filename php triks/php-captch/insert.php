<?php
session_start();
$con=mysqli_connect('localhost','root','','youtube');
$name=$_POST['name'];
$mobile=$_POST['mobile'];
$details=$_POST['details'];
$captcha=$_POST['captcha'];
if($_SESSION['CODE']==$captcha){
	mysqli_query($con,"insert into enquiry(name,mobile,details) values('$name','$mobile','$details')");
	echo "Thank you";
}else{
	echo "Please enter valid captcha code";
}
?>