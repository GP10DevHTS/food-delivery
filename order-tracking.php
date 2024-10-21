<?php
session_start();
include('connection.php');
// if (!isset($_SESSION['login_user2'])) {
//     // header("location: customerlogin.php");
// }
?>

<html>

<head>
    <title>Payment | Foodie Deliver Mbarara</title>
    <link rel="stylesheet" type="text/css" href="css/payment.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .navbar {
            background-color: #2c3e50;
        }

        .jumbotron {
            background-color: #f9f9f9;
            border-radius: 10px;
            padding: 20px;
        }

        .btn-warning {
            background-color: #f39c12;
            border: none;
        }

        .btn-success {
            background-color: #27ae60;
            border: none;
        }

        h1 {
            color: #2980b9;
        }

        h5 {
            color: #34495e;
        }
    </style>
</head>

<body>
    <button onclick="topFunction()" id="myBtn" title="Go to top">
        <i class="fas fa-chevron-up"></i>
    </button>

    <script type="text/javascript">
        window.onscroll = function() {
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

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fas fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php"><i class="fas fa-home"></i> Foodie Deliver Mbarara</a>
            </div>

            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="aboutus.php">About</a></li>
                    <li><a href="contactus.php">Contact Us</a></li>
                    <li><a href="order-tracking.php">Tracking</a></li>
                </ul>

                <?php if (isset($_SESSION['login_user2'])): ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><i class="fas fa-user"></i> Welcome <?php echo $_SESSION['login_user2']; ?></a></li>
                        <li><a href="foodlist.php"><i class="fas fa-utensils"></i> Food Zone </a></li>
                        <li><a href="cart.php"><i class="fas fa-shopping-cart"></i> Cart
                                (<?php echo isset($_SESSION["cart"]) ? count($_SESSION["cart"]) : "0"; ?>)
                            </a></li>
                        <li><a href="logout_u.php"><i class="fas fa-sign-out-alt"></i> Log Out </a></li>
                    </ul>
                <?php else: ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="customerlogin.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <div class="jumbotron text-center">
        <h1>Track Your Order</h1>
        <h5>Please enter your tracking ID to find your order.</h5>

        <form action="order-tracking.php" method="get" class="tracking-form">
            <div class="form-group" style="width: 50%; margin: 0 auto; margin-top: 20px; margin-bottom: 20px">
                <input class="form-control" value="<?php echo isset($_GET['tracking_id']) ? $_GET['tracking_id'] : ''; ?>" type="text" name="tracking_id" placeholder="Enter your tracking ID" required>
            </div>
            <button class="btn btn-primary" type="submit">Track Order</button>
        </form>
    </div>

    <?php
    if (isset($_GET['tracking_id'])) {
        $tracking_id = $_GET['tracking_id'];
        $sql = "SELECT * FROM customer_order WHERE id = '$tracking_id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) == 1) {
            $order_id = $row['ai_id'];
            $order_date = $row['order_date'];
            $customer_id = $row['customer_id'];
            $payment_method = $row['payment_method'] ?? 'Not set';
            $payment_status = $row['payment_status'];

            // Get the customer details
            $sql2 = "SELECT fullname, email, address, contact FROM customer WHERE id = '$customer_id'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $customer_name = $row2['fullname'];
            $customer_email = $row2['email'];
            $customer_address = $row2['address'];
            $customer_phone = $row2['contact'];

            // Get the order details
            $sql3 = "SELECT * FROM orders WHERE customer_order_id = '$order_id'";
            $result3 = mysqli_query($conn, $sql3);

            if (mysqli_num_rows($result3) > 0) {
                echo "<div class='jumbotron text-center'>";
                echo "<h2>Order Details</h2>";
                echo "<h4>Customer Name: $customer_name</h4>";
                echo "<h4>Email: $customer_email</h4>";
                echo "<h4>Address: $customer_address</h4>";
                echo "<h4>Phone: $customer_phone</h4>";
                echo "<h4>Order Date: $order_date</h4>";
                echo "<h4>Payment Method: " .  $payment_method ?? "N/A" ."</h4>";
                echo "<h4>Payment Status: $payment_status</h4>";
                echo "<h3>Items Ordered:</h3>";
                echo "<table class='table table-striped'>";
                echo "<thead><tr><th>Food Name</th><th>Price</th><th>Quantity</th><th>Status</th></tr></thead><tbody>";

                while ($row3 = mysqli_fetch_assoc($result3)) {
                    $foodname = $row3['foodname'];
                    $price = $row3['price'];
                    $quantity = $row3['quantity'];
                    $status = $row3['status'];

                    echo "<tr>
                            <td>$foodname</td>
                            <td>UGX " . number_format($price, 2) . "</td>
                            <td>$quantity</td>
                            <td>$status</td>
                          </tr>";
                }

                echo "</tbody></table></div>";
            } else {
                echo "<h2 class='text-center text-danger'>No items found for this order.</h2>";
            }

        } else {
            echo "<h2 class='text-center text-danger'>No order found with ID: " . $tracking_id . "</h2>";
        }
    }
    ?>

    <br><br><br><br>
</body>

</html>
