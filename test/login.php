<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Log In</title>
<link rel="stylesheet" type="text/css" href="myStyles.css">
<?php include 'myPHP.php';?>
</head>
<body>
<div class="container">
  <div class="loginBtn" align="right"></div>
  <img src="logo.png" />
  <h4 align="center">Log in to your account</h4>
  <div  class="login" align="center">
    <form method="post" action="myPHP.php">
      <a>
      <input type="text" class="txtBox" name="Username" value="" placeholder="Username">
      </a> <a>
      <input type="Password" class="txtBox" name="Password" value="" placeholder="Password">
      </a>
      <div class="loginPageButtons">
        <input type="reset" name="Clear" value="Clear">
        <input type="submit" name="Login" value="Login">
      </div>
    </form>
  </div>
  <p align="center">Are you still not a member? &nbsp;<a href="participate.php">Click Heare</a></p>
  <img name="slide"  class="imageMain" src="LogIn.jpg"/>
  <div class="footer">
    <p align="center">Copright Reserved &copy;</p>
  </div>
</div>
</body>
</html>