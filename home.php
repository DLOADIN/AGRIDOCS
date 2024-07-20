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
  <title>HOME</title>
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
          <h1>HOME</h1>
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
  <div class="tylan">
    <div class="beer-bongs">
    <div class="clyde">
    <i class="fa-solid fa-file-word"></i>
      <div class="loop-container">
        <h4>Step 1</h4>
        <h1>Create Your First Quote</h1>
        <h5>Let's get You familiar with creating professional Quotes in Agridocs</h5>
      </div>
    </div>
    <div class="clyde">
    <i class="fa-solid fa-folder"></i>
      <div class="loop-container">
        <h4>Step 2</h4>
        <h1>Add or Import Contacts</h1>
        <h5>Add a contact or import a list of existing contacts</h5>
      </div>
    </div>
    <div class="clyde">
    <i class="fa-brands fa-google-drive"></i>
      <div class="loop-container">
        <h4>Step 3</h4>
        <h1>Add or Import Products</h1>
        <h5>Add a contact or import a list of existing Products</h5>
      </div>
    </div>
    </div>

    <div class="beer-tongs">
      <div class="fram">
        <h1 id="fram">Learn More about Agridocs</h1>
        <a href="training.php">
        <div class="clyde">
          <i class="fa-solid fa-users-line"></i>
          <div class="loop-container">
          <h1>Book A session a free training Session</h1>
          <h5>We'ld love to show you how everything works.</h5>
        </div>
      </div>
    </div>
        </a>
    <div class="fram">
      <h1 id="fram">INVOICES</h1>
      <div class="Jerkin">
        <div class="marcins">
          <a href="proforma.php">
            <i class="fa-sharp fa-regular fa-file-pdf"></i>
            <h2>PROFORMA INVOICE</h2>
          </a>
        </div>
        <div class="marcins">
          <a href="commercial-invoice.php">
            <i class="fa-solid fa-file-lines"></i>
            <h2>COMMERCIAL INVOICE</h2>
          </a>
        </div>
        <div class="marcins">
          <a href="packaging-list.php">
              <i class="fa-solid fa-file-circle-plus"></i>
              <h2>PACKAGING LIST</h2>
          </a>
        </div>
        <div class="marcins">
          <a href="certificate-list.php">
            <i class="fa-solid fa-file-circle-check"></i>
            <h2>CERTIFICATE OF ORIGIN</h2>
          </a>  
        </div>
      </div>
    </div>
  </div>
  </div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
<style>
  .marcins:hover{
    transform: scale(1.1);
    transition:.6s all ease-in;
    cursor:pointer
  }

  .jerkin{
    display:flex;
    justify-content: space-between;
    padding:1.4rem;
  }

  .marcins i{
    text-align: center;
    font-size:80px;
    color: #004814;
    align-items:center;
    justify-content: center;
    margin-left:5.5rem
  }

  .marcins h2{
    color:black;
  }

  .marcins{
    border:3px solid #004814;
    border-radius: 15px;
    padding:3rem;
  }

  .fram .clyde:hover{
    transition: .5s all ease-in-out;;
    transform: scale(1.1);
  }

  .fram a{
    text-decoration:none
  }
  .fram h5{
    color:black;
  }
  .fram #fram{
    color:#004814;
    margin-left:3rem;
  }
  .loop-container h4{
    font-size:25px
  }
  .loop-container h1{
    font-size:35px;
    color:#004814;
  }
  .tylan{
    background:#FFFFFF;
    border-radius:15px;
    margin:3rem 3rem 3rem 10rem;
    display:inline-block;
    padding:2rem;
  }
  .clyde{
    background:#94ebad;
    width:150vh;
    height:fit-content;
    margin:3rem;
    display:flex;
    border-radius:15px;
  }
    .fram .clyde{
    background:transparent;
    width:150vh;
    height:fit-content;
    margin:3rem;
    display:flex;
    border-radius:15px;
    border:3px solid #94ebad;
  }
  .loop-container{
    display:block;
    padding:3rem 5rem
  }
  .clyde i{
    background:lightblue;
    font-size:140px;
    padding:1rem 1rem;
    border-top-left-radius:15px;
    border-bottom-left-radius:15px;
  }
</style>