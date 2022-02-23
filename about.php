<?php
  session_start();
?>
<?php
  if(!isset( $_SESSION['user'] ) ){
    header("location:login.php");
  }
?>
<?php include 'includes/header.php'; ?>
<div class="container-fluid about-img">
</div>  
<br>
<br>
<div class="container">
<hr>
</div>
<br>

<div class="container">
  <div class="content">
    <label class = "head">About Us:</label>
    <p style = "margin-left:12%; margin-right:12%; font-size:16px; font-weight:500;  font-family: Georgia, 'Times New Roman', Times, serif;"><strong>Instruments</strong> manufactures scissors & razors with <strong>finest qaulity</strong>. Our aim is to interact with clients to expand our business online. Clients will be given <strong>on-time delivery</strong> with high-quality products at <strong>competitive price</strong>. 
      Our products are made with finest material for <strong>clients satisfactory</strong>. We are looking forward to get in touch with <strong> our respected clients</strong>. </p>
  </div>
</div>
<br>
<br>
<div class="container">
  <hr>
</div>
<br><br>

<div class="container text-center"></div>
<div class="jumbotron">
  <h3 style = "font-style:italic;text-align:center;color:white;">Our Aim</h3>
  <p style = "font-size:16px;font-style:italic;text-align:center;color:white;">Our aim is to interact with our customers to manufacture high-quality products <br> for them at reasonable price</p>
</div>
<br>
<br>
<div class="container">
<hr>
</div>
<?php include 'includes/footer.php'; ?>