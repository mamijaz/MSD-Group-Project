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
<title>Donate</title>
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
    <div class="regTopContainer"><img src="donerTop.jpg" /> </div>
    <div class="regLeftContainer"> </div>
    <div class="regRightContainer">
    <p align="justify"><a href="donerHome.php"class=" myLogButton">Back To Home</a></p>
    <p align="right"><?php echo "Welcome ",$_SESSION["name"];?></p>
    <div align="center">
        <h3>Help By Donating 5$</h3>
		<?php
			$S_ID=$_GET['id'];
            $query="SELECT * FROM student WHERE S_ID='$S_ID' ";
            $result = mysqli_query($conn, $query) or die('Unable to run query:' . mysqli_error());
            
            if ($result->num_rows > 0) {
            	while ($row = mysqli_fetch_array($result)) {
					echo "<table>";
					echo "<tr><td>&nbsp;</td></tr>";
					echo "<tr>";
					echo "<td width=150>Name</td>";
					echo "<td>" . $row['S_Name'] . "</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td width=50>Age</td>";
					$birthday = new DateTime($row['S_Dob']);
					$age = $birthday->diff(new DateTime)->y;
					echo "<td>" . $age. "&nbsp; years</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td width=80>Monthly Income</td>";
					echo "<td>" . $row['Income'] . "&nbsp; Rs</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td width=80>Scholership Ammount</td>";
					echo "<td>1500 &nbsp; Rs</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>";
					echo "&nbsp;";
					echo "</td>";
					echo "</tr>";
					echo "<form method='post' action=''>";
                    echo "<tr>";
					echo "<td>";
					echo "Card Number";
					echo "</td>";
					echo "<td>";
					echo "<input type='text' name='Card_Number'>";
					echo "</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>";
					echo "Pin Number";
					echo "</td>";
					echo "<td>";
					echo "<input type='password' name='PIN'>";
					echo "</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>";
					echo "Expiry Date";
					echo "</td>";
					echo "<td>";
					echo "<input type='date' name='Exp'>";
					echo "</td>";
					echo "</tr>";
					echo "<tr><td>&nbsp;</td></tr>";
					echo "<tr>";
					echo "<td>&nbsp;</td>";
					echo "<td>";
					echo "<input type='reset' value=clear>";
					echo "<input type='submit' name='donate' value='Proceede Transaction'>";
					echo "</td>";
                    echo "</tr>";
					echo "</form>";
					echo "</table>";
                }
               
            }
			
			if(isset($_POST['donate'])){
				$date=date("Y/m/d") ;
				$D_ID=$_SESSION["D_ID"];
				$sql="INSERT INTO studentdoner(D_ID,S_ID,Date)VALUES($D_ID, $S_ID,'$date')";
				if ($conn->query($sql) === TRUE) {
					echo "<script type='text/javascript'>alert('Transaction Succesfull');</script>";
					header( 'Location: http://localhost/test/donerHome.php' ) ;
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
				$conn->close();
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