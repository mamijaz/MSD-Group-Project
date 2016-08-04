<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Participate</title>
<link rel="stylesheet" type="text/css" href="myStyles.css">
</head>
<body>
<div class="container">
  <div class="loginBtn" align="right">
    <input type="button" class="myLogButton name="Login" value="Login" onclick="window.location='login.php'"/>
  </div>
  <img src="logo.png" />
   <div class="naviBtn" align="center">
    <input type="submit" name="Home" value="Home" onClick="window.location='index.php' " class="myNaviButton" />
    <input type="submit" name="Participate" value="Participate" class="myNaviButton" />
    <input type="submit" name="About Us" value="About Us" onClick="window.location='AboutUs.php' " class="myNaviButton" />
    <input type="submit" name="Impact" value="Impact" onClick="window.location='impact.php' " class="myNaviButton" />
  </div>
  <img name="slide"  class="imageMain" src="Participate.jpg"/>
  <div class="participateInfContainer">
    <div class="participateLeftContainer"> 
    	<img src="Student.png" class="participateImage"/>
        <h4>Need Help?</h4>
        <p>Are you Needing any scholership? then join the community and get helped. its really simple just craete an account then after validation, when a Doner interested in you, youl be conneced to him.</p>
        <input type="submit" name="Student" value="Join Us" onClick="window.location='studentRegistration.php' " class="myPartButton" />
    </div>
    <div class="participateCenterContainer" >
    	<img src="Doner.png" class="participateImage"/>
        <h4>Like to Donate?</h4>
        <p>Would you like to serve the human kind? then join us, be a part of our doners. your donations could make big diference in their life. Support the School childrens of your own choice.</p>
        <input type="submit" name="Doner" value="Join Us" onClick="window.location='donerRegistration.php' " class="myPartButton" />
    </div>
    <div class="participateRightContainer">
    	<img src="Teacher.png" class="participateImage"/>
        <h4>Help them to Connect</h4>
        <p>Want to help us?, then help Us to verify the Students. verify the students so the doners could actually help real students who are in need. Be a part of our community of teachers and principals.</p>
        <input type="submit" name="Moderator" value="Join Us" onClick="window.location='moderatorRegistration.php' " class="myPartButton" />
    </div>
  </div>
  <div class="footer">
    <p>Copright Reserved &copy;</p>
  </div>
</div>
</body>
</html>