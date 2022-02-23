<?php
    session_start();
?>
<?php
    if(!isset($_SESSION['user'])){
        header("location:login.php");
    }
?>
<?php
$name = "";
$des = "";
$type = "";
$price = "";

require '../includes/admin.php';
  if(isset($_POST['insert'])){

    $admin = new Admin();
    $image = $_FILES['image']['name'];
    $name = filter_var($_POST['prod_name'], FILTER_SANITIZE_STRING);
    $des = filter_var($_POST['prod_desc'], FILTER_SANITIZE_STRING);
    $type = filter_var($_POST['prod_type'], FILTER_SANITIZE_STRING);
    $price = $_POST['price'];

    if(empty($image) || empty($name) || empty($des)|| empty($type) || empty($price) ){
      ?>
        <script>
          alert("All Fields Required");
        </script>
      <?php
    } elseif($price < 0) {
      ?>
        <script>
          alert("Enter Positive Integer Value");
        </script>
      <?php
    } else {
      $tmp_img = $_FILES['image']['tmp_name'];
      $folder = "../css/" .$image;
      move_uploaded_file($tmp_img,$folder);
      $admin->insert($image, $name, $des, $type, $price);
    }
  }
?>
<?php require '../includes/admin - header.php'; ?>

<form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
<div class="card admin_products">
    <div class="card-header" style = "background-color:coral;color:white;text-align:center;" >
      <h3 class = "card-title" >Add Product</h3>
    </div>
  <div class="card-body">
  <div class="form-group">
    <input type="file" class="form-control" name = "image">
  </div>
  <div class="form-group">
    <label for="product_name">Product Name</label>
    <input type="text" value = "<?php echo $name;?>" name = "prod_name" class="form-control" id="product_name" aria-describedby="emailHelp" placeholder="Enter Product Name">
  </div>
  <div class="form-group">
    <label for="desc">Description</label>
    <input type="text" name = "prod_desc" value = "<?php echo $des;?>" class="form-control" id="desc" placeholder="Enter Description">
  </div>
  <div class="form-group">
    <label for="type">Product Type</label>
    <input type="text" name = "prod_type" value = "<?php echo $type;?>" class="form-control" id="type" placeholder="Enter Product Type">
  </div>
  <div class="form-group">
    <label for="price">Price</label>
    <input type="number" name = "price" value = "<?php echo $price;?>" class="form-control" id="price" placeholder="Enter Price">
  </div>
    <button type="submit" name = "insert" class="btn btn-success">Add Product</button>
  </div>
</div>
  
</form>

<?php require '../includes/admin - footer.php'; ?>