<?php
$con=mysqli_connect('localhost','root','','youtube');
if(isset($_GET)){
	foreach($_GET as $key=>$val){
		$l=mysqli_real_escape_string($con,$key);
		$l=str_replace('/','',$l);	
	}
	$res=mysqli_query($con,"select link from shorturl where short_link='$l' and status='1'");
	$count=mysqli_num_rows($res);
	if($count>0){
		$row=mysqli_fetch_assoc($res);
		$link=$row['link'];
		mysqli_query($con,"update shorturl set hit_count=hit_count+1 where short_link='$l'");
		header('location:'.$link);
		die();
	}
}
if(isset($_GET['l'])){
	
}
?>