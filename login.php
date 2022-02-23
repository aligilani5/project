<?php
  session_start();
?>
<?php
  if(isset($_SESSION['user'] ) ){
    header("location:home.php");
  }
?>
<?php
 $email = "";
  if(isset($_POST['submit'])){
    require 'includes/db.php';
    
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $pass = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    if(empty($email) && empty($pass)){
      ?>
        <script>
          alert("All Fields Required");
        </script>
      <?php
    } elseif(empty($email)){
      ?>
        <script>
          alert("Email Field is Required");
        </script>
      <?php
    } 
    elseif(empty($pass)){
      ?>
        <script>
          alert("Password Field is Required");
        </script>
      <?php
    } else{
      $query = "select Id, email,password,role from user_login where email = '$email'";
      $run = mysqli_query($conn,$query);
      $res = mysqli_num_rows($run);
      if($res){
        $data = mysqli_fetch_assoc($run);
        $get_email = $data['email'];
        $get_pass = $data['password'];
        $role = $data['role'];
        if($get_pass != $pass){
          ?>
            <script>
              alert("Incorrect Password!");
            </script>
          <?php  
        }
        if($get_pass == $pass && $role == "2"){
          session_start();
          $_SESSION['user'] = $data['email'];
          $_SESSION['ID'] = $data['Id'];
          header("location:home.php");
        }
      } else{
        ?>
          <script>
            alert("Account doesn't exist! Sign-UP before logging In!");
          </script>
        <?php
      }
    }
  }
?>
<?php require 'includes/login - header.php'?>

<div class="container-fluid">
  <form class = "form" method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div>
      <img src="css/set.jpg" class = "logo">
    </div>  
      <div class="form-group">
        <label for="exampleInputEmail1"  class = "email">Email address</label>
        <input type="email"  class="form-control" value = "<?php echo $email?>" name = "email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1" class = "pass">Password</label>
        <input type="password" value="<?php if( isset( $_POST["password"])){ echo $pass;}?>" name = "password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <button type="submit" name = "submit" class="btn btn-primary">Login</button>
      <p class = "fg_pass"><a href="#">Forgot Password?</a></p>
  </form>
</div>
