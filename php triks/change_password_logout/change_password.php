<?php
require('db.php');
$msg='';
if(isset($_POST['submit'])){
	$password=mysqli_real_escape_string($con,$_POST['password']);
	$update_sql='';
	if(isset($_POST['logout'])){
		mysqli_query($con,"delete from users_login where user_id='".$_SESSION['UID']."' and rand_no!='".$_SESSION['UID_RAND']."'");
	}
	mysqli_query($con,"update users set password='$password' $update_sql where id='".$_SESSION['IS_LOGIN']."'");
	$msg="Password updated";
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="robots" content="noindex, nofollow">
      <title>Change Password</title>
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
                           <h3 class="text-center text-info">Change Password</h3>
                           
                           <div class="form-group">
                              <label for="password" class="text-info">Password:</label><br>
                              <input type="text" name="password" id="password" class="form-control">
                           </div>
						   <div class="form-group">
                              <label for="logout" class="text-info">Logout from all:</label>
                              <input type="checkbox" name="logout">
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
   
	<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/custom.js"></script>
   </body>
</html>