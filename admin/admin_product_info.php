<?php
    session_start();
?>
<?php
    if(!isset($_SESSION['user'])){
        header("location:login.php");
    }
?>
<?php require '../includes/admin - header.php'; ?>
<form class = "update_prod" method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
  <div class="card-header" style = "background-color:coral;color:white;text-align:center;" >
    <h3 class = "card-title" >Products Info</h3>
  </div>

<table class="table table-striped table-dark">
  <thead>
    <tr>
      <div class="form-group">
        <label for = "products">Product Info:</label>
        <input type="number" name="prod_id" id="products">
        <input type="submit" value="Get Info" class = "btn btn-info" name = "product_info">
      </div>
    </tr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Type</th>
      <th scope="col">Image</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $data = "";
  $id = "";
    if(isset($_POST['product_info'])){
      $id = $_POST['prod_id'];
      if(empty($id)){
        ?>
          <script>
            alert("Enter Product Id first");
          </script>
        <?php
      } else {
        require '../includes/admin.php';
        $admin = new Admin();
        $data = $admin->products_info($id);
        while($res = mysqli_fetch_assoc($data)){
          ?>
            <tr>
              <th scope="row"><?php echo $res['Id']; ?></th>
              <td><?php echo $res['name']; ?></td>
              <td><?php echo $res['description']; ?></td>
              <td><?php echo $res['product_type']; ?></td>
              <td><img src="../css/<?php echo $res['image']; ?>" class = "size"></td>
            </tr>
          <?php
        }
      } 
    }
  
  ?>
  </tbody>
</table>
</form>
<?php require '../includes/admin - footer.php'; ?>