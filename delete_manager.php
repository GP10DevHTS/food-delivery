<?php
include('session_m.php');
include('connection.php');

if (!isset($login_session)) {
    header('Location: managerlogin.php'); 
    exit();
}

if (isset($_GET['username'])) {
    $manager_id = $_GET['username'];

    $deleteFoodSql = "DELETE FROM food WHERE R_ID IN (SELECT R_ID FROM restaurants WHERE M_ID = '$username')";
    
    if (!mysqli_query($conn, $deleteFoodSql)) {
        echo "Error deleting from food: " . mysqli_error($conn);
        mysqli_close($conn);
        exit();
    }
    $deleteRestaurantsSql = "DELETE FROM restaurants WHERE M_ID = '$username'";
    
    if (!mysqli_query($conn, $deleteRestaurantsSql)) {
        echo "Error deleting restaurants: " . mysqli_error($conn);
        mysqli_close($conn);
        exit();
    }

    $deleteManagerSql = "DELETE FROM manager WHERE username = '$username'";
    
    if (mysqli_query($conn, $deleteManagerSql)) {
        header('Location: view_managers.php');
        exit();
    } else {
        echo "Error deleting manager record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    header('Location: view_managers.php');
    exit();
}
?>
