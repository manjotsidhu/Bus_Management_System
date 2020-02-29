<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: index.php");
}

$success = false;
$routes = [];

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

if (isset($_POST['book'])) {
  require 'db.php';
  
  $stid1 = oci_parse($conn, sprintf("SELECT * FROM routes WHERE source='%s'and destination='%s'", $_POST['source'], $_POST['destination']));
  oci_execute($stid1);
  $nroutes = oci_fetch_all($stid1, $row);
  $routes = $row;
  oci_free_statement($stid1);
    
  $stid = oci_parse($conn, sprintf("INSERT INTO tickets VALUES (%d, %d, '%s', '%s', %d, '%s', %d)"
  , 1, $user_id, $_POST['name'], $_POST['email'], $routes['ROUTE_ID'][0], $_POST['ticketType'], 1));
  
  if (!oci_execute($stid)) {
    $success = true;

  }
  else{
    echo $success;
  }

  oci_free_statement($stid);
  oci_close($conn);
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
            <h2>Bus Reservation</h2>
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
  <section class="p-5 text-center" 
  style="background-image: url(https://mdbootstrap.com/img/Photos/Others/background.jpg); background-size: cover; background-position: 0;">


    <div class="row">
      <div class="col-md-6 mx-auto">
        <!-- Material form login -->
        <div class="card">

          <!--Card content-->
          <div class="card-body">

            <!-- Form -->
            <form class="text-center" style="color: #757575;" method="POST">

              <h3 class="font-weight-bold my-4 pb-2 text-center dark-grey-text">Book Your Tickets Now</h3>

              <input type="name" name="name" class="form-control mb-4" placeholder="Name">
              <!-- Name -->
              <input name="email" class="form-control mb-4" placeholder="Email">

              <select name="ticketType" class="browser-default custom-select mb-4">
                <option value="" disabled selected>Choose your ticket type</option>
                <option value="Sleeper">Sleeper</option>
                <option value="Semi-Sleeper">Semi-Sleeper</option>
                <option value="Seater">Seater</option>
              </select>
              <select name="source" class="browser-default custom-select mb-4">
                <option value="" disabled selected>Source Location</option>
                <option value="Bengaluru">Bengaluru</option>
                <option value="Hyderabad">Hyderabad</option>
                <option value="Nagpur">Nagpur</option>
                <option value="Mumbai">Mumbai</option>
              </select>
              <select name="destination" class="browser-default custom-select mb-4">
                <option value="" disabled selected>Destination Location</option>
                <option value="Bengaluru">Bengaluru</option>
                <option value="Hyderabad">Hyderabad</option>
                <option value="Nagpur">Nagpur</option>
                <option value="Mumbai">Mumbai</option>
              </select>              
              <div class="text-center">
                <button type="submit" class="btn btn-outline-orange btn-rounded my-4 waves-effect" name="book">Book</button>
              </div>

            </form>
            <!-- Form -->

          </div>

        </div>
        <!-- Material form login -->
      </div>
    </div>

  

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