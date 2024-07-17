<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/loginandregistration.css">
    <link rel="shortcut icon" href="./image/sm_5af437038c88f.jpg" type="image/x-icon">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="../JS/js.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  </body>
  <title>REGISTRATION PAGE</title>
  <style>
    form h2{
      text-align:center;
      color:black;
      padding:1rem;
    }
  </style>
</head>
<body>
  <div class="grided">  
  <div class="grid-2">
    <div class="text-2">
      <div class="mr-crabs">
      <h1>Let's Get You Set Up</h1>
    </div>
        <form action="" method="post">
          <h2>Add Your company and Workspace Information</h2>
        <div class="inputbox">
            <ion-icon name="person-outline"></ion-icon>
          <input type="text" name="u_name" required>
          <label for="">BUSINESS NAME</label></div>

          <div class="inputbox">
          <ion-icon name="location-outline"></ion-icon>
          <input type="text" name="u_country" required>
          <label for="">COUNTRY</label></div>

          <div class="inputbox">
          <ion-icon name="phone-portrait-outline"></ion-icon>
          <input type="number" name="u_phonenumber" required>
          <label for="">PHONENUMBER</label></div>
          
          <div class="inputbox">
          <ion-icon name="people-outline"></ion-icon>
          <input type="number" name="u_people" required>
          <label for="">NUMBER OF PEOPLE</label></div>

          <div class="inputbox">
          <ion-icon name="boat-outline"></ion-icon>
          <input type="number" name="u_shipment" required>
          <label for="">SHIPMENT FREQUENCY</label></div>

          <div class="inputbox">
          <ion-icon name="lock-closed-outline"></ion-icon>
          <input type="text" name="u_password" required>
          <label for="">PASSWORD</label></div>

          <div class="div">
          <button name="submit" type="submit" class="btn-2">SIGN UP</button>
          <h3 class="heading-3"> Do you have an account? <a href="loginadmin.php">Sign In</a></h3>
        </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
<?php
  require 'connection.php';
  if(isset($_POST['submit'])){
    $name = $_POST['u_name'];
    $country = $_POST['u_country'];
    $phonenumber = $_POST['u_phonenumber'];
    $people = $_POST['u_people'];
    $shipment = $_POST['u_shipment'];
    $password = $_POST['u_password'];
    $sql=mysqli_query($con,"INSERT INTO `business` VALUES('','$name','$country','$phonenumber','$people','$shipment','$password')");
    
    if($sql){
      echo "<script>alert('Registered Successfully| Please Head to the Login ')</script>";
    }
    else{
      echo "<script>alert('failed to register')</script>";
    }
  }
?>
