<?php 
session_start();
include('includes/config.php');
error_reporting(0);
?>
<!DOCTYPE  HTML>
	<html lang="en">
	<title>Marketing</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
</style>
<body>    
<?php include('includes/header1.php'); ?>
<br>
Search Cars Sold by Brands
<div>
<form action = "" method ="post">
	<td>Brand</td>
	<td><select name="brand">
	<?php 
		$sql = "SELECT Brand_Name as brand from brand";
		$query = $dbh -> prepare($sql);
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		$cnt=1;
		if($query->rowCount() > 0) {
			foreach($results as $result) {  
	?>  
	<option> <?php echo htmlentities($result->brand);?> </option>option>
	<?php
		 }} 
	?>

	</select>
	<input type = "Submit" value = " Submit " /><br />
	</form>
</div>
<?php
	if(isset($_POST['brand'])) {

 	$var=$_POST['brand']; ?>
   <option> Showing Result for this Brand: <?php echo htmlentities($var);?> </option>
   <br>
   <?php
   $sql = "SELECT * from sales natural join customer where VIN in (select VIN from Vehicles where Model_ID in (select Model_ID from car_model where brand_Name='$var')) group by gender";
    $query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0) {
      foreach($results as $result) {
  ?> 

  <?php 
  			$sql2 = "SELECT * from Vehicles natural join car_model where VIN='$result->VIN'";
    $query2 = $dbh -> prepare($sql2);
    $query2->execute();
    $results2=$query2->fetchAll(PDO::FETCH_OBJ);
    foreach($results2 as $result2) {
		$var = $result2  ->Model_ID;
		$var=$var.'.jpg';
  ?>
  <div class="w3-row-padding">
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="assets/images/<?php echo htmlentities($var)?>" alt="Norway" style="width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
      </div>
    </div>

  <option> Model Name:<?php echo htmlentities($result2->Model_Name);?> </option>
<?php } ?>
  <option> VIN:<?php echo htmlentities($result->VIN);?> </option>
  <option> Customer Name:<?php echo htmlentities($result->Name);?> </option>
  <option> Customer Id: <?php echo htmlentities($result->Customer_ID);?> </option>
  <option> Sale Date:<?php echo htmlentities($result->Sales_Date);?> </option>
  <option> Price:<?php echo htmlentities($result->Price);?> </option>
  SOLD BY:<br>
  <?php
  	$sql3 = "SELECT * from Sales where VIN='$result->VIN'";
    $query3 = $dbh -> prepare($sql3);
    $query3->execute();
    $results3=$query3->fetchAll(PDO::FETCH_OBJ);
    if($query3->rowCount() > 0) {
      foreach($results3 as $result3) {
  ?> 
  	<option> Dealer_ID:<?php echo htmlentities($result3->Dealer_ID);?> </option>
    
    <?php }} 
	  //header("location: login2.php");
   }}}
?>
</div>
<br> TOP BRANDS SOLD (in Rupees)</br>
<?php $sql = "SELECT M.Brand_Name as brand,SUM(price) as sales_in_rupees from Sales S,Vehicles V natural join Car_Model M where S.VIN=V.VIN group by M.Brand_Name order by sales_in_rupees desc limit 2";
	$query = $dbh -> prepare($sql);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	$cnt=1;
	if($query->rowCount() > 0)
	{
		foreach($results as $result)
		{  
			?>  
				<?php echo htmlentities($result->brand);
				?> 
				<?php echo htmlentities($result->sales_in_rupees);
				?>
				<br>
		<?php }
	}?>
<br> TOP BRANDS SOLD (in Quantity)</br>
<?php $sql = "SELECT M.Brand_Name as brand,count(sales_date) as sales_in_units from Sales S,Vehicles V natural join Car_Model M where S.VIN=V.VIN group by M.Brand_Name order by sales_in_units desc limit 2";
	$query = $dbh -> prepare($sql);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	$cnt=1;
	if($query->rowCount() > 0)
	{
		foreach($results as $result)
		{  
			?>  
				<?php echo htmlentities($result->brand);
				?> 
				<?php echo htmlentities($result->sales_in_units);
				?>
				<br>
		<?php }
	}?>
<br> TOP Models SOLD (in Quantity)</br>
<?php $sql = "SELECT Model_Name as model,count(sales_date) as sales_in_units from Sales S,Vehicles V natural join car_model where S.VIN=V.VIN group by Model_ID order by sales_in_units desc limit 2";
	$query = $dbh -> prepare($sql);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	$cnt=1;
	if($query->rowCount() > 0)
	{
		foreach($results as $result)
		{  
			?>  
				<?php echo htmlentities($result->model);
				?> 
				<?php echo htmlentities($result->sales_in_units);
				?>
				<br>
		<?php }
	}?>
