<?php
include('login_m.php');

if (isset($_SESSION['login_user1'])) {
  if ($_SESSION['role'] == 'superadmin') {
    header("location: superadmin.php"); 
  } else {
    header("location: myrestaurant.php"); 
  }
}

$error = ""; 
?>

<!DOCTYPE html>
<html>
<head>
  <title>Manager Login | Foodie Deliver Mbarara</title>
  <link rel="stylesheet" type="text/css" href="css/managerlogin.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .navbar {
      background-color: #2c3e50;
      border-radius: 0;
    }
    .navbar-brand {
      color: #fff !important;
      font-weight: bold;
    }
    .navbar-nav > li > a {
      color: #fff !important;
    }
    .jumbotron {
      background-color: #2c3e50;
      color: white;
      padding: 10px 10px;
      text-align: center;
      font-size: 15px;
    }
    .panel-primary {
      border-color: #2c3e50;
    }
    .panel-primary > .panel-heading {
      color: #fff;
      background-color: #2c3e50;
      border-color: #2c3e50;
    }
    .form-control {
      border-radius: 0;
    }
    .btn-primary {
      background-color: #2c3e50;
      border-color: #2c3e50;
      border-radius: 0;
    }
    #myBtn {
      display: none;
      position: fixed;
      bottom: 20px;
      right: 30px;
      z-index: 99;
      font-size: 18px;
      border: none;
      outline: none;
      background-color: #2c3e50;
      color: white;
      cursor: pointer;
      padding: 15px;
      border-radius: 4px;
    }
    #myBtn:hover {
      background-color: #555;
    }
  </style>
</head>
<body>

<button onclick="topFunction()" id="myBtn" title="Go to top">
  <i class="fas fa-chevron-up"></i>
</button>

<script type="text/javascript">
  window.onscroll = function() {
    scrollFunction();
  };

  function scrollFunction(){
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      document.getElementById("myBtn").style.display = "block";
    } else {
      document.getElementById("myBtn").style.display = "none";
    }
  }

  function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
</script>

<nav class="navbar navbar-inverse navbar-fixed-top navigation-clean-search" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><i class="fas fa-home"></i> Foodie Deliver Mbarara</a>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php"><i ></i> Home</a></li>
        <li><a href="aboutus.php"><i ></i> About</a></li>
        <li><a href="contactus.php"><i ></i> Contact Us</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i> Sign Up <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="customersignup.php"><i class="fas fa-user"></i> User Sign-up</a></li>
            <li><a href="managersignup.php"><i class="fas fa-user-tie"></i> Manager Sign-up</a></li>
          </ul>
        </li>

        <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-sign-in-alt"></i> Login <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="customerlogin.php"><i class="fas fa-user"></i> Customer Login</a></li>
            <li><a href="managerlogin.php"><i class="fas fa-user-tie"></i> Manager Login</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <div class="jumbotron">
    <h1>Hi Manager!,<br> Welcome to <span class="edit">Foodie Deliver Mbarara</span></h1>

    <p>Kindly LOGIN to continue.</p>
  </div>
</div>

<div class="container" style="margin-top: 1%; margin-bottom: 2%;">
  <div class="col-md-5 col-md-offset-4">
    <label style="margin-left: 5px;color: red;"><span> <?php echo $error; ?> </span></label>
    <div class="panel panel-primary">
      <div class="panel-heading">Login</div>
      <div class="panel-body">
        <form action="" method="POST">
          <div class="row">
            <div class="form-group col-xs-12">
              <label for="username"><span class="text-danger" style="margin-right: 5px;">*</span> Username:</label>
              <div class="input-group">
                <input class="form-control" id="username" type="text" name="username" placeholder="Username" required="" autofocus="">
                <span class="input-group-btn">
                  <label class="btn btn-primary"><i class="fas fa-user"></i></label>
                </span>
              </div>           
            </div>
          </div>

          <div class="row">
            <div class="form-group col-xs-12">
              <label for="password"><span class="text-danger" style="margin-right: 5px;">*</span> Password:</label>
              <div class="input-group">
                <input class="form-control" id="password" type="password" name="password" placeholder="Password" required="">
                <span class="input-group-btn">
                  <label class="btn btn-primary"><i class="fas fa-lock"></i></label>
                </span>
              </div>           
            </div>
          </div>

          <div class="row">
            <div class="form-group col-xs-4">
              <button class="btn btn-primary" name="submit" type="submit" value="Login"><i class=""></i> Login</button>
            </div>
          </div>
          <label style="margin-left: 5px;">or</label> <br>
          <label style="margin-left: 5px;"><a href="managersignup.php">Create a new account.</a></label>
        </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>
