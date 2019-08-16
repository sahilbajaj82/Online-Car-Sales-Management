<?php 
session_start();
include('includes/config.php');
error_reporting(0);
?>
<!DOCTYPE  HTML>
	<html lang="en">
	<title>BUY CARS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey w3-content" style="max-width:1600px">
<body>    
<?php include('includes/header.php') ?>
<!--header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <img class="w3-image" src="assets/images/hrrr.jpg" width="1500" height="800">
  <div class="w3-display-middle w3-margin-top w3-center">
    <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>VW</b></span> <span class="w3-hide-small w3-text-light-grey">Volkswagen</span></h1>
  </div-->
</header>
<br></br>
<?php
   $sql = "select * from car_model";
    $query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0) {
      foreach($results as $result) {
		$var = $result->Model_ID;
		$var=$var.'.jpg';
  ?>
	<div class="w3-row-padding">
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="assets/images/<?php echo htmlentities($var)?>" alt="Norway" style="width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
      </div>
    </div>
  <!--header class="w3-display-container w3-content w3-wide" style="max-width:1000px;" id="home">
  <img class="w3-image" src="assets/images/<?php //echo htmlentities($var)?>" width="1500" height="800"-->
  <option>Brand_Name: <?php echo htmlentities($result->Brand_Name);?> </option>
  <option>Model_ID:  <?php echo htmlentities($result->Model_ID);?> </option>
  <option> Model_Name:  <?php echo htmlentities($result->Model_Name);?> </option>
  <option> Body_Style: <?php echo htmlentities($result->Body_Style);?> </option>
  <option>Model Year: <?php echo htmlentities($result->Model_Year);?> </option>
  <br></br>

  <form action = "model.php" method ="post">
  <td>Check Options and Dealers</td>
  <td><select name="model">
  <option> <?php echo htmlentities($result->Model_ID);?> </option>
  </select>
  <input type = "Submit" value = " Submit " /><br />
  </form>
  <?php
     }} 
	  //header("location: login2.php");
?>
</body>
</html>