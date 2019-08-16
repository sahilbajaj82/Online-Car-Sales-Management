<?php 
session_start();
include('includes/config.php');
error_reporting(0);
?>

<!DOCTYPE  HTML>
	<html lang="en">
	<title>model</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>    
	<?php include('includes/header.php') ?>
  <?php $var=$_POST['model'];
  $var2=$var;
  $var=$var.'.jpg'; 
  ?>
  <br>
  <div class="w3-row-padding">
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="assets/images/<?php echo htmlentities($var)?>" alt="Norway" style="width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
      </div>
    </div>
  <?php
  $sql = "SELECT * from vehicles natural join options where model_id='$var2'";
    $query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;

    if($query->rowCount() > 0) {
      foreach($results as $result) {

  ?>  
  <option> VIN:<?php echo htmlentities($result->VIN);?> </option>
  <option> Model ID:<?php echo htmlentities($result->Model_ID);?> </option>
  <option> Engine:<?php echo htmlentities($result->Engine);?> </option>
  <option> Transmission:<?php echo htmlentities($result->Transmission);?> </option>
  <option> Colour:<?php echo htmlentities($result->Colour);?> </option>
  <option> Option ID:<?php echo htmlentities($result->Option_ID);?> </option>
  <option> Inventory ID:<?php echo htmlentities($result->Inventory_ID);?> </option>
  <option> On-Road Price:<?php echo htmlentities($result->Price);?> </option>
  Status :
  <?php if($result->OwnedCustomer_ID==NULL) {
	  echo UNSOLD;
    ?> <br> <br>
	<form action = "register.php" method ="post">
	<td>BUY FROM</td>
	<td><select name="d_id">
	<?php
    //echo "Available Dealers:";
  $_SESSION['ppp']=$result->Price;
	$_SESSION['i_id']=$result->Inventory_ID;
	$_SESSION['mid']=$result->Model_ID;
   $_SESSION['vin']=$result->VIN;
    $sql3 = "SELECT * from dealer_inventory natural join inventory natural join dealer where inventory_id='$result->Inventory_ID'";
    $query3 = $dbh -> prepare($sql3);
    $query3->execute();
    $results3=$query3->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query3->rowCount() > 0) {
      foreach($results3 as $result3) {  
  ?>  
    <option><?php echo htmlentities($result3->Dealer_ID);?> </option>
    
    <br>

  <?php
  }
  }
  ?>
   </select>
   <nr>
   <a> VIN <a>
    <td><select name="vinn">
       <option><?php echo htmlentities($result->VIN);?> </option>
     </select>
     <br>
  <input type = "Submit" value = " Submit " /><br />
  </form>
  <?php
  }

  else { 
    echo SOLD;
  }
  ?>

  <br><br>
  <?php
     }} 
  ?>
</div>
  <?php include('includes/footer.php') ?>
  </body>
  </html>