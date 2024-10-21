<?php
session_start();
require 'connection.php';
// $conn = Connect();
if (!isset($_SESSION['login_user2'])) {
  header("location: customerlogin.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart | Foodie Deliver Mbarara</title>
  <link rel="stylesheet" type="text/css" href="css/cart.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #f8f9fa;
      margin: 0;
      padding: 0;
    }

    .navbar {
        background-color: #2c3e50;
    }

    .navbar-brand,
    .navbar-nav li a {
      color: white !important;
    }

    .jumbotron {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .btn-primary,
    .btn-warning,
    .btn-danger,
    .btn-success {
      margin: 10px 5px;
    }

    .table-responsive {
      margin-top: 20px;
    }

    .table th,
    .table td {
      vertical-align: middle;
    }

    .table .text-danger {
      color: #e74c3c !important;
    }

    #myBtn {
      display: none;
      position: fixed;
      bottom: 20px;
      right: 30px;
      font-size: 18px;
      border: none;
      outline: none;
      background-color: #007bff;
      color: white;
      cursor: pointer;
      padding: 15px;
      border-radius: 50%;
      z-index: 99;
    }

    #myBtn:hover {
      background-color: #555;
    }

    .footer {
      background-color: #3498db;
      color: white;
      text-align: center;
      padding: 15px 0;
      font-size: 20px;
      position: absolute;
      bottom: 0;
      width: 100%;
    }
  </style>
</head>

<body>

  <button onclick="topFunction()" id="myBtn" title="Go to top">
    <i class="fas fa-chevron-up"></i>
  </button>

  <script type="text/javascript">
    window.onscroll = function () {
      scrollFunction()
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

  <nav class="navbar navbar-inverse navbar-fixed-top navigation-clean-search" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Foodie Deliver Mbarara</a>
      </div>

      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a></li>
          <li><a href="aboutus.php">About</a></li>
          <li><a href="contactus.php">Contact Us</a></li>
                    <li><a href="order-tracking.php">Tracking</a></li>
        </ul>

        <?php if (isset($_SESSION['login_user1'])) { ?>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><i class="fas fa-user"></i> Welcome <?php echo $_SESSION['login_user1']; ?></a></li>
            <li><a href="myrestaurant.php">MANAGER CONTROL PANEL</a></li>
            <li><a href="logout_m.php"><i class="fas fa-sign-out-alt"></i> Log Out </a></li>
          </ul>
        <?php } else if (isset($_SESSION['login_user2'])) { ?>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><i class="fas fa-user"></i> Welcome <?php echo $_SESSION['login_user2']; ?></a></li>
            <li><a href="foodlist.php"><i class="fas fa-utensils"></i> Food Zone </a></li>
            <li class="active"><a href="foodlist.php"><i class="fas fa-shopping-cart"></i> Cart
                (<?php echo isset($_SESSION["cart"]) ? count($_SESSION["cart"]) : "0"; ?>)
              </a></li>
            <li><a href="logout_u.php"><i class="fas fa-sign-out-alt"></i> Log Out </a></li>
          </ul>
        <?php } else { ?>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-plus"></i> Sign Up <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="customersignup.php">User Sign-up</a></li>
                <li><a href="managersignup.php">Manager Sign-up</a></li>
                <li><a href="#">Admin Sign-up</a></li>
              </ul>
            </li>
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-sign-in-alt"></i> Login <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="customerlogin.php">Customer Login</a></li>
                <li><a href="managerlogin.php">Manager Login</a></li>
                <li><a href="#">Admin Login</a></li>
              </ul>
            </li>
          </ul>
        <?php } ?>
      </div>
    </div>
  </nav>

  

  <?php if (!empty($_SESSION["cart"])) { ?>
    <div class="container">
    <div class="jumbotron">
      <h1>Your Shopping Cart</h1>
      <p>Looks tasty...!!!</p>
    </div>
  </div>
    <div class="container">
      <div class="table-responsive">
        <table class="table table-striped">
          <thead class="thead-dark">
            <tr>
              <th width="40%">Food Name</th>
              <th width="10%">Quantity</th>
              <th width="20%">Price Details</th>
              <th width="15%">Order Total</th>
              <th width="5%">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $total = 0;
            foreach ($_SESSION["cart"] as $keys => $values) { ?>
              <tr>
                <td><?php echo $values["food_name"]; ?></td>
                <td><?php echo $values["food_quantity"] ?></td>
                <td>UGX <?php echo $values["food_price"]; ?></td>
                <td>UGX <?php echo number_format($values["food_quantity"] * $values["food_price"], 2); ?></td>
                <td><a href="cart.php?action=delete&id=<?php echo $values["food_id"]; ?>"><span class="text-danger"><i class="fas fa-trash-alt"></i> Remove</span></a></td>
              </tr>
            <?php
              $total += $values["food_quantity"] * $values["food_price"];
            } ?>
            <tr>
              <td colspan="3" align="right">Total</td>
              <td align="right">UGX <?php echo number_format($total, 2); ?></td>
              <td></td>
            </tr>
          </tbody>
        </table>
        <?php
        echo '<a href="cart.php?action=empty"><button class="btn btn-danger"><i class="fas fa-trash-alt"></i> Empty Cart</button></a>';
        echo '<a href="foodlist.php"><button class="btn btn-warning"><i class="fas fa-arrow-left"></i> Continue Shopping</button></a>';
        echo '<a href="payment.php"><button class="btn btn-success pull-right"><i class="fas fa-check"></i> Check Out</button></a>';
        ?>
      </div>
    </div>
  <?php } else { ?>
    <div class="container">
      <div class="jumbotron">
        <h1>Your Shopping Cart</h1>
        <p>Oops! We can't smell any food here. Go back and <a href="foodlist.php">order now.</a></p>
      </div>
    </div>
  <?php } ?>

  <?php
  if (isset($_POST["add"])) {
    if (isset($_SESSION["cart"])) {
      $item_array_id = array_column($_SESSION["cart"], "food_id");
      if (!in_array($_GET["id"], $item_array_id)) {
        $count = count($_SESSION["cart"]);
        $item_array = array(
          'food_id' => $_GET["id"],
          'food_name' => $_POST["hidden_name"],
          'food_price' => $_POST["hidden_price"],
          'R_ID' => $_POST["hidden_RID"],
          'food_quantity' => $_POST["quantity"]
        );
        $_SESSION["cart"][$count] = $item_array;
        echo '<script>window.location="cart.php"</script>';
      } else {
        echo '<script>alert("Products already added to cart")</script>';
        echo '<script>window.location="cart.php"</script>';
      }
    } else {
      $item_array = array(
        'food_id' => $_GET["id"],
        'food_name' => $_POST["hidden_name"],
        'food_price' => $_POST["hidden_price"],
        'R_ID' => $_POST["hidden_RID"],
        'food_quantity' => $_POST["quantity"]
      );
      $_SESSION["cart"][0] = $item_array;
    }
  }

  if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
      foreach ($_SESSION["cart"] as $keys => $values) {
        if ($values["food_id"] == $_GET["id"]) {
          unset($_SESSION["cart"][$keys]);
          echo '<script>alert("Food has been removed")</script>';
          echo '<script>window.location="cart.php"</script>';
        }
      }
    }

    if ($_GET["action"] == "empty") {
      unset($_SESSION["cart"]);
      echo '<script>alert("Cart is made empty!")</script>';
      echo '<script>window.location="cart.php"</script>';
    }
  }
  
  ?>
</body>

</html>
