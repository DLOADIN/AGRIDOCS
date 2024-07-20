<?php
  require "../connection.php";

  if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
  } else {
    header('location:loginlogistics.php');
    exit();
  }

 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSS/newfriend.css">
  <link rel="stylesheet" href="../CSS/another-one.css">
  <link rel="stylesheet" href="../CSS/form.css">
  <link rel="stylesheet" href="../CSS/gravity.css">
  <link rel="stylesheet" href="../CSS/invoice.css">
  <link rel="shortcut icon" href="./image/sm_5af437038c88f.jpg" type="image/x-icon">
  <script src="https://kit.fontawesome.com/14ff3ea278.js" crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="../images/🇷🇼.jpeg" type="image/x-icon">
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script src="jsfile.js"></script>
  <title>SHIPMENT</title>
  <style>
    #main-contents {
      height: 280vh;
    }
  </style>
</head>
<body>
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
        <h2 class="h2">VIEW INVOICES</h2>
      </div>
      <div class="user-info">
        <div class="gango">
          <?php
            $sql = mysqli_query($con, "SELECT u_name from `logistics` WHERE id='$id' ");
            $row = mysqli_fetch_array($sql);
            $attorney = $row['u_name'];
          ?>
          <h3 class="my-account-header"><?php echo htmlspecialchars($attorney); ?></h3>
          <p>Logistics</p>
        </div> 
        <button name="submit" type="submit" class="btn-3">
          <a href="logout.php">LOGOUT</a>
        </button>
      </div>       
    </div>
    <style>
      
    </style>

    <div class="invoice-container">
        <h1>PROFORMA INVOICE</h1>
        <form action="" method="post">
        <?php
        $my_id=$_GET['id'];
        $sql=mysqli_query($con,"SELECT * FROM `proforma` WHERE id='$my_id' ");
        while($row=mysqli_fetch_array($sql)):
        ?>
        <div class="section">
            <div class="input-group">
                <label for="seller">Seller:</label>
                <input type="text" id="seller" name="seller" value="<?php echo $row['seller']?>" readonly>
            </div>
            <div class="input-group">
                <label for="invoiceNo">Invoice Number:</label>
                <input type="text" id="invoiceNo" name="invoiceNo" value="<?php echo $row['invoiceNo']?>" readonly>
            </div>
            <div class="input-group">
                <label for="date">Date:</label>
                <input type="date" id="date" name="u_date" value="<?php echo $row['u_date']?>" readonly>
            </div>
        </div>
        <div class="section">
            <div class="input-group">
              <input type="text" name="foreignid" value="<?php echo $row['foreignid']?>" readonly>
                <label for="buyer">Buyer:</label>
                <input type="text" id="buyer" name="buyer" value="<?php echo $row['buyer']?>" readonly>
            </div>
            <div class="input-group">
                <label for="delivery">Delivery Site:</label>
                <input type="text" id="delivery" name="delivery" value="<?php echo $row['delivery']?>" readonly>
            </div>
        </div>
        <div class="section">
            <div class="input-group">
                <label for="method">Method of Dispatch:</label>
                <input type="text" id="method" name="method" value="<?php echo $row['method']?>" readonly>
            </div>
            <div class="input-group">
                <label for="type">Type of Dispatch:</label>
                <input type="text" id="type" name="type" value="<?php echo $row['type']?>" readonly>
            </div>
            <div class="input-group">
                <label for="terms">Terms / Mode of Payment:</label>
                <input type="text" id="terms" name="termss" value="<?php echo $row['termss']?>" readonly>
            </div>
        </div>
        <div class="section">
            <div class="input-group">
                <label for="portLoading">Port of Loading:</label>
                <input type="text" id="portLoading" name="portLoading" value="<?php echo $row['portLoading']?>" readonly>
            </div>
            <div class="input-group">
                <label for="portDischarge">Port of Discharge:</label>
                <input type="text" id="portDischarge" name="portDischarge" value="<?php echo $row['portDischarge']?>" readonly>
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
                        <td><input type="text" name="productCode" value="<?php echo $row['productCode']?>" ></td>
                        <td><input type="text" name="description" value="<?php echo $row['description']?>" readonly></td>
                        <td><input type="text" name="quantity" value="<?php echo $row['quantity']?>" readonly></td>
                        <td><input type="text" name="rate" value="<?php echo $row['rate']?>" readonly></td>
                        <td><input type="text" name="price" value="<?php echo $row['price']?>" readonly></td>
                        <td><input type="text" name="amount" value="<?php echo $row['amount']?>" readonly></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="section total-section">
            <div class="input-group">
                <label for="additionalCosts">Additional Costs:</label>
                <input type="number" id="additionalCosts" name="additionalCosts" value="<?php echo $row['additionalCosts']?>" readonly>
            </div>
            <div class="input-group">
                <label for="tax">Add Tax:</label>
                <input type="number" id="tax" name="tax" value="<?php echo $row['tax']?>" readonly>
            </div>
        </div>
        <div class="section bank-details">
            <h3>Bank Details</h3>
            <div class="input-group">
                <label for="bankName">Bank Name:</label>
                <input type="text" id="bankName" name="bankName" value="<?php echo $row['bankname']?>" readonly>
            </div>
            <div class="input-group">
                <label for="accountNo">Account Number/IBAN:</label>
                <input type="text" id="accountNo" name="accountNo" value="<?php echo $row['accountNo']?>" readonly>
            </div>
            <div class="input-group">
                <label for="swift">SWIFT:</label>
                <input type="text" id="swift" name="swift" value="<?php echo $row['swift']?>" readonly>
            </div>
            <div class="input-group">
                <label for="currency">Currency:</label>
                <input type="text" id="currency" name="currency" value="<?php echo $row['currency']?>" readonly>
            </div>
            <div class="input-group">
                <label for="currency">Total:</label>
                <input type="number" id="currency" name="u_total" value="<?php echo $row['u_total']?>" readonly>
            </div>
            <input type="text" name="status" value="Pending" value="<?php echo $row['status']?>" readonly>
            <style>
              input[value="Pending"],input[name="termss"]{
                display:none;
              }
              </style>
        </div>
        </form>
        <?php
        endwhile
        ?>
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
</body>
</html>
