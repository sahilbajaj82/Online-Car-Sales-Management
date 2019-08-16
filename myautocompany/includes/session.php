<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = "select username from admin where username = '$user_check'";
   $querry = $dbh->prepare($sql);
	  $querry->execute();
	   $results=$querry->fetchAll(PDO::FETCH_OBJ);
   //$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
   }
?>