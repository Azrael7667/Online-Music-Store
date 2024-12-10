<?php
include '../../database/Config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pcategory = $_POST['pcategory'];
    $pdescription = $_POST['pdescription'];

    $stmt = $con->prepare("UPDATE `products` SET `PName` = ?, `PPrice` = ?, `PCategory` = ?, `PDescription` = ? WHERE `Id` = ?");
    $stmt->bind_param("ssssi", $pname, $pprice, $pcategory, $pdescription, $id);

    if ($stmt->execute()) {
        echo "Product updated successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();

    
    header("Location: viewproduct.php");
    exit();
}


if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $result = mysqli_query($con, "SELECT * FROM `products` WHERE `Id` = $id");
    $product = mysqli_fetch_assoc($result);

    if (!$product) {
        
        header("Location: viewproduct.php");
        exit();
    }
} else {
  
    header("Location: viewproduct.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>Edit Product</h3>
                    <a href="viewproduct.php" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="hidden" name="id" value="<?php echo isset($product['Id']) ? $product['Id'] : ''; ?>">
                    <div class="mb-3">
                        <label for="pname" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="pname" name="pname" value="<?php echo isset($product['PName']) ? htmlspecialchars($product['PName']) : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="pprice" class="form-label">Product Price</label>
                        <input type="text" class="form-control" id="pprice" name="pprice" value="<?php echo isset($product['PPrice']) ? htmlspecialchars($product['PPrice']) : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="pcategory" class="form-label">Product Category</label>
                        <input type="text" class="form-control" id="pcategory" name="pcategory" value="<?php echo isset($product['PCategory']) ? htmlspecialchars($product['PCategory']) : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="pdescription" class="form-label">Product Description</label>
                        <textarea class="form-control" id="pdescription" name="pdescription" rows="4"><?php echo isset($product['PDescription']) ? htmlspecialchars($product['PDescription']) : ''; ?></textarea>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary">Update Product</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
