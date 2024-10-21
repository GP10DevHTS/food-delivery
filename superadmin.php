<?php
include('connection.php');
include('session_m.php');

if (!isset($login_session)) {
    header('Location: managerlogin.php'); 
}

$customerCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM customer"))['count'];
$orderCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM orders"))['count'];
$managerCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM manager"))['count'];
$restaurantCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM restaurants"))['count'];

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Super Admin Dashboard | Foodie Deliver Mbarara</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            height: 25vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-top: 20px;
        }
        .chart-container {
            margin: 20px 0;
            display: flex;
            justify-content: space-around;
        }
        canvas {
            max-width: 1000px;
            max-height: 1000px;
        }
    </style>
</head>

<body>
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
                        <li><a href="index.php"><i ></i> Home</a></li>
                        <li><a href="aboutus.php"><i ></i> About</a></li>
                        <li><a href="contactus.php"><i ></i> Contact Us</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><i class="fas fa-user"></i> Welcome <?php echo $login_session; ?> </a></li>
                        <li class="active"><a href="superadmin.php"><i class="fas fa-user-shield"></i> Super Admin Panel</a></li>
                        <li><a href="logout_m.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="sidebar">
        <div class="list-group">
            <a href="superadmin.php" class="list-group-item active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="view_restaurants.php" class="list-group-item"><i class="fas fa-utensils"></i> View Restaurants</a>
            <a href="view_managers.php" class="list-group-item"><i class="fas fa-user-tie"></i> View Managers</a>
            <a href="view_orders.php" class="list-group-item"><i class="fas fa-user-tie"></i> View Orders</a>
            <a href="view_customers.php" class="list-group-item"><i class="fas fa-user-tie"></i> View Orders</a>
            <a href="#" class="list-group-item"><i class="fas fa-cogs"></i> Settings</a>
        </div>
    </div>

    <div class="main-content">
        <div class="container">
            <div class="jumbotron">
                <h1>Hello <?php echo $login_session; ?></h1>
                <p>Manage the entire system from here</p>
            </div>
            <div class="chart-container">
                <div>
                    <center><h3>Statistics </h3></center>
                    <canvas id="summaryChart" width="500" height="500"></canvas>
                </div>
            </div>    
        </div>
    </div>

    <script>
        $(document).ready(function() {
            const data = {
                labels: ['Customers', 'Orders', 'Managers', 'Restaurants'],
                datasets: [{
                    data: [<?php echo "$customerCount, $orderCount, $managerCount, $restaurantCount"; ?>],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(255, 99, 132, 0.6)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 3
                }]
            };

            const config = {
                type: 'pie',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Database Summary'
                        }
                    }
                },
            };

            const summaryChart = new Chart(
                document.getElementById('summaryChart'),
                config
            );
        });
    </script>
</body>
</html>
