<?php
include "../../database/Config.php";


$query = "SELECT * FROM `orders`";
$result = mysqli_query($con, $query);

// Check if the form is submitted to update the status
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['order_id']) && isset($_POST['status'])) {
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];
    $update_query = "UPDATE `orders` SET `status`='$status' WHERE `Id`=$order_id";
    mysqli_query($con, $update_query);

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../phpcss/orders.css">

</head>

<body>
    <div class="container">
    <div class="back-button">
            <a href="mystore.php" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
        </div>
        <h2 class="text-center my-4">Orders</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="bg-primary text-white text-center">
                    <tr>
                        <th>Order ID</th>
                        <th>User ID</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Ordered Date</th>
                        <th>Update Status</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        $status_class = strtolower(str_replace(' ', '', $row['status']));
                        echo "
                    <tr>
                        <td>{$row['Id']}</td>
                        <td>{$row['UserId']}</td>
                        <td>{$row['PName']}</td>
                        <td>{$row['PPrice']}</td>
                        <td>{$row['PQuantity']}</td>
                        <td>{$row['TotalPrice']}</td>
                        <td><span class='btn btn-sm btn-status $status_class'>{$row['status']}</span></td>
                        <td>{$row['ordered_date']}</td>
                        <td>
                            <form method='POST' action=''>
                                <input type='hidden' name='order_id' value='{$row['Id']}'>
                                <select name='status' class='form-select' required>
                                    <option value='Order Placed' " . ($row['status'] == 'Order Placed' ? 'selected' : '') . ">Order Placed</option>
                                    <option value='On the Way' " . ($row['status'] == 'On the Way' ? 'selected' : '') . ">On the Way</option>
                                    <option value='Delivered' " . ($row['status'] == 'Delivered' ? 'selected' : '') . ">Delivered</option>
                                </select>
                                <button type='submit' class='btn btn-primary btn-sm mt-2'>Update</button>
                            </form>
                        </td>
                    </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>