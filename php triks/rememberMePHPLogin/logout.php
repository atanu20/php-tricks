<?php
session_start();
unset($_SESSION['IS_LOGIN']);
header('location:index.php');
die();
?>