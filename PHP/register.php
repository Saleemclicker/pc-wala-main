<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | PC-WALA</title>
    <link rel="stylesheet" href="../CSS/register.css">
</head>
<body>
    <div class="container">
        <div class="main-box">
            <div class="logo-part">
                <img src="../Images/logo.png" alt="Can't Load Image">
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form" method="POST">
                <h1>Register</h1>
                
                <!-- Email Input Field -->
                <label for="email">Email:</label>
                <input type="email" placeholder="Email" name="email" id="email" required>
                
                <!-- Username Input Field with Validation -->
                <label for="usrname">Username:</label>
                <input type="text" id="usrname" name="usrname" onkeyup="checkUsername()">
                <span id="username-error" style="color: red;"></span> <!-- Display feedback here -->
                
                
                
                <!-- Password Fields -->
                <label for="pass">Password:</label>
                <input type="password" placeholder="Password" name="pass" id="pass" required>
                
                <label for="cpass">Confirm Password:</label>
                <input type="password" placeholder="Confirm Password" name="cpass" id="cpass" required>
                
                <!-- Submit Button -->
                <input type="submit" id="sbt" name="sbt" value="Register">

                <?php
                // Database connection details
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "pc-wala";

                // Establish a connection to the database
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Handle form submission
                if (isset($_POST['sbt'])) {
                    $email = $_POST["email"];
                    $usrname = $_POST["usrname"];
                    $pass = $_POST["pass"];
                    $cpass = $_POST["cpass"];

                    // Check if passwords match
                    if ($pass == $cpass) {
                        // Check if the username or email already exists
                        $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("ss", $usrname, $email);
                        $stmt->execute();
                        $stmt->store_result();

                        if ($stmt->num_rows > 0) {
                            echo "<span style='color: red;'>Username or Email already exists</span>";
                        } else {
                            $stmt->close();

                            // Insert new user record
                            $sql = "INSERT INTO users (email, username, password) VALUES (?, ?, ?)";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("sss", $email, $usrname, $pass);

                            if ($stmt->execute()) {
                                echo "<h1>Registration successful!</h1>";
                                header("Refresh: 2; URL=../PHP/login.php");
                            } else {
                                echo "Error: " . $stmt->error;
                            }
                            $stmt->close();
                        }
                    } else {
                        echo "<span style='color: red;'>Passwords must match.</span>";
                    }
                }

                // Close the database connection
                $conn->close();
                ?>
            </form> 
        </div>
    </div>

    <!-- JavaScript for Username Validation -->
    <script>
        function checkUsername() {
            const usrname = document.getElementById("usrname").value;

            // Create an AJAX request
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "check_username.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            // Define callback function to handle response
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById("username-error").innerText = xhr.responseText;
                }
            };

            // Send request with username
            xhr.send("usrname=" + encodeURIComponent(usrname));
        }
    </script>
</body>
</html>
