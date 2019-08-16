<?php 
session_start();
include('includes/config.php');
error_reporting(0);
?>
<!DOCTYPE  HTML>
	<html lang="en">
	<title>dealer</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>   
<?php include('includes/header.php');?>
  <?php $sql = "SELECT * from dealer";
  $query = $dbh -> prepare($sql);
  $query->execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);
  $cnt=1;
  if($query->rowCount() > 0)
  {
    foreach($results as $result)
    {  
      ?> 
        
  <div class="w3-bar w3-white w3-wide w3-padding w3-card">
    <a href="#home" class="w3-bar-item w3-button"><b>VW</b>Dealers</a>
    <div class="w3-right w3-hide-small">
      <a href="dealers.php" class="w3-bar-item w3-button"><?php echo htmlentities($result->Dealer_ID);
        ?> </a>
      <a href="dealers.php" class="w3-bar-item w3-button"><?php echo htmlentities($result->D_Name);
        ?> </a>
      <a href="dealers.php" class="w3-bar-item w3-button"><?php echo htmlentities($result->Location);
        ?> </a>
    </div>
</div>      
    <?php }
  }?>
  </body>
  </html>