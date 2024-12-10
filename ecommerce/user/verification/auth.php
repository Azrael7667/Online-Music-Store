<?php
session_start();
include('../../database/Config.php');

$login_error = '';
$register_error = '';
$register_success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        // Handle login
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
    } elseif (isset($_POST['register'])) {
        
    }
}

$con->close();
?>
