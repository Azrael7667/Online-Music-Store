<?php
include '../../database/Config.php';
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    
    // Delete product from the database
    $delete_query = "DELETE FROM `products` WHERE `Id` = ?";
    $stmt = mysqli_prepare($con, $delete_query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    $result = mysqli_stmt_execute($stmt);

    if($result) {
        // Redirect back to index.php with success message
        header("Location: index.php?message=Product%20deleted%20successfully");
        exit();
    } else {
        // Redirect back to index.php with error message
        header("Location: index.php?error=Error%20deleting%20product");
        exit();
    }

    mysqli_stmt_close($stmt);
} else {
    // Redirect back to index.php with error message
    header("Location: index.php?error=Invalid%20request");
    exit();
}

mysqli_close($con);
?>
