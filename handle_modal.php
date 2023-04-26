<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true && $_SESSION['role']==1){ 
  require 'db_connect.php';
  
  $sql2="SELECT * FROM `product` WHERE `prod_id` = $pid1";
  $result2=mysqli_query($conn,$sql2);
  
  while($row2 = mysqli_fetch_assoc($result2)){
    $p_category=$row2['prod_category'];
    $p_name=$row2['prod_name'];
    $p_desc=$row2['prod_description'];

}
}
else{
  header ("location: /grocery/index.php");
}

?>