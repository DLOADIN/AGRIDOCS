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
  <link rel="stylesheet" href="./CSS/invoice.css">
  <link rel="stylesheet" href="./CSS/charts.css">
  <link rel="shortcut icon" href="./image/sm_5af437038c88f.jpg" type="image/x-icon">
  <script src="https://kit.fontawesome.com/14ff3ea278.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="jsfile.js"></script>
  <title>CERTIFICATE OF ORIGIN</title>
</head>
<body>
  <style>
    #main-contents{
      height:200vh;
    }
    .caradan-products{
      text-decoration: none;
    }
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
  #button-btn{
    position:relative;
    padding:20px 50px;
  } 
  input[name="foreignid"]{
    display:none;
  }
  .btn-3:hover{
    transition:.7s ease;
    transform:scale(1.1);
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
          <h1>CERTIFICATE OF ORIGIN</h1>
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

  <div class="invoice-container">
        <h1>CERTIFICATE OF ORIGIN</h1>
        <form action="" method="post">
        <div class="section">
        <?php
        $sql=mysqli_query($con,"SELECT id AS identification FROM `business` WHERE id='$id' ");
        $row=mysqli_fetch_array($sql);
        $gat=$row['identification']
        ?>  
        <div class="input-group">
              <input type="text" name="foreignid" value="<?php echo $gat;?>">
            <div class="input-group">
                <label for="seller">Exporter:</label>
                <input type="text" id="seller" name="u_exporter">
            </div>
            <div class="input-group">
                <label for="invoiceNo">Invoice Number:</label>
                <input type="text" id="invoiceNo" name="invoiceNo" value="INV-00001">
            </div>
            <div class="input-group">
                <label for="date">Date:</label>
                <input type="date" id="date" name="u_date" value="<?php echo date('Y-m-d')?>">
            </div>
        </div>
        
            <div class="input-group">
                <label for="buyer">Importer:</label>
                <input type="text" id="delivery" name="u_importer">
                <label for="delivery">Description of Goods:</label>
                <input type="text" id="delivery" name="u_goods">
            </div>
            <div class="input-group">
                <label for="delivery">Country of Origin:</label>
                <input type="text" id="delivery" name="u_country">
            </div>
        </div>
        
        <div class="section product-section">
            <table>
                <thead>
                    <tr>
                        <th>Harmonized Tariff Code</th>
                        <th>Product Code</th>
                        <th>Unit</th>
                        <th>Origin State</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="harmonizedtariffcode"></td>
                        <td><input type="text" name="productcode"></td>
                        <td><input type="text" name="description"></td>
                        <td><input type="text" name="originstate"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div  id="input-group">
            <div class="input-groups">
                <label for="delivery">Production Date:</label>
                <input type="date" id="delivery" name="u_productiondate">
            </div>

            <div class="input-groups">
                <label for="delivery">Expiration Date:</label>
                <input type="date" id="delivery" name="u_expirationdate">
            </div>
            </div>
            <input type="text" name="status" value="Pending">
            <style>
              input[name="status"]{
                display:none;
              }
              </style>
              <div class="section signature">
          <button type="submit" name="submit" class="btn-3">SAVE CHANGES</button>
        </div>
        </div>
        </form>
      </div>
    </div>
    </div>
  </div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
<style>
  #button-btn{
    position:relative;
    padding:20px 50px;
  }
  #input-group{
    display:flex;
  }

  #input-group {
    display: flex;
    margin-bottom: 10px;
    justify-content:space-between;
}

#input-group label {
    margin-bottom: 5px;
    font-weight: bold;
}

#input-group input {
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 15px;
    height:4vh;
    width:50lvh;
}

</style>
<?php
  if(isset($_POST['submit'])){
    $foreignid = $_POST['foreignid'];
    $u_exporter = $_POST['u_exporter']; 
    $u_importer = $_POST['u_importer']; 
    $invoiceNo = $_POST['invoiceNo'];
    $u_date = $_POST['u_date'];
    $u_goods = $_POST['u_goods'];
    $u_country = $_POST['u_country'];
    $harmonizedtariffcode = $_POST['harmonizedtariffcode'];
    $productcode = $_POST['productcode'];
    $description = $_POST['description'];
    $originstate = $_POST['originstate'];
    $u_productiondate = $_POST['u_productiondate'];
    $u_expirationdate = $_POST['u_expirationdate'];
    $status = $_POST['status'];
    $sql=mysqli_query($con,"INSERT INTO `certificate` VALUES('','$foreignid','$u_exporter','$u_importer','$invoiceNo','$u_date','$u_goods','$u_country','$harmonizedtariffcode','$productcode','$description','$originstate','$u_productiondate','$u_expirationdate', '$status')");
    
    if($sql){
      echo "<script>alert('Registered Successfully')</script>";
    }
    else{
      echo "<script>alert('failed to register')</script>";
    }
  }
?>