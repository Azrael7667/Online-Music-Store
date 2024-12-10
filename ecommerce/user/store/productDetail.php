<?php
session_start();
include '../../database/Config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../verification/login_signup.php");
    exit();
}

if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);
    $Record = mysqli_query($con, "SELECT * FROM products WHERE Id = $product_id");

    if (!$Record) {
        echo "<div class='alert alert-danger text-center'>Error: " . mysqli_error($con) . "</div>";
        exit();
    }

    $row = mysqli_fetch_assoc($Record);

    if ($row) {
        $product_name = $row['PName'];
        $product_price = $row['PPrice'];
        $product_image = $row['PImage'];
        $product_description = $row['PDescription'];
    } else {
        $_SESSION['message'] = "Product not found!";
        header("Location: store.php");
        exit();
    }
} else {
    $_SESSION['message'] = "Invalid product ID!";
    header("Location: store.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product_name); ?></title>
    <?php include '../headerfooter/header.php'; ?>
    <style>
        .product-img {
            width: 100%; 
            max-width: 300px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src='../../admin/product/<?php echo htmlspecialchars($product_image); ?>' class='img-fluid product-img'>
        </div>
        <div class="col-md-6">
            <h1 class="text-black"><?php echo htmlspecialchars($product_name); ?></h1>
            <h2 class="text-black">$ <?php echo htmlspecialchars($product_price); ?></h2>
            <p><?php echo htmlspecialchars($product_description); ?></p>
            <form action="Insertcart.php" method="POST">
                <input type='hidden' name='PName' value='<?php echo htmlspecialchars($product_name); ?>'>
                <input type='hidden' name='PPrice' value='<?php echo htmlspecialchars($product_price); ?>'>
                <label for='PQuantity'>Quantity:</label>
                <input type='number' name='PQuantity' value='1' min='1' max='20'><br><br>
                <input type='submit' name='addCart' class='btn btn-dark text-white w-50' value='Add TO Cart'>
            </form>
        </div>
    </div>
</div>

</body>
</html>
