<?php
require_once dirname(__FILE__) . "/../../database/config.php"; // Adjust path to your config.php

// Initialize variables
$username = '';
$profilePicture = '';

// Check if user is logged in
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $stmt = $con->prepare("SELECT UserName, ProfilePicture FROM users WHERE Id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($username, $profilePicture);
        $stmt->fetch();
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G-Clef Music Store</title>
    <!-- Bootstrap CSS (only for styling, no JS dependency) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="user/css/header.css">
    <link rel="stylesheet" href="user/css/style.css">
</head>

<body>

    <!-- New Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom justify-content-between">
        <a class="navbar-brand" href="#">
            <img src="/ecommerce/user/images/logo.png" alt="Logo" class="logo" width="90" height="50">
        </a>

        <!-- Hamburger Menu Button -->
        <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible Menu -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/ecommerce/index.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/ecommerce/user/lessons/lesson.php">LESSONS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/ecommerce/user/store/store.php">STORE</a>
                </li>
            </ul>

            <div class="d-lg-none">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <button class="btn btn-icon" id="searchButton" type="button"><i class="fas fa-search"></i></button>
                        <form class="d-flex" action="/ecommerce/user/store/search.php" method="GET">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <a href="/ecommerce/user/store/viewCart.php" class="btn btn-icon"><i class="fas fa-shopping-cart"></i></a>
                    </li>
                    <li class="nav-item">
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <div class="d-flex align-items-center ms-0">
                                <?php if (!empty($username)): ?>
                                    <span class="text-white me-2"><?php echo $username; ?></span>
                                <?php endif; ?>
                                <?php if (!empty($profilePicture)): ?>
                                    <img src="<?php echo $profilePicture; ?>" alt="Profile Picture" class="profile-image">
                                    <?php else: ?>
                                    <img src="/path/to/placeholder_profile.jpg" alt="Profile" class="profile-image">
                                <?php endif; ?>
                                <a href="/ecommerce/user/verification/logout.php" class="btn btn-icon" id="logout1" title="Logout"><i class="fas fa-sign-out-alt"></i></a>
                            </div>
                        <?php else: ?>
                            <button class="btn btn-icon" onclick="location.href='/ecommerce/user/verification/login_signup.php'"><i class="fas fa-user"></i></button>
                        <?php endif; ?>
                    </li>
                    <li class="nav-item">
                        <a href="/ecommerce/admin/form/login.php" class="btn btn-icon"><i class="fas fa-user-shield"></i></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="d-none d-lg-flex align-items-center">
            <div class="d-flex align-items-center position-relative">
                <button class="btn btn-icon" id="searchButtonLarge" type="button"><i class="fas fa-search"></i></button>
                <form class="form-inline" id="searchFormLarge" action="/ecommerce/user/store/search.php" method="GET">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            <a href="/ecommerce/user/store/viewCart.php" class="btn btn-icon"><i class="fas fa-shopping-cart"></i></a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="d-flex align-items-center ms-0">
                    <?php if (!empty($username)): ?>
                        <span class="text-white me-2"><?php echo $username; ?></span>
                    <?php endif; ?>

                    <a href="/ecommerce/user/verification/logout.php" class="btn btn-icon" title="Logout"><i class="fas fa-sign-out-alt"></i></a>
                </div>
            <?php else: ?>
                <button class="btn btn-icon1 text-white" onclick="location.href='/ecommerce/user/verification/login_signup.php'"><i class="fas fa-user"></i></button>
            <?php endif; ?>
            <a href="/ecommerce/admin/form/login.php" class="btn btn-icon"><i class="fas fa-user-shield"></i></a>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero" id="hero">
        <div class="sub-header row justify-content-center">
            <div class="col-12">
                <hr style="height: 1px; background-color: #ffffff; margin-top: 10px; margin-bottom: 10px;">
                <ul class="list-unstyled d-flex justify-content-center mb-0">
                    <li style="margin-right: 20px;"><a href="/ecommerce/index.php" class="text-decoration-none">HOME</a></li>
                    <li style="margin-right: 20px;"><a href="/ecommerce/user/lessons/lesson.php" class="text-decoration-none">LESSONS</a></li>
                    <li><a href="/ecommerce/user/store/store.php" class="text-decoration-none">STORE</a></li>
                </ul>
                <hr style="height: 1px; background-color: #ffffff; margin-top: 10px; margin-bottom: 10px;">
            </div>
        </div>

        <div class="container">
            <h1>Welcome to G-Clef Music Store</h1>
            <p>Your one-stop shop for all things music</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var navbarToggle = document.querySelector('.navbar-toggler');
            var navbarCollapse = document.querySelector('.navbar-collapse');
            var searchButton = document.getElementById('searchButton');
            var searchButtonLarge = document.getElementById('searchButtonLarge');

            navbarToggle.addEventListener('click', function () {
                navbarCollapse.classList.toggle('show');
            });

            searchButton.addEventListener('click', function () {
                document.querySelector('form.d-flex').classList.toggle('show');
            });

            searchButtonLarge.addEventListener('click', function () {
                document.getElementById('searchFormLarge').classList.toggle('show');
            });
        });
    </script>
</body>

</html>
