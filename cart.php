<?php
    session_start();
?>
<?php
    if(!isset($_SESSION['user'])){
        header("location: login.php");
    }
?>
<?php 
    $title = 'My Cart';
    require 'includes/header.php'; 
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class = "cart">
    <div class="card-header" style = "background-color:royalblue;color:white;text-align:center;" >
        <h3 class = "card-title" >Cart</h3>
    </div>
    <table class = "table table-dark table-striped">
        <thead id = "theader">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if(!empty($_SESSION['cart'])){ 
                $total = 0;
                foreach($_SESSION['cart'] as $key => $item ){
                    ?>
                        <tr>
                        <input type="hidden" name="prod_id" value = "<?php echo $item['prod_id'];?>">
                        <input type="hidden" name="user_id" value = "<?php echo $item['user_id'];?>">
                        <input type="hidden" name="quantity" value = "<?php echo $item['quantity'];?>">
                        <input type="hidden" name="date" value = "<?php echo $item['date'];?>">
                            <td><?php echo $item['prod_name'];?></td>
                            <td><?php echo $item['quantity'];?></td>
                            <td><?php echo $item['total'];?></td>
                            <td>
                                <a href = "cart.php?cart=<?php echo $item['prod_id'];?>" type="submit" name = "remove" class = "btn btn-danger"><i class = "fa fa-trash"></i></a>                
                            </td>
                        </tr>
                    <?php
                            $total = $total + $item['total'];
                }
                ?>
                    <tr>
                        <td colspan = "2" align = "right">Total Rs:</td>
                        <td colspan = "2"><?php echo $total;?></td>
                        <input type="hidden" name="grand_total" value = "<?php echo $total;?>">
                    </tr>
                <?php
                
            } else {
                ?>
                    <div class="card text-center">
                        <script>
                            document.getElementById('theader').style.display = "none";
                        </script>
                        <p class="card-text mt-4">No Item(s) Added To Cart!</p>
                    </div>
                <?php
            }
        ?>
        </tbody>
    </table>
    <input type="submit" name = "checkout" class = "btn btn-success mt-3 ml-3" value = "Check Out">
</form>


<?php
    if(isset($_GET['cart'])){
        foreach($_SESSION['cart'] as $key => $item){
            if($item['prod_id'] == $_GET['cart']){
                unset($_SESSION['cart'][$key]);
                ?>
                    <script>
                        alert("Item Has Been Removed!");
                        window.location = "cart.php";
                    </script>
                <?php
            }
        }
    }
?>

<?php
    if(isset($_POST['checkout'])){
        require 'includes/user.php';

        if(!isset($_SESSION['cart'])){
            ?>
                <script>
                    alert("Add Items To Cart First!");
                    window.location = "";
                </script>
            <?php
        } else {
            foreach($_SESSION['cart'] as $key => $item){
                $site_user = new User();
                $site_user->place_order($item['prod_id'], $item['user_id'], $item['quantity'], $item['total'], $item['date']);
            }
        }
    }
?>
<?php require 'includes/footer.php'; ?>