<?php
include('config.php');
include('api.php');
$arr['topic']='Test by Vishal';
$arr['start_date']=date('2021-05-16 00:02:30');
$arr['duration']=30;
$arr['password']='vishal';
$arr['type']='2';
$result=createMeeting($arr);
if(isset($result->id)){
	echo "Join URL: <a href='".$result->join_url."'>".$result->join_url."</a><br/>";
	echo "Password: ".$result->password."<br/>";
	echo "Start Time: ".$result->start_time."<br/>";
	echo "Duration: ".$result->duration."<br/>";
}else{
	echo '<pre>';
	print_r($result);
}
?>