<br> TOP Models SOLD (in Rupees)</br>
<?php $sql = "SELECT Model_Name as model,sum(S.price) as sales_in_units from Sales S,Vehicles V natural join car_model where S.VIN=V.VIN group by Model_ID order by sales_in_units desc limit 2";
	$query = $dbh -> prepare($sql);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	$cnt=1;
	if($query->rowCount() > 0)
	{
		foreach($results as $result)
		{  
			?>  
				<?php echo htmlentities($result->model);
				?> 
				<?php echo htmlentities($result->sales_in_units);
				?>
				<br>
		<?php }
	}?>
	<br>
	Search Cars by Defective Parts by supply_date
<div>
<form id='myform' action = "" method ="post" target='formresponse'>
	<td>Part_Type</td>
	<td><select name="part">
	<?php 
		$sql = "SELECT distinct Part_Type as p from parts";
		$query = $dbh -> prepare($sql);
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		$cnt=1;
		if($query->rowCount() > 0) {
			foreach($results as $result) {  
	?>  
	<option> <?php echo htmlentities($result->p);?> </option>
	<?php
		 }} 
	?>

	</select>
	<td>Start_date</td>
	<td><select name="s_date">
	<?php 
		$sql = "SELECT distinct Supply_Date as s from parts order by Supply_Date";
		$query = $dbh -> prepare($sql);
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		$cnt=1;
		if($query->rowCount() > 0) {
			foreach($results as $result) {  
	?>  
	<option> <?php echo htmlentities($result->s);?> </option>
	<?php
		 }} 
	?>

	</select>
	<td>End_date</td>
	<td><select name="s1_date">
	<?php 
		$sql = "SELECT distinct Supply_Date as s1 from parts order by Supply_Date";
		$query = $dbh -> prepare($sql);
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		$cnt=1;
		if($query->rowCount() > 0) {
			foreach($results as $result) {  
	?>  
	<option> <?php echo htmlentities($result->s1);?> </option>
	<?php
		 }} 
	?>

	</select>
	<input type = "Submit" value = " Submit " /><br />
	</form>
</div>
<?php
	if(isset($_POST['part'])  /* && isset($_POST['s_date']) && isset($_post['s1_date']) */) {
 	$par=$_POST['part'];
	$s_d=$_POST['s_date'];
	$s1_d=$_POST['s1_date'];
	?>
   <option> Showing Result for this part: <?php echo htmlentities($par);?> sold in between the dates <?php echo htmlentities($s_d)?> and <?php echo htmlentities($s1_d)?> </option>
   <br>
   <?php
    $sql = "SELECT distinct VIN from vehicle_parts natural join parts where supply_date >='$s_d' and supply_date <='$s1_d' and Part_Type='$par'";
	$query= $dbh -> prepare($sql);   
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0) {
      foreach($results as $result) {
  ?> 
    <option> VIN:<?php echo htmlentities($result->VIN);?> </option>
	<?php } }
	}
	?>
	Search Cars by months do which body_style sell best
<div>
<form id='myform' action = "" method ="post" target='formresponse'>
	<td>Body_Type</td>
	<td><select name="body">
	<?php 
		$sql = "SELECT distinct Body_Style as b from Car_model";
		$query = $dbh -> prepare($sql);
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		$cnt=1;
		if($query->rowCount() > 0) {
			foreach($results as $result) {  
	?>  
	<option> <?php echo htmlentities($result->b);?> </option>
	<?php
		 }} 
	?>
	</select>
	<input type = "Submit" value = " Submit " /><br />
	</form>
</div>
<?php
	echo htmlentities($_POST['body']);
	if(isset($_POST['body'])) {
	?>
   <option> Showing Result for body: <?php echo htmlentities($_POST['body']);?></option>
   <br>
   <?php
	$bd=$_POST['body'];
    $sql = " select monthname(Sales_Date) as mon from sales,vehicles,car_model where sales.VIN in (select vehicles.VIN from vehicles where Model_ID in (select Model_ID from car_model where Body_Style='$bd') ) limit 1";
	$query= $dbh -> prepare($sql);   
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0) {
      foreach($results as $result) {
		 echo htmlentities($result->mon);
  ?> 
    <option> MONTHS:<?php echo htmlentities($result->mon);?> </option>
	<?php } }
	}
	?>
		<p>Those dealers who keep a vehicle in inventory for the longest average time.</p>
<?php
		$sql1 = " select Dealer_ID as did ,avg(datediff(S.Sales_Date,V.Inventory_INDate)) as diff_interval from dealer natural join dealer_inventory natural join inventory I natural join sales S natural join vehicles V group by dealer_id order by diff_interval desc limit 1";
	$query1= $dbh -> prepare($sql1);   
    $query1->execute();
    $results1=$query1->fetchAll(PDO::FETCH_OBJ); 
	if($query1->rowCount() > 0) {
      foreach($results1 as $result1) {
  ?> 
    <option> Dearler_ID:<?php echo htmlentities($result1->did);?> </option>
	<option> Avg Max.Time In Inventory:<?php echo htmlentities($result1->diff_interval);?> </option>
	<?php } }
