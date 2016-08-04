<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP Handling</title>
</head>
<body>
<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "scholarshipprograme";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 



 	if(isset($_POST['Login'])){
		if(session_id() == '' || !isset($_SESSION)) {
			session_start();
		}
		else{
			session_destroy();
			session_start();
		}

		$User_Name=$_POST["Username"];
		$Password=md5($_POST["Password"]);
		
		$Login="SELECT Password,Type,Status FROM login Where UserName='$User_Name'";
		$result = $conn->query($Login);
		
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				if($row["Password"]==$Password){
					if($row["Status"]==1){
						if($row["Type"]=='Doner'){
							$Login="SELECT D_ID,D_Name FROM doner Where UserName='$User_Name'";
							$result = $conn->query($Login);
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()){
									$_SESSION["D_ID"]=$row["D_ID"];
									$_SESSION["name"]=$row["D_Name"];
									header( 'Location: http://localhost/test/donerHome.php' ) ;
								}
							}
						}
						if($row["Type"]=='Student'){	
							$Login="SELECT S_ID,S_Name FROM student Where UserName='$User_Name'";
							$result = $conn->query($Login);
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()){
									$_SESSION["S_ID"]=$row["S_ID"];
									$_SESSION["name"]=$row["S_Name"];
									header( 'Location: http://localhost/test/studentHome.php' ) ;
								}
							}
						}
						if($row["Type"]=='Moderator'){
							$Login="SELECT M_ID,M_Name FROM moderator Where UserName='$User_Name'";
							$result = $conn->query($Login);
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()){
									$_SESSION["M_ID"]=$row["M_ID"];
									$_SESSION["name"]=$row["M_Name"];
									header( 'Location: http://localhost/test/moderatorHome.php' ) ;
								}
							}
						}	
					}
					else{
						echo "<script type='text/javascript'>alert('Your Account is not active');</script>";
						header( 'Location: http://localhost/test/login.php' ) ;
					}
				}
				else{
					echo "<script type='text/javascript'>alert('Invalid UserName or Password');</script>";
					header( 'Location: http://localhost/test/login.php' ) ;
				}
			}
		} else {
			echo "<script type='text/javascript'>alert('Invalid UserName or Password');</script>";
			header( 'Location: http://localhost/test/login.php' ) ;
		}
		$conn->close();
 	}
	if(isset($_POST['Logout'])){
		$_SESSION = array();
		if (ini_get("session.use_cookies")) {
			$params = session_get_cookie_params();
			setcookie(session_name(), '', time() - 42000,
				$params["path"], $params["domain"],
				$params["secure"], $params["httponly"]
			);
		}
		session_destroy();
		header( 'Location: http://localhost/test/index.php' ) ;
		
	}

	if(isset($_POST['createDonerAccount'])){
		$Name=$_POST['Name'];
		$Address=$_POST['Address'];
		$Nationality=$_POST['Nationality'];
		$User_Name=$_POST['User_Name'];
		$Password1=md5($_POST['Password1']);
		$sqlUser="INSERT INTO login(UserName,Password,Type,Status)VALUES('$User_Name', '$Password1','Doner',1)";
		$sqlDon = "INSERT INTO doner (D_Name, D_Address, D_Nationality, UserName)VALUES ('$Name', '$Address', '$Nationality', '$User_Name')";
		
		if ($conn->query($sqlUser) === TRUE) {
			if ($conn->query($sqlDon) === TRUE) {
				echo "<script type='text/javascript'>alert('Account Created');</script>";
				header( 'Location: http://localhost/test/login.php' ) ;
			} else {
				echo "Error: " . $sqlDon . "<br>" . $conn->error;
			}
		} else {
			echo "Error: " . $sqlUser . "<br>" . $conn->error;
		}
		$conn->close();
 	}
	
	if(isset($_POST['createModeratorAccount'])){
		$Name=$_POST['Name'];
		$Address=$_POST['Address'];
		$District=$_POST['District'];
		$Occupation=$_POST['Occupation'];
		$School=$_POST['School_Name'];
		$M_NIC=$_POST['M_NIC'];
		$User_Name=$_POST['User_Name'];
		$Password1=md5($_POST['Password1']);
		
		$sqlUser="INSERT INTO login(UserName,Password,Type,Status)VALUES('$User_Name', '$Password1','Moderator',0)";
		$sqlMod = "INSERT INTO moderator (M_Name,M_Address,M_District,M_Job,M_School,M_NIC,UserName)VALUES ('$Name','$Address','$District','$Occupation','$School',$M_NIC,'$User_Name')";
		
		if ($conn->query($sqlUser) === TRUE) {
			if ($conn->query($sqlMod) === TRUE) {
				echo "<script type='text/javascript'>alert('Account Created');</script>";
				header( 'Location: http://localhost/test/login.php' ) ;
			} else {
				echo "Error: " . $sqlMod . "<br>" . $conn->error;
			}
		} else {
			echo "Error: " . $sqlUser . "<br>" . $conn->error;
		}
		$conn->close();
 	}
	
	if(isset($_POST['createStudentAccount'])){
		$Name=$_POST['Name'];
		$Dob=$_POST['Dob'];
		$Gener=$_POST['sex'];
		$School=$_POST['School_Name'];
		$Address=$_POST['Address'];
		$District=$_POST['District'];
		$Income=$_POST['Income'];
		$Status=$_POST['Status'];
		$SNIC=$_POST['S_NIC'];
		$Relationship=$_POST['Relationship'];
		$NGuardian=$_POST['Name_Of_Gurdian'];
		$GNIC=$_POST['G_NIC'];
		$User_Name=$_POST['User_Name'];
		$Password1=md5($_POST['Password1']);
		$Bank=$_POST['Bank'];
		$Acc_Number=$_POST['Acc_Number'];

		$sqlUser="INSERT INTO login(UserName,Password,Type,Status)VALUES('$User_Name', '$Password1','Student',1)";
		
		if($Status){
			$sqlStu="INSERT INTO student(S_Name,S_Dob,S_Sex,S_School,S_Address,S_District,Income,S_Status,S_NIC,Acc_No,Acc_Bank,UserName)VALUES('$Name','$Dob','$Gener','$School','$Address','$District',$Income,$Status,$SNIC,$Acc_Number,'$Bank','$User_Name')";
		}else{
			$sqlStu="INSERT INTO student(S_Name,S_Dob,S_Sex,S_School,S_Address,S_District,Income,S_Status,RelToGuardian,G_Name,G_NIC,Acc_No,Acc_Bank,UserName)VALUES('$Name','$Dob','$Gener','$School','$Address','$District',$Income,$Status,'$Relationship','$NGuardian',$GNIC,$Acc_Number,'$Bank','$User_Name')";
		}
		if ($conn->query($sqlUser) === TRUE) {
			if ($conn->query($sqlStu) === TRUE) {
				echo "<script type='text/javascript'>alert('Account Created');</script>";
				header( 'Location: http://localhost/test/login.php' ) ;
			} else {
				echo "Error: " . $sqlStu . "<br>" . $conn->error;
			}
		} else {
			echo "Error: " . $sqlUser . "<br>" . $conn->error;
		}
		$conn->close();
	}
?>
</body>
</html>