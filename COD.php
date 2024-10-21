<?php
session_start();
include('connection.php');

if (!isset($_SESSION['login_user2'])) {
    header("location: customerlogin.php");
}

unset($_SESSION["cart"]);

if (isset($_GET['pm'])){
    $pm = $_GET['pm'];

    $order_id = $_SESSION["customer_order_uuid"];

    if ($pm == 'cash'){
        $pm = "Cash On Delivery";

        // update the customer_order table
        $stmt = $conn->prepare("UPDATE customer_order SET payment_method = ? WHERE id = ?");
        $stmt->bind_param("ss", $pm, $order_id);
        $stmt->execute();
        $stmt->close();

        // unset the $_get
        header("location: COD.php");

    }
}

?>

<html>

<head>
    <title>Cart | Foodie Deliver Mbarara</title>
    <link rel="stylesheet" type="text/css" href="css/COD.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <style>
        .navbar {
            background-color: #2c3e50;
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
                <a class="navbar-brand" href="index.php"><i class="fas fa-home"></i> Foodie Deliver Mbarara</a>
            </div>

            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="index.php"> Home</a></li>
                    <li><a href="aboutus.php"><i></i> About</a></li>
                    <li><a href="contactus.php"><i></i> Contact Us</a></li>
                </ul>

                <?php if (isset($_SESSION['login_user1'])) { ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><i class="fas fa-user"></i> Welcome <?php echo $_SESSION['login_user1']; ?></a></li>
                        <li><a href="myrestaurant.php">MANAGER CONTROL PANEL</a></li>
                        <li><a href="logout_m.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
                    </ul>
                <?php } else if (isset($_SESSION['login_user2'])) { ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><i class="fas fa-user"></i> Welcome <?php echo $_SESSION['login_user2']; ?></a></li>
                        <li><a href="foodlist.php"><i class="fas fa-utensils"></i> Food Zone</a></li>
                        <li><a href="cart.php"><i class="fas fa-shopping-cart"></i> Cart
                                (<?php
                                    if (isset($_SESSION["cart"])) {
                                        $count = count($_SESSION["cart"]);
                                        echo "$count";
                                    } else {
                                        echo "0";
                                    }
                                    ?>)
                            </a></li>
                        <li><a href="logout_u.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
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

    <div class="container">
        <div class="jumbotron">
            <h1 class="text-center" style="color: green;"><i class="fas fa-check-circle"></i> Order Placed Successfully.</h1>
        </div>
    </div>
    <br>

    <h2 class="text-center">Thank you for Ordering at Foodie Deliver Mbarara! The ordering process is now complete.</h2>

    <?php
    // $num1 = rand(100000, 999999);
    // $num2 = rand(100000, 999999);
    // $num3 = rand(100000, 999999);
    $number = $_SESSION["customer_order_uuid"] ?? 'NaN';

    
    ?>

    <h3 class="text-center"><strong>Your Order Number:</strong> <span style="color: blue;"><?php echo "$number"; ?></span></h3>

    <h5 class="text-center">Please write down your order number, it will be handy for future reference.</h5>

    
</body>

</html>