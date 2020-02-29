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
      <a class="navbar-brand" href="">
        <strong>Bus Management System</strong>
      </a>

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link waves-effect" href="profile.php">Profile</a>
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

          <h2>Welcome to Bus Management System!</h2>
          <p class="lead">Hi <?php echo ucwords(strtolower($user_fname)); ?> <?php echo ucwords(strtolower($user_lname)); ?>, Now you can easily book your tickets, check your bookings and driver details. You can also view your profile.</p>


        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </div>

  </div>
  <!-- Intro -->

  <!--Main layout-->
  <main>
    <div class="container my-5">


      <!-- Section: Block Content -->
      <section class="dark-grey-text text-center">

        <!-- Grid row -->
        <div class="row">

          <!-- Grid column -->
          <div class="col-lg-4 col-md-12 mb-4">

            <div class="overlay rounded z-depth-1">
              <img src="img/1.jpg" class="img-fluid" alt="Ticket Booking">
              <a>
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>

            <div class="px-3 pt-3 mx-1 mt-1 pb-0">
              <h4 class="font-weight-bold mt-1 mb-3">Ticket Bookings</h4>
              <p class="text-muted">Book your bus tickets from anywhere anytime.</p>
              <a class="btn btn-indigo btn-sm btn-rounded" href="newbooking.php"><i class="fas fa-clone left"></i> Book Now</a>
            </div>

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-lg-4 col-md-6 mb-4">

            <div class="overlay rounded z-depth-1">
              <img src="img/2.png" class="img-fluid" alt="Booking Details">
              <a>
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>

            <div class="px-3 pt-3 mx-1 mt-1 pb-0">
              <h4 class="font-weight-bold mt-1 mb-3">Your Bookings</h4>
              <p class="text-muted">Last Booking done on 24th February 2020.</p>
              <a class="btn btn-indigo btn-sm btn-rounded" href="bookings.php"><i class="fas fa-clone left"></i> View Booking Details</a>
            </div>

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-lg-4 col-md-6 mb-4">

            <div class="overlay rounded z-depth-1">
              <img src="img/3.jpg" class="img-fluid" alt="Bus Details">
              <a>
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>

            <div class="px-3 pt-3 mx-1 mt-1 pb-0">
              <h4 class="font-weight-bold mt-1 mb-3">Bus Details</h4>
              <p class="text-muted">Check bus and driver details.</p>
              <a class="btn btn-indigo btn-sm btn-rounded" href="busdetails.php"><i class="fas fa-clone left"></i> View Driver Details</a>
            </div>

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->

      </section>
      <!-- Section: Block Content -->


    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer class="page-footer text-center font-small mb-0">
    <!--Copyright-->
    <div class="footer-copyright py-3">
      © 2020 Copyright:
      <a href="https://github.com/manjotsidhu/Bus_Management_System" target="_blank">BUS MANAGEMENT</a>
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