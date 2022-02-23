<?php
    session_start();
?>
<?php
    if(!isset($_SESSION['user'])){
        header("location: login.php");
    }
?>
<?php require 'includes/header.php';?>
                <div class="cart">
                    <div class="card-header" style = "background-color:royalblue;color:white;text-align:center;">
                        <h3 class="card-title">Orders</h3>
                    </div>
                    <table class = "table table-dark table-striped">
                        <thead id = "hide">
                            <tr>
                                <th scope = "col">Image</th>
                                <th scope = "col">Category</th>
                                <th scope = "col">Quantity</th>
                                <th scope = "col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php
                        require 'includes/user.php';
                        if(isset($_SESSION['user'])){
                            $site_user = new User();
                            $result = $site_user->get_orders($_SESSION['ID']);
                            if($result){
                    
                                while($data = mysqli_fetch_assoc($result)){
                                    ?>
                                        <tr>
                                            <td><img src="css/<?php echo $data['image'];?>" class="prod_img"></td>
                                            <td><?php echo $data['product_type'];?></td>
                                            <td><?php echo $data['quantity'];?></td>
                                            <td><?php echo $data['price'];?></td>
                                        </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                    <div class="card text-center">
                                        <script>
                                            document.getElementById('hide').style.display = "none";
                                        </script>
                                        <p class="card-text" style = "margin-top:87px">No Orders Placed Yet!</p>
                                    </div>
                                <?php
                            }
                        } 
                    ?>
                        </tbody>
                    </table>
                </div>
<?php require 'includes/footer.php';?>