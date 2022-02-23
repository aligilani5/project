<?php
    session_start();
?>
<?php
    if(!isset($_SESSION['user'])){
        header("location:login.php");
    }
?>
<?php
    if(isset($_GET['delete'])){
      $id = $_GET['delete'];
      require '../includes/admin.php';
  
      $admin = new Admin();
      $admin->delete($id);
    }
?>