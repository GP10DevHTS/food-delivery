<?php
include('session_m.php');
include('connection.php');

if (!isset($login_session)) {
    header('Location: managerlogin.php'); 
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $manager_id = $_POST['manager_id'];
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

   
    $current_sql = "SELECT username FROM manager WHERE manager_id = '$manager_id'";
    $current_result = mysqli_query($conn, $current_sql);
    $current_manager = mysqli_fetch_assoc($current_result);
    $current_username = $current_manager['username'];

    
    if ($current_username !== $username) {
       
        $update_restaurants_sql = "UPDATE restaurants SET M_ID='$username' WHERE M_ID='$current_username'";
        
        if (!mysqli_query($conn, $update_restaurants_sql)) {
            echo "Error updating restaurants: " . mysqli_error($conn);
            exit;
        }
    }

   
    $sql = "UPDATE manager SET username='$username', fullname='$name', email='$email', contact='$contact' WHERE manager_id='$manager_id'";

    if (mysqli_query($conn, $sql)) {
        header('Location: view_managers.php');
        exit;
    } else {
        echo "Error updating manager record: " . mysqli_error($conn);
    }
}

if (isset($_GET['id'])) {
    $manager_id = $_GET['id'];
    
    $sql = "SELECT * FROM manager WHERE manager_id = '$manager_id'";
    $result = mysqli_query($conn, $sql);
    $manager = mysqli_fetch_assoc($result);
    
    if (!$manager) {
        echo "Manager not found!";
        exit;
    }
} else {
    header('Location: view_managers.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Manager | Foodie Deliver Mbarara</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="container">
    <h2>Edit Manager Details</h2>
    <form action="edit_manager.php?id=<?php echo $manager['manager_id']; ?>" method="POST">
      <input type="hidden" name="manager_id" value="<?php echo $manager['manager_id']; ?>">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" name="username" value="<?php echo $manager['username']; ?>" required>
      </div>
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $manager['fullname']; ?>" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $manager['email']; ?>" required>
      </div>
      <div class="form-group">
        <label for="contact">Contact Number:</label>
        <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $manager['contact']; ?>" required>
      </div>
      <button type="submit" class="btn btn-primary">Update Manager</button>
    </form>
  </div>
</body>
</html>
