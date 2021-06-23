<?php
require('db.php');
mysqli_query($con,"delete from users_login where user_id='".$_SESSION['UID']."' and rand_no='".$_SESSION['UID_RAND']."'");
unset($_SESSION['UID_RAND']);
unset($_SESSION['UID']);
unset($_SESSION['IS_LOGIN']);
header('location:index.php');
die();
?>