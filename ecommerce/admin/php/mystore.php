<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home Page</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../phpcss/mystore.css">
</head>

<?php
session_start();
if (!$_SESSION['admin']) {
    header("Location: form/login.php");
    exit();
}
?>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="sidebar" id="sidebar">
            <div class="profile-pic text-center">
                <img src="Solomonsilwal.jpg" alt="Profile Picture" class="img-fluid rounded-circle my-3">
                <h2><?php echo $_SESSION['admin']; ?></h2>
            </div>
            <ul class="nav flex-column mt-4">
                <li class="nav-item">
                    <a class="nav-link" href="mystore.php">
                        <i class="fas fa-home me-2"></i><span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../product/index.php">
                        <i class="fas fa-box me-2"></i><span>Add Products</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="viewproduct.php">
                        <i class="fas fa-boxes me-2"></i><span>View Products</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="users.php">
                        <i class="fas fa-users me-2"></i><span>Accounts</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../form/logout.php">
                        <i class="fas fa-sign-out-alt me-2"></i><span>Logout</span>
                    </a>
                </li>
            </ul>
            <div class="social-icons d-flex justify-content-around mt-5">
                <a href="#" class="text-white"><i class="fab fa-facebook"></i></a>
                <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white"><i class="fab fa-linkedin"></i></a>
                <a href="#" class="text-white"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white"><i class="fab fa-pinterest"></i></a>
            </div>
        </nav>

        <!-- Content -->
        <div class="content" id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
                <div class="container-fluid">
                    <span class="navbar-text ms-auto">
                        <i class="fas fa-user-shield me-2"></i>Hello, <?php echo $_SESSION['admin']; ?>
                    </span>
                </div>
            </nav>

            <!-- Dashboard Content -->
            <?php include 'dashboard.php'; ?>
        </div>
    </div>

    <!-- Menu Button -->
    <button class="collapse-btn" id="collapse-btn">
        <i class="fas fa-bars"></i>
    </button>

    <!-- JavaScript for toggling sidebar -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');
        const collapseBtn = document.getElementById('collapse-btn');

        collapseBtn.addEventListener('click', (event) => {
            sidebar.classList.toggle('collapsed');
            content.classList.toggle('collapsed');
            const icon = collapseBtn.querySelector('i');
            icon.classList.toggle('fa-bars');
            icon.classList.toggle('fa-times');
            collapseBtn.classList.toggle('collapsed');
            event.stopPropagation();
        });
    </script>
</body>

</html>
