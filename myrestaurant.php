<?php
include('session_m.php');
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: managerlogin.php'); 
    exit; 
}

$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html>
<head>
  <title> Manager Login | Foodie Deliver Mbarara </title>
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
      border-radius: 40px;
    }
    .sidebar .list-group-item {
      font-size: 18px;
      padding: 15px 10px;
      color: white;
      font-weight: bold;
      background-color: #2c3e50;
      border: none;
    }
    .sidebar .list-group-item:hover, .sidebar .list-group-item.active {
      background-color: #1a252f;
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
      height: 18vh;
      margin-top: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
    }
    .form-area {
      padding: 20px;
      background-color: #f7f7f7;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      margin-bottom: 20px;
    }
    .table-container {
      margin-top: 20px;
    }
    .table-title {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 10px;
    }
    .table-title h3 {
      margin: 0;
      color: #2c3e50;
    }
    .table-title .btn {
      background-color: #2c3e50;
      color: white;
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
    #restaurantStatsChart {
      max-width: 400px; 
      height: auto; 
    }
  </style>
</head>

<body>
  <button onclick="topFunction()" id="myBtn" title="Go to top">
    <i class="fas fa-chevron-up"></i>
  </button>

  <script type="text/javascript">
    window.onscroll = function() {
      scrollFunction();
    };

    function scrollFunction(){
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
            <li><a href="index.php"> Home</a></li>
            <li><a href="aboutus.php"> About</a></li>
            <li><a href="contactus.php"> Contact Us</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><i class="fas fa-user"></i> Welcome <?php echo $_SESSION['username']; ?></a></li>
            <li class="active"><a href="managerlogin.php"><i class="fas fa-user-tie"></i> MANAGER CONTROL PANEL</a></li>
            <li><a href="logout_m.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <div class="sidebar">
    <div class="list-group">
      <a href="myrestaurant.php" class="list-group-item active"><i class="fas fa-utensils"></i> My Restaurant</a>
      <a href="view_food_items.php" class="list-group-item"><i class="fas fa-eye"></i> View Food Items</a>
      <a href="add_food_items.php" class="list-group-item"><i class="fas fa-plus"></i> Add Food Items</a>
      <a href="edit_food_items.php" class="list-group-item"><i class="fas fa-edit"></i> Edit Food Items</a>
    </div>
  </div>

  <div class="main-content">
    <div class="container">
      <div class="jumbotron">
        <h1>Hello Manager!</h1>
        <p>Manage all your restaurants from here</p>
      </div>
      <div class="form-area">
        <h3>Statistics Overview</h3>
        <canvas id="restaurantStatsChart"></canvas>
      </div>

      <div class="table-container">
        <div class="table-title">
          <h3>List of Restaurants</h3>
        </div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Contact</th>
              <th>Address</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include ('connection.php');

            $username = $_SESSION['username']; 

            $sql = "SELECT * FROM restaurants WHERE M_ID = '$username'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['R_ID'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['contact'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "</tr>";
              }
            } else {
              echo "<tr><td colspan='5'>No restaurants found</td></tr>";
            }

            mysqli_close($conn);
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
$(document).ready(function() {
    const username = '<?php echo $username; ?>'; 

    $.ajax({
        url: 'fetch_statistics.php',
        type: 'POST',
        data: { username: username },
        success: function(data) {
            const parsedData = JSON.parse(data);
            const dataLabels = parsedData.labels;
            const dataValues = parsedData.values;

            const ctx = document.getElementById('restaurantStatsChart').getContext('2d');
            const restaurantStatsChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: dataLabels,
                    datasets: [{
                        label: 'Restaurant Statistics',
                        data: dataValues,
                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Overview of Restaurant Operations'
                        }
                    }
                }
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("Error fetching statistics: " + textStatus + " - " + errorThrown);
        }
    });
});
</script>
</body>
</html>
