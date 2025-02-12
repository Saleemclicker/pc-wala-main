<?php
include("nav.php")
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pc-wala";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = isset($_GET['id']) ? $_GET['id'] : '';

$sql = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

if (isset($_SESSION["username"])) {
    $loggedIn = true;
    $username = $_SESSION["username"];
} else {
    $loggedIn = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['name']; ?></title>
    <link rel="stylesheet" href="../CSS/products.css">
</head>
<body>
    <main class="container">
        <div class="left-column">
            <img data-image="black" src="<?php echo $product['image']; ?>" alt="">
        </div>
        <div class="right-column">
            <div class="product-description">
                <span><?php echo $product['category']; ?></span>
                <h1><?php echo $product['name']; ?></h1>
                <p><?php echo $product['description']; ?></p>
            </div>
            <div class="product-price">
                <span>₹<?php echo $product['price']; ?></span>
            </div>
            <div class="buy-section">
                <a href="add_to_cart.php?id=<?php echo $product['id']; ?>" class="cart-btn">Add to cart</a>
                <a href="checkout.php?product_id=<?php echo $product['id']?>" class="cart-btn">Buy Now</a>
            </div>
        </div>
    </main>
</body>
</html>