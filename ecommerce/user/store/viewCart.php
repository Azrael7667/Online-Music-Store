<?php
session_start();
 include '../headerfooter/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update'])) {
        $productName = $_POST['item'];
        $productQuantity = intval($_POST['PQuantity']);

        foreach ($_SESSION['cart'] as &$value) {
            if ($value['productName'] == $productName) {
                $value['productQuantity'] = $productQuantity;

                $stmt = $con->prepare("UPDATE cart SET PQuantity = ?, TotalPrice = PPrice * ?, added_date = NOW() WHERE PName = ? AND UserId = ?");
                $stmt->bind_param('iisi', $productQuantity, $productQuantity, $productName, $_SESSION['user_id']);
                $stmt->execute();
                $stmt->close();
                break;
            }
        }
    } elseif (isset($_POST['remove'])) {
        $productName = $_POST['item'];

        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['productName'] == $productName) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);

                $stmt = $con->prepare("DELETE FROM cart WHERE PName = ? AND UserId = ?");
                $stmt->bind_param('si', $productName, $_SESSION['user_id']);
                $stmt->execute();
                $stmt->close();
                break;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cart</title>
    <link rel="stylesheet" href="path/to/your/bootstrap.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/viewCart.css">
</head>
<body>



<div class="container">
    <div class="cart-header text-center">
        <h1>My Cart</h1>
    </div>
</div>

<div class="container">
    <div class="cart-table table-responsive">
        <table class="table text-center table-responsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 1;
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $key => $value) {
                        $product_price = floatval($value['productPrice']);
                        $product_quantity = intval($value['productQuantity']);
                        $total = $product_price * $product_quantity;

                        echo "
                        <form action='viewCart.php' method='POST'>
                            <tr>
                                <td>{$index}</td>
                                <td>{$value['productName']}</td>
                                <td>$ {$value['productPrice']}</td>
                                <td><input type='number' name='PQuantity' value='{$value['productQuantity']}' min='1' class='form-control'></td>
                                <td>$ {$total}</td>
                                <td><button name='update' class='update-btn'><i class='fa fa-refresh'></i></button></td>
                                <td><button name='remove' class='delete-btn'><i class='fa fa-trash'></i></button></td>
                                <input type='hidden' name='item' value='{$value['productName']}'>
                            </tr>
                        </form>
                        ";
                        $index++;
                    }
                } else {
                    echo "<tr><td colspan='7'>No items in the cart.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<div class="container">
    <div class="row justify-content-end">
        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
            <form action="placeOrder.php" method="POST">
                <button type="submit" class="btn btn-success btn-lg w-100 place-order-btn">Place Order</button>
            </form>
        </div>
    </div>
</div>
<?php include '../headerfooter/footer.php'; ?>
</body>
</html>
