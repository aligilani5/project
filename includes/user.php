<?php
    class User{
        private $prod_id;
        private $user_id;
        private $quantity;
        private $total;
        private $date;

        function place_order($prod_id, $user_id, $quantity, $total, $date){
            $this->prod_id = $prod_id;
            $this->user_id = $user_id;
            $this->quantity = $quantity;
            $this->total = $total;
            $this->date = $date;
            require 'includes/db.php';
            $insert = "insert into orders(user_id, product_id, quantity, price, date) values(
                '$this->user_id', '$this->prod_id', '$this->quantity', '$this->total', '$this->date')";
            $query = mysqli_query($conn,$insert);
            if($query){
                ?>
                    <script>
                        alert("Your Order Has Been Placed!");
                        <?php unset($_SESSION['cart']);?>
                        window.location = "home.php";
                    </script>
                <?php
                
            }
            mysqli_close($conn);
        }

        function get_orders($user_id){
            $this->user_id = $user_id;

            require 'includes/db.php';
            $select = "select  products.image, products.product_type,
             orders.quantity, orders.price from orders inner join user_login on orders.user_id = user_login.Id
             inner join products on orders.product_id = products.Id
             where orders.user_id = $_SESSION[ID]";
            $query = mysqli_query($conn,$select);
            $res = mysqli_num_rows($query);

            if($res > 0){
                return $query;
            }
            mysqli_close($conn);
        }

        function user_info($user_id){
            $this->user_id = $user_id;

            require 'includes/db.php';
            $select = "select * from user_login
            where Id = $_SESSION[ID]";
            $query = mysqli_query($conn,$select);
            if($query){
                return $query;
            }
            mysqli_close($conn);
        }
    }
?>