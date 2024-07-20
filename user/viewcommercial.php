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
        <h2 class="h2">VIEW COMMERCIAL INVOICES</h2>
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

    <div class="invoice-container">
        <h1>COMMERCIAL INVOICE</h1>
        <form action="" method="post">
        <?php
        $my_id=$_GET['id'];
        $sql=mysqli_query($con,"SELECT * FROM `commercial` WHERE id='$my_id' ");
        while($row=mysqli_fetch_array($sql)):
        ?>  
        <div class="input-group">
              <input type="text" name="foreignid" value="<?php echo $row['foreignid'];?>" readonly>
            <div class="input-group">
                <label for="seller">Exporter:</label>
                <input type="text" id="seller" name="u_exporter" value="<?php echo $row['u_exporter'];?>" readonly>
            </div>
            <div class="input-group">
                <label for="invoiceNo">Invoice Number:</label>
                <input type="text" id="invoiceNo" name="invoiceNo" value="<?php echo $row['invoiceNo'];?>" readonly >
            </div>
            <div class="input-group">
                <label for="date">Date:</label>
                <input type="date" id="date" name="u_date" value="<?php echo $row['u_date'];?>" readonly>
            </div>
        </div>
        
            <div class="input-group">
                <label for="buyer">Phonenumber:</label>
                <input type="text" id="delivery" name="u_ponumber" value="<?php echo $row['u_ponumber'];?>" readonly>
                <label for="delivery">Origin State:</label>
                <input type="text" id="delivery" name="u_originstate" value="<?php echo $row['u_originstate'];?>" readonly>
            </div>
            <div class="input-group">
                <label for="delivery">Destination State:</label>
                <input type="text" id="delivery" name="u_destinationstate" value="<?php echo $row['u_destinationstate'];?>" readonly>
            </div>
        <div class="section">
            <div class="input-group">
                <label for="method">Intermediate Consignee:</label>
                <input type="text" id="method" name="u_intermediateconsignee" value="<?php echo $row['u_intermediateconsignee'];?>" readonly>
            </div>
            <div class="input-group">
                <label for="terms">Carrier Exporter:</label>
                <input type="text" id="terms" name="u_carrierexporter" value="<?php echo $row['u_carrierexporter'];?>" readonly>
            </div>
        </div>
        <div class="section product-section">
            <table>
                <thead>
                    <tr>
                        <th>Product Code</th>
                        <th>Quality</th>
                        <th>Description</th>
                        <th>Unit</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="productCode" value="<?php echo $row['productCode'];?>" readonly></td>
                        <td><input type="text" name="quality" value="<?php echo $row['quality'];?>" readonly></td>
                        <td><input type="text" name="description" value="<?php echo $row['description'];?>" readonly></td>
                        <td><input type="text" name="unit" value="<?php echo $row['unit'];?>" readonly></td>
                        <td><input type="text" name="price" value="<?php echo $row['price'];?>" readonly></td>
                        <td><input type="text" name="total" value="<?php echo $row['total'];?>" readonly></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="section total-section">
          <h2 style="margin-right: 10vh;">Tax Identication</h2>
            <div class="input-group">
                <label for="additionalCosts">Name:</label>
                <input type="number" id="additionalCosts" name="tax_name" value="<?php echo $row['tax_name'];?>" readonly>
            </div>
            <div class="input-group">
                <label for="additionalCosts">Title:</label>
                <input type="number" id="additionalCosts" name="tax_title" value="<?php echo $row['tax_title'];?>" readonly>
            </div>
            <div class="input-group">
                <label for="tax">Email:</label>
                <input type="number" id="tax" name="tax_email" value="<?php echo $row['tax_email'];?>" readonly>
            </div>
        </div>
        <div class="section bank-details">
            <h3>Bank Details</h3>
            <div class="input-group">
                <label for="bankName">Bank Name:</label>
                <input type="text" id="bankName" name="bankName" value="<?php echo $row['bankName'];?>" readonly>
            </div>
            <div class="input-group">
                <label for="accountNo">Account Number/IBAN:</label>
                <input type="text" id="accountNo" name="accountNo" value="<?php echo $row['accountNo'];?>" readonly>
            </div>
            <div class="input-group">
                <label for="swift">SWIFT:</label>
                <input type="text" id="swift" name="swift" value="<?php echo $row['swift'];?>" readonly>
            </div>
            <div class="input-group">
                <label for="currency">Currency:</label>
                <input type="text" id="currency" name="currency" value="<?php echo $row['currency'];?>" readonly>
            </div>
            <input type="text" name="status" value="<?php echo $row['status'];?>" readonly >
            <style>
              input[value="Pending"]{
                display:none;
              }
              </style>
        </div>
        </form>
      </div>
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
