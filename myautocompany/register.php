<?php 
session_start();
include('includes/config.php');
error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>
<?php
    
  $in_id=$_SESSION['i_id'];
  $m_id=$_SESSION['mid'];
  $vin2=$_SESSION['vin'];
  $oop=$_SESSION['ppp'];
   $ddd=$_POST['d_id'];
   $_SESSION['ppp']=$ppp;
  $_SESSION['i_id']=$i_id;
  $_SESSION['m_id']=$m_id;
   $_SESSION['vin2']=$vin2; 
?>
<form action="update1.php" method="post">
  <div class="container">
    <h1>Already a Customer</h1>
    <p>Enter your Customer ID.</p>
  <a>VIN</a>
    <td><select name="viin">
       <option><?php echo htmlentities($_POST['vinn']);?> </option>
     </select>
     <br>
    <a>Dealer_ID</a>
    <td><select name="d_id">
       <option><?php echo htmlentities($ddd);?> </option>
     </select>
     <br>
    <label><b>Customer ID</b></label>
    <input type="text" name="cid" required>
  <button type="submit" class="registerbtn">Login</button>
  </div>
</form>

<form action="update.php" method="post">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to buy car.</p>
    <hr>
    <a>VIN</a>
    <td><select name="viin">
       <option><?php echo htmlentities($_POST['vinn']);?> </option>
     </select>
     <br>
    <a>Dealer_ID</a>
    <td><select name="d_id">
       <option><?php echo htmlentities($ddd);?> </option>
     </select>
     <br>
    <label><b>Name</b></label>
    <input type="text" name="nm" required>

    <label><b>Address</b></label>
    <input type="text" name="add" required>

    <label><b>Gender</b></label>
    <input type="text" name="Gen" required>
	<label><b>Annual Income</b></label>
    <input type="text" name="ain" required>
	<label><b>Phone</b></label>
	<input type="text" name="ph" required>
    <a href="brand.php">BACK</a>

    <button type="submit" class="registerbtn">Register</button>
  </div>
</form>

</body>
</html>
