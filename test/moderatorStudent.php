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
<title>View Student</title>
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
    <div class="regTopContainer"><img src="teacherTop.jpg" /> </div>
    <div class="regLeftContainer"> </div>
    <div class="regRightContainer">
    <p align="justify"><a href="moderatorHome.php" class=" myLogButton">Back To Home</a></p>
    <p align="right"><?php echo "Welcome ",$_SESSION["name"];?></p>
    <div align="center">
		<?php
			$S_ID=$_GET['id'];
            $query="SELECT * FROM student WHERE S_ID='$S_ID' ";
            $result = mysqli_query($conn, $query) or die('Unable to run query:' . mysqli_error());
            
            if ($result->num_rows > 0) {
            	while ($row = mysqli_fetch_array($result)) {
					echo "<table>";
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
					echo "<td width=150> Sex</td>";
					if($row['S_Sex']){
						echo "<td>Male</td>";
					}else{
						echo "<td>Female</td>";
					}
					echo "</tr>";
					echo "<tr>";
					echo "<td width=150> School</td>";
					echo "<td>" . $row['S_School'] . "</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td width=150> District</td>";
					echo "<td>" . $row['S_District'] . "</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td width=80>Monthly Income</td>";
					echo "<td>" . $row['Income'] . "&nbsp; Rs</td>";
					echo "</tr>";
					if($row['S_Status']){
						echo "<tr>";
						echo "<td>NIC</td>";
						echo "<td>" . $row['S_NIC'] . "</td>";
						echo "</tr>";
					}else{
						echo "<tr>";
						echo "<td>Guardian Name</td>";
						echo "<td>" . $row['G_Name'] . "</td>";
						echo "</tr>";
						echo "<tr>";
						echo "<td>Guardian NIC</td>";
						echo "<td>" . $row['G_NIC'] . "</td>";
						echo "</tr>";
						echo "<tr>";
						echo "<td>Relationship to Guardian </td>";
						echo "<td>" . $row['RelToGuardian'] . "</td>";
						echo "</tr>";
					}
					echo "<tr><td>&nbsp;</td></tr>";
                    echo "<tr>";
					echo "<td>";
					echo "<form method='post' action=''>";
					echo "<input type='submit' name='verify' value='Verify'>";
					echo "</form>";
					echo "</td>";
                    echo "</tr>";
					echo "</table>";
                }
            }
			
			if(isset($_POST['verify'])){
				$M_ID=$_SESSION["M_ID"];
				$sql="UPDATE student SET M_ID=$M_ID WHERE S_ID=$S_ID";
				if ($conn->query($sql) === TRUE) {
					echo "<script type='text/javascript'>alert('Student Verified');</script>";
					header( 'Location: http://localhost/test/moderatorHome.php' ) ;
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