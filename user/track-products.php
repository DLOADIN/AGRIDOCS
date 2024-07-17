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
        <h2 class="h2">TRACK PRODUCTS</h2>
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

    <div class="tigris">
      <?php
      $tables = ['proforma', 'commercial', 'packaging', 'certificate'];
      $status = 'APPROVED';

      foreach ($tables as $table) {
          $query = "SELECT * FROM `$table` WHERE status = '$status'";
          $sql = mysqli_query($con, $query);
          $number = 0;
          if ($sql) { 
              while ($row = mysqli_fetch_assoc($sql)) {        
                  ?>
                  <div class="fibrosis">
                      <h4>Shipment ID: <span>SHIP129<?php echo $number++; ?></span></h4>
                      <h4>Destination: <span><?php echo $row['u_destinationstate']; ?></span></h4>
                      <h4>In transit: <span class="in-transit"><i class="fa-solid fa-truck-fast"></i>In transit</span></h4>
                      <h4>ETA: <span><?php echo $row['u_date']; ?></span></h4>
                  </div>
                <?php
              }
          } else {
              echo "<script>alert('Error in query for table $table')</script>Error in query for table $table: ". mysqli_error($con);
          }
      }
      ?>
      </div>
    
    <style>
      .tigris{
        background:#D9D9D9;
        max-width: 100%;
        height: fit-content;
        border-radius:20px;
        padding: 1.4rem;
        display: grid;
        place-content:center;
        place-items:center;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 2rem;
      }
      .fibrosis{
        background: rgba(255, 255, 255, 0.6);
        border-radius:20px;
        padding: 1rem;
        width: 50vh;
        height: 25vh;
        display: block;
        gap:1rem;
        text-align:center;
      }
      .fibrosis h4{
        font-size:30px;
      }
      span{
        margin-left:1.4rem
      }
      .in-transit i{
        color: black;
        font-size:25px;
        margin-right:10px;
      }
    </style>
</body>
</html>
