<?php
class Admin {
 private $img;
 private $name;
 private $desc;
 private $type;
 private $price;
 private $id;
 
 function insert($image, $name, $des, $type, $price){
    $this->img = $image;
    $this->name = $name;
    $this->desc = $des;
    $this->type = $type;
    $this->price = $price;
    require '../includes/db.php';

    $insert = "insert into products(name,description,image,price,product_type) values(
        '$this->name','$this->desc','$this->img','$this->price','$this->type')";
    $query = mysqli_query($conn,$insert);
    if($query){
        ?>
            <script>
                alert("Data Inserted Successfully ");
            </script>
        <?php
    }
    mysqli_close($conn);
 }

 function get_admin_products($type){
    $this->type = $type;
    require '../includes/db.php';

    $get_prod = "select Id, name, description from products where product_type = '$this->type'";
    $query = mysqli_query($conn,$get_prod);
    $check = mysqli_num_rows($query);
    
    if($check > 0){
        return $query;
    } else {
        ?>
            <script>
                alert("Product Doesn't Exists");
            </script>
        <?php
    }
    mysqli_close($conn);
 }

 function products_info($id){
    $this->id = $id;
    require '../includes/db.php';

    $get_prod = "select Id, name, description, image, product_type from products where Id = '$this->id'";
    $query = mysqli_query($conn,$get_prod);
    $check = mysqli_num_rows($query);
    
    if($check > 0){
        return $query;
    } else {
        ?>
            <script>
                alert("Product Doesn't Exists");
            </script>
        <?php
    }
    mysqli_close($conn);
 }

 function user_info($id){
    $this->id = $id;
    require '../includes/db.php';

    $get_prod = "select Id, name, email, image, address from user_login where Id = '$this->id'";
    $query = mysqli_query($conn,$get_prod);
    $check = mysqli_num_rows($query);
    
    if($check > 0){
        return $query;
    } else {
        ?>
            <script>
                alert("User Doesn't Exists");
            </script>
        <?php
    }
    mysqli_close($conn);
 }

 function to_update($prod_id){
    $this->id = $prod_id;
    require '../includes/db.php';

    $prod = "select * from products where Id = '$this->id'";
    $query = mysqli_query($conn,$prod);
    $check = mysqli_num_rows($query);

    if($check > 0){
        return $query;
    } else {
        ?>
            <script>
                alert("Product Doesn't Exists");
            </script>
        <?php
    }
    mysqli_close($conn);
 }

 function update($id, $name, $des, $type, $price){
    $this->id = $id;
    $this->name = $name;
    $this->desc = $des;
    $this->type = $type;
    $this->price = $price;
    require '../includes/db.php';

    $update = "update products set Id = '$this->id', name = '$this->name', description = '$this->desc',
                price = '$this->price', product_type = '$this->type' where Id = '$this->id'";
    $query = mysqli_query($conn,$update);
    if($query){
        ?>
            <script>
                alert("Data Updated Successfully ");
            </script>
        <?php
    }
    mysqli_close($conn);
 }

 function delete($id){
    $this->id = $id;
    require '../includes/db.php';

    $del = "delete from products where Id = '$this->id'";
    $query = mysqli_query($conn,$del);
    if($query){
        ?>
            <script>
                alert("Data Deleted Successfully ");
            </script>
        <?php
    }
    mysqli_close($conn);
 }
}
?>