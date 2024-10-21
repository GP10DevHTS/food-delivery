<?php
session_start();

if (!isset($_SESSION['login_user2'])) {
    header("location: customerlogin.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore | Food Foodie Deliver Mbarara</title>
    <link rel="stylesheet" type="text/css" href="css/foodlist.css">
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

        .carousel-inner img {
            width: 100%;
            height: auto;
        }

        .jumbotron {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .btn-success {
            margin-top: 5px;
        }
        .welcome-text {
            font-family: 'Pacifico', cursive;
            color: #007bff;
            font-size: 48px;
        }

        #myBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            font-size: 18px;
            border: none;
            outline: none;
            background-color: #2c3e50;
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
                        <li class="active"><a href="foodlist.php"><i class="fas fa-utensils"></i> Food Zone </a></li>
                        <li><a href="cart.php"><i class="fas fa-shopping-cart"></i> Cart (<?php echo isset($_SESSION["cart"]) ? count($_SESSION["cart"]) : "0"; ?>)</a></li>
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

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <img src="images/home1.jpg" alt="Slide 1">
                <div class="carousel-caption"></div>
            </div>
            <div class="item">
                <img src="images/home2.jpg" alt="Slide 2">
                <div class="carousel-caption"></div>
            </div>
            <div class="item">
                <img src="images/home3.jpg" alt="Slide 3">
                <div class="carousel-caption"></div>
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="jumbotron">
    <div class="jumbotron">
        <div class="container text-center">
        <h1 class="welcome-text">Welcome To Online Food Ordering System</h1>
        
        <!-- <p class="welcome">(Foodie Deliver Mbarara)</p> -->
        </div>
    </div>
    </div>

    <div class="container" style="width:95%;">
        <?php
        include('connection.php');
        $sql = "SELECT * FROM FOOD WHERE options = 'ENABLE' ORDER BY F_ID";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $count = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                if ($count == 0)
                    echo "<div class='row'>";
        ?>
                <div class="col-md-3">
                    <form method="post" action="cart.php?action=add&id=<?php echo $row["F_ID"]; ?>">
                        <div class="mypanel" align="center">
                            <img src="<?php echo $row["images_path"]; ?>" class="img-responsive">
                            <h4 class="text-dark"><?php echo $row["name"]; ?></h4>
                            <h5 class="text-info"><?php echo $row["description"]; ?></h5>
                            <h5 class="text-danger">UGX <?php echo number_format($row["price"], 2); ?>/-</h5>
                            <h5 class="text-info">Quantity: <input type="number" min="1" max="25" name="quantity" class="form-control" value="1" style="width: 60px;"></h5>
                            <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
                            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                            <input type="hidden" name="hidden_RID" value="<?php echo $row["R_ID"]; ?>">
                            <input type="submit" name="add" style="margin-top:5px;" class="btn btn-success" value="Add to Cart">
                        </div>
                    </form>
                </div>
        <?php
                $count++;
                if ($count == 4) {
                    echo "</div>";
                    $count = 0;
                }
            }
        ?>
    </div>
</div>
<?php
        } else {
?>
<div class="container" >
    <!-- <div class="jumbotron">
        <center>
            <label style="margin-left: 5px;color: red;">
                <h1>Oops! No food is available.</h1>
            </label>
            <p>Stay Hungry...! :P</p>
        </center>
    </div> -->
</div>
<?php
        }
?>
</body>

</html>
