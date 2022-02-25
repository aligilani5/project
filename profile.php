<?php
    session_start();
?>
<?php
    if(!isset($_SESSION['user'])){
        header("location: login.php");
    }
?>
<?php 
    $title = 'User Profile';
    require 'includes/header.php';
?>

<div class="container">
    <div class="card-header pro" style = "background-color:royalblue;color:white;text-align:center;">
        <h3 class="card-title">Profile</h3>
    </div>
    <div class="card-text">
    <?php
        require 'includes/user.php';
        if(isset($_SESSION['ID'])){
            $site_user = new User();
            $res = $site_user->user_info($_SESSION['ID']);
            if($res){
                while($data = mysqli_fetch_assoc($res)){
                    ?>
                        <div class="row">
                            <div class="col-md-5">
                                <img src="css/<?php echo $data['image'];?>" class="profile mt-2 ml-3"> 
                                <h4 class = "text-muted ml-5"><?php echo $data['name'];?></h4>
                            </div>
                        </div>
                        <hr>
                        <div style = "height:500px;border-left:6px solid green;">
                            <div class="row text-center">
                                <div class="col-md-5 mt-3">
                                    <label class = "text-muted ">Address</label>
                                    <h4 class="text-muted"><?php echo $data['address'];?></h4>
                                </div>
                                <div class="col-md-5 mt-3">
                                    <label class = "text-muted">Email</label>
                                    <h4 class="text-muted"><?php echo $data['email'];?></h4>
                                </div>
                            </div>
                            <div class="row text-center" style = "margin-top:150px;">
                                <div class="col-md-5 mt-3">
                                    <label class = "text-muted">Gender</label>
                                    <h4 class="text-muted"><?php echo $data['gender'];?></h4>
                                </div>
                                <div class="col-md-5 mt-3">
                                <?php 
                                 require 'includes/db.php';
                                 $select = "select count(user_id) as no_of_order from orders
                                 where user_id = $_SESSION[ID]";
                                 $query = mysqli_query($conn, $select);
                                 if($query){
                                     $data = mysqli_fetch_assoc($query);
                                    ?>
                                        <label class = "text-muted">Orders</label>
                                        <h4 class="text-muted"><?php echo $data['no_of_order'];?></h4>
                                    <?php
                                 }
                                 mysqli_close($conn);
                                ?>
                                </div>
                            </div>
                        </div>   
                        <hr>
                    <?php
                }
            }
        }
    ?>
    </div>
</div>



<?php require 'includes/footer.php'; ?>