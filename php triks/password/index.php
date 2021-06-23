<?php
$str="abcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+";
$str=str_shuffle($str);
$str=substr($str,0,12);
echo $str;
?>