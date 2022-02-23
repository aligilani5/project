<?php 
    session_start();
?>
<?php
    if(!isset($_SESSION['user'])){
        header("location:login.php");
    }
?>
<?php require '../includes/admin - header.php'; ?>
<?php
    if(isset($_SESSION['user'])){
        ?>
            <div class="card admin-card">
                <div class="card-header" style = "background-color:coral;color:white;">
                <h4 class="card-title">Admin Profile</h4>
                </div>
                <div class="card-body admin">
                    <h5 class="card-title">Welcome!</h5>
                    <p class="card-text"><?php echo $_SESSION['user']?></p>
                </div>
            </div>
        <?php
    } else {
        header("location:login.php");
    }
?>

<?php require '../includes/admin - footer.php'; ?>