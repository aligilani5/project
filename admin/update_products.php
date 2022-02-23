<?php
    session_start();
?>
<?php
    if(!isset($_SESSION['user'])){
        header("location:login.php");
    }
?>
<?php require '../includes/admin - header.php'; ?>
<form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
<div class="card admin_products">
    <div class="card-header" style = "background-color:coral;color:white;text-align:center;" >
      <h3 class = "card-title" >Update Product</h3>
    </div>
  <div class="card-body">
  <?php
  if(isset($_GET['pn'])){
    $prod_id = $_GET['pn'];
    require '../includes/admin.php';
    $admin = new Admin();
    $data = $admin->to_update($prod_id);

    while($res = mysqli_fetch_assoc($data)){
        ?>
            <div class="form-group">
                <label for="product_id">Product Id</label>
                <input type="text" value = "<?php echo $res['Id'];?>" name = "prod_id" class="form-control" id="product_id" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" value = "<?php echo $res['name'];?>" name = "prod_name" class="form-control" id="product_name" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="desc">Description</label>
                <input type="text" name = "prod_desc" value = "<?php echo $res['description'];?>" class="form-control" id="desc">
            </div>
            <div class="form-group">
                <label for="type">Product Type</label>
                <input type="text" name = "prod_type" value = "<?php echo $res['product_type'];?>" class="form-control" id="type">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name = "price" value = "<?php echo $res['price'];?>" class="form-control" id="price">
            </div>
                <button type="submit" name = "update" class="btn btn-success">Update</button>
        <?php
    }
}
?>
 
  </div>
</div>
  
</form>

<?php require '../includes/admin - footer.php'; ?>
<?php
    if(isset($_POST['update'])){
        $id = $_POST['prod_id'];
        $name = filter_var($_POST['prod_name'], FILTER_SANITIZE_STRING);
        $des = filter_var($_POST['prod_desc'], FILTER_SANITIZE_STRING);
        $type = filter_var($_POST['prod_type'], FILTER_SANITIZE_STRING);
        $price = $_POST['price'];

        if(empty($name) || empty($des)|| empty($type) || empty($price) ){
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
            require 'includes/admin.php';
            $admin = new Admin();
            $admin->update($id, $name, $des, $type, $price);
          }
    }
?>
