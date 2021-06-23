<?php
$msg="";
if(isset($_POST['submit'])){
	$fileName=$_FILES['file']['name'];
	$fileNameArr=explode(".",$fileName);
	if($fileNameArr[count($fileNameArr)-1]=='zip'){
		$fineName=$fileNameArr[0];
		$zip=new ZipArchive();
		if($zip->open($_FILES['file']['tmp_name'])===TRUE){
			$rand=rand(111111111,999999999);
			$zip->extractTo("upload/$rand/");
			$zip->close();
			$files=scandir("upload/$rand/$fineName/");
			foreach($files as $list){
				if(strlen($list)>4){
					$msg.="<div class='col-lg-4'><img style='width:100%' src='upload/$rand/$fineName/$list'/></div>";
				}
			}
		}else{
			$msg="Semething went wrong";
		}
	}else{
		$msg="Please select zip file";
	}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload and Extract a Zip File in PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<br/><br/>
    <div class="container">
		<div class="row">
			<div class="col-lg-12">
				<form method="post" enctype="multipart/form-data">
					<input type="file" name="file" required/>
					<input type="submit" name="submit"/>
				</form>
			</div>	
			<div class="col-lg-12">
				<div class="row">
					<?php
						echo $msg;
					?>
				</div>
			</div>
		</div>
	</div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </body>
</html>