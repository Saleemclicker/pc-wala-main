<?php
error_reporting(1);
?>
<style>
    * {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
}

.container {
    width: 50%;
    margin: 50px auto;
    background-color: #fff;
    border-radius: 5px;
    padding: 20px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

h1 {
    text-align: center;
    margin-bottom: 30px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input,
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="submit"] {
    width: 100%;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px;
    font-size: 16px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}
.product-table {
  width: 80%;
  margin-top: 1%;
  margin-left: 10%;
  margin-right: 10% ;
  border-collapse: collapse;
}

.product-table th,
.product-table td {
  max-height: 3px;
  border: 1px solid black;
  text-align: center;
}

.product-table th {
  background-color: #f2f2f2;
}

.product-image {
  height: 10px;
  width: auto;
}

.product-name {
  font-size: 16px;
}
#total{
    float: right;
    position: relative;
    right: 150px;
    margin-top: 80px;
}
</style>
<?php
// Include necessary files, such as the navigation and database connection
include("nav.php");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pc-wala";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$totalprice = 0; // Initialize total price
if (isset($_POST['checkout_cart'])) {
    $user_id=$_COOKIE['userid'];
    $query_cart = "SELECT cart.productid, cart.quantity, products.name, products.image, products.price 
    FROM cart 
    INNER JOIN products ON cart.productid = products.id 
    WHERE cart.userid = '$user_id'";
$result_cart = $conn->query($query_cart);

if($result_cart->num_rows > 0) {
echo "<table class='product-table'>
      <thead>
        <tr>
          <th>Product Image</th>
          <th>Product Name</th>
          <th>Price</th>
          <th>Quantity</th>
        </tr>
    </thead>";
while($row_cart = $result_cart->fetch_assoc()) {
$product_id = $row_cart['productid'];
$product_name = $row_cart['name'];
$image = $row_cart['image'];
$pricestring = $row_cart['price']; // Get price as string
$priceasnumber = (float) str_replace(',', '', $pricestring); // Convert to number
$quantity = $row_cart['quantity'];
$subtotal = $priceasnumber * $quantity; // Get subtotal
$totalprice += $subtotal; // Add subtotal to total price
?>
<tbody>
  <tr>
    <td><img src="<?php echo $image; ?>" alt="Product Image" width="80"></td>
    <td><?php echo $product_name; ?></td>
    <td><?php echo $pricestring; ?></td>
    <td>
      <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
      <?php echo $quantity; ?>
    </td>
  </tr>
  <?php
}
?>
</tbody>
</table>
<?php
echo "<h4 id='total'>Total Amount : ₹".$totalprice."</h4>";
}?>
<div class="container">
        <h1>Checkout</h1>
        <form action="save_order.php" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="number" id="phone" name="number" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea id="address" name="address" rows="4" cols="50" required></textarea>
            </div>
            <div class="form-group">
                <input type="hidden" name="checkout_cart">
                <input type="submit" value="Place Order" name="sbt">
            </div>
        </form>
    </div>
    <?php
}else{
    $product_only="SELECT * FROM products WHERE id = ".$_GET["product_id"]."";
    $res_product = $conn->query($product_only);
    $option2 = $res_product->fetch_assoc();
    $pricestring = $option2['price']; // Get price as string
    $priceasnumber = (float) str_replace(',', '', $pricestring); // Convert to number
    $subtotal = $priceasnumber; // Get subtotal
    $totalprice += $subtotal; // Add subtotal to total price
    ?> 
<table class='product-table'>
  <thead>
    <tr>
      <th>Product Image</th>
      <th>Product Name</th>
      <th>Price</th>
      <th>Quantity</th>
    </tr>
</thead>
<tbody>
      <tr>
      <td><img src="<?php echo $option2['image']; ?>" alt="Product Image" width="80"></td>
      <td><?php echo $option2['name']; ?></td>
      <td><?php echo $option2['price']; ?></td>
      <td>
        <?php echo "1";?>
      </td>
      </tr>
      </tbody>
      </table>
      <div class="container">
        <h1>Checkout</h1>
        <form action="save_order.php" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="number" id="phone" name="number" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea id="address" name="address" rows="4" cols="50" required></textarea>
            </div>
            <div class="form-group">
                <input type="hidden" name="product_id" value="<?php echo $_GET['product_id'];?>">
                <input type="submit" value="Place Order" name="sbt">
            </div>
        </form>
    </div>
<?php
}
?>


    