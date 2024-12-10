<?php
if (isset($_POST['submit'])) {
    include '../../database/Config.php';
    $product_name = $_POST['Pname'];
    $product_price = $_POST['Pprice'];
    $product_image = $_FILES['Pimage'];
    $image_loc = $_FILES['Pimage']['tmp_name'];
    $image_name = $_FILES['Pimage']['name'];
    $img_des = "Uploadimage/" . $image_name; 

   
    if (move_uploaded_file($image_loc, $img_des)) {
        $product_category = $_POST['Pages'];

        $stmt = $con->prepare("INSERT INTO `products`(`PName`, `PPrice`, `PImage`, `PCategory`) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $product_name, $product_price, $img_des, $product_category);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Product uploaded successfully');
                    window.location.href = 'index.php';
                  </script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Failed to upload image";
    }

    $con->close();
}
?>
