<?php
if(isset($_POST['submit'])){
	//header('Content-Type:image/jpeg');
	//$file="sample.jpg";
	$file=$_FILES['file']['tmp_name'];
	list($width,$height)=getimagesize($file);
	$nwidth=$width/4;
	$nheight=$height/4;
	$newimage=imagecreatetruecolor($nwidth,$nheight);
	if($_FILES['file']['type']=='image/jpeg'){
		$source=imagecreatefromjpeg($file);
		imagecopyresized($newimage,$source,0,0,0,0,$nwidth,$nheight,$width,$height);
		$file_name=time().'.jpg';
		$stamp=imagecreatefromjpeg('stamp.jpg');
		imagecopy($newimage,$stamp,round($nwidth/2),round($nheight/2),0,0,60,57);
		imagejpeg($newimage,'upload/'.$file_name);
	}elseif($_FILES['file']['type']=='image/png'){
		$source=imagecreatefrompng($file);
		imagecopyresized($newimage,$source,0,0,0,0,$nwidth,$nheight,$width,$height);
		$file_name=time().'.png';
		$stamp=imagecreatefromjpeg('stamp.jpg');
		imagecopy($newimage,$stamp,round($nwidth/2),round($nheight/2),0,0,60,57);
		imagepng($newimage,'upload/'.$file_name);
	}elseif($_FILES['file']['type']=='image/gif'){
		$source=imagecreatefromgif($file);
		imagecopyresized($newimage,$source,0,0,0,0,$nwidth,$nheight,$width,$height);
		$file_name=time().'.gif';
		$stamp=imagecreatefromjpeg('stamp.jpg');
		imagecopy($newimage,$stamp,round($nwidth/2),round($nheight/2),0,0,60,57);
		imagegif($newimage,'upload/'.$file_name);
	}else{
		echo "Please select only jpg, png and gif image";
	}
}
if(isset($file_name)){
	echo "<img src='upload/$file_name'/>";
}
?>
<form method="post" enctype="multipart/form-data">
	<input type="file" name="file" required>
	<input type="submit" name="submit"/>
</form>