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
    <h3 class = "card-title" >Products</h3>
  </div>

<table class="table table-striped table-dark">
  <thead>
    <tr>
      <div class="form-group">
        <label for = "products">Select Product Type:</label>
        <select name="prod" id="products">
          <option value="" selected>--Select--</option>
          <option value="Scissor">Scissor</option>
          <option value="Razor">Razor</option>
        </select>
        <input type="submit" value="Get Products" class = "btn btn-info" name = "product_type">
      </div>
    </tr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $data = "";
  $type = "";
    if(isset($_POST['product_type'])){
      $type = $_POST['prod'];
      if(empty($type)){
        ?>
          <script>
            alert("Select Product Type first");
          </script>
        <?php
      } else {
        require '../includes/admin.php';
        $admin = new Admin();
        $data = $admin->get_admin_products($type);
        while($res = mysqli_fetch_assoc($data)){
          ?>
            <tr>
              <th scope="row"><?php echo $res['Id']; ?></th>
              <td><?php echo $res['name']; ?></td>
              <td><?php echo $res['description']; ?></td>
              <td>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
                <a href = "update_products.php?pn=<?php echo $res['Id'];?>" type="submit" name = "update" class = "btn btn-info">Edit</a>
                <a type="submit" name = "delete" href = "delete_products.php?delete=<?php echo $res['Id'];?>" class = "btn btn-danger">Delete</a>
              </form>
              </td>
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