<?php
$con=mysqli_connect('localhost','root','','youtube');

$per_page=5;
$start=0;
$current_page=1;
if(isset($_GET['start'])){
	$start=$_GET['start'];
	if($start<=0){
		$start=0;
		$current_page=1;
	}else{
		$current_page=$start;
		$start--;
		$start=$start*$per_page;
	}
}
$record=mysqli_num_rows(mysqli_query($con,"select id,title from page"));
$pagi=ceil($record/$per_page);

$sql="select id,title from page limit $start,$per_page";
$res=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pagination Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>
  .mt-100{margin-top:50px;}
  .mt-30{margin-top:30px;}
  .mb-30{margin-bottom:30px;}
  </style>
</head>
<body>

<div class="container mt-100">
  <h2 class="mb-30">Pagination Example</h2>
  <ul class="list-group">
	<?php 
	if(mysqli_num_rows($res)>0){
	while($row=mysqli_fetch_assoc($res)){?>
		<li class="list-group-item"><?php echo $row['title']?></li>
    <?php } } else {?>
	No records
	<?php } ?>
  </ul>              
  <ul class="pagination mt-30">
	<?php 
	for($i=1;$i<=$pagi;$i++){
	$class='';
	if($current_page==$i){
		?><li class="page-item active"><a class="page-link" href="javascript:void(0)"><?php echo $i?></a></li><?php
	}else{
	?>
		<li class="page-item"><a class="page-link" href="?start=<?php echo $i?>"><?php echo $i?></a></li>
	<?php
	}
	?>
    
	<?php } ?>
  </ul>
</div>

</body>
</html>
