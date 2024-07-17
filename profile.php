<?php
  require "connection.php";
  if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $check = mysqli_query($con,"SELECT * FROM `business` WHERE id=$id ");
  $row = mysqli_fetch_array($check);
  }
  else{
  header('location:loginadmin.php');
  } 
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSS/newfriend.css">
  <link rel="stylesheet" href="./CSS/another-one.css">
  <link rel="stylesheet" href="./CSS/form.css">
  <link rel="stylesheet" href="./CSS/gravity.css">
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
          <a href="home.php">
            <i class="fa-solid fa-house-chimney"></i>
            <span>HOME</span>
          </a>
        </li>
        <li>
          <a href="dashboard.php">
          <i class="fas fa-th"></i>
            <span>DASHBOARD</span>
          </a>
        </li>
        <li class="dropdown-li">
            <a href="">
            <i class="fa-solid fa-file-invoice"></i>
              <span>INVOICES</span>
              <i class="fa-solid fa-caret-right"></i>
            </a>
            <ul class="dropdown">
              <li>
                <a href="proforma.php">
                <i class="fa-solid fa-caret-right"></i>
                  <span>PROFORMA INVOICE</span>
                </a>
              </li>
              <li>
                <a href="commercial-invoice.php">
                <i class="fa-solid fa-caret-right"></i>
                  <span>COMMERCIAL INVOICE</span>
                </a>
              </li>
              <li>
                <a href="packaging-list.php">
                <i class="fa-solid fa-caret-right"></i>
                  <span>PACKAGING LIST</span>
                </a>
              </li>
              <li>
                <a href="certificate-list.php">
                <i class="fa-solid fa-caret-right"></i>
                  <span>CERTIFICATE OF ORIGIN</span>
                </a>
              </li>
            </ul>
        </li>
        <li>
          <a href="training.php">
          <i class="fa-solid fa-tv"></i>
            <span>TRAININGS</span>
          </a>
        </li>
        <li>
        <li>
          <a href="notifications.php">
          <i class="fa-solid fa-bell"></i>
            <span>NOTIFICATIONS</span>
          </a>
        </li>
        <li  class="dropdown-li">
          <a href="">
          <i class="fa-solid fa-comment"></i>
            <span>EMAIL US</span>
            <i class="fa-solid fa-caret-right"></i>
          </a>
          <ul class="dropdown">
              <li>
                <a href="admin-email.php">
                <i class="fa-solid fa-caret-right"></i>
                  <span>ADMIN MAILING PAGE</span>
                </a>
              </li>
              <li>
                <a href="logistics-email.php">
                <i class="fa-solid fa-caret-right"></i>
                  <span>LOGISTICS MAILING PAGE</span>
                </a>
              </li>
            </ul>
        </li>
        <li>
          <a href="document-review.php">
          <i class="fa-solid fa-file-export"></i>
            <span>DOCUMENT REVIEW</span>
          </a>
        </li>
        <li>
          <a href="profile.php">
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
          $sql=mysqli_query($con, "SELECT u_name from `business` WHERE id='$id' ");
          $row=mysqli_fetch_array($sql);
          $attorney=$row['u_name'];
          ?>
        <h3 class="my-account-header">
        <?php echo $attorney ?>
          </h3>
        <p>User</p></div> 
        <button name="submit" type="submit" class="btn-3" >
          <a href="logout.php">LOGOUT</a>
        </button>
      </div>       
       </div>
       <div class="duke">

          <div class="hastings">
            <img src="./image/download.jpeg" alt="">
            <?php $sql=mysqli_query($con,"SELECT * FROM `business`");
            $row = mysqli_num_rows($sql);
            if($row){
              while($row=mysqli_fetch_array($sql))
              { ?>
            <h2><?php echo $row['u_name']?></h2>

            <h3>SYSTEM USER</h3>
            <hr>
            <h3><i class="fa-solid fa-person"></i>POTENTIAL CLIENT</h3>
            <hr>
            <h3><i class="fa-solid fa-earth-americas"></i><?php echo $row['u_country'];?></h3>
            <h3><i class="fa-solid fa-phone"></i><?php echo $row['u_phonenumber'];?></h3>
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
          $sql=mysqli_query($con,"SELECT * FROM `business` WHERE id='$id' ");
          $row = mysqli_fetch_array($sql);
          ?>
            <form action="" method="post" class="formation">
              <div class="real-form">
                <label for="">BUSINESS NAMES</label>
                <input type="text" name="u_name" value="<?php echo $row['u_name']?>" required>
                <label for="">CONTACT NUMBER</label>
                <input type="text" name="u_phonenumber" value="<?php echo $row['u_phonenumber']?>" required>
              </div>
              <div class="real-form">
                <label for="">COUNTRY OF OPERATIONS</label>
                <input type="text" name="u_country" required value="<?php echo $row['u_country']?>">
                <label for="">NUMBER OF EMPLOYESS</label>
                <input type="number" name="u_people" required value="<?php echo $row['u_people']?>" read-only>
              </div>
              <div class="real-form">
                <label for="">SHIPMENT FREQUENCY</label>
                <input type="number" name="u_shipment" required value="<?php echo $row['u_shipment']?>">
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
    $country = $_POST['u_country'];
    $phonenumber = $_POST['u_phonenumber'];
    $people = $_POST['u_people'];
    $shipment = $_POST['u_shipment'];
    $password = $_POST['u_password'];
    $sql=mysqli_query($con,"UPDATE `business` SET u_name = '$name', u_country = '$country', u_phonenumber = '$phonenumber',u_people = '$people', u_shipment = '$shipment', u_password = '$password' WHERE id = '$id' ");
    
    if($sql){
      echo "<script>alert('Updated Successfully')</script>";
    }
    else{
      echo "<script>alert('failed to update')</script>";
    }
  }
?>

