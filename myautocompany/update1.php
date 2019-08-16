<?php 
session_start();
include('includes/config.php');
error_reporting(0);
?>

<?php
	$var=$_POST['cid'];
	$d_id=$_POST['d_id'];
	$vin5=$_POST['viin'];
	$sql2="SELECT * from sales where VIN=':vin5'";
	$query2 = $dbh -> prepare($sql2);
    $query2->execute();
    $results2=$query2->fetchAll(PDO::FETCH_OBJ); 
    $cnt=1;
    if($query2->rowCount() > 0) {
  		echo "<script>alert('ALREADY SOLD. Go back and try again');</script>";
  	}
	else{
	$phone=$_POST['ph'];
	$sql = "select * from customer where Customer_ID='$var'";
	$query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0) {
    	foreach($results as $result) {
    		$ad=$result->Address;
    		$gend=$result->Gender;
    		$nam=$result->Name;
    		$an=$result->Annual_Income;
    		$phone=$result->phone;
    	}
    $sql2 = "SELECT Price from vehicles where VIN='$vin5'";
    $query2 = $dbh -> prepare($sql2);
    $query2->execute();
    $results2=$query2->fetchAll(PDO::FETCH_OBJ);
   if($query->rowCount() > 0) {
    foreach($results2 as $result2) {
    	$oop=$result2->Price;
    	}
	}
    $rrrr=date("Y-m-d");
    
	$sql= "INSERT INTO sales values('$vin5','$var','$d_id','$rrrr','$oop')";
	$query = $dbh -> prepare($sql);
    $query->execute();

    $lastInsertId = $dbh->lastInsertId();
    $sql= "update vehicles set OwnedCustomer_ID='$var' where VIN='$vin5'";
	$query = $dbh -> prepare($sql);
    $query->execute();

	}
	else {
		echo "<script>alert('Wrong customer ID. Go back and try again');</script>";
	}

}
?>