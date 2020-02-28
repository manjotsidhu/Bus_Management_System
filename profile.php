<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: index.php");
}

$user_id = $_SESSION['user']['USER_ID'][0];
$user_fname = $_SESSION['user']['FIRST_NAME'][0];
$user_lname = $_SESSION['user']['LAST_NAME'][0];
$user_email = $_SESSION['user']['EMAIL'][0];
$date_of_birth = $_SESSION['user']['DATE_OF_BIRTH'][0];
$mobile_number = $_SESSION['user']['MOBILE_NUMBER'][0];
if (isset($_POST['logout'])) {
  session_destroy();
  header('Location: index.php');
}
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>BUS MANAGEMENT SYSTEM</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/custom.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
  <style type="text/css">
    html,
    body,
    header,
    .view {
      height: 100%;
    }

    @media (max-width: 740px) {

      html,
      body,
      header,
      .view {
        height: 1000px;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {

      html,
      body,
      header,
      .view {
        height: 650px;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {
      .navbar:not(.top-nav-collapse) {
        background: #1C2331 !important;
      }
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar  navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand" href="dashboard.php">
        <strong>Bus Management System</strong>
      </a>

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link waves-effect" href="">Profile</a>
          </li>
        </ul>

        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">

          <li class="nav-item mr-4">
            <a href="https://github.com/manjotsidhu/Bus_Management_System" class="nav-link border border-light rounded" target="_blank">
              <i class="fab fa-github mr-2"></i>BMS GitHub
            </a>
          </li>

          <li class="nav-item ">
            <form method="post">
              <button type="submit" class="btn-sm btn-info nav-link border border-light rounded" name="logout">
                <i class="fas fa-user mr-2"></i><?php echo strtolower($user_fname); ?>, Logout
              </button>
            </form>
          </li>
        </ul>

      </div>

    </div>
  </nav>
  <!-- Navbar -->

  <!-- Intro -->
  <div class="card card-intro blue-gradient">

    <div class="card-body white-text rgba-black-light text-center">

      <!--Grid row-->
      <div class="row d-flex justify-content-center">

        <!--Grid column-->
        <div class="col-md-6">
          <h2>Profile</h2>
        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </div>

  </div>
  <!-- Intro -->

  <!--Main layout-->
  <main>
    <div class="fluid-container">


      <!--Section: Content-->
      <section class="aqua-gradient p-5">

        <form class="container" action="">

          <div class="row">
            <div class="mx-auto">
              <!-- Material form login -->
              <div class="card text-center">

                <!--Card content-->
                <div class="card-body">
                        
                        <div class="row">
                  
                          <div class="col-md-4 text-center" >
                            <img class="img rounded-left mx-2" src="img/user.png" alt="project image">
                          </div>
                  
                          <div class="col-md-8 p-5">
                  
                            <h3 class="font-weight-normal mb-3"><?php echo $user_fname." ".$user_lname ?></h3>
                  
                            <p class="text-muted"><?php echo $user_email ?></p>
                  
                            <ul class="list-unstyled font-small mt-5 mb-0">
                              <li>
                                <p class="text-uppercase mb-2"><strong>Mobile Number</strong></p>
                                <p class="text-muted mb-4">91+ <?php echo $mobile_number ?></p>
                              </li>
                  
                              <li>
                                <p class="text-uppercase mb-2"><strong>Date of Birth</strong></p>
                                <p class="text-muted mb-4"><?php echo $date_of_birth ?></p>
                              </li>
                            </ul>
                  
                          </div>
                  
                        </div>
                  
                </div>

              </div>
              <!-- Material form login -->
            </div>
          </div>

        </form>

      </section>
      <!--Section: Content-->

    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer class="page-footer text-center font-small mb-2">
    <!--Copyright-->
    <div class="footer-copyright py-3">
      © 2020 Copyright:
      <a href="" target="_blank"> BUS MANAGEMENT </a>
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>
</body>

</html>