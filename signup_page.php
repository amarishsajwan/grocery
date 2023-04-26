<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Signup-anchal dairy</title>
  <!-- <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'> -->
  <!-- <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'> -->
  <link rel="stylesheet" href="css/style_signup.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js"
    integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
  </script>
</head>

<body>
  <?php
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true" ){
  echo '<div class="alert alert-success alert-dismissible fade show my-0 py-0" role="alert">
    <strong>Success!</strong> You can now login
    <button type="button" class="close" style="line-height: 0" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
  elseif(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "false" ){
    echo '<div class="alert alert-danger alert-dismissible fade show my-0 py-0" role="alert">
    <strong>Existing Username</strong> Username already exist please login
    <button type="button" class="close" style="line-height: 0" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
  elseif(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "wfalse" ){
    echo '<div class="alert alert-danger alert-dismissible fade show my-0 py-0" role="alert">
    <strong>Password Mismatch</strong> Please enter same password in confirm password
    <button type="button" class="close" style="line-height: 0" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
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
          <form class="login fields" action="partial/handle_signup.php" method="POST">
            <div class="login__field">
              <i class="login__icon fas fa-user"></i>
              <input type="text" class="login__input" placeholder="Full Name" id="FullName" name="FullName" required />
            </div>
            <div class="login__field">
              <i class="login__icon fas fa-lock"></i>
              <input type="email" class="login__input" placeholder="Email" id="email" name="email" required />
            </div>
            <div class="login__field">
              <i class="login__icon fas fa-lock"></i>
              <input type="password" class="login__input" placeholder="Password" id="signupPassword"
                name="signupPassword" required />
            </div>
            <div class="login__field">
              <i class="login__icon fas fa-lock"></i>
              <input type="password" class="login__input" placeholder="Confirm Password" id="cpassword" name="cpassword"
                required />
            </div>

            <button class="button login__submit" type="submit">
              <span class="button__text">Sign Up</span>
              <i class="button__icon fas fa-chevron-right"></i>
            </button>
            <p class="text-center text-muted mt-4 mb-0"> <a href="login_page.php" class="fw-bold text-body"><u>Login
                  here</u></a>
            </p>
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