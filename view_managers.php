<?php
include('session_m.php');

if (!isset($login_session)) {
  header('Location: managerlogin.php'); 
}
?>
<!DOCTYPE html>
<html>
<head>
  <title> Super Admin Dashboard | Foodie Deliver Mbarara </title>
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
      height: 18vh;
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
      <a href="superadmin.php" class="list-group-item active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
      <a href="view_restaurants.php" class="list-group-item"><i class="fas fa-utensils"></i> View Restaurants</a>
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
          <h3>List of Managers</h3>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addManagerModal"><i class="fas fa-plus-circle"></i> Add Manager</button>
        </div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Username</th>
              <th>Name</th>
              <th>Email</th>
              <th>Contact</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include('connection.php'); 
            $sql = "SELECT manager_id, username, fullname, email, contact FROM manager";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['manager_id'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['fullname'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['contact'] . "</td>";
                echo "<td>
                        <a href='edit_manager.php?id=" . $row['manager_id'] . "' class='btn btn-warning btn-sm'><i class='fas fa-edit'></i> Edit</a>
                        <a href='delete_manager.php?id=" . $row['username'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this manager?\");'><i class='fas fa-trash'></i> Delete</a>
                      </td>"; 
                echo "</tr>";
              }
            } else {
              echo "<tr><td colspan='6'>No managers found</td></tr>";
            }

            mysqli_close($conn);
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal for adding manager -->
  <div id="addManagerModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Manager</h4>
        </div>
        <div class="modal-body">
          <form action="add_manager.php" method="POST">
            <div class="form-group">
              <label for="username">Username:</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" required="">
            </div>
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Name" required="">
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">
            </div>
            <div class="form-group">
              <label for="contact">Contact Number:</label>
              <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact Number" required="">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add Manager</button>
          </form>
        </div>
      </div>

    </div>
  </div>
</body>
</html>
