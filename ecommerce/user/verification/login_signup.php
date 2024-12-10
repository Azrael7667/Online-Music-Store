<?php
session_start();
include('../../database/Config.php');

$register_error = '';
$register_success = '';
$login_error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['register'])) {
        
        $email = $_POST['email'];
        $number = $_POST['number'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

       
        $targetDirectory = "uploads/";
        $targetFile = $targetDirectory . basename($_FILES["profile_picture"]["name"]);

       
        if (!file_exists($targetDirectory)) {
            mkdir($targetDirectory, 0755, true);
        }

        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $targetFile)) {
            
            $profilePicturePath = $targetFile;

           
            $stmt = $con->prepare("INSERT INTO users (Email, Number, UserName, Password, ProfilePicture) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $email, $number, $username, $password, $profilePicturePath);
            
            if ($stmt->execute()) {
                $register_success = "Registration successful! Please login.";
            } else {
                $register_error = "Error during registration: " . $stmt->error;
            }
            
            $stmt->close();
        } else {
            $register_error = "Sorry, there was an error uploading your file.";
        }
    } elseif (isset($_POST['login'])) {
       
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $con->prepare("SELECT Id, Password FROM users WHERE UserName = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($userId, $hash);

        if ($stmt->num_rows > 0) {
            $stmt->fetch();
            if (password_verify($password, $hash)) {
                $_SESSION['user_id'] = $userId;
                $_SESSION['username'] = $username;
                header("Location: ../../index.php");
                exit();
            } else {
                $login_error = "Invalid password!";
            }
        } else {
            $login_error = "No user found!";
        }

        $stmt->close();
    }
}

$con->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registration</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/login_signup.css">
   
    <script>
        function toggleForms() {
            var loginForm = document.getElementById('login-form');
            var registerForm = document.getElementById('register-form');
            if (loginForm.style.display === "none") {
                loginForm.style.display = "block";
                registerForm.style.display = "none";
            } else {
                loginForm.style.display = "none";
                registerForm.style.display = "block";
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 side-image">
                <img src="images/white.png" alt="">
                <div class="text">
                    <p>Rock N Roll Till Death</p>
                </div>
            </div>

            <div class="col-md-6 right">
                <div class="input-box">
                    <!-- Login form -->
                    <div id="login-form">
                        <header>Login</header>
                        <?php if ($login_error) { echo "<div class='alert alert-danger'>$login_error</div>"; } ?>
                        <form action="login_signup.php" method="post">
                            <div class="input-field">
                                <input type="text" name="username" class="input" id="username_login" required>
                                <label for="username_login">Username</label>
                            </div>
                            <div class="input-field">
                                <input type="password" name="password" class="input" id="password_login" required>
                                <label for="password_login">Password</label>
                            </div>
                            <div class="input-field">
                                <input type="submit" name="login" class="submit" value="Login">
                            </div>
                            <p class="signin">Don't have an account? <a href="#" onclick="toggleForms()">Register here</a></p>
                        </form>
                    </div>

                    <!-- Registration form -->
                    <div id="register-form" style="display:none;">
                        <header>Create account</header>
                        <?php if ($register_error) { echo "<div class='alert alert-danger'>$register_error</div>"; } ?>
                        <?php if ($register_success) { echo "<div class='alert alert-success'>$register_success</div>"; } ?>
                        <form action="login_signup.php" method="post" enctype="multipart/form-data">
                            <div class="input-field">
                                <input type="email" name="email" class="input" id="email" required>
                                <label for="email">Email</label>
                            </div>
                            <div class="input-field">
                                <input type="text" name="number" class="input" id="number" required>
                                <label for="number">Number</label>
                            </div>
                            <div class="input-field">
                                <input type="text" name="username" class="input" id="username" required>
                                <label for="username">Username</label>
                            </div>
                            <div class="input-field">
                                <input type="password" name="password" class="input" id="password" required>
                                <label for="password">Password</label>
                            </div>
                            <div class="input-field">
                                <input type="file" class="form-control-file" id="profile_picture" name="profile_picture">
                                <label for="profile_picture">Profile Picture</label>
                            </div>
                            <div class="input-field">
                                <input type="submit" name="register" class="submit" value="Register">
                            </div>
                            <p class="signin">Already have an account? <a href="#" onclick="toggleForms()">Login here</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
