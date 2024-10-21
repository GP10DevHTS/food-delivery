<?php
include('connection.php');
// $conn = Connect();

if (isset($_POST['username'])) {
    $manager_id = $_POST['username'];

    
    $statistics = [
        'food_orders' => 0, 
        'customer_inquiries' => 0, 
        'deliveries' => 0 
    ];

    
    $statistics['food_orders'] = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM orders WHERE R_ID = '$manager_id'"))['count'];
    $statistics['customer_inquiries'] = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM inquiries WHERE manager_id = '$manager_id'"))['count'];
    $statistics['deliveries'] = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM deliveries WHERE manager_id = '$manager_id'"))['count'];

    $labels = ["Food Orders", "Customer Inquiries", "Deliveries"];
    $values = [$statistics['food_orders'], $statistics['customer_inquiries'], $statistics['deliveries']];

    echo json_encode(['labels' => $labels, 'values' => $values]);
}

mysqli_close($conn);
?>
