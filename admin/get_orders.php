<?php
    session_start();
?>
<?php
    if(!isset($_SESSION['user'])){
        header("location:login.php");
    }
?>
<?php require '../includes/admin - header.php'; ?>
<div class="card update_prod">
  <div class="card-header" style = "background-color:coral;color:white;text-align:center;" >
    <h3 class = "card-title" >Orders</h3>
  </div>
  
<table class="table table-striped table-dark">
  <thead id = "head">
    <tr>
      <th scope="col">User</th>
      <th scope="col">Product</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope = "col">Date</th>
    </tr>
  </thead>
  <tbody>
  <div class="card-text">
    <?php
        require '../includes/db.php';
        $select = "select orders.user_id, orders.product_id, 
        orders.quantity, orders.price, orders.date from orders 
        inner join user_login on orders.user_id = user_login.Id 
        inner join products on orders.product_id = products.Id order by date desc";
        $query = mysqli_query($conn,$select);
        $res = mysqli_num_rows($query);
        if($res > 0){
          while($data = mysqli_fetch_assoc($query)){
            ?>
              <tr>
                <td><?php echo $data['user_id']; ?></td>
                <td><?php echo $data['product_id']; ?></td>
                <td><?php echo $data['quantity']; ?></td>
                <td><?php echo $data['price']; ?></td>
                <td><?php echo $data['date']; ?></td>
              </tr>
            <?php
          }
        } else {
          ?>
            <script>
              document.getElementById('head').style.display = "none";
            </script>
            <p class="text-center">No Orders Placed Yet!</p>
          <?php
        }
    ?>
  </div>
  </tbody>
</table>
</div>



<?php require '../includes/admin - footer.php'; ?>