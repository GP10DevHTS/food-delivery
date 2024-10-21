<?php
include('connection.php'); 

session_start(); 

$error = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  $sql = "SELECT * FROM manager WHERE username = '$username' and password = '$password'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

  if (mysqli_num_rows($result) == 1) {
    if ($row['role'] == 'superadmin') {
      $_SESSION['login_user1'] = $username;
      $_SESSION['role'] = 'superadmin';
      header("location: superadmin.php"); 
    } else {
      $_SESSION['login_user1'] = $username;
      $_SESSION['role'] = 'manager';
      $_SESSION['username'] = $username; 
      header("location: myrestaurant.php"); 
    }
  } else {
    $error = "Username or Password is invalid";
  }
}
?>
