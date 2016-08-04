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
<title>Doner Home</title>
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
    <p align="right"><?php echo "Welcome ",$_SESSION["name"];?></p>
    <div align="center">
    	<div class="donHomeTopContainer">
        <h4>Students In Need</h4>
		<?php
            $query="SELECT * FROM student WHERE M_ID IS NOT NULL AND S_ID NOT IN (SELECT S_ID FROM studentdoner WHERE Date> (now() - interval 1 month)) ";
            $result = mysqli_query($conn, $query) or die('Unable to run query:' . mysqli_error());
            
            if ($result->num_rows > 0) {
            
                echo "<table>";
                echo "<tr bgcolor=#999999>";
                echo "<td width=150>Name</td>";
				echo "<td width=50>Age</td>";
                echo "<td width=150> School</td>";
				echo "<td width=150> District</td>";
                echo "<td width=80>Monthly Income</td>";
                echo "</tr>";
                
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['S_Name'] . "</td>";
					$birthday = new DateTime($row['S_Dob']);
					$age = $birthday->diff(new DateTime)->y;
					echo "<td>" . $age. "</td>";
                    echo "<td>" . $row['S_School'] . "</td>";
					echo "<td>" . $row['S_District'] . "</td>";
                    echo "<td>" . $row['Income'] . "</td>";
					echo "<td>";
					echo '<a href="donerStudent.php?id='.$row['S_ID'].'">View Student</a>';;
					echo "</td>";
                    echo "</tr>\n";
                }
                echo "</table>";
            }
		?>
        </div>
        <div class="donHomeBotContainer" align="left" >
        <h4 align="center">Your Good Deeds</h4>
        <?php
			$D_ID=$_SESSION["D_ID"];
			$query="SELECT * FROM student INNER JOIN studentdoner ON student.S_Id=studentdoner.S_Id  and studentdoner.D_ID='$D_ID' ";
            $result = mysqli_query($conn, $query) or die('Unable to run query:' . mysqli_error());
			 if ($result->num_rows > 0) {
            
                echo "<table>";
                echo "<tr bgcolor=#999999>";
                echo "<td width=150>Name</td>";
				echo "<td width=150> Address</td>";
                echo "<td width=80>Monthly Income</td>";
				echo "<td width=80>Date</td>";
                echo "</tr>";
                
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['S_Name'] . "</td>";
                    echo "<td>" . $row['S_Address'] . "</td>";
					echo "<td>" . $row['Income'] . "</td>";
                    echo "<td>" . $row['Date'] . "</td>";
                    echo "</tr>\n";
                }
                echo "</table>";
            }
        ?>
        </div>
      </div>
    </div>
  </div>
  <div class="footer">
    <p align="center">Copright Reserved &copy;</p>
  </div>
</div>
</body>
</html>