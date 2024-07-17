<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/loginandregistration.css">
  <link rel="shortcut icon" href="../image/sm_5af437038c88f.jpg" type="image/x-icon">
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script src="./jsfile.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
  <title>FORGOT PASSWORD</title>
</head>
<body>
<div class="grided">
    <div class="grid-2">
      <div class="text-1">
        <div class="mr-crabs">
          <img src="./image/th.jpeg.jpg" alt="">
        <h1>TRY AGAIN TO RESET YOUR PASSWORD</h1>
        <p>WARM WELCOME PLEASE ENTER YOUR DETAILS</p>
      </div>
        <form action="" method="post">
          
        <div class="inputbox">
            <ion-icon name="person-outline"></ion-icon>
          <input type="text" name="u_name" required>
          <label for="">FULL NAMES</label></div>

          <div class="inputbox">
          <ion-icon name="lock-closed-outline"></ion-icon>
          <input type="text" name="u_password" required>
          <label for="">PASSWORD</label></div>

          <div class="div">
          <div class="div-1">
          <button name="submit" type="submit" class="btn-2">Reset Password</button>
          <h3 class="heading-3"><a href="loginuser.php">LOG IN</a></h3>
          </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
<?php
require '../connection.php'; 

if(isset($_POST['submit'])) {
    $u_name = mysqli_real_escape_string($con, $_POST['u_name']);
    $u_password = $_POST['u_password']; 
    $sql = "SELECT * FROM `user` WHERE u_name = '$u_name'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $hashed_password = $u_password;
        $update_sql = "UPDATE `user` SET u_password = '$hashed_password' WHERE u_name = '$u_name'";

        if (mysqli_query($con, $update_sql)) {
            echo "<script>alert('Password updated successfully')</script>";
        } else {
            echo "<script>alert('Error updating password: " . mysqli_error($con) . "')</script>";
        }
    } else {
        echo "<script>alert('Username not found')</script>";
    }
}
?>