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
  <link rel="stylesheet" href="./CSS/invoice.css">
  <link rel="shortcut icon" href="./image/sm_5af437038c88f.jpg" type="image/x-icon">
  <script src="https://kit.fontawesome.com/14ff3ea278.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="jsfile.js"></script>
  <title>PROFORMA INVOICE</title>
</head>
<body>
  <style>
    #main-contents{
      height:230vh;
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
          <h1>PROFORMA INVOICE</h1>
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

  
    <!-- <div class="tabble-wrapper">
    <h1>PROFORMA INVOICE</h1>
      <div class="fire-table">
        <form action="" method="post" class="la-form">
          <div class="ibex">
            <input type="text" name="foreignid">
            <input type="text" name="u_exporter" placeholder="EXPORTER">
            <input type="text" name="u_date" placeholder="DATE">
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
          <input type="text" name="u_total" placeholder="TOTAL">
          </div>  
        </form> 
      </div>-->
    <div class="invoice-container">
        <h1>PROFORMA INVOICE</h1>
        <form action="" method="post">
        <div class="section">
            <div class="input-group">
                <label for="seller">Seller:</label>
                <input type="text" id="seller" name="seller">
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
        <?php
        $sql=mysqli_query($con,"SELECT id AS identification FROM `business` WHERE id='$id' ");
        $row=mysqli_fetch_array($sql);
        $gat=$row['identification']
        ?>
        <div class="section">
            <div class="input-group">
              <input type="text" name="foreignid" value="<?php echo $gat;?>">
                <label for="buyer">Buyer:</label>
                <input type="text" id="buyer" name="buyer">
            </div>
            <div class="input-group">
                <label for="delivery">Delivery Site:</label>
                <input type="text" id="delivery" name="delivery">
            </div>
        </div>
        <div class="section">
            <div class="input-group">
                <label for="method">Method of Dispatch:</label>
                <input type="text" id="method" name="method">
            </div>
            <div class="input-group">
                <label for="type">Type of Dispatch:</label>
                <input type="text" id="type" name="type">
            </div>
            <div class="input-group">
                <label for="terms">Terms / Mode of Payment:</label>
                <input type="text" id="terms" name="termss">
            </div>
        </div>
        <div class="section">
            <div class="input-group">
                <label for="portLoading">Port of Loading:</label>
                <input type="text" id="portLoading" name="portLoading">
            </div>
            <div class="input-group">
                <label for="portDischarge">Port of Discharge:</label>
                <input type="text" id="portDischarge" name="portDischarge">
            </div>
        </div>
        <div class="section product-section">
            <table>
                <thead>
                    <tr>
                        <th>Product Code</th>
                        <th>Description of Goods</th>
                        <th>Unit Quantity</th>
                        <th>Unit Rate</th>
                        <th>Price</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="productCode"></td>
                        <td><input type="text" name="description"></td>
                        <td><input type="text" name="quantity"></td>
                        <td><input type="text" name="rate"></td>
                        <td><input type="text" name="price"></td>
                        <td><input type="text" name="amount"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="section total-section">
            <div class="input-group">
                <label for="additionalCosts">Additional Costs:</label>
                <input type="number" id="additionalCosts" name="additionalCosts">
            </div>
            <div class="input-group">
                <label for="tax">Add Tax:</label>
                <input type="number" id="tax" name="tax">
            </div>
        </div>
        <div class="section bank-details">
            <h3>Bank Details</h3>
            <div class="input-group">
                <label for="bankName">Bank Name:</label>
                <input type="text" id="bankName" name="bankName">
            </div>
            <div class="input-group">
                <label for="accountNo">Account Number/IBAN:</label>
                <input type="text" id="accountNo" name="accountNo">
            </div>
            <div class="input-group">
                <label for="swift">SWIFT:</label>
                <input type="text" id="swift" name="swift">
            </div>
            <div class="input-group">
                <label for="currency">Currency:</label>
                <input type="text" id="currency" name="currency">
            </div>
            <div class="input-group">
                <label for="currency">Total:</label>
                <input type="number" id="currency" name="u_total">
            </div>
            <input type="text" name="status" value="Pending">
            <style>
              input[value="Pending"]{
                display:none;
              }
              </style>
              <div class="section signature">
          <button type="submit" name="submit" class="btn-3">SAVE CHANGES</button>
        </div>
        </div>
        </form>
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
  .invoice-container{
    margin:0 auto;
  }
</style>
<?php
  if(isset($_POST['submit'])){
    $foreignid = $_POST['foreignid'];
    $seller=$_POST['seller'];
    $invoiceNo = $_POST['invoiceNo'];
    $date = $_POST['u_date'];
    $buyer = $_POST['buyer'];
    $delivery = $_POST['delivery'];
    $portLoading = $_POST['portLoading'];
    $portDischarge = $_POST['portDischarge'];
    $productCode = $_POST['productCode'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $rate = $_POST['rate'];
    $price = $_POST['price'];
    $amount = $_POST['amount'];
    $additionalCosts = $_POST['additionalCosts'];
    $tax = $_POST['tax'];
    $bankName = $_POST['bankName'];
    $accountNo = $_POST['accountNo'];
    $swift = $_POST['swift'];
    $currency = $_POST['currency'];
    $method = $_POST['method'];
    $type = $_POST['type'];
    $terms = $_POST['termss'];
    $total = $_POST['u_total'];
    $status = $_POST['status'];

    $sql = mysqli_query($con, "INSERT INTO `proforma` VALUES('','$foreignid','$seller','$invoiceNo','$date','$buyer','$delivery','$terms','$portLoading','$portDischarge','$productCode','$description','$quantity','$rate','$price','$amount','$additionalCosts','$tax','$bankName','$accountNo','$swift','$currency','$method','$type','$terms','$total','$status')");
    
    if($sql){
      echo "<script>alert('Registered Successfully')</script>";
    }
    else{
      echo "<script>alert('failed to register')</script>";
    }
  }
?>