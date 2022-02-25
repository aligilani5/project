<!DOCTYPE html>
<html lang="en">
  <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Instruments</title>
   <link rel = "icon" href = "css/profile.jpg"/>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="css/style.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
<body>
  <div class = "body">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
      <div class = "container">
        <a class="navbar-brand" href="#">Instruments</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a class="nav-link" href="home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbar" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Products
              </a>
              <div class="dropdown-menu" aria-labelledby="navbar">
                <a class="dropdown-item" href="scissors.php">Scissors</a>
                <a class="dropdown-item" href="razors.php">Razors</a>
              </div>
            </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
              </li>
              <?php
                if(!isset( $_SESSION['user'] ) ) {
                  ?>
                  <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                  </li>
                  <?php
                } else {
                  require 'db.php';
                  $user_img = "select image from user_login where Id = '$_SESSION[ID]' ";
                  $query = mysqli_query($conn,$user_img);
                  $res = mysqli_num_rows($query);
                  if($res > 0){
                    while($data = mysqli_fetch_assoc($query)){
                      ?>
                      <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <img src="css/<?php echo $data['image']; ?>" class = "profile" alt = "Profile-Image">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="profile.php">Profile</a>
                          <a class="dropdown-item" href="orders.php">Orders</a>
                          <a class="dropdown-item" href="cart.php">My Cart</a>
                          <hr>
                          <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                      </li>
                      <?php
                    }
                  } else {
                    ?>
                      <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <img src="css/profile.jpg" class = "profile" alt = "Profile-Image">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="profile.php">Profile</a>
                          <a class="dropdown-item" href="orders.php">Orders</a>
                          <a class="dropdown-item" href="cart.php">My Cart</a>
                          <hr>
                          <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                      </li>
                    <?php
                  }
                }
              ?>

          </ul>
        </div>
      </div>
    </nav>
  </div>