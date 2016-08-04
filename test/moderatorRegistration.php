<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Moderator Registration</title>
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
</head>
<body>
<div class="container"> <img src="logo.png" />
  <div class="regContainer">
    <div class="regTopContainer"><img src="teacherTop.jpg" /> </div>
    <div class="regLeftContainer"> </div>
    <div class="regRightContainer">
      <h3 class="h3RegForm">Moderator Registration Form</h3>
      <form method="post" class="regForme" action="myPHP.php" >
        <table>
          <tr>
            <td>Name</td>
            <td colspan="2"><input type="text" name="Name" maxlength="50" size="40" required="required"/></td>
          </tr>
          <tr>
            <td>Address</td>
            <td><textarea name="Address" rows="3" cols="40" required="required"></textarea></td>
          </tr>
          <tr>
            <td>NIC</td>
            <td><input type="text" name="M_NIC" maxlength="12" /></td>
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
            <td>Occupation</td>
            <td><select name="Occupation">
                <option value="Principal">Principal</option>
                <option value="Teacher">Teacher</option>
                </select></td>
          </tr>
          <tr>
            <td>School</td>
            <td colspan="2"><input type="text" name="School_Name" maxlength="50" size="40" required="required"/></td>
          </tr>
          <tr>
            <td>Choose a User Name</td>
            <td><input type="text" name="User_Name" maxlength="50" id="UserName"  required="required"/></td><td><span id="status"></span></td>
          </tr>
          <tr>
            <td>Choose a Password</td>
            <td><input name="Password1" id="Password1" type="password"  maxlength="50" required="required"/></td>
          </tr>
          <tr>
            <td>Re-type the Password</td>
            <td><input name="Password2" id="Password2" type="password"  maxlength="50" required="required" oninput="validatePassword(this)"/></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input type="reset" name="Clear" value="Clear">
              <input type="submit" name="createModeratorAccount" value="Create Account"></td>
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