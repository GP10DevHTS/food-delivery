<?php
// Database connection
include('connection.php');

// Get the order ID from the AJAX request
if (isset($_GET['id'])) {
  $orderId = $_GET['id'];

  // Query to fetch order details
  $sql = "SELECT o.order_ID, o.foodname, o.quantity, o.price, o.status 
          FROM orders o 
          WHERE o.customer_order_id = '$orderId'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<li><strong>Order ID:</strong> " . $row['order_ID'] . "</li>";
      echo "<li><strong>Food Name:</strong> " . $row['foodname'] . "</li>";
      echo "<li><strong>Quantity:</strong> " . $row['quantity'] . "</li>";
      echo "<li><strong>Price:</strong> $" . $row['price'] . "</li>";
      echo "<li><strong>Status:</strong> " . $row['status'] . "</li>";
      echo "<hr>";
    }
    echo "</ul>";
  } else {
    echo "<p>No details available for this order.</p>";
  }
}
?>