?>
	<br>
	dealer who sold maximum number of brands
	<?php 
	$sql2 ="SELECT sales.Dealer_ID,count(brand_name) as cont from dealer d join sales natural join customer natural join vehicles natural join car_model where sales.dealer_id=d.dealer_id group by dealer_id order by cont desc";
	$query2= $dbh -> prepare($sql2);
	$query2->execute();
    $results2=$query2->fetchAll(PDO::FETCH_OBJ); 
	if($query2->rowCount() > 0) {
      foreach($results2 as $result2) {
	?>
	<option>Dealer:<?php echo htmlentities($result2->Dealer_ID);?>      No.Of BRANDS sold:<?php echo htmlentities($result2->cont);?>  </option>
	
	<?php
	}}
	?>
	<br>
	Supplier who supplies brakes for a given brand with the least cost.
	<?php
	$hhh="Brakes";
	$sql3 ="SELECT min(cost) as cost,supplier_id from supplier natural join parts where part_type='$hhh' group by part_type";
	$query3= $dbh->prepare($sql3);
	$query3->execute();
    $results3=$query3->fetchAll(PDO::FETCH_OBJ); 
	if($query3->rowCount() > 0) {
      foreach($results3 as $result3) {
	?>
	<option>Supplier id:<?php echo htmlentities($result3->supplier_id);?> </option>
	<option>Min cost:<?php echo htmlentities($result3->cost);?> </option>
	<?php 
	} }
	?>
	<br></br>
	<?php
	$sql3 =" SELECT gender,count(vin) as cnt from sales natural join customer where vin in (select vin from Vehicles where model_id in (select model_id from car_model where Brand_name='Audi')) and year(sales_date)>2016  group by gender";
	$query3= $dbh->prepare($sql3);
	$query3->execute();
    $results3=$query3->fetchAll(PDO::FETCH_OBJ); 
	if($query3->rowCount() > 0) {
      foreach($results3 as $result3) {
	?>
	<option>Gender :<?php echo htmlentities($result3->gender);?>      No of cars sold:<?php echo htmlentities($result3->cnt);?> </option>
	<?php 
	} }
	?>
	<br></br>
	<?php
	$sql3 =" SELECT annual_income,count(vin) as cnt from sales natural join customer where vin in (select vin from Vehicles where model_id in (select model_id from car_model where Brand_name='Audi')) and year(sales_date)>2016  group by gender";
	$query3= $dbh->prepare($sql3);
	$query3->execute();
    $results3=$query3->fetchAll(PDO::FETCH_OBJ); 
	if($query3->rowCount() > 0) {
      foreach($results3 as $result3) {
	?>
	<option>Annual Income: <?php echo htmlentities($result3->annual_income);?>      No of cars sold:<?php echo htmlentities($result3->cnt);?> </option>
	<?php 
	} }
	?>
	<br></br>
	<?php
	$sql3 ="select name,vin,sales_date,annual_income from sales natural join customer where year(sales_date) >2017 or (year(sales_date)=2017 and month(sales_date)>04)order by annual_income;";
	$query3= $dbh->prepare($sql3);
	$query3->execute();
    $results3=$query3->fetchAll(PDO::FETCH_OBJ); 
	if($query3->rowCount() > 0) {
      foreach($results3 as $result3) {
	?>
	<option><?php echo htmlentities($result3->name);?> 					<a>        |      </a>	<?php echo htmlentities($result3->vin);?><a>        |      </a>
		<?php echo htmlentities($result3->annual_income);?>
		<a>        |      </a>
		<?php echo htmlentities($result3->sales_date);?> </option>
	<?php 
	} }
	?>
	<br></br>
	<?php
	$sql3 ="select name,vin,sales_date,gender from sales natural join customer where year(sales_date) >2017 or (year(sales_date)=2017 and month(sales_date)>04)order by gender;";
	$query3= $dbh->prepare($sql3);
	$query3->execute();
    $results3=$query3->fetchAll(PDO::FETCH_OBJ); 
	if($query3->rowCount() > 0) {
      foreach($results3 as $result3) {
	?>
	<option><?php echo htmlentities($result3->name);?> 					<a>        |      </a>	<?php echo htmlentities($result3->vin);?><a>        |      </a>
		<?php echo htmlentities($result3->gender);?>
		<a>        |      </a>
		<?php echo htmlentities($result3->sales_date);?> </option>
	<?php 
	} }
	?>
	
	<?php include('includes/footer.php') ?>
</body>
</html>