<?php
  session_start();
?>
<?php 
  $title = 'Home';
  require 'includes/header.php';
?>
<div class="home-bg-img" data-aos = "fade-in">
  <div class = "home-img-text">
    <p class = "home-img-text-style" data-aos = "fade-in">Manufacturing products with finest quality...</p>
    <a href="scissors.php">
      <button type = "button" class = "btn btn-info">Our Products...</button>
    </a>
  </div>
<!-- <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="css/multi.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="css/colored.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="css/raz.jpg" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="css/multi 2.jpg" alt="Third slide">
    </div>
  </div>
</div> -->
</div>

<div class="jumbotron mt-5 jumbo" data-aos = "zoom-in-down">
  <div class="welcome">
    <img src="css/My project.png" class = "service-img">
    <h3>Our Services</h3>
    <p>We are manufacturing Scissors & Razors</p>
  </div>
</div>   
<div class="container mt-5 text-center"><h3>Scissors</h3>
<hr>
</div>
<br>


<div class="container">
  <div class="row">
  <?php
    require 'includes/db.php';
    $sci = "select * from products where product_type = 'Scissor'  order by image desc limit 4";
    $query = mysqli_query($conn,$sci);
    $check = mysqli_num_rows($query);
    if($check > 0){
      while($data = mysqli_fetch_assoc($query)){
        ?>
          <div  data-aos = "fade-in" style="font-family: Georgia, 'Times New Roman', Times, serif; ;font-size: large;" class="col-sm-3 text-center" >
            <div class="inner mt-5">
              <a href="product-info.php?prod=<?php echo $data['Id'];?>">
              <img class= "img-fluid hn" src="css/<?php echo $data['image']; ?>">
            </div>
            <button class="bt btn btn-primary">View Details</button>
              </a>
          </div>
        <?php
      }
    }
  ?>   
  </div>
</div>
<br>
<br>

<div class="container mt-5 text-center"><h3>Razors</h3>
<hr>
</div>
<br>


<div class="container">
  <div class="row">
  <?php
    require 'includes/db.php';
    $sci = "select * from products where product_type = 'Razor'  order by image desc limit 4";
    $query = mysqli_query($conn,$sci);
    $check = mysqli_num_rows($query);
    if($check > 0){
      while($data = mysqli_fetch_assoc($query)){
        ?>
          <div  data-aos = "fade-in" style="font-family: Georgia, 'Times New Roman', Times, serif; ;font-size: large;" class="col-sm-3 text-center" >
            <div class="inner mt-5">
              <a href="product-info.php?prod=<?php echo $data['Id'];?>">
              <img class= "img-fluid hn" src="css/<?php echo $data['image']; ?>">
            </div>
            <button class="bt btn btn-primary">View Details</button>
              </a>
          </div>
        <?php
      }
    }
  ?>   
  </div>
</div>

<br>
<br>

<br>
<br>
<div class="container">
<hr>
</div>
<br>
<br>
<div class="jumbotron jumbo"  data-aos = "zoom-in-down">
  <div class="choose">
    <h3>Why choose us?</h3>
    <ul>
      <li><p>We provide competitive market pricing</p></li>
      <li><p>To make sure that products will be delivered on time</p></li>
      <li><p>We manufacture our products with finest quality</p></li>
      <li><p>We also manufacture products of clients need</p></li>
    </ul>
  </div>
</div>
<br>
<br>
<div class="container">
<hr>
</div>
<br>
<?php require 'includes/footer.php';?>