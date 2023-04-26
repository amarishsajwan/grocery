<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Grocery</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./OwlCarousel2-2.3.4/docs/assets/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="./OwlCarousel2-2.3.4/docs/assets/owlcarousel/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css"
    integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
    integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
    integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css"
    integrity="sha512-C8Movfk6DU/H5PzarG0+Dv9MA9IZzvmQpO/3cIlGIflmtY3vIud07myMu4M/NTPJl8jmZtt/4mC9bAioMZBBdA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

  <?php
  session_start();
if(isset($_SESSION['error'] ) && $_SESSION['error'] == false ){
    echo'<div class="alert alert-success alert-dismissible fade show p-1 m-0" role="alert">
      <strong>Success!</strong> You have been logedin successfully
      <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>
  
    </div>';
    $_SESSION['error']=NULL;
  }
  ?>
  <!-- include navbar -->

  <?php include 'partial/navbar.php';?>

  <!-- include db -->

  <?php


if(isset($_SESSION['loggedin'] ) && $_SESSION['loggedin'] == true ) {
  $now = time(); // Checking the time now when home page starts.
  if ($now > $_SESSION['expire']){
    session_unset();
    session_destroy();
    header('Location: grocery/index.php');
  }
}
?>


  <section class="carousel">

    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">

        <div class="carousel-item active">
          <img src="image/big_1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="image/big_2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="image/big_3.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="image/big_4.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="image/big_5.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
    </div>

  </section>

  <!-- 1st section  owl carousel-->
  <section class="card-food my-5">
    <div class="container">
      <div class="owl-carousel owl-theme">
        <?php
       $sql = "SELECT * FROM `categories`";
       $result = mysqli_query($conn,$sql);
       while($row = mysqli_fetch_assoc($result)){
             // echo $row['category_id'];
              // echo $row['category_name'];
         $c_name = $row['cat_name'];
         $c_desc = $row['cat_description'];
         $c_item = $row['cat_item'];
         $c_image = $row['cat_image'];     
         echo' <div class="item">
                <div class="card mx-3 card-box my-4">
                  <div class="card-body text-center">
                     <div class="card-img-body mx-auto">
                       <img src="image/'.$c_image.'" class="card-img-top" alt="...">
                     </div>
                      <h6 class="card-title mt-2 mb-0">'.$c_name.'</h6>
                      <p class="card-text"><small>'.$c_item.' item</small></p>
                    </div>
                  </div>
                </div>';
          }
        ?>
      </div>
    </div>
  </section>

  <section>
    <div class="card-text">

      <p class="text-center">~ Special Product ~</p>
      <h2 class="text-center">Weekly Food Offers</h2>
    </div>
  </section>

  <!-- 2nd card crousal -->
  <section>
    <div class="container">
      <div class="owl-carousel owl-theme">
        <?php
     $sql2= "SELECT * FROM `product` WHERE `prod_status` = 'Approved'";
     $result2 = mysqli_query($conn,$sql2);

     while($row2 = mysqli_fetch_assoc($result2)){
      // echo $row['category_id'];
      // echo $row['category_name'];
       $p_name = $row2['prod_name'];
       $p_desc = $row2['prod_description'];
       $p_price = $row2['prod_price'];
       $p_image = $row2['prod_img'];
       
       echo' <div class="item">
          <div class="price-card card-box rounded-3 m-3">
            <div class="d-flex align-items-center" style="height:230px">
              <div class="card-header card-img-container d-flex justify-content-center">
                <img src="image/'.$p_image.'" class="card-img-top img-fluid" alt=" ..." height="100" width="100">
              </div>
            </div>
            <div class="card-body p-3 ">
              <h6 class="card-title text-muted">'.$p_name.'</h6>
              <p class="card-text mb-0 lh-1 "><small >'.$p_desc.'</small> </p>
              <ul class="list-group list-group-flush bg-transparent">
                <li class="list-group-item text-warning p-0 border-0 bg-transparent"><small><i class="bi bi-star"></i><i
                      class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i
                      class="bi bi-star"></i></small>
                </li>
                <li class="list-group-item p-0 bg-transparent mt-2"><span class="text-danger h5 fw-bold">₹'.$p_price.'
                  </span>
                  &nbsp;
                  <del class="text-muted h6">₹150</del>
                </li>
              </ul>
            </div>

          </div>
        </div>';
     }
        ?>

      </div>
    </div>
  </section>
  <!-- End of 2nd carousel -->

  <!--3rd big image -->
  <section>
    <div class="container big-image">
      <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 ">
          <div>
            <img src="image/bottle2.png" class="pt-5 pe-5  img-fluid" alt="asda" style="
            height: 455px;
            width: 500px;
        ">
          </div>
        </div>
        <div class=" col-sm-6 col-md-6 col-lg-6">
          <div class="details pt-5">
            <div class="big-image-text">
              <p>~ the Best For Your ~</p>
              <h4 class="poster-heading">Organic Drink </h4>
              <h4>Easy Healthy - Happy Life</h4>
              <small style=" color: #2d2c6e;">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus,
                ipsa.</small>
            </div>
            <div class="container pt-3">
              <div class="row">
                <div class="col-md-6">
                  <h6 style=" color: #2d2c6e;">FRESH FRUIT:</h6>
                  <hr class="text-muted m-0">
                  <small style=" color: #2d2c6e;">Apples, Berries & Cherries</small>
                  <h6 style=" color: #2d2c6e;">EXPIRY DATE:</h6>
                  <hr class="text-muted m-0">
                  <small style=" color: #2d2c6e;">See on the Bottle Cap</small><br>
                  <button type="button" class="btn btn-outline-success mt-5"><small>ADD TO CART</small></button>
                </div>



                <div class="col-md-6">
                  <h6 style=" color: #2d2c6e;" style=" color: #2d2c6e;">INGREDIENT:</h6>
                  <hr class="text-muted m-0">
                  <small style=" color: #2d2c6e;">Energy, Protein, Sugars</small>
                  <h6 style=" color: #2d2c6e;">BOOTLE SIZE:</h6>
                  <hr class="text-muted m-0">
                  <small style=" color: #2d2c6e;">500ml - 1000ml</small><br>
                  <button type="button" class="btn btn-outline-success mt-5"><small>VIEW MORE</small></button>
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>



    </div>
  </section>
  <!-- section for 3rd card -->
  <section class=" my-5">
    <div class="container">
      <div class="row">

        <div class="card-group ">
          <div class="col-sm-12 col-md-12 col-lg-4">
            <div class="card-1 mx-3 shadow-sm">
              <div class="card-body pt-4 ">

                <h5 class="ps-5   pt-3  fs-2">Fresh Veggies</h5>
                <p class="ps-5 pt-2 fw-bold  ">Eat Green Best <br> For Family</p>

              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-4">
            <div class="card-2 mx-3 shadow-sm">
              <div class="card-body pt-4 ">

                <h5 class="ps-4  pt-3 fs-2 text-white">Fresh Food</h5>
                <p class="ps-4 fw-bold   pt-2 fw-medium  text-white">Restore Health <br> For Family</p>

              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-4">
            <div class="card-3 mx-3 shadow-sm">
              <div class="card-body pt-4 ">

                <h5 class="ps-4  pt-3 fs-2 text">Healthy</h5>
                <p class="ps-4 fw-bold  pt-2 fw-medium text ">Fresh Free Bread <br> For Family</p>

              </div>
            </div>
          </div>


        </div>

      </div>
    </div>

    </div>
  </section>
  <!-- FOOTER -->

  <section>
    <div class="footer">
      <div class="row foot text-white mb-4 pt-3">
        <div class="col-md-1"></div>
        <div class="col-md-2 text-center">
          <i class="bi bi-truck "></i>
          <p class="m-0">FAST DELIVERY</p>
          <small class="text-white-50">Across West & East India</small>
        </div>
        <div class=" col-md-2  text-center">
          <i class="bi bi-credit-card "></i>
          <p class="m-0">SAFE PAYMENT</p>
          <small class="text-white-50">100% Secure Payment</small>
        </div>
        <div class="col-md-2 text-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin"
            viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
            <path
              d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
            <path
              d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
            <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
          </svg>
          <p class="m-0"> ONLINE DISCOUNT</p>
          <small class="text-white-50">Add Multi-buy Discount</small>
        </div>
        <div class="col-md-2 text-center">
          <i class="bi bi-info-circle"></i>
          <p class="m-0">HELP CENTER</p>
          <small class="text-white-50">Dedicated 24/7 Support</small>
        </div>
        <div class="col-md-2 text-center">
          <i class="bi bi-filter-square"></i>
          <p class="m-0"> CURATED ITEMS</p>
          <small class="text-white-50">From Handpicked Sellers</small>
        </div>
      </div>
      <hr class="text-white my-5">
      <div class="row gap-3 text-white ">
        <div class="col-md-1"></div>
        <div class="col-md-2">
          <h6 class="fw-bold ">LET US HELP YOU</h6>
          <p class="text-white-50 m-0">If you have any question, please</p>
          <p class="text-white-50">contact us at <a style="
            color: #96be25 ;text-decoration: none;" href="#">support@example.com</a></p>
          <div>
            <p class="m-1 text-white-50 ">Social Media: </p>
            <div class="d-flex gap-2">
              <div>
                <a class="text-white" href="http://"><i class="bi bi-facebook "></i></a>
              </div>
              <div>
                <a class="text-white" href="http://"><i class="bi bi-twitter"></i></a>
              </div>
              <div>
                <a class="text-white" href="http://"><i class="bi bi-youtube"></i></a>
              </div>
              <div>
                <a class="text-white" href="http://"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    fill="currentColor" class="bi bi-pinterest" viewBox="0 0 16 16">
                    <path
                      d="M8 0a8 8 0 0 0-2.915 15.452c-.07-.633-.134-1.606.027-2.297.146-.625.938-3.977.938-3.977s-.239-.479-.239-1.187c0-1.113.645-1.943 1.448-1.943.682 0 1.012.512 1.012 1.127 0 .686-.437 1.712-.663 2.663-.188.796.4 1.446 1.185 1.446 1.422 0 2.515-1.5 2.515-3.664 0-1.915-1.377-3.254-3.342-3.254-2.276 0-3.612 1.707-3.612 3.471 0 .688.265 1.425.595 1.826a.24.24 0 0 1 .056.23c-.061.252-.196.796-.222.907-.035.146-.116.177-.268.107-1-.465-1.624-1.926-1.624-3.1 0-2.523 1.834-4.84 5.286-4.84 2.775 0 4.932 1.977 4.932 4.62 0 2.757-1.739 4.976-4.151 4.976-.811 0-1.573-.421-1.834-.919l-.498 1.902c-.181.695-.669 1.566-.995 2.097A8 8 0 1 0 8 0z" />
                  </svg></a>
              </div>
              <div>
                <a class="text-white" href="http://"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    fill="currentColor" class="bi bi-skype" viewBox="0 0 16 16">
                    <path
                      d="M4.671 0c.88 0 1.733.247 2.468.702a7.423 7.423 0 0 1 6.02 2.118 7.372 7.372 0 0 1 2.167 5.215c0 .344-.024.687-.072 1.026a4.662 4.662 0 0 1 .6 2.281 4.645 4.645 0 0 1-1.37 3.294A4.673 4.673 0 0 1 11.18 16c-.84 0-1.658-.226-2.37-.644a7.423 7.423 0 0 1-6.114-2.107A7.374 7.374 0 0 1 .529 8.035c0-.363.026-.724.08-1.081a4.644 4.644 0 0 1 .76-5.59A4.68 4.68 0 0 1 4.67 0zm.447 7.01c.18.309.43.572.729.769a7.07 7.07 0 0 0 1.257.653c.492.205.873.38 1.145.523.229.112.437.264.615.448.135.142.21.331.21.528a.872.872 0 0 1-.335.723c-.291.196-.64.289-.99.264a2.618 2.618 0 0 1-1.048-.206 11.44 11.44 0 0 1-.532-.253 1.284 1.284 0 0 0-.587-.15.717.717 0 0 0-.501.176.63.63 0 0 0-.195.491.796.796 0 0 0 .148.482 1.2 1.2 0 0 0 .456.354 5.113 5.113 0 0 0 2.212.419 4.554 4.554 0 0 0 1.624-.265 2.296 2.296 0 0 0 1.08-.801c.267-.39.402-.855.386-1.327a2.09 2.09 0 0 0-.279-1.101 2.53 2.53 0 0 0-.772-.792A7.198 7.198 0 0 0 8.486 7.3a1.05 1.05 0 0 0-.145-.058 18.182 18.182 0 0 1-1.013-.447 1.827 1.827 0 0 1-.54-.387.727.727 0 0 1-.2-.508.805.805 0 0 1 .385-.723 1.76 1.76 0 0 1 .968-.247c.26-.003.52.03.772.096.274.079.542.177.802.293.105.049.22.075.336.076a.6.6 0 0 0 .453-.19.69.69 0 0 0 .18-.496.717.717 0 0 0-.17-.476 1.374 1.374 0 0 0-.556-.354 3.69 3.69 0 0 0-.708-.183 5.963 5.963 0 0 0-1.022-.078 4.53 4.53 0 0 0-1.536.258 2.71 2.71 0 0 0-1.174.784 1.91 1.91 0 0 0-.45 1.287c-.01.37.076.736.25 1.063z" />
                  </svg></a>
              </div>
            </div>

          </div>
        </div>
        <div class="col-md-2 ">
          <div>

            <h6 class="fw-bold">LOOKING FOR ORFARM?</h6>
            <p class="text-white-50 m-0">68 St. Vicent Place, Glasgow, Greater </p>
            <p class="text-white-50 ">Newyork NH2012, UK.</p>
          </div>
          <div class="text-white-50">
            <p class="m-0">Monday - Friday: <span class="text-white"> 8:10 AM - 06:10PM</span></p>
            <p class="m-0">Saturday: <span class="text-white">10:10AM - 06:10PM</span> </p>
            <p class="m-0">Sunday: <span class="text-white"> Close</span></p>
          </div>
        </div>
        <div class="col-md-2">
          <h6 class="fw-bold">HOT CATEGORIES</h6>
          <div class="d-flex flex-column text-white-50">
            <div>Fruits & Vegetables</div>
            <div>Dairy Products</div>
            <div>Package Foods</div>
            <div>Beverage</div>
            <div>Health & Wellness</div>
          </div>
        </div>
        <div class="col-md-3 ps-5 border-start">
          <h6 class="fw-bold">OUR NEWSLETTER</h6>
          <div class="d-flex flex-column">
            <div>
              <p class="mb-0">Subscribe to the Orfarm mailing list to </p>
              <p class="mb-0">receive updates</p>
              <p>on new arrivals & other information</p>
            </div>
            <div class="position-relative mx-auto" style="max-width: 400px;">
              <input class="form-control bg-light  w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
              <button type="button"
                class="btn btn-success py-2 position-absolute top-0 end-0 mt-2 me-2">Subscribe</button>
            </div>

          </div>

        </div>

      </div>
      <hr class="text-white mt-5">
      <div class="container-fluid copyright">
        <div class="container">
          <div class="row">
            <div class="col-md-6 link  text-md-start py-3 mb-3 text-white-50 mb-md-0">
              <p> Copyright&copy; <a style="
              color: #96be25; text-decoration: none
          " href="#">ORFARM</a>, all Right Reserved.
                Powered by <span style="
              color: #96be25;
          ">ThemePure</span></p>
            </div>
            <div class="col-md-6 text-center py-3 text-white-50 text-md-end">
              <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
              Designed By <a style="
              color: #96be25; text-decoration: none href=" #">Amarish</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    </div>







  </section>


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
  <script>
  $('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 3
      },
      1000: {
        items: 5
      }
    }
  })
  </script>

</body>

</html>