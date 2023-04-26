<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>login-anchal dairy</title>
  <!-- <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'> -->
  <!-- <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'> -->
  <link rel="stylesheet" href="css/style_login.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
  </script>
</head>

<body>
  <?php
  session_start();
  
    if(isset($_SESSION['error']) && $_SESSION['error']=='wrong_u'){
      echo'<div class="alert alert-danger alert-dismissible fade show p-1 m-0" role="alert">
      <strong>Invalid Username!</strong> Please enter correct username or Register first
      <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>
      
      </div>';
      $_SESSION['error']="";
    }
    elseif(isset($_SESSION['error']) && $_SESSION['error']=='wrong_p'){
      echo'<div class="alert alert-danger alert-dismissible fade show  p-1 m-0" role="alert">
      <strong>Wrong Password!</strong> Please Enter Correct Password
      <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>
      
      </div>';
      $_SESSION['error']="";
    }


?>
  <div class="container">
    <div class="screen">
      <div class="screen__content">
        <div class="logo">
          <img src="image/uk_govt.svg" alt="logo" width="30%" class="img-fluid" />
          <p>Admin Login</p>
        </div>
        <div class="login">
          <form class="login fields" action="partial/handle_login.php" method="POST">
            <div class="login__field">
              <i class="login__icon fas fa-user"></i>
              <input type="text" class="login__input" placeholder="User name / Email" id="username" name="username"
                required />
            </div>
            <div class="login__field">
              <i class="login__icon fas fa-lock"></i>
              <input type="password" class="login__input" placeholder="Password" id="password" name="password"
                required />
            </div>
            <button class="button login__submit" type="submit">
              <span class="button__text">Log In Now</span>
              <i class="button__icon fas fa-chevron-right"></i>
            </button>
            <p class="text-center text-muted mt-4 mb-0"> <a href="signup_page.php" class="fw-bold text-body"><u>Register
                  Here</u></a>
          </form>
        </div>
      </div>
      <div class="screen__background">
        <span class="screen__background__shape screen__background__shape4"></span>
        <span class="screen__background__shape screen__background__shape3"></span>
        <span class="screen__background__shape screen__background__shape2"></span>
        <span class="screen__background__shape screen__background__shape1"></span>
      </div>
    </div>
  </div>
  <!-- partial -->
</body>

</html>