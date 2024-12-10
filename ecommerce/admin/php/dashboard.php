<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Store Admin Dashboard</title>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../phpcss/dashboard.css">
</head>

<body>
    <div class="container">
        <div class="text-center">
            <h1 class="mb-3">Music Store Admin Dashboard</h1>
            <p class="lead">Welcome, Admin! Manage your music store efficiently.</p>
        </div>

        <div class="grid-container">
            <div class="card">
                <div class="card-body">
                    <i class="fas fa-users icon"></i>
                    <h2 class="card-title">Manage Users</h2>
                    <p class="card-text">View, edit, and manage user accounts and profiles.</p>
                    <a href="users.php" class="btn">Go to Users</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <i class="fas fa-shopping-cart icon"></i>
                    <h2 class="card-title">Manage Orders</h2>
                    <p class="card-text">Track, process, and manage customer orders and transactions.</p>
                    <a href="orders.php" class="btn">Go to Orders</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <i class="fas fa-box-open icon"></i>
                    <h2 class="card-title">View Products</h2>
                    <p class="card-text">Browse, edit, and manage products available in your music store.</p>
                    <a href="viewproduct.php" class="btn">View Products</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <i class="fas fa-plus icon"></i>
                    <h2 class="card-title">Add Product</h2>
                    <p class="card-text">Add new products to expand your music store inventory.</p>
                    <a href="../product/index.php" class="btn">Add Product</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"
        integrity="sha512-3sRVGbeYdP8H4I+beLroUzVoG6s6fYQ8rA8c64uO2YKhHv1B0p9g+yVGGdOUYsYHLWGf8Iu3TlQzlq+QIaFvBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
