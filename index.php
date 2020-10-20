<?php
  session_start();
  require_once 'dbconnect.php';

  //$_SESSION['userSession'] = 5;

  //unset($_SESSION['userSession']);

  if(isset($_SESSION['userSession'])) {
    $res = mysql_query ("SELECT * FROM users WHERE user_id =".$_SESSION['userSession']);
    $userRow = mysql_fetch_array($res);
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MASTER SCUBA</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  </head>
  <body>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <img src="/masterscuba/images/masterscuba_logo.png" alt="master scuba logo" width="50px" style="float:left;">
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="navbar-brand" style="font-family:'Lucida Handwriting';">Master Scuba</li>
          <li class="active"><a href="index.php">HOME</a></li>
          <li><a href="nitrox.php">NITROX</a></li>
          <li><a href="trimix.php">TRIMIX</a></li>
          <li><a href="heliox.php">HELIOX</a></li>
          <li><a href="oxygen.php">OXYGEN</a></li>
          <li><a href="argon.php">ARGON</a></li>
          <li><a href="hydrogen.php">HYDROGEN</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php
            if(isset($userRow['username']))	{
                echo '<li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;';
                echo $userRow['username'];
                echo '</a></li>';
                echo '<li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>';
            } else {
                echo '</a></li>';
                echo '<li><a href="login.php?login"><span class="glyphicon glyphicon-log-in"></span>&nbsp; Log In</a></li>';
            }
          ?>
        </ul>
      </div>
    </div>
    </nav>
    <div class="container" style="margin-top:150px;text-align:center;font-family:Verdana, Geneva, sans-serif;font-size:35px;">
      <h1 style="color:red;">TECHINCAL DIVERS GASES</h1>
      <p>NITROX, TRIMIX, HELIOX, OXYGEN, ARGON, HYDROGEN</p>
      <img src="/masterscuba/images/tec_diver.png" alt="">
    </div>
    <div class="container" style="margin-top:150px;text-align:center;font-family:Verdana, Geneva, sans-serif;font-size:13px;">
      <p>&copy; COPYRIGHT 2017, ALL RIGHTS RESERVED | EMAIL: INFO@MASTERSCUBA.INFO</p>
    </div>
  </body>
</html>
