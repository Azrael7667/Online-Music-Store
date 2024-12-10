<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
    <?php
 include "../headerfooter/header.php"; 
    ?>
    <style>
        .card {
            width: 18rem;
        }
        .drum-card {
            width: 24rem; 
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <h1 class="text-black text-center my-3">STORE</h1>

            <?php
            if (isset($_SESSION['message'])) {
                echo "<div class='alert alert-info text-center'>{$_SESSION['message']}</div>";
                unset($_SESSION['message']);
            }

            

            
            $categories = ['Guitar', 'Amplifier', 'Bass', 'Drums'];

            
            $search_query = isset($_GET['query']) ? $_GET['query'] : '';

            if (!empty($search_query)) {
                
                $stmt = $con->prepare("SELECT * FROM products WHERE LOWER(PName) LIKE LOWER(?)");
                $search_term = "%{$search_query}%";
                $stmt->bind_param("s", $search_term);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    echo "<h2 class='text-center my-4'>Search Results for '{$search_query}'</h2>";
                    echo "<div class='row'>";

                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <div class='col-md-6 col-lg-4 mb-3'>
                            <div class='card m-auto'>
                                <a href='productDetail.php?id={$row['Id']}'>
                                    <img src='../../admin/product/{$row['PImage']}' class='card-img-top'>
                                </a>
                                <div class='card-body text-center'>
                                    <h5 class='card-title text-black fs-4 fw-bold'>{$row['PName']}</h5>
                                    <p class='card-text text-black fs-4 fw-bold'>RS: {$row['PPrice']}</p>
                                </div>
                            </div>
                        </div>
                        ";
                    }

                    echo "</div>";
                } else {
                    echo "<h2 class='text-center my-4'>No results found for '{$search_query}'</h2>";
                }

                $stmt->close();
            } else {
               
                foreach ($categories as $category) {
                    echo "<h2 class='text-center my-4'>{$category}s</h2>";
                    echo "<div class='row'>";

                    $stmt = $con->prepare("SELECT * FROM products WHERE PCategory = ?");
                    $stmt->bind_param("s", $category);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    while ($row = $result->fetch_assoc()) {
                        $card_class = ($category == 'Drums') ? 'drum-card' : 'card';
                        $col_class = ($category == 'Drums') ? 'col-md-6 mb-3' : 'col-md-6 col-lg-4 mb-3';
                        echo "
                        <div class='{$col_class}'>
                            <div class='{$card_class} m-auto'>
                                <a href='productDetail.php?id={$row['Id']}'>
                                    <img src='../../admin/product/{$row['PImage']}' class='card-img-top'>
                                </a>
                                <div class='card-body text-center'>
                                    <h5 class='card-title text-black fs-4 fw-bold'>{$row['PName']}</h5>
                                    <p class='card-text text-black fs-4 fw-bold'>$ {$row['PPrice']}</p>
                                </div>
                            </div>
                        </div>
                        ";
                    }

                    $stmt->close();
                    echo "</div>";
                }
            }

            $con->close();
            ?>
        </div>
    </div>
</div>
<?php
include '../headerfooter/footer.php';
?>
</body>
</html>
