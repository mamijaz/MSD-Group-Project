<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Doner Registration</title>
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
    <div class="regTopContainer"><img src="donerTop.jpg" /> </div>
    <div class="regLeftContainer"> </div>
    <div class="regRightContainer">
      <h3 class="h3RegForm">Donor Registration Form</h3>
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
            <td>Nationality</td>
            <td><select name="Nationality">
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="India">India</option>
                </select></td>
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
              <input type="submit" name="createDonerAccount" value="Create Account"></td>
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