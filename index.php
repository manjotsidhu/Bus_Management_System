<!DOCTYPE html>
<html lang="en">
<?php 
// Session
session_start();
require 'db.php'; 
$_SESSION["conn"] = $conn; 

$loginError = false;
$signUpError = false;
$signUpErrorMessage = [];

if(isset($_POST['login'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $stid = oci_parse($conn, sprintf("SELECT * FROM USERS WHERE EMAIL='%s' AND PASSWORD='%s'", $user, $pass));
    oci_execute($stid);
    oci_fetch_all($stid, $row);

    if (oci_num_rows($stid) == 1) {
      $_SESSION['user'] = $row;

      header("Location: dashboard.php");
      exit();
    } else {
      $loginError = true;
    }

    oci_free_statement($stid);

} else if (isset($_POST['signup'])) {
    
  $stid = oci_parse($conn, sprintf("INSERT INTO users VALUES (%d, '%s', '%s', '%s', '%s', '%s', '%s')", 0, $_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['phno'], $_POST['pass'], $_POST['dob']));
  if (!oci_execute($stid)) {
    $signUpError = true;
    $signUpErrorMessage = oci_error($stid);
  }
  
  oci_free_statement($stid);
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
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand" href="https://mdbootstrap.com/docs/jquery/" target="_blank">
        <strong>BMS - Bus Management System</strong>
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

        </ul>

        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item">
            <a href="https://github.com/mdbootstrap/bootstrap-material-design"
              class="nav-link border border-light rounded" target="_blank">
              <i class="fab fa-github mr-2"></i>BMS GitHub
            </a>
          </li>
        </ul>

      </div>

    </div>
  </nav>
  <!-- Navbar -->

  <!-- Full Page Intro -->
  <div class="view full-page-intro"
    style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/78.jpg'); background-repeat: no-repeat; background-size: cover;">
    
    <!-- Mask & flexbox options-->
    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

      <!-- Content -->
      <div class="container">
      <?php if($loginError) { ?>
        <div class="alert alert-danger text-center" role="alert">
          Invalid Credientials, Please try again
        </div>
      <?php } else if($signUpError) {?>
        <div class="alert alert-danger text-center" role="alert">
          <?php echo $signUpErrorMessage['message']; ?>
        </div>
      <?php } ?>

        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->
          <div class="col-md-6 mb-4 white-text text-center text-md-left">

            <h1 class="display-4 font-weight-bold">BOOK BUS with BMS</h1>

            <hr class="hr-light">

            <p>
              <strong>Best way to plan your travel: Online Bus Management System</strong>
            </p>

            <p class="mb-4 d-none d-md-block">
              <strong>The most convinient way to plan and travel.Best values offered. Loved by over 500 000 customers.
                Multiple sites and travel plans
                available. Create your own, Lovable Memory.</strong>
            </p>

            <a target="_blank" href="https://mdbootstrap.com/education/bootstrap/" class="btn btn-indigo btn-lg">Start
              your Travel
              <i class="fas fa-graduation-cap ml-2"></i>
            </a>

          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-6 col-xl-5 mb-4">

            <!--Form-->
            <div id="loginbox" class="">

              <div class="card">

                <h5 class="card-header info-color white-text text-center py-4">
                  <strong>Sign in</strong>
                </h5>

                <!--Card content-->
                <div class="card-body px-lg-5 pt-0">

                  <!-- Form -->
                  <form class="text-center" style="color: #757575;" method="post" name="login">

                    <!-- Email -->
                    <div class="md-form">
                      <input name="user" type="email" id="materialLoginFormEmail" class="form-control" required>
                      <label for="materialLoginFormEmail">E-mail</label>
                    </div>

                    <!-- Password -->
                    <div class="md-form">
                      <input name="pass" type="password" id="materialLoginFormPassword" class="form-control" required>
                      <label for="materialLoginFormPassword">Password</label>
                    </div>

                    <div class="d-flex justify-content-around">
                      <div>
                        <!-- Remember me -->
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="materialLoginFormRemember">
                          <label class="form-check-label" for="materialLoginFormRemember">Remember me</label>
                        </div>
                      </div>
                      <div>
                        <!-- Forgot password -->
                        <a href="">Forgot password?</a>
                      </div>
                    </div>

                    <!-- Sign in button -->
                    <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0"
                      type="submit" name="login">Sign in</button>

                    <!-- Register -->
                    <p>Not a member?
                      <a onclick="$('#loginbox').hide(); $('#signupbox').show()">Register</a>
                    </p>

                  </form>
                  <!-- Form -->

                </div>
              </div>
            </div>
            <!--/.Card-->

            <div id="signupbox" style="display:none">
              <div class="card">

                <h5 class="card-header info-color white-text text-center py-4">
                  <strong>Sign up</strong>
                </h5>

                <!--Card content-->
                <div class="card-body px-lg-5 pt-0">

                  <!-- Form -->
                  <form class="text-center" style="color: #757575;" method="post" name="signup">

                    <div class="form-row">
                      <div class="col">
                        <!-- First name -->
                        <div class="md-form">
                          <input type="text" name="fname" id="materialRegisterFormFirstName" class="form-control" required>
                          <label for="materialRegisterFormFirstName">First name</label>
                        </div>
                      </div>
                      <div class="col">
                        <!-- Last name -->
                        <div class="md-form">
                          <input type="text" name="lname" id="materialRegisterFormLastName" class="form-control" required>
                          <label for="materialRegisterFormLastName">Last name</label>
                        </div>
                      </div>
                    </div>

                    <!-- E-mail -->
                    <div class="md-form mt-0">
                      <input type="email" name="email" id="materialRegisterFormEmail" class="form-control" required>
                      <label for="materialRegisterFormEmail">E-mail</label>
                    </div>

                    <!-- Password -->
                    <div class="md-form">
                      <input type="password" name="pass" id="materialRegisterFormPassword" class="form-control"
                        aria-describedby="materialRegisterFormPasswordHelpBlock" required>
                      <label for="materialRegisterFormPassword">Password</label>
                    </div>

                    <div class="md-form">
                      <input type="text" name="dob" name="date" id="date" class="form-control datepicker" value="" required />
                      <label for="date">Date of Birth</label>
                    </div>

                    <!-- Phone number -->
                    <div class="md-form">
                      <input type="text" name="phno" id="materialRegisterFormPhone" class="form-control"
                        aria-describedby="materialRegisterFormPhoneHelpBlock">
                      <label for="materialRegisterFormPhone">Phone number</label>
                    </div>

                    <!-- Sign up button -->
                    <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="signup">Sign up</button>

                    <hr>

                    <p>
                      <a onclick="$('#loginbox').show(); $('#signupbox').hide()">Sign in</a> instead.
                    </p>

                  </form>
                  <!-- Form -->

                </div>
              </div>

            </div>
          </div>

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </div>
    <!-- Content -->

  </div>
  <!-- Mask & flexbox options-->

  </div>
  <!-- Full Page Intro -->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/custom.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

    (function() {
'use strict';
window.addEventListener('load', function() {
// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.getElementsByClassName('needs-validation');
// Loop over them and prevent submission
var validation = Array.prototype.filter.call(forms, function(form) {
form.addEventListener('submit', function(event) {
if (form.checkValidity() === false) {
event.preventDefault();
event.stopPropagation();
}
form.classList.add('was-validated');
}, false);
});
}, false);
})();

$(document).ready(function() {
$('.datepicker').pickadate();
$('.datepicker').removeAttr('readonly');
});
  </script>
</body>

</html>