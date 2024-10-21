<?php
session_start(); // Start the session
include('connection.php'); // Include your database connection

// Check if the required GET parameters are set
if (isset($_GET['order_ID']) && isset($_GET['status'])) {
    // Sanitize and assign the values
    $order_ID = mysqli_real_escape_string($conn, $_GET['order_ID']);
    $new_status = mysqli_real_escape_string($conn, $_GET['status']);

    // Prepare the SQL update query
    $sql = "UPDATE orders SET status = '$new_status' WHERE order_ID = '$order_ID'";

    // Execute the update query
    if (mysqli_query($conn, $sql)) {
        // Set a success message in the session (optional)
        $_SESSION['message'] = "Order status updated successfully!";
    } else {
        // Set an error message in the session if the update fails
        $_SESSION['error'] = "Error updating order status: " . mysqli_error($conn);
    }
} else {
    // Set an error message if the required parameters are missing
    $_SESSION['error'] = "Invalid request. Order ID or status not set.";
}

// Redirect back to the referring page
header("Location: " . $_SERVER['HTTP_REFERER']);
exit; // Ensure no further code is executed
