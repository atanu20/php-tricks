<?php
require('db.php');
$msg='';
if(isset($_POST['submit'])){
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$password=mysqli_real_escape_string($con,$_POST['password']);
	
	$res=mysqli_query($con,"select id from users where email='$email' and password='$password'");
	if(mysqli_num_rows($res)){
		$row=mysqli_fetch_assoc($res);
		$id=$row['id'];
		//mysqli_query($con,"update users set status='1' where id='$id'");
		$rand_no=rand(1111111,9999999);
		mysqli_query($con,"insert into users_login(user_id,rand_no) values($id,$rand_no)");
		$_SESSION['IS_LOGIN']=true;
		$_SESSION['UID']=$id;
		$_SESSION['UID_RAND']=$rand_no;
		header('location:dashboard.php');
		die();
	}else{
		$msg="Please enter valid login details";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="robots" content="noindex, nofollow">
      <title>Login Form</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <style type="text/css">
         body {
         margin: 0;
         padding: 0;
         background-color: #17a2b8;
         height: 100vh;
         }
         #login .container #login-row #login-column #login-box {
         margin-top: 120px;
         max-width: 600px;
         height: 320px;
         border: 1px solid #9C9C9C;
         background-color: #EAEAEA;
         }
         #login .container #login-row #login-column #login-box #login-form {
         padding: 20px;
         }
         #login .container #login-row #login-column #login-box #login-form #register-link {
         margin-top: -85px;
         }    
		 .error{color:red;}
      </style>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
   </head>
   <body>
      <body>
         <div id="login">
            <div class="container">
               <div id="login-row" class="row justify-content-center align-items-center">
                  <div id="login-column" class="col-md-6">
                     <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" method="post">
                           <h3 class="text-center text-info">Login</h3>
                           <div class="form-group">
                              <label for="email" class="text-info">Email:</label><br>
                              <input type="text" name="email" id="email" class="form-control">
                           </div>
                           <div class="form-group">
                              <label for="password" class="text-info">Password:</label><br>
                              <input type="text" name="password" id="password" class="form-control">
                           </div>
                           <div class="form-group">
                              <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                           </div>
						   <span class="error"><?php echo $msg?></span>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
   </body>
   <script type="text/javascript"></script>
   </body>
</html>