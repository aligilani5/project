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
    <h3 class = "card-title" >Users Info</h3>
  </div>
  
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <div class="form-group">
        <label for = "user">Select User:</label>
        <input type="number" name="user_info" id="user" placeholder = "Enter User Id" min = "1">
        
        <input type="submit" value="Get User Info" class = "btn btn-info" name = "user">
      </div>
    </tr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $data = "";
      $id = "";
        if(isset($_POST['user'])){
          $id = $_POST['user_info'];
          if(empty($id)){
            ?>
              <script>
                alert("Enter User Id first");
              </script>
            <?php
          } else {
            require '../includes/admin.php';
            $admin = new Admin();
            $data = $admin->user_info($id);
            while($res = mysqli_fetch_assoc($data)){
              ?>
                <tr>
                  <th scope="row"><?php echo $res['Id']; ?></th>
                  <td><?php echo $res['name']; ?></td>
                  <td><img src="../css/<?php echo $res['image']; ?>" class = "size"></td>
                  <td><?php echo $res['email']; ?></td>
                  <td><?php echo $res['address']; ?></td>
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