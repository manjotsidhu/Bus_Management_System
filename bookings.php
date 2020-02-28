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
$tickets = [];
$ntickets = 0;
require 'db.php';

$stid = oci_parse($conn, sprintf("SELECT * FROM tickets natural join routes where tickets.user_id = %d", $user_id));
    oci_execute($stid);
    $ntickets = oci_fetch_all($stid, $row);
    $tickets = $row;
    oci_free_statement($stid);

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
          <h2>Your Bookings</h2>
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
      <section class="aqua-gradient p-5 text-center">

        <form class="container" action="">

          <div class="row">
            <div class="mx-auto">
              <!-- Material form login -->
              <div class="card">

                <!--Card content-->
                <div class="card-body">

                  <!-- Table with panel -->
                  <div class="card card-cascade narrower">

                    <!--Card image-->
                    <div
                      class="view view-cascade gradient-card-header aqua-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

                      <div>
                      </div>

                      <a href="" class="white-text mx-3"><?php echo ucwords(strtolower($user_fname." ".$user_lname));?></a>

                      <div>
                      </div>

                    </div>
                    <!--/Card image-->

                    <div class="px-4">

                      <div class="table-wrapper">
                        <!--Table-->
                        <table class="table table-hover mb-0">

                          <!--Table head-->
                          <thead>
                            <tr>
                              <th class="th-lg">
                                <a>Ticket Id
                                  
                                </a>
                              </th>
                              <th class="th-lg">
                                <a href="">Passenger Name
                                  
                                </a>
                              </th>
                              <th class="th-lg">
                                <a href="">Passenger Email
                                  
                                </a>
                              </th>
                              <th class="th-lg">
                                <a href="">Source
                                  
                                </a>
                              </th>
                              <th class="th-lg">
                                <a href="">Destination
                                  
                                </a>
                              </th>
                              <th class="th-lg">
                                <a href="">Ticket Type
                                  
                                </a>
                              </th>
                              <th class="th-lg">
                                <a href="">Fare
                                  
                                </a>
                              </th>
                            </tr>
                          </thead>
                          <!--Table head-->

                          <!--Table body-->
                          <tbody>
                            <?php
                              for ($i=0; $i < $ntickets; $i++) { ?>
                                <tr>
                                  <td><?php echo $tickets['TICKET_ID'][$i]?></td>
                                  <td><?php echo $tickets['PASSENGER_NAME'][$i]?></td>
                                  <td><?php echo $tickets['PASSENGER_EMAIL'][$i]?></td>
                                  <td><?php echo $tickets['SOURCE'][$i]?></td>
                                  <td><?php echo $tickets['DESTINATION'][$i]?></td>
                                  <td><?php echo $tickets['TYPE_OF_TICKET'][$i]?></td>
                                  <td><?php echo $tickets['FARE'][$i]?></td>
                                </tr>
                            <?php  }
                            ?>
                          </tbody>
                          <!--Table body-->
                        </table>
                        <!--Table-->
                      </div>

                    </div>

                  </div>
                  <!-- Table with panel -->
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
      <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank"> BUS MANAGEMENT </a>
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