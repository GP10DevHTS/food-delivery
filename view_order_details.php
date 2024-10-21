<?php
include('session_m.php');

if (!isset($login_session)) {
    header('Location: managerlogin.php');
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Manager Login | Foodie Deliver Mbarara</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/view_order_details.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
            margin-top: 46px;
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
            margin-top: 20px;
            background-color: #2c3e50;
            color: white;
            padding: 2px;
            height: 30vh;
        }

        .jumbotron h1,
        .jumbotron p {
            align-items: center;
            text-align: center;
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

        table {
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <button onclick="topFunction()" id="myBtn" title="Go to top" style="display:none;">
        <span class="glyphicon glyphicon-chevron-up"></span>
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
                        <li><a href="index.php"><i></i> Home</a></li>
                        <li><a href="aboutus.php"><i></i> About</a></li>
                        <li><a href="contactus.php"><i></i> Contact Us</a></li>
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
            <a href="view_food_items.php" class="list-group-item"><i class="fas fa-eye"></i> View Food Items</a>
            <a href="add_food_items.php" class="list-group-item"><i class="fas fa-plus-circle"></i> Add Food Items</a>
            <a href="edit_food_items.php" class="list-group-item"><i class="fas fa-edit"></i> Edit Food Items</a>
            <a href="view_order_details.php" class="list-group-item active"><i class="fas fa-list"></i> View Order Details</a>
        </div>
    </div>

    <?php
if (isset($_SESSION['message'])) {
    echo "<div class='alert alert-success'>" . $_SESSION['message'] . "</div>";
    unset($_SESSION['message']); // Clear the message after displaying
}

if (isset($_SESSION['error'])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
    unset($_SESSION['error']); // Clear the error after displaying
}
?>


    <div class="main-content">
        <div class="container">
            <div class="jumbotron">
                <h1>Hello Manager!</h1>
                <p>Manage all your restaurant from here</p>
            </div>

            <div class="form-area">
                <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;">YOUR FOOD ORDER LIST</h3>
                <?php
                $sql = "SELECT * FROM orders o WHERE o.R_ID IN (SELECT r.R_ID FROM RESTAURANTS r WHERE r.M_ID='$user_check') ORDER BY order_date";
                $result = mysqli_query($conn, $sql);

                if (!$result) {
                    die("Query Failed: " . mysqli_error($conn));
                }

                if (mysqli_num_rows($result) > 0) {
                ?>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th></th>
                                <th>Order ID</th>
                                <th>Food ID</th>
                                <th>Order Date</th>
                                <th>Food Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Customer</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><i class="fas fa-chevron-right"></i></td>
                                    <td><?php echo htmlspecialchars($row["order_ID"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["F_ID"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["order_date"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["foodname"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["price"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["quantity"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["username"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["status"]); ?></td>
                                    <td>
                                        <?php
                                        // Check the order status and display appropriate action buttons
                                        switch ($row["status"]) {
                                            case "waiting...":
                                                echo "<a href='update_order_status.php?order_ID=" . $row["order_ID"] . "&status=cooking' class='btn btn-success'>Cooking</a>";
                                                echo "<a href='update_order_status.php?order_ID=" . $row["order_ID"] . "&status=canceled' class='btn btn-danger'>Cancel</a>";
                                                break;

                                            case "cooking":
                                                echo "<a href='update_order_status.php?order_ID=" . $row["order_ID"] . "&status=on the way' class='btn btn-info'>On the Way</a>";
                                                echo "<a href='update_order_status.php?order_ID=" . $row["order_ID"] . "&status=canceled' class='btn btn-danger'>Cancel</a>";
                                                break;

                                            case "on the way":
                                                echo "<a href='update_order_status.php?order_ID=" . $row["order_ID"] . "&status=delivered' class='btn btn-success'>Delivered</a>";
                                                break;

                                            case "delivered":
                                                echo "<span class='text-success'>Order Delivered</span>";
                                                break;

                                            case "canceled":
                                                echo "<span class='text-danger'>Order Canceled</span>";
                                                break;

                                            default:
                                                echo "<span class='text-muted'>Status Unknown</span>";
                                                break;
                                        }
                                        ?>
                                    </td>


                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <p>No orders found.</p>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>