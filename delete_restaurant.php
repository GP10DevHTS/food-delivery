<?php
session_start();
include('connection.php');

if (isset($_GET['R_ID'])) {
    $username = $_GET['R_ID'];

    $stmt = $conn->prepare("DELETE FROM restaurants WHERE M_ID = ?");
    $stmt->bind_param("s", $username); 

    if ($stmt->execute()) {
        $stmt = $conn->prepare("DELETE FROM manager WHERE username = ?");
        $stmt->bind_param("s", $username);

        if ($stmt->execute()) {
            echo "Manager and associated restaurants deleted successfully.";
        } else {
            echo "Error deleting manager: " . $stmt->error;
        }
    } else {
        echo "Error deleting restaurants: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "No username provided.";
}

$conn->close();
?>
