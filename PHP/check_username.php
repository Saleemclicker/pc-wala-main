<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pc-wala";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['usrname'])) {
    $usrname = $_POST['usrname'];
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usrname);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        echo "Username already exists";
    } else {
        echo "";
    }
    $stmt->close();
}
$conn->close();
?>
