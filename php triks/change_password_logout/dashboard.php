<?php
require('db.php');
if(!isset($_SESSION['IS_LOGIN'])){
	header('location:index.php');
	die();
}
?>
<a href="logout.php">Logout</a>&nbsp;&nbsp;

<a href="change_password.php">Change Password</a>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/custom.js"></script>
