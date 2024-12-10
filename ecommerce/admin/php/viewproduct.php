<?php
include '../../database/Config.php'; 
$Record = mysqli_query($con, "SELECT * FROM `products`");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../phpcss/viewproduct.css">
</head>

<body>
    <div class="container">
        <div class="back-button">
            <a href="mystore.php" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
        </div>
        <h2 class="text-center my-4">Products</h2>
        <div class="row">
            <?php
            while ($row = mysqli_fetch_array($Record)) {
                $image_path = $row['PImage']; 
                echo "
                <div class='col-md-4'>
                    <div class='card'>
                        <img src='../product/{$image_path}' class='card-img-top product-img' alt='{$row['PName']}'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$row['PName']}</h5>
                            <p class='card-text'>\${$row['PPrice']}</p>
                            <div class='action-buttons'>
                                <form action='productdetail.php' method='post'>
                                    <input type='hidden' name='id' value='{$row['Id']}'>
                                    <button type='submit' class='btn-action btn-update' name='edit'><i class='fas fa-edit'></i></button>
                                </form>
                                <form action='../product/delete.php' method='post' onsubmit='return confirm(\"Are you sure you want to delete this product?\")'>
                                    <input type='hidden' name='id' value='{$row['Id']}'>
                                    <button type='submit' class='btn-action btn-delete'><i class='fas fa-trash'></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>";
            }
            ?>
        </div>
    </div>
</body>

</html>