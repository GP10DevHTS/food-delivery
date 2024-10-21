<?php
include('session_m.php');
include('connection.php');

if (!isset($login_session)) {
  header('Location: managerlogin.php'); 
}

if (isset($_GET['username'])) {
  $id = $_GET['username'];

  $sql = "DELETE FROM customer WHERE username = $username";
  
  if (mysqli_query($conn, $sql)) {
    header('Location: view_customers.php');
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }

  mysqli_close($conn);
} else {
  header('Location: view_customers.php');
}
?>
