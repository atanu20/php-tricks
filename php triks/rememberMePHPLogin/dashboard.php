<?php
session_start();
if(!isset($_SESSION['IS_LOGIN'])){
	header('location:index.php');
	die();
}
?>
Welcome User<br/><br/>
<a href="logout.php">Logout</a>