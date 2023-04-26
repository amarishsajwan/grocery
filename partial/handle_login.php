<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
  session_start();
  require 'db_connect.php';
  $username = $_POST['username'];
  $pass = $_POST['password'];
  //check the credentials
  $sql = "SELECT * FROM `users` WHERE `username` = '$username'";
  $result = mysqli_query($conn, $sql);
  $numRows = mysqli_num_rows($result);
   if($numRows == 1){
    
    $row= mysqli_fetch_assoc($result);
    if(password_verify($pass , $row['password'])){      //VERIFY PASSWORD WITH HASH CODE
      
      $_SESSION['loggedin'] = true;
      $_SESSION['id'] = $row['sno'];
      $_SESSION['role'] = $row['role'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['name'] = $row['f_name'];
      $_SESSION['start'] = time();
      $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
      
    
    if($_SESSION['role']==1){                          // FOR USER ADMIN LOGIN 
      $_SESSION['pid'] = NULL;
      header("location: /grocery/dashboard.php");         
    }
    else{                                              //FOR USER LOGIN
      $_SESSION['error'] = false;
      header("location: /grocery/index.php"); 
    }
  }
    else{                                              // FOR WRONG PASSWORD ALERT
      
      $_SESSION['error'] = "wrong_p";
      header("location: /grocery/login_page.php");
      
    }
}
     
   
    
  else{                                                 // FOR INVALID USERNAME ALERT
   
    $_SESSION['error'] = "wrong_u";
    header("location: /grocery/login_page.php");
    
      }

}
?>