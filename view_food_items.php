<?php
include('session_m.php');

if(!isset($login_session)){
    header('Location: managerlogin.php'); // Redirecting To Home Page
    exit();
}

// Handle delete request
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $sql = "DELETE FROM food WHERE F_ID = '$delete_id'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Food item deleted successfully.');</script>";
    } else {
        echo "<script>alert('Error deleting food item.');</script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Manager Login | Foodie Deliver Mbarara</title>
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

        .header {
            margin-bottom: 20px;
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
            text-align: center;
            margin-top: 20px;
        }

        .form-area {
            padding: 20px;
            background-color: #f7f7f7;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .actions-buttons .btn {
            margin: 2px;
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
        window.onscroll = function () {
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
                    <a class="navbar-brand" href="index.php"><i class="fas fa-utensils"></i> Foodie Deliver Mbarara</a>
                </div>

                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php"><i ></i> Home</a></li>
                        <li><a href="aboutus.php"><i ></i> About</a></li>
                        <li><a href="contactus.php"><i ></i> Contact Us</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><i class="fas fa-user"></i> Welcome <?php echo $login_session; ?></a></li>
                        <li class="active"><a href="managerlogin.php"><i class="fas fa-user-tie"></i> MANAGER CONTROL PANEL</a></li>
                        <li><a href="logout_m.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="sidebar">
        <div class="list-group">
        <a href="myrestaurant.php" class="list-group-item"><i class="fas fa-utensils"></i> My Restaurant</a>
<a href="view_food_items.php" class="list-group-item active"><i class="fas fa-list"></i> View Food Items</a>
<a href="add_food_items.php" class="list-group-item"><i class="fas fa-plus-circle"></i> Add Food Items</a>
<a href="edit_food_items.php" class="list-group-item"><i class="fas fa-edit"></i> Edit Food Items</a>
<a href="view_order_details.php" class="list-group-item"><i class="fas fa-receipt"></i> View Order Details</a>

        </div>
    </div>

    <div class="main-content">
        <div class="container">
            <div class="jumbotron">
                <h1>Hello Manager!</h1>
                <p>Manage all your restaurant from here</p>
            </div>

            <div class="form-area">
                <form action="" method="POST">
                    <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;">YOUR FOOD ITEMS LIST</h3>

                    <?php
                 
                    $user_check=$_SESSION['login_user1'];
                    $sql = "SELECT * FROM food f WHERE f.R_ID IN (SELECT r.R_ID FROM RESTAURANTS r WHERE r.M_ID='$user_check') ORDER BY F_ID";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                    ?>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th></th>
                                <th>Food ID</th>
                                <th>Food Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <!-- <th>Restaurant ID</th> -->
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                            
                            while($row = mysqli_fetch_assoc($result)){
                        ?>
                            <tr>
                                <td><i class="fas fa-utensils"></i></td>
                                <td><?php echo $row["F_ID"]; ?></td>
                                <td><?php echo $row["name"]; ?></td>
                                <td><?php echo $row["price"]; ?></td>
                                <td><?php echo $row["description"]; ?></td>
                            
                                <td class="actions-buttons">
                                    <form action="" method="POST" style="display:inline;">
                                        <input type="hidden" name="delete_id" value="<?php echo $row["F_ID"]; ?>">
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                                    </form>
                                    <button class="btn btn-info btn-sm"><i class="fas fa-eye"></i> View</button>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <br>
                    <?php } else { ?>
                    <h4><center>No food items available.</center></h4>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</body>
</html>