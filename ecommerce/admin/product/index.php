<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha384-oS3vJWv+0UjzB1E8/hzFZpEL+iMw1N4H/hX/ttdLrRmgBNE9Nix5giui9jz8gWT5" crossorigin="anonymous">

        <link rel="stylesheet" href="product.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <a href="../php/mystore.php" class="back-btn"><i class="fas fa-arrow-left"></i> Back</a>
                <div class="product-form">
                    <h2 class="product-form-title">Add New Product</h2>
                    <form action="insert.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="Pname" class="form-label">Product Name:</label>
                            <input type="text" name="Pname" id="Pname" class="form-control" placeholder="Enter product name">
                        </div>
                        <div class="mb-3">
                            <label for="Pprice" class="form-label">Product Price:</label>
                            <input type="text" name="Pprice" id="Pprice" class="form-control" placeholder="Enter product price">
                        </div>
                        <div class="mb-3">
                            <label for="Pimage" class="form-label">Product Image:</label>
                            <input type="file" name="Pimage" id="Pimage" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="Pages" class="form-label">Select Category:</label>
                            <select class="form-select" name="Pages" id="Pages">
                                <option value="Guitar">Guitar</option>
                                <option value="Amplifier">Amplifier</option>
                                <option value="Bass">Bass</option>
                                <option value="Drums">Drums</option>
                            </select>
                        </div>
                        <button name="submit" class="btn btn-upload">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
