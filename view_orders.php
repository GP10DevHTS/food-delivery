<?php
include('session_m.php');

if (!isset($login_session)) {
  header('Location: managerlogin.php');
}

if (isset($_GET['delete_id'])) {
  include('connection.php');
  $delete_id = $_GET['delete_id'];
  $delete_sql = "DELETE FROM orders WHERE order_ID = '$delete_id'";
  if (mysqli_query($conn, $delete_sql)) {
    echo "<script>alert('Order deleted successfully');</script>";
  } else {
    echo "<script>alert('Error deleting order');</script>";
  }
  // mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>

<head>
  <title> View Orders | Foodie Deliver Mbarara </title>
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
      height: 18vh;
      margin-top: 20px;
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
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
            <li><a href="aboutus.php"><i></i> About</a></li>
            <li><a href="contactus.php"><i></i> Contact Us</a></li>
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
      <a href="view_orders.php" class="list-group-item active"><i class="fas fa-receipt"></i> View Orders</a>
      <a href="view_customers.php" class="list-group-item"><i class="fas fa-users"></i> View Customers</a>
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


  


      <?php
      // Fetch customer orders
      $sql = "SELECT co.ai_id as ai_id, co.id as id, co.customer_id as customer_id, co.payment_status as payment_status, co.order_date as order_date, co.payment_method as payment_method, c.fullname as fullname, c.contact as contact
        FROM customer_order co 
        JOIN customer c ON co.customer_id = c.id 
        ORDER BY co.id DESC";
      $res = mysqli_query($conn, $sql);

      if (mysqli_num_rows($res) > 0) {
        echo "<div class='table-container'>";
        echo "<div class='table-title'>";
        echo "<h3>Customer Orders</h3>";
        echo "<a href='view_orders.php' class='btn btn-warning'>Refresh</a>";
        echo "</div>";
        echo "<table class='table table-bordered'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Order ID</th>";
        echo "<th>Customer Name</th>";
        echo "<th>Payment Status</th>";
        echo "<th>Order Date</th>";
        echo "<th>Payment Type</th>";
        echo "<th>Action</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($row = mysqli_fetch_assoc($res)) {
          $modalId = "orderModal" . $row['ai_id']; // Unique modal ID for each order row

          echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['fullname'] . " <br> " . $row['contact'] . " </td>";
          echo "<td>" . $row['payment_status'] . "</td>";
          echo "<td>" . $row['order_date'] . "</td>";
          echo "<td>" . $row['payment_method'] . "</td>";

          // Store order details in hidden rows for the modal
          $sql2 = "SELECT * FROM orders WHERE customer_order_id = '" . $row['ai_id'] . "'";
          $res2 = mysqli_query($conn, $sql2);

          $orderDetails = "<ul>";
          while ($row2 = mysqli_fetch_assoc($res2)) {
            $orderDetails .= "<li><strong>Order ID:</strong> " . $row2['order_ID'] . "</li>";
            $orderDetails .= "<li><strong>Food Name:</strong> " . $row2['foodname'] . "</li>";
            $orderDetails .= "<li><strong>Quantity:</strong> " . $row2['quantity'] . "</li>";
            $orderDetails .= "<li><strong>Price:</strong> UGX " . $row2['price'] . "</li>";
            $orderDetails .= "<li><strong>Status:</strong> " . $row2['status'] . "</li>";
            $orderDetails .= "<hr>";
          }
          $orderDetails .= "</ul>";

          // Embed the details into a data attribute for the modal
          echo "<td><button class='btn btn-primary' data-toggle='modal' data-target='#$modalId'>View Details</button></td>";
          echo "</tr>";

          // Generate a unique modal for each order
      ?>
          <!-- Modal -->
          <div class="modal fade" id="<?php echo $modalId; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Order ID: <?php echo $row['id']; ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <!-- Display order details -->
                  <?php echo $orderDetails; ?>
                </div>
                <div class="modal-footer">
                  <!-- <button type="button" class="btn btn-primary mark-paid-btn" data-order-id="<?php echo $row['id']; ?>">Mark Paid</button> -->
                  <?php

                  if ($row['payment_status'] != 'Paid') {
                  ?>
                  
                    <a href="mark_order_paid.php?id=<?php echo $row['id']; ?>" class="btn btn-primary mark-paid-btn">Mark Paid</a>

                  <?php
                  } else {
                    echo "<span class='text-success mr-3'>Paid</span>";
                  }

                  ?>

                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
      <?php
        }

        echo "</tbody>";
        echo "</table>";
        echo "</div>";
      }
      ?>
















    </div>

    <!-- Include Bootstrap JS if not already included -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

  </div>

</body>

</html>