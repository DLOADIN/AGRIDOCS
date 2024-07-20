<?php
require "../connection.php";

if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
} else {
    header('location:loginlogistics.php');
    exit();
}

if (isset($_GET['action']) && isset($_GET['table']) && isset($_GET['id'])) {
    $action = mysqli_real_escape_string($con, $_GET['action']);
    $table = mysqli_real_escape_string($con, $_GET['table']);
    $row_id = mysqli_real_escape_string($con, $_GET['id']);

    if (in_array($table, ['commercial', 'packaging', 'proforma', 'certificate']) && in_array($action, ['approve', 'disapprove'])) {
        $status = $action === 'approve' ? 'APPROVED' : 'DISAPPROVED';

        $query = $con->prepare("UPDATE `$table` SET status=? WHERE id=?");
        $query->bind_param("si", $status, $row_id);

        if ($query->execute()) {
            // Redirect to avoid reprocessing on refresh
            header('Location: track-products.php');
            exit();
        } else {
            echo "Error updating record: " . $query->error;
        }
    } else {
        echo "Invalid action or table";
    }
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
  <link rel="shortcut icon" href="./image/sm_5af437038c88f.jpg" type="image/x-icon">
  <script src="https://kit.fontawesome.com/14ff3ea278.js" crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="../images/🇷🇼.jpeg" type="image/x-icon">
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script src="jsfile.js"></script>
  <title>DOCUMENTATION</title>
  <style>
    #main-contents {
      height: 280vh;
    }
    .btn-3 {
      background: #69B936;
    }
    table {
      width: 80%;
      margin: auto;
      border: 1px solid #ddd;
      border-collapse: collapse;
      box-shadow: 8px 8px 8px grey;
      border-radius: 15px;
    }
    th, td {
      border-bottom: 1px solid #ddd;
      padding: 15px;
      text-align: center;
    }
    th {
      background: #21A747;
      color: #fff;
      font-size: 20px;
    }
    tr {
      border-radius: 15px;
    }
    tr:hover {
      box-shadow: 8px 8px 8px grey;
      background: #ddd;
    }
    .table-containment h1 {
      text-align: center;
    }
    .tablestotable {
      margin-top: 80px;
    }
    .td {
      display: flex;
      justify-content: center;
      padding: .3rem .5rem;
    }
    td button {
      padding: 10px 25px;
      border-radius: 5px;
      border: none;
      margin: .5rem;
      background: #21A747;
      color: #fff;
      cursor: pointer;
    }
    .td a {
      padding: 10px 25px;
      border-radius: 5px;
      text-decoration: none;
      color: #fff;
    }
    .td a.fg-eric1 {
      background: #21A747;
    }
    .td a.fg-eric2 {
      background: red;
    }
    .td a:hover {
      opacity: 0.8;
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
        <h2 class="h2">DOCUMENT REVIEWAL</h2>
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

    <div class="tablestotable">
      <div class="table-containment">
        <h1>DETAILS ON COMMERCIAL INVOICES</h1>
        <table>
          <tr>
            <th>#</th>
            <th>EXPORTER</th>
            <th>DATE</th>
            <th>ORIGIN STATE</th>
            <th>DESTINATION STATE</th>
            <th>INTERMEDIATE CONSIGNEE</th>
            <th>QUALITY</th>
            <th>DESCRIPTION</th>
            <th>TAX</th>
            <th>BANK NAME</th>
            <th>STATUS</th>
            <th>VIEW</th>
          </tr>
          <?php
          $sql = mysqli_query($con, "SELECT * FROM `commercial`");
          $number = 0;
          while($row = mysqli_fetch_array($sql)):
        ?>
          <tr>
            <td><?php echo ++$number; ?></td>
            <td><?php echo htmlspecialchars($row['u_exporter']); ?></td>
            <td><?php echo htmlspecialchars($row['u_date']); ?></td>
            <td><?php echo htmlspecialchars($row['u_originstate']); ?></td>
            <td><?php echo htmlspecialchars($row['u_destinationstate']);?></td>
            <td><?php echo htmlspecialchars($row['u_intermediateconsignee']); ?></td>
            <td><?php echo htmlspecialchars($row['quality']); ?></td>
            <td><?php echo htmlspecialchars($row['description']); ?></td>
            <td><?php echo htmlspecialchars($row['tax_name']); ?></td>
            <td><?php echo htmlspecialchars($row['bankName']); ?></td>
            <td class="td">
                    <?php if (strtolower($row['status']) === 'pending') { ?>
                        <a href="?id=<?php echo $row['id']; ?>&action=approve&table=commercial" class="fg-eric1">APPROVE</a>
                        <a href="?id=<?php echo $row['id']; ?>&action=disapprove&table=commercial" class="fg-eric2">DISAPPROVE</a>
                    <?php } else { ?>
                        <span><?php echo htmlspecialchars($row['status']); ?></span>
                    <?php } ?>
                </td>
            <td>
                <a href="viewcommercial.php?id=<?php echo $row ['id']?>">VIEW INVOICE</a>
              </td>
          </tr>
          <?php
          endwhile;
          ?>
        </table>
      </div>
    </div>

    <div class="tablestotable">
      <div class="table-containment">
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
            <th>VIEW</th>
          </tr>
          <?php
          $sqly = mysqli_query($con, "SELECT * FROM `packaging`");
          $number = 0;
        while ($row = mysqli_fetch_array($sqly)):
        ?>
          <tr>
            <td><?php echo ++$number; ?></td>
            <td><?php echo $row['u_exporter']; ?></td>
            <td><?php echo $row['u_date']; ?></td>
            <td><?php echo $row['u_customernumber']; ?></td>
            <td><?php echo $row['u_consignee']; ?></td>
            <td><?php echo $row['u_terms']; ?></td>
            <td><?php echo $row['u_exportcarrier']; ?></td>
            <td><?php echo $row['Grossweight']; ?></td>
            <td><?php echo $row['Netweight']; ?></td>
            <td class="td">
              <?php if (strtolower($row['status']) == 'pending') { ?>
                <a href="?id=<?php echo $id; ?>&action=approve&table=packaging" class="fg-eric1">APPROVE</a>
                <a href="?id=<?php echo $id; ?>&action=disapprove&table=packaging" class="fg-eric2">DISAPPROVE</a>
              <?php } else { ?>
                <span><?php echo htmlspecialchars($row['status']); ?></span>
              <?php } ?>
            </td>
            <td>
              <a href="viewpackaging.php?id=<?php echo $row ['id']?>">VIEW INVOICE</a>
            </td>
          </tr>
          <?php
          endwhile;
          ?>
        </table>
      </div>
    </div>

    <div class="tablestotable">
      <div class="table-containment">
        <h1>DETAILS ON PROFORMA INVOICES</h1>
        <table>
          <tr>
            <th>#</th>
            <th>SELLER</th>
            <th>INVOICE NUMBER</th>
            <th>DATE OF REGISTRATION</th>
            <th>PORT OF LOADING</th>
            <th>PORT OF DISCHARGE</th>
            <th>TAX</th>
            <th>BANKNAME</th>
            <th>TOTAL</th>
            <th>STATUS</th>
            <th>VIEW</th>
          </tr>
          <?php
        // Displaying the Proforma table
        $sql = mysqli_query($con, "SELECT * FROM `proforma`");
        $number = 0;
        while ($row = mysqli_fetch_array($sql)):
        ?>
            <tr>
                <td><?php echo ++$number ?></td>
                <td><?php echo $row['seller']?></td>
                <td><?php echo $row['invoiceNo']?></td>
                <td><?php echo $row['u_date']?></td>
                <td><?php echo $row['portLoading']?></td>
                <td><?php echo $row['portDischarge']?></td>
                <td><?php echo $row['tax']?></td>
                <td><?php echo $row['bankname']?></td>
                <td><?php echo $row['u_total']?></td>
                <td class="td">
                <?php if (strtolower($row['status']) == 'pending') { ?>
                        <a href="?id=<?php echo $row['id']; ?>&action=approve&table=proforma" class="fg-eric1">APPROVE</a>
                        <a href="?id=<?php echo $row['id']; ?>&action=disapprove&table=proforma" class="fg-eric2">DISAPPROVE</a>
                    <?php } else { ?>
                        <span><?php echo htmlspecialchars($row['status']); ?></span>
                    <?php } ?>
                </td>
                <td>
                  <a href="viewproforma.php?id=<?php echo $row ['id']?>">VIEW INVOICE</a>
              </td>
            </tr>
        <?php
        endwhile;
        ?>
        </table>
      </div>
    </div>

    <div class="tablestotable">
      <div class="table-containment">
        <?php
          // Displaying the Certificate table
          $sql = mysqli_query($con, "SELECT * FROM `certificate` WHERE id='$id' ");
          $row = mysqli_fetch_array($sql);
          $number = 0;
        ?>
        <h1>DETAILS ON CERTIFICATE LISTS</h1>
        <table>
          <tr>
            <th>#</th>
            <th>IMPORTER</th>
            <th>EXPORTER</th>
            <th>INVOCE NUMBER</th>
            <th>DATEDESCRIPTION OF GOODS</th>
            <th>COUNTRY OF ORIGIN</th>
            <th>PRODUCTION DATE</th>
            <th>EXPIRATION DATE</th>
            <th>STATUS</th>
            <th>VIEW</th>
          </tr>
          <tr>
            <td><?php echo ++$number;?></td>
            <td><?php echo htmlspecialchars($row['u_importer']);?></td>
            <td><?php echo htmlspecialchars($row['u_exporter']);?></td>
            <td><?php echo htmlspecialchars($row['invoiceNo']);?></td>
            <td><?php echo htmlspecialchars($row['u_date']);?></td>
            <td><?php echo htmlspecialchars($row['u_country']);?></td>
            <td><?php echo htmlspecialchars($row['u_productiondate']);?></td>
            <td><?php echo htmlspecialchars($row['u_expirationdate']);?></td>
            <td class="td">
            <?php if (strtolower($row['status']) == 'pending') { ?>
                <a href="?id=<?php echo $id; ?>&action=approve&table=certificate" class="fg-eric1">APPROVE</a>
                <a href="?id=<?php echo $id; ?>&action=disapprove&table=certificate" class="fg-eric2">DISAPPROVE</a>
              <?php } else { ?>
                <span><?php echo htmlspecialchars($row['status']); ?></span>
              <?php } ?>
            </td>
            <td>
              <a href="viewcertificate.php?id=<?php echo $row ['id']?>">VIEW INVOICE</a>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
<style>
  td a{
    text-decoration:none;
    color:black;
  }
  td a:hover{
    color: #21A747;
    transition:0.3s all ease;
  }
  td a:focus{
    color: #21A747;
  }
</style>
