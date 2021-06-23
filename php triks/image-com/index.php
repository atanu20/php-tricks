<?php
/*$input_image="sample.jpg";
$output_image="output.jpg";

$img=imagecreatefromjpeg($input_image);
imagejpeg($img,$output_image,10);*/
if(isset($_POST['submit'])){
	$info=getimagesize($_FILES['image']['tmp_name']);
	if(isset($info['mime'])){
		if($info['mime']=="image/jpeg"){
			$img=imagecreatefromjpeg($_FILES['image']['tmp_name']);
		}elseif($info['mime']=="image/png"){
			$img=imagecreatefrompng($_FILES['image']['tmp_name']);
		}else{
			echo "Only select jpg or png image";
		}
		if(isset($img)){
			$output_image=time().'.jpg';
			imagejpeg($img,$output_image,40);
			echo "Processing done";
		}
	}else{
		echo "Only select jpg or png image";
	}
}
?>
<form method="post" enctype="multipart/form-data">
	<input type="file" name="image" required/>
	<input type="submit" name="submit"/>
</form>