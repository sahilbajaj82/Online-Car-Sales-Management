<?php
	 
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = $_POST['uname'];
      $mypassword = $_POST['psw']; 
      
      $sql = "SELECT uname FROM admin WHERE uname = '$myusername' and password = '$mypassword'";
      $querry = $dbh->prepare($sql);
	  $querry->execute();
	   $results=$querry->fetchAll(PDO::FETCH_OBJ);
       //$row = mysqli_fetch_array($result);
      //$active = $row['active'];
      //echo $row;
      //$count = mysqli_num_rows($result);
      //echo $count; 
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($querry->rowCount() == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;  
         header("location:/myautocompany/marketing.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>