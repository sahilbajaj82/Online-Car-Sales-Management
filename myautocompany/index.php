<?php 
session_start();
//include('includes/config.php');
error_reporting(0);
?>
<!DOCTYPE  HTML>
   <html lang="en">
   <title>index</title>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey w3-content" style="max-width:1600px">    
<?php include('includes/header.php') ?>
<!-- First Photo Grid-->
<br> <br>
  <div class="w3-row-padding">
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="assets/images/4MID.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>Audi-Q7</b></p>
      </div>
    </div>
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="assets/images/Mercedes1.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>Mercedes</b></p>
      </div>
    </div>
    <div class="w3-third w3-container">
      <img src="assets/images/6MID.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>Audi-R8</b></p>
      </div>
    </div>
  </div>
  
  <!-- Second Photo Grid-->
  <div class="w3-row-padding">
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="assets/images/14MID.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>911-Skoda</b></p>
      </div>
    </div>
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="assets/images/2MID.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>Audi-A4</b></p>
      </div>
    </div>
    <div class="w3-third w3-container">
      <img src="assets/images/3MID.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>A6-Audi</b></p>
      </div>
    </div>
  </div>
<!-- Pagination -->
  <div class="w3-center w3-padding-32">
    <div class="w3-bar">
      <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
      <a href="#" class="w3-bar-item w3-black w3-button">1</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>
    </div>
  </div>



</body>
</html>