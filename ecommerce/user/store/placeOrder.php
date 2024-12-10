<?php
session_start();
include '../../database/Config.php';



if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    $userId = $_SESSION['user_id']; 

  
    foreach ($_SESSION['cart'] as $item) {
        $productName = $item['productName'];
        $productPrice = floatval($item['productPrice']);
        $productQuantity = intval($item['productQuantity']);
        $totalPrice = $productPrice * $productQuantity;

       
        $sql = "INSERT INTO orders (UserId, PName, PPrice, PQuantity, TotalPrice, status, ordered_date) 
                VALUES ('$userId', '$productName', '$productPrice', '$productQuantity', '$totalPrice', 'orderplace', NOW())";

       
        if ($con->query($sql) === TRUE) {
            
            unset($_SESSION['cart']);
            $_SESSION['message'] = "Order placed successfully!";
        } else {
            $_SESSION['message'] = "Error: " . $sql . "<br>" . $con->error;
        }
    }

    
    header('Location: store.php');
    exit();
} else {
   
    $_SESSION['message'] = "Your cart is empty!";
    header('Location: store.php');
    exit();
}
?>
