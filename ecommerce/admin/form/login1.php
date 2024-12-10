<?php
include '../../database/Config.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $A_name = $_POST['username'];
    $A_password = $_POST['userpassword'];

    
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = $con->prepare("SELECT * FROM `admin` WHERE username=? AND userpassword=?");
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($con->error));
    }

    $stmt->bind_param("ss", $A_name, $A_password);
    $stmt->execute();
    $result = $stmt->get_result();

    session_start();
    if ($result->num_rows > 0) {
        $_SESSION['admin'] = $A_name;
        header('Location: ../php/mystore.php');
        exit();
    } else {
        $error_message = "Invalid username/password";
        header("Location: login.php?error=" . urlencode($error_message));
        exit();
    }

    $stmt->close();
    $con->close();
} else {
    header('Location: login.php');
    exit();
}
?>
