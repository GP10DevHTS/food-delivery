<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home online food delivering system</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f8f9fa;
    }

    .navbar {
      background-color: #2c3e50;
    }

    .navbar-brand,
    .navbar-nav li a {
      color: white !important;
    }

    .hero-image {
      width: 100%;
      height: 60vh;
      position: relative;
      overflow: hidden;
    }

    .hero-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      position: absolute;
      /* animation: slide 5s infinite; */
      opacity: 0.5;
      /* transition: opacity 1s ease; */
    }

    .hero-image img.active {
      opacity: 0.6;
    }

    .hero-text {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: white;
      text-align: center;
      animation: fadeIn 2s;
    }

    .hero-text h1 {
      font-size: 4em;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
    }

    .hero-text p {
      font-size: 1.5em;
      text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
    }

    .btn-primary {
      background-color: #ff6347;
      border-color: #ff6347;
    }

    .btn-primary:hover {
      background-color: #ff4500;
      border-color: #ff4500;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    @keyframes slide {
      0% {
        opacity: 0;
      }

      10% {
        opacity: 1;
      }

      25% {
        opacity: 1;
      }

      35% {
        opacity: 0;
      }

      100% {
        opacity: 0;
      }
    }

    .content {
      text-align: center;
      margin: 50px 0;
      color: #34495e;
    }

    .tagline {
      font-size: 2em;
      color: #2980b9;
      margin: 120px 0;
    }

    .orderblock {
      text-align: center;
      padding: 20px;
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s;
      margin: 20px auto;
      max-width: 500px;
    }

    .orderblock:hover {
      transform: scale(1.05);
    }

    .orderblock h2 {
      color: #3498db;
      margin-bottom: 15px;
    }

    .orderblock p {
      color: #7f8c8d;
    }

    .footer {
      background-color: #2c3e50;
      color: white;
      text-align: center;
      padding: 15px 0;
      font-size: 20px;
      position: relative;
      bottom: 0;
      width: 100%;
    }

    #myBtn {
      display: none;
      position: fixed;
      bottom: 20px;
      right: 30px;
      font-size: 18px;
      border: none;
      outline: none;
      background-color: #2980b9;
      color: white;
      cursor: pointer;
      padding: 15px;
      border-radius: 50%;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }

    #myBtn:hover {
      background-color: #555;
    }

    .container {
      max-width: 90%;
      margin: auto;
    }

    .gallery {
      display: flex;
      justify-content: space-between;
      margin: 20px 0;
      gap: 15px;
    }

    .gallery img {
      width: 100%;
      height: 300px;
      object-fit: cover;
      border-radius: 10px;
      transition: transform 0.3s;
    }

    .gallery img:hover {
      transform: scale(1.05);
    }

    .gallery div {
      flex: 1;
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


    // const slides = document.querySelectorAll('.hero-image img');
    // let currentIndex = 0;

    // function showSlide(index) {
    //   slides.forEach((slide, i) => {
    //     slide.classList.remove('active');
    //     if (i === index) slide.classList.add('active');
    //   });
    // }

    // function nextSlide() {
    //   currentIndex = (currentIndex + 1) % slides.length;
    //   showSlide(currentIndex);
    // }


    setInterval(nextSlide, 2000);
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
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="aboutus.php">About</a></li>
          <li><a href="contactus.php">Contact Us</a></li>
          <li><a href="order-tracking.php">Tracking</a></li>
        </ul>

        <?php
        if (isset($_SESSION['login_user1'])) {
        ?>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><i class="fas fa-user"></i> Welcome <?php echo $_SESSION['login_user1']; ?></a></li>
            <li><a href="myrestaurant.php">MANAGER CONTROL PANEL</a></li>
            <li><a href="logout_m.php"><i class="fas fa-sign-out-alt"></i> Log Out </a></li>
          </ul>
        <?php
        } else if (isset($_SESSION['login_user2'])) {
        ?>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><i class="fas fa-user"></i> Welcome <?php echo $_SESSION['login_user2']; ?></a></li>
            <li><a href="foodlist.php"><i class="fas fa-utensils"></i> Food Zone </a></li>
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
            <li><a href="logout_u.php"><i class="fas fa-sign-out-alt"></i> Log Out </a></li>
          </ul>
        <?php
        } else {
        ?>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-plus"></i> Sign Up <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="customersignup.php">User Sign-up</a></li>
                <li><a href="managersignup.php">Manager Sign-up</a></li>
              </ul>
            </li>
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-sign-in-alt"></i> Login <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="customerlogin.php">Customer Login</a></li>
                <li><a href="managerlogin.php">Manager Login</a></li>
              </ul>
            </li>
          </ul>
        <?php
        }
        ?>
      </div>
    </div>
  </nav>

  <div class="hero-image">
    <img src="images/headerimg1.jpg" alt="Image 1" class="active">
    <img src="images/headerimg1.jpg" alt="Image 2">
    <img src="images/headerimg1.jpg" alt="Image 3">
    <div class="hero-text">
      <h1 class="welcome-text">Welcome To Online Food Ordering System</h1>

      <!-- <p class="welcome">(Foodie Deliver Mbarara)</p> -->


      <p>Your favorite food delivered fast at your doorsteps!</p>
      <a class="btn btn-primary btn-lg" href="customerlogin.php" role="button">Order Now</a>
    </div>
  </div>

  <div class="content">
    <h2>Explore Our Menu</h2>
    <p style="font-size: 2rem; color:#2c3e50;">Delicious meals prepared by the best chefs in town.</p>
    <div class="gallery">
      <div><img src="images/burger.jpg" alt="Dish 1"></div>
      <div><img src="images/pizza.jpg" alt="Dish 2"></div>
      <div><img src="images/roll.jpg" alt="Dish 3"></div>
    </div>
    <div class="tagline">Good Food is Good Mood</div>

    <div class="orderblock">
      <h2>Feeling Hungry?</h2>
      <p>Browse through our extensive menu and satisfy your cravings!</p>
      <center><a class="btn btn-success btn-lg" href="foodlist.php" role="button">Browse Menu</a></center>
    </div>
  </div>

  <div class="footer">
    &copy; 2024 Foodie Deliver Mbarara. All rights reserved.
  </div>

</body>

</html>