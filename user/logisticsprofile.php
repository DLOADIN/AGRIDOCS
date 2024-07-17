<?php
  require "../connection.php";
  if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $check = mysqli_query($con,"SELECT * FROM `user` WHERE id=$id ");
  $row = mysqli_fetch_array($check);
  }
  else{
  header('location:loginuser.php');
  } 
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSS/newfriend.css">
  <link rel="stylesheet" href="../CSS/another-one.css">
  <link rel="stylesheet" href="../CSS/form.css">
  <link rel="stylesheet" href="../CSS/gravity.css">
  <link rel="shortcut icon" href="./image/sm_5af437038c88f.jpg" type="image/x-icon">
  <script src="https://kit.fontawesome.com/14ff3ea278.js" crossorigin="anonymous"></script><link rel="shortcut icon" href="../images/🇷🇼.jpeg" type="image/x-icon">
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script src="jsfile.js"></script>
  <title>YOUR PERSONAL DETAILS</title>
</head>
<body>
  <style>
    #main-contents{
      height: 250vh;
    }
    .formation-1{
      display: grid;
      grid-template-columns: 130px 700px 150px 300px;
      row-gap: 30px;
      column-gap: 30px;
      padding-top: 10vh;
      }
      .btn-3{
        background:#69B936;
      }
  </style>
<div class="sidebar" id="sidebar">
      <ul class="menu">
        <div class="logout">
        <li>
          <a href="logistics-document-review.php">
            <i class="fa-solid fa-file"></i>
            <span>DOCUMENT REVIEW</span>
          </a>
        </li>
        
        <li>
          <a href="track-products.php">
          <i class="fa-solid fa-location-dot"></i>
            <span>TRACK PRODUCTS</span>
          </a>
        </li>
        <li>
          <a href="logisticsprofile.php">
          <i class="fa-solid fa-user"></i>
            <span>PROFILE</span>
          </a>
        </li>
    </ul>
  </div>

  <div class="main-content" id="main-contents">
    <div class="header-wrapper">
      <div class="header-title">
      <h2 class="h2">SETTINGS</h2>
      </div>
      <div class="user-info">
      <div class="gango">
        <?php
          $sql=mysqli_query($con, "SELECT u_name from `logistics` WHERE id='$id' ");
          $row=mysqli_fetch_array($sql);
          $attorney=$row['u_name'];
          ?>
        <h3 class="my-account-header">
        <?php echo $attorney ?>
          </h3>
          <p>Logistics</p></div> 
        <button name="submit" type="submit" class="btn-3" >
          <a href="logout.php">LOGOUT</a>
        </button>
      </div>       
       </div>
       <div class="duke">

          <div class="hastings">
            <img src="./image/download.jpeg" alt="">
            <?php $sql=mysqli_query($con,"SELECT * FROM `logistics` WHERE id='$id' ");
            $row = mysqli_num_rows($sql);
            if($row){
              while($row=mysqli_fetch_array($sql))
              { ?>
            <h2><?php echo $row['u_name']?></h2>

            <h3>LOGISTICS SERVICES</h3>
            <hr>
            <h3><i class="fa-solid fa-person"></i>LOGISTICS</h3>
            <hr>
            <h3><i class="fa-solid fa-phone"></i>+128727123</h3>
            <h3><i class="fa-regular fa-envelope"></i><?php echo $row['u_email'];?></h3>
            <h3><i class="fa-regular fa-images"></i><?php echo $row['u_address'];?></h3>
            <?php 
              }
            }
            ?>
          </div>

          <div class="hastings-1">
            <H1>YOUR OVERALL INFORMATION</H1>
            <?php
          if(isset($_GET['id'])){
          $id=$_GET['id'];
        }
          $sql=mysqli_query($con,"SELECT * FROM `logistics` WHERE id='$id' ");
          $row = mysqli_fetch_array($sql);
          ?>
            <form action="" method="post" class="formation">
              <div class="real-form">
                <label for="">YOUR NAMES</label>
                <input type="text" name="u_name" value="<?php echo $row['u_name']?>" required>
                <label for="">E-MAIL</label>
                <input type="email" name="u_email" value="<?php echo $row['u_email']?>" required>
              </div>
              <div class="real-form">
                <label for="">ADDRESS</label>
                <input type="text" name="u_address" required value="<?php echo $row['u_address']?>">
                <label for="">PASSWORD</label>
                <input type="password" name="u_password" required value="<?php echo $row['u_password']?>" read-only>
              </div>
                <div class="real-form">
                <button name="submit" type="submit" class="btn-2" id="btns">SAVE</button></div>
            </form>
          </div>
         </div>
        </div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<style>
.btn-2{
  margin:0 auto;
  background-color:#69B936;
}

.modd{
  margin:0 auto;
}
.hastings-1{
  margin: 0 auto;
  padding:1rem;
  height:65vh;
  border-radius: 20px;
  background-color: #ecebf3;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}
.another-hastings{
  margin: 0 auto;
  margin-top: 5vh;
  padding:1rem;
}
h3 i{
  color:black
}
</style>
</body>
</html>

<?php
  if(isset($_POST['submit'])){
    $name = $_POST['u_name'];
    $email = $_POST['u_email'];
    $address = $_POST['u_address'];
    $password = $_POST['u_password'];
    $sql=mysqli_query($con,"UPDATE `logistics` SET u_name='$name', u_email ='$email', u_address = '$address' , u_password='$password' WHERE id='$id' ");
    
    if($sql){
      echo "<script>alert('Updated Successfully')</script>";
    }
    else{
      echo "<script>alert('failed to update')</script>";
    }
  }
?>

