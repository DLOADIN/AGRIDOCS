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
  error_reporting(0);
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
  <title>DOCUMENT REVIEW</title>
</head>
<body>
  <style>
    #main-contents{
      height:250vh;
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
          <h1>DOCUMENT REVIEW</h1>
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
  <style>
    table{
      width: 80%;
      margin:auto;
      border:1px solid #ddd;
      border-collapse:collapse;
      box-shadow: 8px 8px 8px grey;
      border-radius:15px;
    }
    th,td{
      border-bottom:1px solid #ddd;
      padding:15px;
      text-align:center;
    }
    th{
      background:#21A747;
      color:#fff;
      font-size:20px;
    }
    tr{
      border-radius:15px;
    }
    tr:hover{
      box-shadow: 8px 8px 8px grey;
      background: #ddd;
    }
    .table-containment h1{
      text-align:center;
    }
    .tablestotable{
      margin-top:80px
    }
  </style>


  <div class="tablestotable">
    <div class="table-containment">
    <?php
        $sql=mysqli_query($con,"SELECT * FROM `commercial` WHERE id='$id' ");
        $row=mysqli_fetch_array($sql);
        $number=0;
        ?>
        <h1>DETAILS ON COMMERCIAL INVOICES</h1>
      <table>
        <tr>
          <th>#</th>
          <th>EXPORTER</th>
          <th>DATE</th>
          <th>ULTIMATE CONSIGNEE</th>
          <th>INTERMEDIATE CONSIGNEE</th>
          <th>ORDER NUMBER</th>
          <th>CUSTOMER NUMBER</th>
          <th>DESTINATION STATE</th>
          <th>EMAIL</th>
          <th>STATUS</th>
        </tr>
        <tr>
          <td><?php echo ++$number ?></td>
          <td><?php echo $row['u_exporter']?></td>
          <td><?php echo $row['u_date']?></td>
          <td><?php echo $row['u_consignee']?></td>
          <td><?php echo $row['u_intermediateconsignee']?></td>
          <td><?php echo $row['u_ordernumber']?></td>
          <td><?php echo $row['u_customernumber']?></td>
          <td><?php echo $row['u_destinationstate']?></td>
          <td><?php echo $row['u_destinationstate']?></td>
          <td><?php echo $row['status']?></td>
        </tr>
      </table>
    </div>
  </div>


  <div class="tablestotable">
    <div class="table-containment">
    <?php
        $sql=mysqli_query($con,"SELECT * FROM `packaging` WHERE id='$id' ");
        $row=mysqli_fetch_array($sql);
        $number=0;
        ?>
        <h1>DETAILS ON PACKAGING LISTS</h1>
      <table>
        <tr>
          <th>#</th>
          <th>EXPORTER</th>
          <th>DATE</th>
          <th>CUSTOMER NUMBER</th>
          <th>ULTIMATE CONSIGNEE</th>
          <th>TERMS</th>
          <th>EXPORTER CARRIER</th>
          <th>GROSS WEIGHT</th>
          <th>NET WEIGHT</th>
          <th>STATUS</th>
        </tr>
        <tr>
          <td><?php echo ++$number ?></td>
          <td><?php echo $row['u_exporter']?></td>
          <td><?php echo $row['u_date']?></td>
          <td><?php echo $row['u_customernumber']?></td>
          <td><?php echo $row['u_consignee']?></td>
          <td><?php echo $row['u_terms']?></td>
          <td><?php echo $row['u_exportcarrier']?></td>
          <td><?php echo $row['u_grossweight']?></td>
          <td><?php echo $row['u_netweight']?></td>
          <td><?php echo $row['status']?></td>
        </tr>
      </table>
    </div>
  </div>

  <div class="tablestotable">
    <div class="table-containment">
    <?php
        $sql=mysqli_query($con,"SELECT * FROM `proforma` WHERE id='$id' ");
        $row=mysqli_fetch_array($sql);
        $number=0;
        ?>
        <h1>DETAILS ON PROFORMA INVOICES</h1>
        <table>
        <tr>
          <th>#</th>
          <th>EXPORTER</th>
          <th>DATE</th>
          <th>ULTIMATE CONSIGNEE</th>
          <th>INTERMEDIATE CONSIGNEE</th>
          <th>ORDER NUMBER</th>
          <th>CUSTOMER NUMBER</th>
          <th>DESTINATION STATE</th>
          <th>TOTAL</th>
          <th>STATUS</th>
        </tr>
        <tr>
          <td><?php echo ++$number ?></td>
          <td><?php echo $row['u_exporter']?></td>
          <td><?php echo $row['u_date']?></td>
          <td><?php echo $row['u_consignee']?></td>
          <td><?php echo $row['u_intermediateconsignee']?></td>
          <td><?php echo $row['u_ordernumber']?></td>
          <td><?php echo $row['u_customernumber']?></td>
          <td><?php echo $row['u_destinationstate']?></td>
          <td><?php echo $row['u_total']?></td>
          <td><?php echo $row['status']?></td>
        </tr>
      </table>
    </div>
  </div>


  <div class="tablestotable">
    <div class="table-containment">
    <?php
        $sql=mysqli_query($con,"SELECT * FROM `certificate` WHERE id='$id' ");
        $row=mysqli_fetch_array($sql);
        $number=0;
        ?>
        <h1>DETAILS ON CERTIFICATE LISTS</h1>
        <table>
        <tr>
          <th>#</th>
          <th>IMPORTER</th>
          <th>EXPORTER</th>
          <th>TARIFFCODE</th>
          <th>DESCRIPTION OF GOODS</th>
          <th>COUNTRY OF ORIGIN</th>
          <th>PRODUCTION DATE</th>
          <th>EXPIRATION DATE</th>
          <th>STATUS</th>
        </tr>
        <tr>
          <td><?php echo ++$number ?></td>
          <td><?php echo $row['u_importer']?></td>
          <td><?php echo $row['u_exporter']?></td>
          <td><?php echo $row['u_tariffcode']?></td>
          <td><?php echo $row['u_goods']?></td>
          <td><?php echo $row['u_country']?></td>
          <td><?php echo $row['u_productiondate']?></td>
          <td><?php echo $row['u_expirationdate']?></td>
          <td><?php echo $row['status']?></td>
        </tr>
      </table>
    </div>
  </div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
