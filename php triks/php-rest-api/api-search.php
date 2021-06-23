<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

/*$data = json_decode(file_get_contents("php://input"), true);
$search_value = $data['search'];*/

$search_value = isset($_GET['search']) ? $_GET['search'] : die();

include "config.php";

$sql = "SELECT * FROM students WHERE student_name LIKE '%{$search_value}%'";

$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

if(mysqli_num_rows($result) > 0 ){
	
	$output = mysqli_fetch_all($result, MYSQLI_ASSOC);
	echo json_encode($output);

}else{

 echo json_encode(array('message' => 'No Search Found.', 'status' => false));

}  

?>
