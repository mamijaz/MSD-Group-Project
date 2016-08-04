<?php
	if( isset($_SESSION)){
		echo $_SESSION["Username"];;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
<link rel="stylesheet" type="text/css" href="myStyles.css">
<script>
		$(function() {
			$(".slideshow > div:gt(0)").hide();
			setInterval(function() {
			  $('.slideshow > div:first')
			    .fadeOut(1000)
			    .next()
			    .fadeIn(1000)
			    .end()
			    .appendTo('#slideshow');
			},  3000);

		});
</script>
</head>
<body>
<div class="container">
  <div class="loginBtn" align="right">
    <input type="button" class="myLogButton name="Login" value="Login" onclick="window.location='login.php'"/>
  </div>
  <img src="logo.png" />
  <div class="naviBtn" align="center">
    <input type="submit" name="Home" value="Home" class="myNaviButton" />
    <input type="submit" name="Participate" value="Participate" onClick="window.location='participate.php' " class="myNaviButton" />
    <input type="submit" name="About Us" value="About Us" onClick="window.location='AboutUs.php' " class="myNaviButton" />
    <input type="submit" name="Impact" value="Impact" onClick="window.location='impact.php' " class="myNaviButton" />
  </div>
  <script language="JavaScript">
        var i = 0;
        var path = new Array();
        path[0] = "1.jpg";
        path[1] = "2.jpg";
        path[2] = "3.jpg";
        function swapImage()
        {
           document.slide.src = path[i];
           if(i < path.length - 1) i++;
           else i = 0;
           setTimeout("swapImage()",3000);
        }
        window.onload=swapImage;
    </script> 
  <img name="slide"  class="imageMain" src="1.jpg"/>
  <div class="homeInfContainer">
    <div class="homeLeftContainer">
      <h4 class="h4Home">Help us to send the children back to school</h4>
      <p class="pHome">Every child deserves quality education, help us achieve our target of providing all sri lankan students with quality education. </p>
      <p class="pHome">Help us by donating to children of your preferance, after hearing their story.</p>
    </div>
    <div class="homeCenterContainer" >
      <h4 class="h4Home">Feels good to give</h4>
      <p class="pHome">We have managed to raise funds and help about 500 students within 6 months. We are delighted to hear and inform you that 20 students have passed AL examination with 5 of them getting admitted to local universities.</p>
    </div>
    <div class="homeRightContainer">
      <h4 class="h4Home">Hear the success story of Aqeel</h4>
      <p class="pHome">Aqeel was a talented student in school but he had to give up schooling as he had to work full time. A friend of his introduced him to our services and after that he saw a silver lining amidst his clouded path.</p>
      <p class="pHome">We managed to finance him with the generous funding of our donors. He passed AL examination with flying colors and was admitted to the University of Moratuwa where he got into the Biomedical engineering stream </p>
    </div>
  </div>
  <div class="footer">
    <p>Copright Reserved &copy;</p>
  </div>
</div>
</body>
</html>
