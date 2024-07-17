<?php
  require "../connection.php";
  if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $check = mysqli_query($con,"SELECT * FROM `user` WHERE id=$id ");
  $row = mysqli_fetch_array($check);
  }
  else{
  header('location:loginuser.php');
  } 
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSS/newfriend.css">
  <link rel="stylesheet" href="../CSS/another-one.css">
  <link rel="stylesheet" href="../CSS/charts.css">
  <link rel="shortcut icon" href="./image/sm_5af437038c88f.jpg" type="image/x-icon">
  <script src="https://kit.fontawesome.com/14ff3ea278.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="jsfile.js"></script>
  <title>DASHBOARD</title>
</head>
<body>
  <style>
    #main-contents{
      height:fit-content;
      padding-bottom:10vh;
    }
    .caradan-products{
      text-decoration: none;
    }
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
<div class="sidebar" id="sidebar">
      <ul class="menu">
        <div class="logout">
        <li>
          <a href="dashboard.php">
            <i class="fa-solid fa-house-chimney"></i>
            <span>DASHBOARD</span>
          </a>
        </li>
        
        <li>
          <a href="VIEW.php">
          <i class="fa-solid fa-users-viewfinder"></i>
            <span>VIEW USERS</span>
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
          <h1>DASHBOARD</h1>
        </div>
        <div class="user-info">
        <div class="gango">
          <?php
            $sql=mysqli_query($con, "SELECT u_name from `user` WHERE id='$id'");
            $row=mysqli_fetch_array($sql);
            $attorney=$row['u_name'];
            ?>
          <h2 class="my-account-header">
          <?php echo $attorney?>
            </h2>
            <p>Manager</p></div> 
          <button name="submit" type="submit" class="btn-3" >
            <a href="logout.php">LOGOUT</a>
          </button>
        </div>       
  </div>

  <div class="far-off">
      <div class="one-time">
        <canvas id="children">
        </canvas>
        <h2>93%</h2>
    </div>
    <div class="one-time">
        <canvas id="stongone"></canvas>
        <h2>43%</h2>
        
    </div>
      </div>
      <div class="tablestotable">
    <div class="table-containment">
    <?php
        $sql=mysqli_query($con,"SELECT business.u_name,business.u_phonenumber,business.u_country, login_logs.user_id, login_logs.login_time  FROM login_logs INNER JOIN business ON login_logs.user_id = business.id ");
        $number=0;
        ?>
        <h1>ALL DETAILS ABOUT USERS</h1>
      <table>
        <tr>
          <th>#</th>
          <th>BUSINESS NAMES</th>
          <th>PHONENUMBER</th>
          <th>COUNTRY OF ORIGIN</th>
          <th>TIME LOGGED IN</th>
        </tr>
        <?php while($row=mysqli_fetch_array($sql)){ ?>;
        <tr>
          <td><?php echo ++$number ?></td>
          <td><?php echo $row['u_name']?></td>
          <td><?php echo $row['u_phonenumber']?></td>
          <td><?php echo $row['u_country']?></td>
          <td><?php echo $row['login_time']?></td>
        </tr>
        <?php } ?>
      </table>
    </div>
  </div>
  </div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="./charts/app.js"></script>
</body>
</html>
