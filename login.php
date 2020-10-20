<?php
session_start();
require_once 'dbconnect.php';

if (isset($_SESSION['userSession'])!="") {
	header("Location: index.php");
	exit;
}

if (isset($_POST['btn-login'])) {

	$email = strip_tags($_POST['email']);
	$password = strip_tags($_POST['password']);

	$res = mysql_query("SELECT * FROM users WHERE email='$email'");
	$row = mysql_fetch_array($res);
	$count = mysql_num_rows($res);

	if(password_verify($password, $row['password']) && $count==1){
		$_SESSION['userSession'] = $row['user_id'];
		header("Location: index.php");
	} else {
		$msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
				</div>";
	}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Master Scuba</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="style.css" type="text/css" />
  </head>
  <body>
    <div class="signin-form">
      <div class="container">
        <form class="form-signin" action="login.php" method="post" id="login-form">
          <h2 class="form-signin-heading">SIGN IN</h2>
          <?php
            if(isset($msg)){
              echo $msg;
            }
          ?>
          <div class="form-group">
            <input type="email" class="form-control" placeholder="Email Address" name="email" required>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" placeholder="password" name="password" required>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
              <span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
            </button>
            <a href="register.php" class="btn btn-default" style="float:right;"> Sign Up Here</a>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
