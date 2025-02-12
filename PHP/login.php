<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | PC-WALA</title>
    <link rel="stylesheet" href="../CSS/login.css">
</head>
<body>
    <div class="container">
        <div class="main-box">
            <div class="logo-part">
                <img src="../Images/logo.png" alt="Can't Load Image">
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form" method="POST">
            <h1>Login</h1>
            <input type="text" placeholder="Username" name="usrname">
            <input type="password" placeholder="Password" name="pass">
            <input type="submit" id="sbt" name="sbt" value="Login">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pc-wala";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usrname = $_POST["usrname"];
    $pass = $_POST["pass"];
    $login_query = "SELECT userid, username, password FROM users WHERE username = '$usrname' AND password = '$pass'";
    $result = $conn->query($login_query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION["username"] = $row["username"];
        $_SESSION["userid"] = $row["userid"];
        setcookie("username", $row["username"], time() + 3600, "/");
        setcookie("userid", $row["userid"], time() + 3600, "/");
        header("Location: ../PHP/home.php");
        exit();
    } 
    else{
        $error_message = "Invalid username or password";
    }

}

$conn->close();
?>
            <label for="register">Don't Have An Account?<a href="../PHP/register.php"> Create One</a></label>
        </form> 
        </div>
    </div>
</body>
</html>