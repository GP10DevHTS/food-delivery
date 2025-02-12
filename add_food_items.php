<?php
include('session_m.php');

if(!isset($login_session)){
    header('Location: managerlogin.php'); 
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Manager Login | Foodie Deliver Mbarara</title>
  <link rel="stylesheet" type="text/css" href="css/add_food_items.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }
    .header {
      margin-bottom: 20px;
    }
    .sidebar {
      position: fixed;
      width: 20%;
      height: 100%;
      background-color: #2c3e50;
      margin-top: 40px;
    }
    .sidebar .list-group-item {
      font-size: 18px;
      padding: 15px 10px;
      color: white;
      font-weight: bold;
      background-color: #2c3e50;
    }
    .main-content {
      margin-left: 20%;
      padding: 20px;
      width: 80%;
    }
    .jumbotron {
      background-color: #2c3e50;
      color: white;
      padding: 20px;
      margin-top: 30px;
      text-align: center;
    }
    .form-area {
      padding: 20px;
      background-color: #f7f7f7;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
  </style>
</head>

<body>
  <button onclick="topFunction()" id="myBtn" title="Go to top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </button>
  
  <script type="text/javascript">
    window.onscroll = function() {
      scrollFunction();
    };

    function scrollFunction() {
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

  <div class="header">
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
            <li><a href="index.php"> Home</a></li>
            <li><a href="aboutus.php"><i ></i> About</a></li>
            <li><a href="contactus.php"><i ></i> Contact Us</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class=""></span><i class="fas fa-user"></i> Welcome <?php echo $login_session; ?></a></li>
            <li class="active"><a href="managerlogin.php"><i class="fas fa-user-tie"></i> MANAGER CONTROL PANEL</a></li>
            <li><a href="logout_m.php"><span class=""></span><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <div class="sidebar">
    <div class="list-group">
      <a href="myrestaurant.php" class="list-group-item"><i class="fas fa-utensils"></i> My Restaurant</a>
      <a href="add_food_items.php" class="list-group-item active"><i class="fas fa-plus-circle"></i> Add Food Items</a>
      <a href="edit_food_items.php" class="list-group-item"><i class="fas fa-edit"></i> Edit Food Items</a>
    </div>
  </div>

  <div class="main-content">
    <div class="container">
      <div class="jumbotron">
        <h1>Hello Manager!</h1>
        <p>Manage all your restaurant from here</p>
      </div>

      <div class="form-area">
        <form action="add_food_items1.php" method="POST" enctype="multipart/form-data">
          <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;">ADD NEW FOOD ITEM HERE</h3>

          <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" placeholder="Your Food name" required="">
          </div>     

          <div class="form-group">
            <input type="text" class="form-control" id="price" name="price" placeholder="Your Food Price (UGX)" required="">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="description" name="description" placeholder="Your Food Description" required="">
          </div>

          <div class="form-group">
            <input type="file" class="form-control" id="images_path" name="images_path" placeholder="Your Food Image Path [images/<filename>.<extention>]" required="">
          </div>

          <div class="form-group">
            <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">ADD FOOD</button>    
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
</html>
