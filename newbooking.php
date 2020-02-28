<!DOCTYPE html>
<html lang="en">

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
                <a href="" class="nav-link border border-light rounded" target="_blank">
                  <i class="fab fa-user mr-2"></i>Logout
                </a>
              </li>

            <li class="nav-item">
                <a href="" class="nav-link border border-light rounded" target="_blank">
                  <i class="fab fa-github mr-2"></i>BMS GitHub
                </a>
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

  <form class="container" action="">

    <div class="row">
      <div class="col-md-6 mx-auto">
        <!-- Material form login -->
        <div class="card">

          <!--Card content-->
          <div class="card-body">

            <!-- Form -->
            <form class="text-center" style="color: #757575;" action="#!">

              <h3 class="font-weight-bold my-4 pb-2 text-center dark-grey-text">Book Your Tickets Now</h3>

              <input type="name" name="name" class="form-control mb-4" placeholder="Name">
              <!-- Name -->
              <input name="email" class="form-control mb-4" placeholder="Email">

              <select name="ticketType" class="browser-default custom-select mb-4">
                <option value="" disabled selected>Choose your ticket type</option>
                <option value="1">Sleeper</option>
                <option value="2">Semi-Sleeper</option>
                <option value="3">Seater</option>
              </select>
              <select name="source" class="browser-default custom-select mb-4">
                <option value="" disabled selected>Source Location</option>
                <option value="1">Bengaluru</option>
                <option value="2">Hyderabad</option>
                <option value="3">Nagpur</option>
                <option value="4">Mumbai</option>
              </select>
              <select name="destination" class="browser-default custom-select mb-4">
                <option value="" disabled selected>Destination Location</option>
                <option value="1">Bengaluru</option>
                <option value="2">Hyderabad</option>
                <option value="3">Nagpur</option>
                <option value="4">Mumbai</option>
              </select>              
              <div class="text-center">
                <button type="button" class="btn btn-outline-orange btn-rounded my-4 waves-effect">Book</button>
              </div>

            </form>
            <!-- Form -->

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