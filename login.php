<?php

  session_start();

  include 'backend/admin/connect.php';

if (isset($_SESSION['user'])) {
   header('location: enterprise/user/profile.php');
   exit();
 }

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user = $_POST['name'];
    $pass = $_POST['pass'];
    $hachpass = sha1($pass);

    $stmt = $conn->prepare('SELECT *
                    FROM users
                    WHERE email = ?
                    AND password = ?');
    
    $stmt->execute(array($user, $pass));
    $row = $stmt->fetch();

    if ($stmt->rowCount() > 0) {
      if ($row['service'] == 1) {
        $_SESSION['user_admin'] = $user;
        $_SESSION['uid_admin'] = $row['user_id'];     
        header('location: backend/admin/index.php');
        exit();

      } else if ($row['service'] == 2) {
         $_SESSION['user_c'] = $user;
         $_SESSION['uid_c'] = $row['id'];     
         header('location: backend/commercial/index.php');
         exit();
        
      } else if ($row['service'] == 3) {
         $_SESSION['user_s'] = $user;
         $_SESSION['uid_s'] = $row['id'];     
         header('location: backend/support/index.php');
         exit();
        
      } else {
         $_SESSION['user'] = $user;
         $_SESSION['uid'] = $row['id'];     
         header('location: enterprise/user/profile.php');
         exit();
      }   
    } else {
      echo 'not existe';
    }

   } 
   

?>
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="enterprise/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="enterprise/assets/img/favicon.png">
  <title>
    Soft UI Dashboard by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="enterprise/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="enterprise/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="enterprise/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="enterprise/assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
    <div class="container">
      <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="enterprise/pages/dashboard.html">
        Soft UI Dashboard
      </a>
      <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
      </button>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="enterprise/pages/dashboard.html">
              <i class="fa fa-chart-pie opacity-6  me-1"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="enterprise/pages/profile.html">
              <i class="fa fa-user opacity-6  me-1"></i>
              Profile
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="enterprise/pages/sign-up.html">
              <i class="fas fa-user-circle opacity-6  me-1"></i>
              Sign Up
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="enterprise/pages/sign-in.html">
              <i class="fas fa-key opacity-6  me-1"></i>
              Sign In
            </a>
          </li>
        </ul>
        <li class="nav-item d-flex align-items-center">
          <a class="btn btn-round btn-sm mb-0 btn-outline-white me-2" target="_blank" href="https://www.creative-tim.com/builder?ref=navbar-soft-ui-dashboard">Online Builder</a>
        </li>
        <ul class="navbar-nav d-lg-block d-none">
          <li class="nav-item">
            <a href="https://www.creative-tim.com/product/soft-ui-dashboard" class="btn btn-sm btn-round mb-0 me-1 bg-gradient-light">Free download</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <main class="main-content  mt-0">
    <section class="min-vh-100 mb-8">
      <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('enterprise/assets/img/curved-images/curved14.jpg');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 text-center mx-auto">
              <h1 class="text-white mb-2 mt-5">Welcome!</h1>
              <p class="text-lead text-white">Use these awesome forms to login or create new account in your project for free.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
          <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0">
              <div class="card-header text-center pt-4">
                <h5>Log in</h5>
              </div>
              <div class="card-body">
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" role="form text-left">
             
                  <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="name" aria-label="Email" aria-describedby="email-addon">
                  </div>
                  <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="pass" aria-label="Password" aria-describedby="password-addon">
                  </div>

                  <div class="text-center">
                    <input type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2" value="Log in">
                  </div>
                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <footer class="footer py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mb-4 mx-auto text-center">
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Company
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              About Us
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Team
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Products
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Blog
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Pricing
            </a>
          </div>
          <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-dribbble"></span>
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-twitter"></span>
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-instagram"></span>
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-pinterest"></span>
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-github"></span>
            </a>
          </div>
        </div>
        <div class="row">
          <div class="col-8 mx-auto text-center mt-1">
            <p class="mb-0 text-secondary">
              Copyright © <script>
                document.write(new Date().getFullYear())
              </script> Soft by Creative Tim.
            </p>
          </div>
        </div>
      </div>
    </footer>
    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  </main>
  <!--   Core JS Files   -->
  <script src="enterprise/assets/js/core/popper.min.js"></script>
  <script src="enterprise/assets/js/core/bootstrap.min.js"></script>
  <script src="enterprise/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="enterprise/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="enterprise/assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>