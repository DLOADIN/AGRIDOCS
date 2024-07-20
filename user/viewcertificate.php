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

  <div class="invoice-container">
        <h1>CERTIFICATE OF ORIGIN</h1>
        <form action="" method="post">
        <div class="section">
        <?php
        $my_id=$_GET['id'];
        $sql=mysqli_query($con,"SELECT * FROM `certificate` WHERE id='$my_id' ");
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
                <input type="text" id="invoiceNo" name="invoiceNo"  value="<?php echo $row['invoiceNo'];?>" readonly>
            </div>
            <div class="input-group">
                <label for="date">Date:</label>
                <input type="date" id="date" name="u_date" value="<?php echo $row['u_date'];?>" readonly>
            </div>
        </div>
        
            <div class="input-group">
                <label for="buyer">Importer:</label>
                <input type="text" id="delivery" name="u_importer" value="<?php echo $row['u_importer'];?>" readonly>
                <label for="delivery">Description of Goods:</label>
                <input type="text" id="delivery" name="u_goods" value="<?php echo $row['u_goods'];?>" readonly>
            </div>
            <div class="input-group">
                <label for="delivery">Country of Origin:</label>
                <input type="text" id="delivery" name="u_country" value="<?php echo $row['u_country'];?>" readonly>
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
                        <td><input type="text" name="harmonizedtariffcode" value="<?php echo $row['harmonizedtariffcode'];?>" readonly></td>
                        <td><input type="text" name="productcode" value="<?php echo $row['productcode'];?>" readonly></td>
                        <td><input type="text" name="description" value="<?php echo $row['description'];?>" readonly></td>
                        <td><input type="text" name="originstate" value="<?php echo $row['originstate'];?>" readonly></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div  id="input-group">
            <div class="input-groups">
                <label for="delivery">Production Date:</label>
                <input type="text" id="delivery" name="u_productiondate" value="<?php echo $row['u_productiondate'];?>" readonly>
            </div>

            <div class="input-groups">
                <label for="delivery">Expiration Date:</label>
                <input type="text" id="delivery" name="u_expirationdate" value="<?php echo $row['u_expirationdate'];?>" readonly>
            </div>
            </div>
            <input type="text" name="status" value="<?php echo $row['status'];?>" readonly>
            <style>
              input[name="status"]{
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
</body>
</html>
