<?php
session_start();
if (isset($_SESSION['userSession'])!="") {
	header("Location: index.php");
}
require_once 'dbconnect.php';

if(isset($_POST['btn-signup'])) {

	$username = strip_tags($_POST['username']);
	$email = strip_tags($_POST['email']);
	$password = strip_tags($_POST['password']);

	$hashed_password = password_hash($password, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version

	$res = mysql_query("SELECT email FROM users WHERE email='$email'");
	$row = mysql_fetch_array($res);
	$count = mysql_num_rows($res);

	if ($count==0) {
		if($username !== '' && $email !== '' && $password !== '') {
			$query = mysql_query("INSERT INTO users(username,email,password) VALUES('$username','$email','$hashed_password')");
			$query1 = mysql_query("SELECT user_id FROM users WHERE email='$email'");
			$row = mysql_fetch_array($query1);
			$_SESSION['userSession'] = $row['user_id'];
			header("Location: index.php");
		}	else {
			$msg = "<div class='alert alert-danger'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; All fields are required !
					</div>";
		}
	} else {
		$msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken !
				</div>";

	}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MASTER SCUBA</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="style.css" type="text/css" />
  </head>
  <body>
    <div class="signin-form">
      <div class="container">
        <form class="form-signin" method="post" id="register-form">
          <h2 class="form-signin-heading">Sign Up</h2>
          <?php
            if (isset($msg)) {
              echo $msg;
            }
          ?>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="username" name="username" required>
          </div>
          <div class="form-group">
            <input type="email" class="form-control" placeholder="email" name="email" required>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" placeholder="password" name="password" required>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-signup">
                <span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account
            </button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
