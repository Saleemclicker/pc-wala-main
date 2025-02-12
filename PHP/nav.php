<?php
session_start();
if (isset($_COOKIE['userid'])) {
    $login = true;
} else {
    $login = false;
}
 
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/nav.css">
</head>

  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <img src="../Images/logo.png" alt="Can't Load Image" id="logo">
      <a class="navbar-brand" href="#">PC WALA</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="home.php" id="hover">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="home.php#category" id="hover">Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="allproducts.php?category=Pre-Built" id="hover">Pre-Built</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" id="hover">Contact Us</a>
          </li>
        </ul>
        <form class="d-flex" role="search" action="search.php" method="GET">
          <?php
          if (isset($_GET['q'])) {
            $query=$_GET['q'];
            echo '<div class="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q" value="'.$query.'">
          </div>';
          }else{
            echo '<div class="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q">
          </div>';
          }
          ?>
          </form>
          <?php if ($login) : ?>
                      <a class="navbar-text login-stat" href="logout.php">Logout</a>
                  <?php else : ?>
                      <a href="login.php" class="btn btn-outline-success">Login</a>
                  <?php endif; ?>
          <a href="cart.php"><img src="../Images/cart.png" alt="Can't Load Image" id="cart"></a>
      </div>   
    </div>
  </nav>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>