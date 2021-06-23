<?php
include('db.php');
if(isset($_GET['alias'])){
	$alias=mysqli_real_escape_string($con,$_GET['alias']);
	$row=mysqli_query($con,"select file from files where alias='$alias'");
	if(mysqli_num_rows($row)>0){
		$_SESSION['alias']=$_GET['alias'];
	}else{
		die('Something went wrong');
	}
}else{
	die('Something went wrong');
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="robots" content="noindex, nofollow">
      <title>Download Source Code</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet" id="bootstrap-css">
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
   </head>
   <body>
      <form method="post" id="frmDownload">
         <label>
            <p class="label-txt">ENTER YOUR NAME</p>
            <input type="text" class="input" name="name" required>
            <div class="line-box">
               <div class="line"></div>
            </div>
         </label>
         <label>
            <p class="label-txt">ENTER YOUR EMAIL</p>
            <input type="text" class="input" name="email" required>
            <div class="line-box">
               <div class="line"></div>
            </div>
         </label>
         <button type="submit" id="btnDownload">Download</button>
		 <div id="msg"></div>
      </form>
	  
	  <script>
	  jQuery('#frmDownload').on('submit',function(e){
			e.preventDefault();
			jQuery.ajax({
				url:'submit.php',
				type:'post',
				data:jQuery('#frmDownload').serialize(),
				success:function(result){
					result=jQuery.parseJSON(result);
					if(result.status=='success'){
						window.location.href='download.php';
					}else{
						jQuery('#msg').html('Please try after sometime');
					}
				}
			});
	  });
	  </script>
   </body>
</html>