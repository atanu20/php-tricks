<?php
$domain=$_POST['domain'];
$url="https://domain-availability.whoisxmlapi.com/api/v1?apiKey=API_KEY&domainName=".$domain;
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$data=curl_exec($ch);
$json=json_decode($data,1);
echo json_encode($json['DomainInfo']);
?>