<!DOCTYPE html>
<html lang="en">
  <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Instruments</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="../css/admin.css" />
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
              <?php
                if(!isset( $_SESSION['user'] ) ) {
                  ?>
                  <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                  </li>
                  <?php
                } else {
                  ?>
                    <li class="nav-item dropdown">
                      <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="../css/profile.jpg" class = "admin_profile">
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="admin_profile.php">Profile</a>
                        <a class="dropdown-item" href="admin_product_info.php">Products</a>
                        <a class="dropdown-item" href="admin_products.php">Add Product</a>
                        <a class="dropdown-item" href="get_admin_products.php">Update Products</a>
                        <a class="dropdown-item" href="get_orders.php">Orders</a>
                        <a class="dropdown-item" href="users_info.php">Users</a>
                        <hr>
                        <a class="dropdown-item" href="../logout.php">Logout</a>
                      </div>
                    </li>
                  <?php
                }
              ?>

          </ul>
        </div>
      </div>
    </nav>
  </div>