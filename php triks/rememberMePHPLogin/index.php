<?php
session_start();
$msg="";
if(isset($_POST['submit'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	if($username=='vishal' && $password=='vishal@1'){
		if(isset($_POST['remember'])){
			setcookie('username',$username,time()+60*60*24*365);
			setcookie('password',$password,time()+60*60*24*365);
		}else{
			setcookie('username',$username,30);
			setcookie('password',$password,30);
		}
		$_SESSION['IS_LOGIN']='yes';
		header('location:dashboard.php');
		die();
	}else{
		$msg="Please enter valid login details";
	}
}

$username_cookie='';
$password_cookie='';
$set_remember="";
if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
	$username_cookie=$_COOKIE['username'];
	$password_cookie=$_COOKIE['password'];
	$set_remember="checked='checked'";	
}

?>

<!DOCTYPE html>
<html>
   <head>
      <title>Login Page</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
      <!--Custom styles-->
      <link rel="stylesheet" type="text/css" href="styles.css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   </head>
   <body>
      <div class="container">
         <div class="d-flex justify-content-center h-100">
            <div class="card">
               <div class="card-header">
                  <h3>Sign In</h3>
               </div>
               <div class="card-body">
                  <form method="post">
                     <div class="input-group form-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="username" name="username" value="<?php echo $username_cookie?>">
                     </div>
                     <div class="input-group form-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="password" name="password"  value="<?php echo $password_cookie?>">
                     </div>
                     <div class="row align-items-center remember">
                        <input type="checkbox" name="remember" <?php echo $set_remember?>>Remember Me
                     </div>
                     <div class="form-group">
                        <input type="submit" name="submit" value="Login" class="btn float-right login_btn">
                     </div>
                  </form>
				  <span class="field_error"><?php echo $msg?></span>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>