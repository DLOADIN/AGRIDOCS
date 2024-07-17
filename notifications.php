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
  <link rel="stylesheet" href="./CSS/charts.css">
  <link rel="shortcut icon" href="./image/sm_5af437038c88f.jpg" type="image/x-icon">
  <script src="https://kit.fontawesome.com/14ff3ea278.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="jsfile.js"></script>
  <title>NOTIFICATIONS</title>
</head>
<body>
  <style>
    #main-contents{
      height:200vh;
    }
    .caradan-products{
      text-decoration: none;
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


    <div class="main-content content-right" id="main-contents">
      <div class="header-wrapper">
        <div class="header-title">
          <h1>NOTIFICATIONS</h1>
        </div>
        <div class="user-info">
        <div class="gango">
          <?php
            $sql=mysqli_query($con, "SELECT u_name from `business` WHERE id='$id'");
            $row=mysqli_fetch_array($sql);
            $attorney=$row['u_name'];
            ?>
          <h2 class="my-account-header">
          <?php echo $attorney?>
            </h2>
          <p>User</p></div> 
          <button name="submit" type="submit" class="btn-3" >
            <a href="logout.php">LOGOUT</a>
          </button>
        </div>       
    </div>

    <div class="harshed">
      <div class="cia">
        
        <?php
        $sql = mysqli_query($con, "SELECT `u_message`, `date` FROM `notifications`");
        if (mysqli_num_rows($sql) > 0) {
          while ($row = mysqli_fetch_assoc($sql)) {
              $message = $row['u_message'];
              $date = $row['date'];
              $current_date = new DateTime();
              $notification_date = new DateTime($date);
              $interval = $current_date->diff($notification_date)->days;
      
              if ($interval > 60) {
                  $another_query = mysqli_query($con, "DELETE FROM `notifications` WHERE `date` < DATE_SUB(NOW(), INTERVAL 60 DAY)");
              } else {
                  echo '<div class="hyland">';
                  echo '<i class="fa-solid fa-triangle-exclamation"></i>';
                  echo '<h2>' . $message . ' Published on ' . $date . '</h2>';
                  echo '</div>';
              }
          }
      } else {
          echo "No notifications found.";
      }
          
        ?>
      </div>
    </div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
<style>
  .harshed{
    border-radius:20px;
    background:#D9D9D9;
    padding:20px 10px;
    display:flex;
    justify-content:center;
    align-items:center;
  }
  .cia{
    display:block;
  }
  .hyland{
    display:flex;
    margin:1rem 2rem;
    background:#EDEDED;
    border-radius:20px;
    padding:10px 20px;
  }
  .hyland i{
    font-size:60px;
    color:red;
    margin:.5rem
  }
</style>
