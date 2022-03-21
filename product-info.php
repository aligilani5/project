<?php
    session_start();
?>
<?php
    if(!isset($_SESSION['user'])){
        header("location:login.php");
    }
?>
<?php 
    $title = 'Product Info';
    require 'includes/header.php';
?>
<div class="jumbotron aim" style = "margin: 101px 0px 0px 0px;">
    <h3 style = "color:white; text-align:center;">Product Info</h3>
</div>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class = "info">
<?php
    if(isset($_GET['prod'])){
        require 'includes/db.php';
        $id = $_GET['prod'];
        $select = "select * from products where Id = '$id'";
        $query = mysqli_query($conn,$select);
        $check = mysqli_num_rows($query);
        if($check > 0){
            while($data = mysqli_fetch_assoc($query)){
                ?>
                    <div class="card cd">
                        <input type="hidden" name="prod_id" value = "<?php echo $data['Id'];?>">
                        <img src="css/<?php echo $data['image'];?>" alt="Image" class="card-img-top">
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $data['name'];?></h3>
                            <input type="hidden" name="prod_name" value = "<?php echo $data['name'];?>">
                            <p class="card-text"><?php echo $data['description'];?></p>
                            <p class="card-text"><?php echo "Price: Rs " .$data['price'];?></p>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row in">
                            <div class="col ">
                                <label for="price" style = "font-style:italic;">Price:</label>
                                <input type="text" name="prod_price" id = "price" value = "<?php echo $data['price'];?>" disabled>
                            </div>
                            <div class="col">
                                <label for="quantity" style = "font-style:italic;">Quantity:</label>
                                <input type="number" onchange = "calculate_by_quantity(this.value)" name="prod_quan" id = "quantity" value = "1" min = "1">
                            </div>
                        </div>
                        <div class="row price">
                            <div class="col">
                                <label for="total_price" style = "font-style:italic;">Total:</label>
                                <input type="number" name="prod_tot" id = "total_price" value = "<?php echo $data['price'];?>" readonly>
                                <script>
                                    function calculate_by_quantity(get_value){
                                        var price = document.getElementById('price').value;
                                        var quantity = document.getElementById('quantity').value;
                                        var total = price * quantity;
                                        document.getElementById('total_price').value = total;
                                    }
                                </script>
                            </div>
                        </div>
                        <input type = "submit" name = "add_cart" class = "btn btn-success bts" value = "Add To Cart">
                    </div>
                <?php
            }
        }
    }    
?>
</form>

<?php
    if(isset($_POST['add_cart'])){
        if(isset($_SESSION['cart'])){
            $check = array_column($_SESSION['cart'],"prod_id");
            if(!in_array($_POST['prod_id'],$check)){
                $add = count($_SESSION['cart']);
                $items = array(
                    'prod_id' => $_POST['prod_id'],
                    'prod_name' => $_POST['prod_name'],
                    'user_id' => $_SESSION['ID'],
                    'quantity' => $_POST['prod_quan'],
                    'total' => $_POST['prod_tot'],
                    'date'  => date('Y-m-d'),
                );
                $_SESSION['cart'][$add] = $items;
                ?>
                    <script>
                        alert("Item Has Been Added To Cart!");
                        window.location = "cart.php";
                    </script>
                <?php
            } else {
                ?>
                    <script>
                        alert("Item Already Added To Cart!");
                        window.location = "cart.php";
                    </script>
                <?php
            }
        } else {
            $items = array(
                'prod_id' => $_POST['prod_id'],
                'prod_name' => $_POST['prod_name'],
                'user_id' => $_SESSION['ID'],
                'quantity' => $_POST['prod_quan'],
                'total' => $_POST['prod_tot'],
                'date'  => date('Y-m-d'),
            );
            $_SESSION['cart'][0] = $items;
                ?>
                    <script>
                        alert("Item Has Been Added To Cart!");
                        window.location = "cart.php";
                    </script>
                <?php
        }
    }
?>

<?php require 'includes/footer.php'; ?>

