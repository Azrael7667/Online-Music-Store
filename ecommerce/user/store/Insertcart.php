<?php
session_start();
require '../../database/config.php'; 

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$product_name = $_POST['PName'] ?? '';
$product_price = floatval($_POST['PPrice'] ?? 0);
$product_quantity = intval($_POST['PQuantity'] ?? 0);
$user_id = $_SESSION['user_id']; 

if (isset($_POST['addCart'])) {
    // Check if the product is already in the cart
    $stmt = $con->prepare("SELECT * FROM cart WHERE PName = ? AND UserId = ?");
    $stmt->bind_param('si', $product_name, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Product already in the cart, update the quantity
        $stmt = $con->prepare("UPDATE cart SET PQuantity = PQuantity + ?, TotalPrice = PPrice * (PQuantity + ?), added_date = NOW() WHERE PName = ? AND UserId = ?");
        $stmt->bind_param('iisi', $product_quantity, $product_quantity, $product_name, $user_id);
        $stmt->execute();
    } else {
        // Product not in the cart, insert a new record
        $total_price = $product_price * $product_quantity;
        $stmt = $con->prepare("INSERT INTO cart (UserId, PName, PPrice, PQuantity, TotalPrice, status, added_date) VALUES (?, ?, ?, ?, ?, 'in cart', NOW())");
        $stmt->bind_param('isdis', $user_id, $product_name, $product_price, $product_quantity, $total_price);
        $stmt->execute();
    }
    $stmt->close();

   
    if (isset($_SESSION['cart'][$product_name])) {
        $_SESSION['cart'][$product_name]['productQuantity'] += $product_quantity;
    } else {
        $_SESSION['cart'][$product_name] = array(
            'productName' => $product_name,
            'productPrice' => $product_price,
            'productQuantity' => $product_quantity
        );
    }

    header("Location: viewCart.php");
    exit();
} else {
    header("Location: store.php");
    exit();
}
?>
