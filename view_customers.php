<?php
include('session_m.php');

if (!isset($login_session)) {
  header('Location: managerlogin.php'); 
}
?>
<!DOCTYPE html>
<html>
<head>
  <title> View Customers | Foodie Deliver Mbarara </title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
      background-color: #2c3e50;
    }
    .sidebar {
      position: fixed;
      width: 20%;
      height: 100%;
      background-color: #2c3e50;
      margin-top: 20px;
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
      height: 25vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
    }
    .form-area {
      padding: 20px;
      background-color: #f7f7f7;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      margin-bottom: 20px;
    }
    .table-container {
      margin-top: 20px;
    }
    .table-title {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 10px;
    }
    .table-title h3 {
      margin: 0;
      color: #2c3e50;
    }
    .table-title .btn {
      background-color: blue;
      color: white;
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
            <li><a href="#"><i class="fas fa-user"></i> Welcome <?php echo $login_session; ?> </a></li>
            <li class="active"><a href="superadmin.php"><i class="fas fa-user-shield"></i> Super Admin Panel</a></li>
            <li><a href="logout_m.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <div class="sidebar">
    <div class="list-group">
      <a href="superadmin.php" class="list-group-item"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
      <a href="view_restaurants.php" class="list-group-item"><i class="fas fa-utensils"></i> View Restaurants</a>
      <a href="view_orders.php" class="list-group-item"><i class="fas fa-receipt"></i> View Orders</a>
      <a href="view_customers.php" class="list-group-item active"><i class="fas fa-users"></i> View Customers</a>
      <a href="view_managers.php" class="list-group-item"><i class="fas fa-user-tie"></i> View Managers</a>
      <a href="#" class="list-group-item"><i class="fas fa-cogs"></i> Settings</a>
    </div>
  </div>

  <div class="main-content">
    <div class="container">
      <div class="jumbotron">
        <h1>Hello Super Admin!</h1>
        <p>Manage the entire system from here</p>
      </div>

      <div class="table-container">
        <div class="table-title">
          <h3>List of Customers</h3>
        </div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Username</th>
              <th>Full Name</th>
              <th>Email</th>
              <th>Contact</th>
              <th>Address</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include('connection.php'); 
            $sql = "SELECT * FROM customer";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['fullname'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['contact'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td><a href='delete_customer.php?id=" . $row['username'] . "' class='btn btn-danger btn-sm'>Delete</a></td>";
                echo "</tr>";
              }
            } else {
              echo "<tr><td colspan='6'>No customers found</td></tr>";
            }

            mysqli_close($conn);
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
