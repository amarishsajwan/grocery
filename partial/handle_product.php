<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  require 'db_connect.php';
  $alert=false;
  if($_SERVER["REQUEST_METHOD"]=="POST"){

    $p_category = $_POST['prod_category'];
    $p_name = $_POST['prod_name'];
    $p_desc = $_POST['prod_description'];
    $p_price = $_POST['prod_price'];
    $filename=$_FILES["add_img"]["name"];
    $uid= $_SESSION['id'];
 $tempname=$_FILES["add_img"]["tmp_name"];
 $folder = "../image/".$filename;
 $move=move_uploaded_file($tempname, $folder);
 $sql = "INSERT INTO `product` ( `prod_category`, `prod_name`, `prod_description`, `prod_price`, `user_id`, `prod_img`) VALUES ('$p_category', '$p_name', ' $p_desc', '$p_price',$uid,'$filename')";
 $result = mysqli_query($conn , $sql);
 $alert=true;
 if($alert){
   $_SESSION['add'] = true; 
  }
 header("Location: /grocery/add_product.php");
 
  }


}

?>