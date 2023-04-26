<?php
session_start();
$_SESSION['upload']=false;
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  require 'db_connect.php';
  $pid=$_GET['pid'];
  
  $sql = "UPDATE `product` SET `prod_status` = 'Rejected' WHERE `product`.`prod_id` = $pid";
  $result = mysqli_query($conn,$sql);
  
  $_SESSION['upload']=true;
  header ("location: /grocery/dashboard.php");

}
// else{
//   header ("location: /grocery/index.php");
// }
?>