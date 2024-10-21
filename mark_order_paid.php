<?php
// Include the database connection file
include 'connection.php';

// Check if the 'id' parameter exists in the URL
if (isset($_GET['id'])) {
    // Get the order ID from the URL
    $orderId = $_GET['id'];

    // Update the payment status of the order in the database
    $sql = "UPDATE customer_order SET payment_status = 'Paid' WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $orderId);

    if (mysqli_stmt_execute($stmt)) {
        // If the update was successful, redirect back to the referring page
        $referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'view_orders.php';
        header("Location: $referrer");
        exit;
    } else {
        // If there was an error, redirect back to the referring page with an error message
        $referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'view_orders.php';
        header("Location: $referrer");
        exit;
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
} else {
    // If no order ID was provided, redirect back to the referring page
    $referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'view_orders.php';
    header("Location: $referrer?status=missing_id");
    exit;
}
?>
