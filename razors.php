<?php
    session_start();
?>
<?php
    if(!isset($_SESSION['user'])){
        header("location:login.php");
    }
?>
<?php 
    $title = 'Products';
    require 'includes/header.php'; 
?>
<div class="jumbotron pro_jumbo" data-aos = "zoom-in-down" style = "margin: 101px 0px 0px 0px;">
    <h3 style = "color:white; text-align:center;">Products / Razor</h3>
</div>
<div class="container mt-5">
    <div class="row">
    <?php
        require 'includes/db.php';
        $sci = "select * from products where product_type = 'Razor' order by image desc";
        $query = mysqli_query($conn,$sci);
        $check = mysqli_num_rows($query);
        if($check > 0){
            while($data = mysqli_fetch_assoc($query)){
                ?>
                <div data-aos = "fade-in" style="font-family: Georgia, 'Times New Roman', Times, serif; ;font-size: large;" class="col-sm-3 text-center" >
                    <div class="inner mt-5">
                    <a href="product-info.php?prod=<?php echo $data['Id'];?>">
                    <img class= "img-fluid hn" src="css/<?php echo $data['image']; ?>">
                    </div>
                    <button class="bt btn btn-primary">View Details</button>
                    </a>
                </div>
                <?php
            }
        }
    ?>
    </div>
</div>
<?php require 'includes/footer.php'; ?>