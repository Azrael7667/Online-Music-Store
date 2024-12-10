<?php
session_start();


include '../../database/config.php';


if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($con, $_GET['search']);

    
    $sql = "SELECT * FROM products WHERE LOWER(PName) LIKE LOWER(?)";
    $stmt = $con->prepare($sql);
    $search_term = "%$search%";
    $stmt->bind_param("s", $search_term);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        
        if ($result->num_rows > 0) {
            
            $product = $result->fetch_assoc();
            $product_id = $product['Id'];
            
           
            
            header("Location: productDetail.php?id=$product_id");
            exit();
        } else {
            
            $_SESSION['message'] = "No products found matching your search.";
            header("Location: store.php");
            exit();
        }
    } else {
        
        error_log("Query execution failed: " . $stmt->error);
        echo "An error occurred while executing the query.";
    }
} else {
    
    header("Location: ../../index.php");
    exit();
}


$con->close();
?>
