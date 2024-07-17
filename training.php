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
  <title>TRAININGS</title>
</head>
<body>
  <style>
    #main-contents{
      height:fit-content;
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
          <h1>TRAININGS</h1>
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
  <div class="bunch">
    <div class="craft">
      <div class="mastery">
        <div class="the-video">
          <iframe class="video" width="1145" height="644" src="https://www.youtube.com/embed/suyuSezgdqA" title="What Is An Invoice" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        <div class="trainings">
          <h3>This training includes:</h3>
          <div class="lakes">
            <ul>
              <li>
              <i class="fa-solid fa-download"></i>  
              100% Positive Reviews</li>
              <li>
              <i class="fa-solid fa-person"></i>  
              2167 Learners</li>
              <li>
              <i class="fa-solid fa-video"></i> 
              59% Modules (9h 11m)</li>
              <li>
              <i class="fa-solid fa-file-arrow-down"></i>  
              70 downloads (70 files)</li>
              <li>
              <i class="fa-solid fa-phone"></i>
              Available from the app</li>
              <li>
              <i class="fa-brands fa-soundcloud"></i>  
              Audio: French</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="pace">
    <div class="there">
    <h2>Book Your Session</h2>
      <form action="" method="post">
      <?php
        $sql=mysqli_query($con,"SELECT id AS identification FROM `business`");
        $row=mysqli_fetch_array($sql);
        $gat=$row['identification']
        ?>
        <input type="text" name="foreignid" value="<?php echo $gat;?>">
        <label for="">SELECT YOUR REGION</label><br><br>
        <select name="u_select" id="">
          <option value=""></option>
          <option value="KIGALI">KIGALI</option>
          <option value="SOUTHERN PROVINCE">SOUTHERN PROVINCE</option>
          <option value="NORTHERN PROVINCE">NORTHERN PROVINCE</option>
          <option value="WESTERN PROVINCE">WESTERN PROVINCE</option>
          <option value="EASTERN PROVINCE">EASTERN PROVINCE</option>
        </select><br><br><br>
        <label for="">EMAIL</label><br><br>
        <input type="text" name="u_email" id="" placeholder="Enter Your Email"><br><br><br>

        <label for="">Approx how many export shipments do you process?</label><br><br>
        <div class="label">
          <input type="radio" name="u_radio" id=""><h3>1 per year</h3><br>
          </div>
          <div class="label">
          <input type="radio" name="u_radio" id=""><h3>1 per Month</h3><br>
          </div>
          <div class="label">
          <input type="radio" name="u_radio" id=""><h3>2 - 10 per Month</h3><br>
          </div>
          <div class="label">
          <input type="radio" name="u_radio" id=""><h3>10 - 50 per Month</h3><br>
          </div>
          <button type="submit" name="submit" class="btn-3" id="button-btn">SAVE CHANGES</button>
      </form>
    </div>
  </div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
<style>
  input[name="foreignid"]{
    display:none;
  }
  
  input[type="text"]{
    width:45vh;
    height:7vh;
    padding:10px 10px;
    border-radius:10px;
  }
  select{
    padding:10px 10px;
    border-radius:10px;
    width:45vh;
    height:7vh;
  }
  .there h2{
    align-items:center;
    color:#004814;
    font-size:40px;
  }
  .pace{
    display:flex;
    justify-content:left;
    margin-left:6.5rem
  }
  label{
    font-size:25px;
  }
  .label{
    display:flex;
  }
  .label h3{
    margin-left:3vh;
    font-size:27px;
  }
  .trainings{
    color:#21A747;
    font-size:30px;
  }
  .trainings ul{
    font-size:24px;
    line-height:50px;
    list-style:none;
  }
  form{
    display:block;
  }
  .mastery{
    display:flex;
    justify-content:space-between;
  }
  .lakes ul li i{
    color:#21A747;
    font-size:40px;
    margin-right:10px;
  }
  .bunch{
    display:flex;
    justify-content:center;
    align-items:center;
    max-height:155vh;
  }
  .craft{
    background:#fff;
    padding:2rem 3.5rem;
    border-radius:15px;
    width:180vh;
    height:fit-content;
  }
  .video{
    border-radius:15px;
  }
  .the-video{
    border-radius:15px;
    width:90%;
  }
  .trainings{

  }
</style>
<?php
if(isset($_POST['submit'])){
  $foreignid = $_POST['foreignid'];
  $u_select = $_POST['u_select'];
  $u_email = $_POST['u_email'];
  $u_radio = $_POST['u_radio'];
  $sql=mysqli_query($con, "INSERT INTO `trainings` VALUES ('', '$foreignid', '$u_select', '$u_email', '$u_radio')");
  
  if($sql){
    echo "<script>alert('Registered Successfully')</script>";
  }
  else{
    echo "<script>alert('failed to register')</script>";
  }
}

?>