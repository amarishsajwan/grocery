<?php include 'partial/db_connect.php';?>
<nav class="navbar navbar-expand-lg navbar-light bg-light p-0">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="image/logo2.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item mx-2 h4">
          <a class="nav-link active" style=" color: #2d2c6e;" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item mx-2 h4">
          <a class="nav-link" style=" color: #2d2c6e;" href="#">Shop</a>
        </li>
        <li class="nav-item dropdown mx-2 h4">
          <a class="nav-link dropdown-toggle" style=" color: #2d2c6e;" href="#" id="navbarDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            Blog
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" style=" color: #2d2c6e;" href="#">Action</a></li>
            <li><a class="dropdown-item" style=" color: #2d2c6e;" href="#">Another action</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" style=" color: #2d2c6e;" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item mx-2 h4">
          <a class="nav-link " style=" color: #2d2c6e;" href="#" tabindex="-1" aria-disabled="true">About Us</a>
        </li>
      </ul>
      <div class="d-flex gap-3 dropdown">
        <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true ){
          echo' <a class=" link-dark dropdown hidden" type="button" data-bs-toggle="dropdown" aria-expanded="false">
           <i  style="font-size: 25px">'.$_SESSION['name'].'</i>
         </a>
        <ul class="dropdown-menu">
           <li><a class="dropdown-item" href="#">Profile</a></li>
           <li><a class="dropdown-item" href="add_product.php">Add Product</a></li>
           <li><a class="dropdown-item" href="partial/logout.php">Logout</a></li>
           </ul>';
        }
        else{

      echo' <a class=" link-dark dropdown hidden" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-person" style="font-size: 25px"></i>
        </a>

       

        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="login_page.php">Login</a></li>
          <li><a class="dropdown-item" href="signup_page.php">Signup</a></li>
          </ul>';
        }
      
        ?>


        <a class="nav-link" style="font-size: 25px;" href="#"><i class="bi bi-handbag"></i></a>
        <a class="nav-link" style="font-size: 25px;" href="#"><i class="bi bi-suit-heart"></i></a>
        </>
      </div>
    </div>
</nav>