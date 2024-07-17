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
  <title>COMMERCIAL INVOICE</title>
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
          <h1>COMMERCIAL INVOICE</h1>
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

  <div class="tabble-container">
    <div class="tabble-wrapper">
    <h1>COMMERCIAL INVOICE</h1>
      <div class="fire-table">
      <?php
        $sql=mysqli_query($con,"SELECT id AS identification FROM `business`");
        $row=mysqli_fetch_array($sql);
        $gat=$row['identification']
        ?>
        <form action="" method="post" class="la-form">

          <div class="ibex">
            <input type="text" name="foreignid" value="<?php echo $gat;?>">
            <input type="text" name="u_exporter" placeholder="EXPORTER">
            <input type="text" name="u_date" value="<?php echo date('Y-m-d')?>">
            <input type="text" name="u_ponumber" placeholder="PO NUMBER">
          </div>

          <div class="ibex" id="ibex">
            <input type="text" name="u_consignee" placeholder="ULTIMATE CONSIGNEE">
            <input type="text" name="u_ordernumber" placeholder="ORDER NUMBER">
            <input type="text" name="u_exportcarrier" placeholder="EXPORTER CARRIER">
            <input type="number" name="u_customernumber" placeholder="CUSTOMER NUMBER">
          </div>

          <div class="ibex" id="ibex">
            <input type="text" name="u_intermediateconsignee" placeholder="INTERMEDIATE CONSIGNEE">
            <input type="text" name="u_carrierexporter" placeholder="EXPORT CARRIER">
            <input type="text" name="u_originstate" placeholder="ORIGIN STATE">
            <input type="text" name="u_destinationstate" placeholder="DESTINATION STATE">
            <input type="text" name="status" value="Pending">
            <style>
              input[value="Pending"]{
                display:none;
              }
            </style>
          </div>
          <div class="ibex" id="ibex">
            <H1>Tax Identication</H1>
            <input type="text" name="u_name" placeholder="NAME">
            <input type="text" name="u_title" placeholder="TITLE">
            <input type="email" name="u_email" placeholder="E-MAIL">
          <button type="submit" name="submit" class="btn-3" id="button-btn">SAVE CHANGES</button>
          </div>  
        </form>
      </div>
    </div>
  </div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
<style>
@import url('https://fonts.googleapis.com/css2?family=Noto+Serif+Display:ital,wght@0,100..900;1,100..900&display=swap');

.la-form input[name="u_exporter"],input[name="u_consignee"],input[name="u_intermediateconsignee"]{
    font-family: "Noto Serif Display", serif;
    font-optical-sizing: auto;
    font-weight: 80px;
    font-style: normal;
    font-variation-settings:"wdth" 100;
    font-size:23px;
    width:40vh;
  }
  input[name="foreignid"]{
    display:none;
  }
  #button-btn{
    position:relative;
    padding:20px 50px;
  } 
</style>
<?php
  if(isset($_POST['submit'])){
    $foreignid = $_POST['foreignid'];
    $u_exporter = $_POST['u_exporter'];
    $u_date = $_POST['u_date'];
    $u_ponumber = $_POST['u_ponumber'];
    $u_consignee = $_POST['u_consignee'];
    $u_ordernumber = $_POST['u_ordernumber'];
    $u_exportcarrier = $_POST['u_exportcarrier'];
    $u_customernumber = $_POST['u_customernumber'];
    $u_intermediateconsignee = $_POST['u_intermediateconsignee'];
    $u_carrierexporter = $_POST['u_carrierexporter'];
    $u_originstate = $_POST['u_originstate'];
    $u_destinationstate = $_POST['u_destinationstate'];
    $u_name=$_POST['u_name'];
    $u_title=$_POST['u_title'];
    $u_email=$_POST['u_email'];
    $status=$_POST['status'];
    $sql=mysqli_query($con,"INSERT INTO `commercial` VALUES('','$foreignid','$u_exporter','$u_date','$u_ponumber','$u_consignee','$u_ordernumber','$u_exportcarrier','$u_customernumber','$u_intermediateconsignee','$u_carrierexporter','$u_originstate','$u_destinationstate','$u_name','$u_title','$u_email','$status')");
    
    if($sql){
      echo "<script>alert('Registered Successfully')</script>";
    }
    else{
      echo "<script>alert('failed to register')</script>";
    }
  }
?>