<?php
	session_start();
	if(!isset($_SESSION["name"]) || empty($_SESSION["name"])) {
   		header( 'Location: http://localhost/test/login.php' ) ;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Home</title>
<link rel="stylesheet" type="text/css" href="myStyles.css">
<?php include 'myPHP.php';?>
</head>
<body>
<div class="container"> 
  <div class="loginBtn" align="right">
      <form method="POST" action="myPHP.php">
        <input type="submit" name="Logout" value="Log Out" class="myLogButton"/>
      </form>
  </div> 
  <img src="logo.png" />
  <div class="regContainer">
    <div class="regTopContainer"><img src="studentTop.jpg" />  </div>
    <div class="regLeftContainer"> </div>
    <div class="regRightContainer">
    <p align="right"><?php echo "Welcome ",$_SESSION["name"];?></p>
    <div align="center">
    <?php
			$S_ID=$_SESSION['S_ID'];
            $query="SELECT * FROM studentdoner INNER JOIN doner ON doner.D_Id=studentdoner.D_Id and studentdoner.S_ID='$S_ID'";
            $result = mysqli_query($conn, $query) or die('Unable to run query:' . mysqli_error());
            
            if ($result->num_rows > 0) {
            
                echo "<table>";
                echo "<tr bgcolor=#999999>";
                echo "<td width=150>Date</td>";
				echo "<td width=50>Doner</td>";
                echo "</tr>";
                
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
					echo "<td>" . $row['Date'] . "</td>";
                    echo "<td>" . $row['D_Name'] . "</td>";
                    echo "</tr>\n";
                }
                echo "</table>";
            }
		?>
        </div>
    </div>
   
  </div>
  <div class="footer">
    <p align="center">Copright Reserved &copy;</p>
  </div>
</div>
</body>
</html>