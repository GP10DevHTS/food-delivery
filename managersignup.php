<html>
<head>
    <title>Manager Signup | Foodie Deliver Mbarara</title>
    <link rel="stylesheet" type="text/css" href="css/managersignup.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <style>
    body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .jumbotron {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
            margin-top: 30px;
        }

        .btn-primary {
            background-color: #007bff; 
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3; 
            border-color: #0056b3;
        }

        .input-group .input-group-btn {
            display: none;
        }

        .input-group:hover .input-group-btn {
            display: block;
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
            <a class="navbar-brand" href="index.php">Foodie Deliver Mbarara</a>
        </div>

        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutus.php">About</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
                    <li><a href="order-tracking.php">Tracking</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i> Sign Up <span class="caret"></span></a>
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
        </div>
    </div>
</nav>

<div class="container">
    <div class="jumbotron">
        <h1>Hi Manager,<br> Welcome to <span class="edit">Foodie Deliver Mbarara</span></h1>
        <p>Get started by creating your account</p>
    </div>
</div>

<div class="container" style="margin-top: 4%; margin-bottom: 2%;">
    <div class="col-md-5 col-md-offset-4">
        <div class="panel panel-primary">
            <div class="panel-heading">Create Account</div>
            <div class="panel-body">
                <form role="form" action="manager_registered_success.php" method="POST">
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <label for="fullname"><span class="text-danger">*</span> Full Name:</label>
                            <div class="input-group">
                                <input class="form-control" id="fullname" type="text" name="fullname" placeholder="Your Full Name" required="" autofocus="">
                                <span class="input-group-btn">
                                    <label class="btn btn-primary"><i class="fas fa-user"></i></label>
                                </span>
                            </div>           
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-xs-12">
                            <label for="username"><span class="text-danger">*</span> Username:</label>
                            <div class="input-group">
                                <input class="form-control" id="username" type="text" name="username" placeholder="Your Username" required="">
                                <span class="input-group-btn">
                                    <label class="btn btn-primary"><i class="fas fa-user"></i></label>
                                </span>
                            </div>           
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-xs-12">
                            <label for="email"><span class="text-danger">*</span> Email:</label>
                            <div class="input-group">
                                <input class="form-control" id="email" type="email" name="email" placeholder="Email" required="">
                                <span class="input-group-btn">
                                    <label class="btn btn-primary"><i class="fas fa-envelope"></i></label>
                                </span>
                            </div>           
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-xs-12">
                            <label for="contact"><span class="text-danger">*</span> Contact:</label>
                            <div class="input-group">
                                <input class="form-control" id="contact" type="text" name="contact" placeholder="Contact" required="">
                                <span class="input-group-btn">
                                    <label class="btn btn-primary"><i class="fas fa-phone"></i></label>
                                </span>   
                            </div>           
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-xs-12">
                            <label for="address"><span class="text-danger">*</span> Address:</label>
                            <div class="input-group">
                                <input class="form-control" id="address" type="text" name="address" placeholder="Address" required="">
                                <span class="input-group-btn">
                                    <label class="btn btn-primary"><i class="fas fa-home"></i></label>
                                </span>
                            </div>           
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-xs-12">
                            <label for="password"><span class="text-danger">*</span> Password:</label>
                            <div class="input-group">
                                <input class="form-control" id="password" type="password" name="password" placeholder="Password" required="">
                                <span class="input-group-btn">
                                    <label class="btn btn-primary"><i class="fas fa-lock"></i></label>
                                </span>
                            </div>           
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-xs-4">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>

                    <label style="margin-left: 5px;">or</label> <br>
                    <label style="margin-left: 5px;"><a href="managerlogin.php">Have an account? Login.</a></label>
                </form>
            </div>
        </div>
    </div>
</div>

<footer class="container-fluid bg-4 text-center">
    <br>
    <p>Food Exploria 2024 | &copy All Rights Reserved</p>
    <br>
</footer>

</body>
</html>
