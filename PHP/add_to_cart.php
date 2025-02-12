<?php
session_start(); 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pc-wala";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_COOKIE['userid'])) {
    $userid = $_COOKIE['userid'];
    $productid = $_GET['id']; 
    $quantity = 1;
    $query = "INSERT INTO cart (userid, productid, quantity) VALUES ('$userid', '$productid', '$quantity');";
    $result = mysqli_query($conn, $query);
    header("Location: cart.php");
    exit();
} else {
    header("Location: login.php");
    exit();
}
?>
