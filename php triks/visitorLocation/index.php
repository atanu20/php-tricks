<?php
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,"http://ip-api.com/json");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$result=curl_exec($ch);
$result=json_decode($result);

if($result->status=='success'){
	echo "Country:".$result->country.'<br/>';
	echo "Region:".$result->regionName.'<br/>';
	echo "City:".$result->city.'<br/>';
	if(isset($result->lat) && isset($result->lon)){
		echo "Lat:".$result->lat.'<br/>';
		echo "Lon:".$result->lon.'<br/>';
	}
	echo "IP:".$result->query.'<br/>';
	
}
?>