<?php

session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true ){
  require 'partial/db_connect.php';
}
else{
  header ("location: /grocery/index.php");
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Grocery</title>
  <link rel="stylesheet" href="css/style.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./OwlCarousel2-2.3.4/docs/assets/owlcarousel/assets/owl.carousel.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css"
    integrity="sha512-C8Movfk6DU/H5PzarG0+Dv9MA9IZzvmQpO/3cIlGIflmtY3vIud07myMu4M/NTPJl8jmZtt/4mC9bAioMZBBdA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <?php
if(isset($_SESSION['add'] ) && $_SESSION['add'] == true ){
    echo'<div class="alert alert-success alert-dismissible fade show p-1 m-0" role="alert">
      <strong>Success!</strong> Your Product added successfully
      <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>
  
    </div>';
    $_SESSION['add']=NULL;
  }
?>

  <!-- NavBar -->
  <?php include 'partial/navbar.php';?>

  <div class="container mt-5">
    <form action="partial/handle_product.php" method="POST" enctype="multipart/form-data">
      <div class="row justify-content-center">
        <div class="col-md-6 my-3">



          <div class="mb-3">
            <label for="prod_category">Product Category</label>
            <select class="form-select " aria-label="Default select example" id="prod_category" name="prod_category"
              required>
              <option selected>Select</option>
              <option value="1">Veg</option>
              <option value="2">Non-Veg</option>
            </select>
          </div>
          <div class="my-3">
            <label for="prod_detail">Product Name</label>
            <input type="text" class="form-control" id="prod_name" name="prod_name" required>
          </div>

          <div class="mb-3">
            <label for="prod_description">Product Description</label>
            <textarea class="form-control" id="prod_description" name="prod_description" rows="3" required></textarea>
          </div>

          <div class="mb-3">
            <label for="prod_price">Product Price (per Kg)</label>

            <div class="input-group mb-3">
              <span class="input-group-text" id="prod_price">₹</span>
              <input type="number" class="form-control" name="prod_price" placeholder="" aria-label="Price"
                aria-describedby="prod_price" required>
            </div>
          </div>
          <div class="mb-5">
            <label for="add_img">Product Image</label>
            <input class="form-control" type="file" id="add_img" name="add_img"
              accept="image/x-png,image/gif,image/jpeg" required>
          </div>

          <div class="mt-3">
            <button type="submit" class="btn btn-primary w-100">Submit</button>
          </div>
        </div>
      </div>
    </form>
  </div>


  <script src="./OwlCarousel2-2.3.4/docs/assets/vendors/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"
    integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="./OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
</body>

</html>