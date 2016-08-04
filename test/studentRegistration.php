<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Registration</title>
<link rel="stylesheet" type="text/css" href="myStyles.css">
<?php include 'myPHP.php';?>
<script language='javascript' type='text/javascript'>
	function validatePassword(input) {
		if (input.value != document.getElementById('Password1').value) {
			input.setCustomValidity('Password Must be Matching.');
		} else {
			input.setCustomValidity('');
		}
	}
</script>
<script language='javascript' type='text/javascript'>
	function Major()
	{
		document.getElementsByClassName("Major")[0].style.display = "";
		var elements = document.getElementsByClassName("Minor");
		for (var i = 0; i < elements.length; i ++) {
			elements[i].style.display = "none";
		}
	}
	function Minor()
	{	
		document.getElementsByClassName("Major")[0].style.display = "none";
		var elements = document.getElementsByClassName("Minor");
		for (var i = 0; i < elements.length; i ++) {	
			elements[i].style.display = "";
		}
	}
	window.onload = Major;
</script>
</head>
<body>
<div class="container"> <img src="logo.png" />
  <div class="regContainer">
    <div class="regTopContainer"><img src="studentTop.jpg" /> </div>
    <div class="regLeftContainer"> </div>
    <div class="regRightContainer">
      <h3 class="h3RegForm">Student Registration Form</h3>
      <form method="post" class="regForme" action="myPHP.php">
        <table>
          <tr>
            <td width="250">Name</td>
            <td colspan="2"><input type="text" name="Name" maxlength="50" size="40" required="required"/></td>
          </tr>
          <tr>
            <td>Date of birth</td>
            <td><input type="date" name="Dob" min="1990-1-1" required="required"/></td>
          </tr>
          <tr>
            <td>Gender</td>
            <td><input type="radio" name="sex" value="1" checked="checked" />
              Male&nbsp;&nbsp;<input type="radio" name="sex" value="0" />Female</td>
          </tr>
          <tr>
            <td>Address</td>
            <td><textarea name="Address" rows="3" cols="40" required="required"></textarea required></td>
          </tr>
          <tr>
            <td>District</td>
            <td><select name="District">
                <option value="Ampara"> Ampara </option>
                <option value="Anuradhapura">Anuradhapura</option>
                <option value="Badulla">Badulla</option>
                <option value="Batticaloa">Batticaloa</option>
                <option value="Colombo">Colombo</option>
                <option value="Galle">Galle</option>
                <option value="Gampaha">Gampaha</option>
                <option value="Hambantota">Hambantota</option>
                <option value="Jaffna">Jaffna</option>
                <option value="Kalutara">Kalutara</option>
                <option value="Kandy">Kandy</option>
                <option value="Kegalle">Kegalle</option>
                <option value="Kilinochchi">Kilinochchi</option>
                <option value="Kurunegala">Kurunegala</option>
                <option value="Mannar">Mannar</option>
                <option value="Matale">Matale</option>   
                <option value="Matara">Matara</option>
                <option value="Moneragala">Moneragala</option>
                <option value="Mullaitivu	">Mullaitivu	</option>
                <option value="Nuwara Eliya">Nuwara Eliya</option>
                <option value="Polonnaruwa">Polonnaruwa	</option>
                <option value="Puttalam">Puttalam</option>
                <option value="Ratnapura">Ratnapura</option>
                <option value="Trincomalee">Trincomalee</option>
                <option value="Vavuniya">Vavuniya</option>
              </select></td>
          </tr>
          <tr>
            <td>School</td>
            <td colspan="2"><input type="text"  name="School_Name" size="40" required="required"/></td>
          </tr>
          <tr>
            <td>Income Of Family</td>
            <td><input type="number" name="Income" required="required"/></td>
          </tr>
          <tr>
            <td>Have NIC</td>
            <td><input type="radio" name="Status" value="1" checked="checked" onchange="Major()"/>
              Yes&nbsp;&nbsp;<input type="radio" name="Status" value="0" onchange="Minor()"/>No</td>
          </tr>
          <tr class="Major">
            <td>NIC</td>
            <td><input type="text" name="S_NIC" maxlength="12" /></td>
          </tr>
          <tr class="Minor">
          	<td>Relationship to Gurdian</td>
            <td><select name="Relationship">
                <option value="Father">Father</option>
                <option value="Mother">Mother</option>
                <option value="Mother">Other</option>
              </select></td>
          </tr>
          <tr class="Minor">
          	<td>Name Of Gurdian</td>
            <td colspan="2"><input type="text" name="Name_Of_Gurdian" maxlength="50" size="40"/></td>
          </tr>
          <tr class="Minor">
          	<td>NIC Of Gurdian</td>
            <td><input type="text" name="G_NIC" maxlength="12" /></td>
          </tr>
          <tr>
            <td>Choose a User Name</td>
            <td><input type="text" name="User Name" maxlength="50" required="required"/></td>
          </tr>
          <tr>
            <td>Choose a Password</td>
            <td><input type="password" name="Password1" id="Password1" maxlength="50" required="required"/></td>
          </tr>
           <tr>
            <td>Re-type the Password</td>
            <td><input type="password" name="Password2" id="Password2" maxlength="50" required="required" oninput="validatePassword(this)"/></td>
          </tr>
          <tr>
            <td>Bank</td>
            <td><select name="Bank">
                <option value="BOC">Bank Of Ceylon</option>
                 <option value="Peoples Bank">Peoples Bank</option>
                <option value="Commercial">Commercial Bank PLC</option>
                <option value="HNB">Hatton National Bank PLC</option>
                <option value="Seylan">Seylan Bank PLC</option>
              </select></td>
          </tr>
          <tr>
            <td>Account Number</td>
            <td><input type="number" name="Acc_Number"  required="required"/></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input type="reset" name="Clear" value="Clear">
              <input type="submit" name="createStudentAccount" value="Create Account"></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
  <div class="footer">
    <p>Copright Reserved &copy;</p>
  </div>
</div>
</body>
</html>