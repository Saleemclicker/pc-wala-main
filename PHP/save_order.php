<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pc-wala";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['checkout_cart'])) {
  $user_id=$_COOKIE['userid'];
  $query_cart = "SELECT cart.productid, cart.quantity, products.name, products.image, products.price 
  FROM cart 
  INNER JOIN products ON cart.productid = products.id 
  WHERE cart.userid = '$user_id'";
$result_cart = $conn->query($query_cart);

$checkout='INSERT INTO orders (name,userid,number,address) VALUES ("'.$_POST['name'].'",'.$_COOKIE['userid'].','.$_POST['number'].',"'.$_POST['address'].'")';
mysqli_query($conn, $checkout);
$order_id = $conn->insert_id;
if($result_cart->num_rows > 0) {
  $product_ids = array();
while($row_cart = $result_cart->fetch_assoc()) {
  $product_id = $row_cart['productid'];
  $items='INSERT INTO order_items (orderid,productid) VALUES ('.$order_id.','.$product_id.')';
  mysqli_query($conn, $items);
}
}
}else {
  $checkout='INSERT INTO orders (name,userid,number,address) VALUES ("'.$_POST['name'].'",'.$_COOKIE['userid'].','.$_POST['number'].',"'.$_POST['address'].'")';
  mysqli_query($conn, $checkout);
  $order_id = $conn->insert_id;
  $items='INSERT INTO order_items (orderid,productid) VALUES ('.$order_id.','.$_POST['product_id'].')';
  mysqli_query($conn, $items);
}
echo "Order Successful Thank You For Shopping";
?>