<?php
$showError ="false";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  
    include 'db_connect.php';
    $f_name = $_POST['FullName'];
    $email = $_POST['email'];
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['cpassword'];

    //check whether this email exist
    $existSql = "SELECT * FROM `users` WHERE  `username` = '$email'";
    $result = mysqli_query($conn, $existSql);
    
    $numRows = mysqli_num_rows($result);
    
    if($numRows>0){
      
      header("Location: /grocery/signup_page.php?signupsuccess=false");
      
    }
    else{
      if($pass == $cpass){
      $hash = password_hash($pass,PASSWORD_DEFAULT);
      $sql ="INSERT INTO `users` ( `f_name`, `username`, `password`, `Role`) VALUES ('$f_name', '$email', '$hash', 0)";
      $result = mysqli_query($conn , $sql);
      header("Location: /grocery/signup_page.php?signupsuccess=true");
      }
  
     else{
       header("Location: /grocery/signup_page.php?signupsuccess=wfalse");
      }
    }
}
  
?>