<?php

session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true && $_SESSION['role']==1){
  require 'partial/db_connect.php';
}
else{
  header ("location: /grocery/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Dashboard - Admin</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
  </script>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>




</head>



<body class="sb-nav-fixed">
  <?php
  if(isset($_SESSION['edit'] ) && $_SESSION['edit'] == true ){
      echo'<div class="alert alert-success alert-dismissible fade show p-1 m-0" role="alert">
        <strong>Success!</strong> Your Product Updated successfully
        <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>
    
      </div>';
      $_SESSION['edit']=NULL;
    }
  
  elseif(isset($_SESSION['upload'] ) && $_SESSION['upload'] == true ){
  echo'<div class="alert alert-success alert-dismissible fade show p-1 m-0" role="alert">
    <strong>Success!</strong> You have been logedin successfully
    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>

  </div>';
  $_SESSION['upload']=NULL;
  }
  ?>
  <?php include 'partial/edit_modal.php';?>

  <nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
    <!-- Navbar Brand-->
    <img src="image/uk_govt.svg" alt="logo" class="navbar-brand />
      <a class=" navbar-brand ps-3" href="index.html">Dairy Vikas Vibhag <br />
    Uttarakhand Admin</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" style="
    position: fixed;
    left: 205px;
" id="sidebarToggle" href="#!">
      <i class="fas fa-bars"></i>
    </button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
      <div class="input-group">
        <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
          aria-describedby="btnNavbarSearch" />
        <button class="btn btn-primary" id="btnNavbarSearch" type="button">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto">

      <!-- Nav Item - Search Dropdown (Visible Only XS) -->
      <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-search fa-fw"></i>
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
          <form class="form-inline mr-auto w-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <div class="topbar-divider d-none d-sm-block"></div>

      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small">DVVU Admin</span>
          <i class="fas fa-user"></i>
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">


          <a class="dropdown-item" href="partial/logout.php" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
          </a>
        </div>
      </li>

    </ul>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="index.html">
              <div class="sb-nav-link-icon">
                <i class="fas fa-tachometer-alt"></i>
              </div>
              Dashboard
            </a>
            <a class="nav-link collapsed" href="#" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon">
                <i class="fas fa-columns"></i>
              </div>
              Cases Info.
            </a>
            <hr />
            <div class="sb-sidenav-menu-heading">Interface</div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
              aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon">
                <i class="fa fa-users"></i>
              </div>
              Employees
              <div class="sb-sidenav-collapse-arrow">
                <i class="fas fa-angle-down"></i>
              </div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="layout-static.html">Add/View Employees</a>
                <a class="nav-link" href="layout-sidenav-light.html">Inactive Employees</a>
              </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
              aria-expanded="false" aria-controls="collapsePages">
              <div class="sb-nav-link-icon">
                <i class="fa fa-clipboard"></i>
              </div>
              Cases
              <div class="sb-sidenav-collapse-arrow">
                <i class="fas fa-angle-down"></i>
              </div>
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="partial/admin_case_table.php?s=all">All</a>
                <a class="nav-link" href="partial/admin_case_table.php?s=pending">Pending</a>
                <a class="nav-link" href="partial/admin_case_table.php?s=closed">Approved</a>
              </nav>
            </div>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages"></nav>
            </div>
            <div class="sb-sidenav-menu-heading">Addons</div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseManagement"
              aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon">
                <i class="fas fa-columns"></i>
              </div>
              Management
              <div class="sb-sidenav-collapse-arrow">
                <i class="fas fa-angle-down"></i>
              </div>
            </a>
            <div class="collapse" id="collapseManagement" aria-labelledby="headingThree"
              data-bs-parent="#sidenavAccordion">

              <nav class="sb-sidenav-menu-nested nav">

                <a class="nav-link" href="layout-static.html">Cattles</a>
                <a class="nav-link" href="layout-sidenav-light.html">Cattle Breeds</a>
                <a class="nav-link" href="layout-sidenav-light.html">Types of Cattle Units</a>
                <a class="nav-link" href="layout-sidenav-light.html">Number of Cattles</a>
                <a class="nav-link" href="layout-sidenav-light.html">Vehicle Types </a>
                <a class="nav-link" href="layout-sidenav-light.html">Society</a>
              </nav>
            </div>
          </div>
        </div>

      </nav>

    </div>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">
          <h1 class="mt-4">Dashboard</h1>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </nav>

          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card bg-primary text-white mb-4">
                <div class="d-flex ">
                  <div class="card-body">Total Cases</div>
                  <div class="card-body">5</div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                  <a class="small text-white stretched-link" href="partial/admin_case_table.php?s=all">View Details</a>
                  <div class="small text-white">
                    <i class="fas fa-angle-right"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card bg-warning text-white mb-4">
                <div class="d-flex ">
                  <div class="card-body">Open Cases</div>
                  <div class="card-body">5</div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                  <a class="small text-white stretched-link" href="partial/admin_case_table.php?s=open">View
                    Details</a>
                  <div class="small text-white">
                    <i class="fas fa-angle-right"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card bg-danger text-white mb-4">
                <div class="d-flex ">
                  <div class="card-body">Case In Progress</div>
                  <div class="card-body">5</div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                  <a class="small text-white stretched-link" href="partial/admin_case_table.php?s=pending">View
                    Details</a>
                  <div class="small text-white">
                    <i class="fas fa-angle-right"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card bg-success text-white mb-4">
                <div class="d-flex ">
                  <div class="card-body">Closed Cases</div>
                  <div class="card-body">5</div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                  <a class="small text-white stretched-link" href="partial/admin_case_table.php?s=closed">View
                    Details</a>
                  <div class="small text-white">
                    <i class="fas fa-angle-right"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-12 lg-12">
              <div class="card shadow mb-4">
                <div class="card-header">
                  <i class="fas fa-chart-area me-1"></i>
                  All Products Detail
                </div>
                <div class="card-body">
                  <table class="table text-center" id="myTable">
                    <thead>
                      <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Category</th>
                        <th scope="col">Image </th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>


                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      $sql = "SELECT * FROM product";
                      $result = mysqli_query($conn,$sql);
                      $sno = 0;
                      while($row = mysqli_fetch_assoc($result)){
                      $sno = $sno + 1;
                      $image=$row["prod_img"];
                      $pid=$row["prod_id"];
                      $p_category=$row['prod_category'];
                      $p_name=$row['prod_name'];
                      $p_desc=$row['prod_description'];

                      echo'<tr>
                        <th scope="row">'.$sno.'</th>
                        <td>'.$row["prod_name"].' </td>
                        <td id="opt">'.$row["prod_category"].'</td>
                        <td  style = "display:none">'.$row['prod_description'].'</td>
                        <td><img src="image/'.$image.'" width="100px" alt=""></td>
                        <td>
                          <div class="btn-group">
                            <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-bs-toggle="dropdown"
                              aria-expanded="false">
                              '.$row["prod_status"].'
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item text-bg-success"
                                  href="partial/approve.php?pid='.$pid.'">Approve</a></li>
                              <li><a class="dropdown-item text-bg-danger"
                                  href="partial/reject.php?pid='.$pid.'">Reject</a></li>
                            </ul>
                          </div>
                        </td>
                        <td>
                          <button type="button" class="edit btn btn-primary" data-toggle="modal" id="'.$pid.'"
                            data-target="#editModal">
                            Edit
                          </button>
                        </td>
                      </tr>';
                      }

                      ?>
                    </tbody>

                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
      </main>

      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2022</div>
            <div>
              <a href="#">Privacy Policy</a>
              &middot;
              <a href="#">Terms &amp; Conditions</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>



  <div id="myModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Subscribe our Newsletter</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Subscribe to our mailing list to get the latest updates straight in your inbox.</p>
          <form>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Email Address">
            </div>
            <button type="submit" class="btn btn-primary">Subscribe</button>
          </form>
        </div>
      </div>
    </div>
  </div>





  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
  <script src="js/scripts.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
  <script src="js/datatables-simple-demo.js"></script>
  <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>





  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
    integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
  </script>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
    integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  < script src = "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
  integrity = "sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
  crossorigin = "anonymous" >
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
    integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  </script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>

  <script>
  edits = document.getElementsByClassName('edit');
  Array.from(edits).forEach((element) => {
    element.addEventListener("click", (e) => {
      // console.log(e.target)
      // console.log("edit");
      tr = e.target.parentNode.parentNode;


      $prod_category = tr.getElementsByTagName("td")[1].innerText;
      prod_name = tr.getElementsByTagName("td")[0].innerText;
      prod_description = tr.getElementsByTagName("td")[2].innerText;
      // let x = document.getElementById("opt").selectedIndex;
      // console.log(x);
      product_name.value = prod_name;
      product_category.value = $prod_category;

      console.log(product_category.value);
      product_description.value = prod_description;
      console.log(product_description.value);
      // console.log(prod_category, prod_name, prod_description);
      id_edit.value = e.target.id;

    })
  })







  // $('.trash').click(
  //   function() { //get cover id
  //     var id = $(this).data('id'); //set href for cancel button
  //     console.log(id);
  //     $("#form").append("<input type='text' class='form-control' placeholder='Name' value='" + id + "'>")
  //     $("#exampleModal").modal('show');

  // $(document).ready(function() {
  //   $(document).on('click', '.edit', function() {
  //     var id = $(this).val();
  //     var first = $('#firstname' + id).text();
  //     var last = $('#lastname' + id).text();
  //     var address = $('#address' + id).text();

  //     $('#edit').modal('show');
  //     $('#efirstname').val(first);
  //     $('#elastname').val(last);
  //     $('#eaddress').val(address);
  //   });
  // });
  </script>


</body>

</html>