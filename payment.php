<?php
session_start();
include('connection.php');
if (!isset($_SESSION['login_user2'])) {
    header("location: customerlogin.php");
}
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

    <?php
    $gtotal = 0;
    $order_date = date('Y-m-d');
    $username = $_SESSION["login_user2"];

    // use the username to get the customer id
    $stmt = $conn->prepare("SELECT id as C_ID FROM CUSTOMER WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($C_ID);
    $stmt->fetch();
    $stmt->close();

    // vardump the id for testing and debugging
    // var_dump($C_ID);
    // die();
    // if (!isset($_SESSION["customer_order_uuid"])) {


        //  create the customer order record and capture the order id (INSERT INTO `customer_order`(`order_date`, `customer_id`) VALUES ('[value-1]','[value-2]'))

        $stmt = $conn->prepare("INSERT INTO `customer_order`(`order_date`, `customer_id`) VALUES (?,?)");
        $stmt->bind_param("ss", $order_date, $C_ID);
        $stmt->execute();

        // capture the order id
        $order_id = $conn->insert_id;

        $stmt->close();

        // echo "New customer order ID is: " . $order_id;
        // die();

        // get the customer order id
        $statement = $conn->prepare("SELECT id as customer_order_uuid FROM customer_order WHERE ai_id = ?");
        $statement->bind_param("i", $order_id);
        $statement->execute();
        $statement->bind_result($customer_order_uuid);
        $statement->fetch();
        $statement->close();


        $_SESSION["customer_order_uuid"] = $customer_order_uuid;
        // echo "The customer order UUID is: " . $customer_order_uuid;
        // die();

        foreach ($_SESSION["cart"] as $keys => $values) {
            $F_ID = $values["food_id"];
            $foodname = $values["food_name"];
            $quantity = $values["food_quantity"];
            $price = $values["food_price"];
            $total = ($values["food_quantity"] * $values["food_price"]);
            $R_ID = $values["R_ID"];
            // $username = $_SESSION["login_user2"];
            // $order_date = date('Y-m-d');

            $gtotal += $total;






            $query = "INSERT INTO ORDERS (F_ID, foodname, price, quantity, order_date, username, R_ID, customer_order_id) 
                  VALUES ('$F_ID', '$foodname', '$price', '$quantity', '$order_date', '$username', '$R_ID', '$order_id')";
            $success = $conn->query($query);

            if (!$success) {
                echo '<div class="container"><div class="jumbotron"><h1>Something went wrong!</h1><p>Try again later.</p></div></div>';
            }
        }
    // }
    ?>

    <div class="container">
        <div class="jumbotron">
            <h1 class="text-center">Choose your payment option</h1>
        </div>
    </div>

    <!-- show customer order id -->
    <div class="container">
        <div class="jumbotron">
            <p class="text-center">Your Order ID is: <?php echo $_SESSION["customer_order_uuid"]; ?></p>
        </div>
    </div>

    <h1 class="text-center">Grand Total: UGX <?php echo number_format($gtotal); ?>/-</h1>
    <h5 class="text-center">Including all service charges. (No delivery charges applied)</h5>

    <h1 class="text-center">
        <a href="cart.php"><button class="btn btn-warning"><i class="fas fa-arrow-circle-left"></i> Go back to cart</button></a>
        <a href="onlinepay.php"><button class="btn btn-success"><i class="fas fa-credit-card"></i> Pay Online</button></a>
        <a href="COD.php?pm=cash"><button class="btn btn-success"><i class="fas fa-money-bill"></i> Cash On Delivery</button></a>
    </h1>

    <br><br><br><br>
</body>

</html>