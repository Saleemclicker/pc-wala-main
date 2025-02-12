<?php
include("nav.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/main.css">
    <link rel="stylesheet" href="../CSS/home.css">
</head>
<body>
<?php
    echo '<h2 id="search">Search Results For : '.$_GET['q'].'</h2>';
    ?>  
<div class="container">
  <div class="row row-cols-auto">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pc-wala";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['q'])) {
    $query = $_GET['q'];
    
    // Prepare SQL statement
    $sql = "SELECT * FROM products WHERE name LIKE '%$query%'";
    
    // Execute SQL query
    $result = $conn->query($sql);
    
    // Display search results
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div class = "products">
            <div class = "container">
                <div class = "product-items">
                  <div class="col">
                    <div class = "product">
                      <a href="product.php?id='. $row["id"] .'">
                        <div class = "product-content">
                            <div class = "product-img">
                                <img src = "'.$row["image"].'" alt = "Loading Image.." id="pro-img">
                            </div>
                        </div>
                        <div class = "product-info">
                        <div class = "product-info-top">
                        <h2 class = "sm-title">'. $row["name"] .'</h2>
                        <p class = "product-price">₹ '. $row["price"] .'</p>
                        </div>
                        <div class = "product-btns">
                                <a href="add_to_cart.php?id=5"><button type = "button" class = "btn-cart"> add to cart
                                    <span><i class = "fas fa-plus"></i></span>
                                </button></a>
                                <button type = "button" class = "btn-buy"> buy now
                                    <span><i class = "fas fa-shopping-cart"></i></span>
                                </button>
                            </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>';
        }
    } else {
        echo '<div class="no-result">
        <img src="../Images/no-search-found.png">';
    }
}

// Close connection
$conn->close();
?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>