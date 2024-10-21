<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | Foodie Deliver Mbarara</title>
    <link rel="stylesheet" type="text/css" href="css/cart.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .navbar {
            background-color: #2c3e50;
        }

        .navbar-brand,
        .navbar-nav li a {
            color: white !important;
        }

        .hero {
            background-image: url('images/headerimg1.jpg');
            background-size: cover;
            background-position: center;
            height: 40vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            font-weight: bold;
            text-shadow: 2px 2px 4px #000;
            padding: 20px;
        }

        .tagline {
            color: #e74c3c;
            font-size: 1.8em;
            margin: 20px 0;
        }

        .content {
            background-image: url('images/headerimg3.jpg');
            background-color: #2c3e50;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px 10px;

        }

        .about-info {
            margin-top: 70px;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 80%;
            width: 90%;
            text-align: left;
            animation: fadeIn 1s ease-in-out;
        }

        .about-info h3 {
            color: #2980b9;
            font-size: 2.5em;
            margin-bottom: 15px;
            text-align: center;
        }

        p {
            font-size: 2rem;
            color: #34495e;
            line-height: 1.6;
        }

        .location {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 80%;
            width: 90%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin: 20px 0;
            animation: slideIn 1s ease-in-out;
        }

        .map-container {
            width: 100%;
            max-width: 800px;
            margin: 0 0;
        }

        iframe {
            border: none;
            width: 100%;
            height: 400px;
        }

        .footer {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 15px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                transform: translateY(20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>

<body>

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
                    <li><a href="index.php">Home</a></li>
                    <li class="active"><a href="aboutus.php">About</a></li>
                    <li><a href="contactus.php">Contact Us</a></li>
                    <li><a href="order-tracking.php">Tracking</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if (isset($_SESSION['login_user1'])) { ?>
                        <li><a href="#"><i class="fas fa-user"></i> Welcome <?php echo $_SESSION['login_user1']; ?></a></li>
                        <li><a href="myrestaurant.php">Manager Control Panel</a></li>
                        <li><a href="logout_m.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
                    <?php } else if (isset($_SESSION['login_user2'])) { ?>
                        <li><a href="#"><i class="fas fa-user"></i> Welcome <?php echo $_SESSION['login_user2']; ?></a></li>
                        <li><a href="foodlist.php"><i class="fas fa-utensils"></i> Food Zone</a></li>
                        <li><a href="cart.php"><i class="fas fa-shopping-cart"></i> Cart (<?php echo isset($_SESSION["cart"]) ? count($_SESSION["cart"]) : "0"; ?>)</a></li>
                        <li><a href="logout_u.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
                    <?php } else { ?>
                        <li><a href="customersignup.php"><i class="fas fa-user-plus"></i> Sign Up</a></li>
                        <li><a href="customerlogin.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="hero">
        <h1 class="welcome-text">Welcome To Online Food Ordering System</h1>
        
        <!-- <p class="welcome">(Foodie Deliver Mbarara)</p> -->

        <p>Your favorite food delivered fast at your doorsteps!</p>

        <div class="tagline">
            "Bringing the best food to your doorstep."
        </div>
    </div>

    <div class="content">
        <div class="about-info">
            <h3>About Us</h3>
            <p>At Foodie Deliver Mbarara, we believe that great food brings people together. Our mission is to deliver delicious meals from local restaurants right to your door, making dining easy and convenient.</p>
            <p>We pride ourselves on partnering with a variety of restaurants, from cozy cafes to gourmet dining experiences. No matter what you're craving, we aim to satisfy your hunger with a diverse selection of cuisines available at your fingertips.</p>
            <p>What sets us apart? Our commitment to exceptional service, quick deliveries, and a user-friendly platform that allows you to browse menus, place orders, and track your delivery in real time.</p>
            <p>Join our community of food lovers and experience the joy of effortless dining. Let's make every meal memorable together!</p>
        </div>

        <div class="location">
            <h3>Our Location</h3>
            <p>We operate across Mbarara and partner with numerous local restaurants to bring you the best dining experience.</p>
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31916.81063124802!2d30.63029880722553!3d-0.5975638773579892!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19d91b9fbbd8332b%3A0x743d0a3afcecc0f3!2sGlobal%20Chefs!5e0!3m2!1sen!2sug!4v1717171159491!5m2!1sen!2sug" loading="lazy"></iframe>
            </div>
        </div>
    </div>

    <div class="footer">
        &copy; 2024 Foodie Deliver Mbarara. All rights reserved.
    </div>
</body>

</html>