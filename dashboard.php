<?php
require "connection.php";

// Check if user is logged in
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $check = mysqli_query($con,"SELECT * FROM `business` WHERE id=$id ");
    $row = mysqli_fetch_array($check);
} else {
    header('location:loginadmin.php');
    exit; 
}
function fetchData($con, $sql) {
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return ['value' => 0]; // Return 0 if no data found
    }
}

$sqlTotal = "SELECT SUM(u_total) AS Total FROM proforma";
$sqlOverallWeight = "SELECT SUM(u_netweight) AS overall_weight FROM packaging";
$sqlOrderNumbers = "SELECT SUM(u_ordernumber) AS OrderNumbers FROM commercial";
$sqlTotalCount = "SELECT COUNT(*) AS TotalCount FROM `certificate`";

$totalData = fetchData($con, $sqlTotal);
$overallWeightData = fetchData($con, $sqlOverallWeight);
$orderNumbersData = fetchData($con, $sqlOrderNumbers);
$totalCountData = fetchData($con, $sqlTotalCount);

$totalPercentage = ($totalData['Total'] > 0) ? round(($totalData['Total'] / $totalData['Total']) * 100, 2) : 0;
$overallWeightPercentage = ($overallWeightData['overall_weight'] > 0) ? round(($overallWeightData['overall_weight'] / $totalData['Total']) * 100, 2) : 0;
$orderNumbersPercentage = ($orderNumbersData['OrderNumbers'] > 0) ? round(($orderNumbersData['OrderNumbers'] / $totalCountData['TotalCount']) * 100, 2) : 0;

$totalCountPercentage = ($totalCountData['TotalCount'] > 0) ? round(($totalCountData['TotalCount'] / $totalCountData['TotalCount']) * 100, 2) : 0;

?>
<!DOCTYPE html>
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
    <title>DASHBOARD</title>
    <style>
        #main-contents {
            height: fit-content;
        }
        .caradan-products {
            text-decoration: none;
        }
        .acanvas {
            border-radius: 15px;
            background-color: white;
            height: 40vh;
            width: 38vh;
            margin: 0rem 2rem;
            box-shadow: 0 0 1rem rgb(0, 0, 0);
        }

        #myBarChart {
            width: 100px;
            height: 100px;
        }

        .acanvas canvas {
            margin-left: 2rem;
        }
        .tye-wrapper h2 {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 30px;
            font-weight: bolder;
            color: #151816;
        }
        .tye {
            margin: 0 auto;
            display: flex;
            justify-content: center;
        }
        .urk-urk {
            margin: .5rem .5rem;
            filter: drop-shadow(0 0 .1rem rgb(#fff, 0, 0));
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 1rem;
        }
        .acanvas{
            text-align:center;
            font-size:30px
          }
    </style>
</head>
<body>
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
                    <h1>DASHBOARD</h1>
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
                    <button name="submit" type="submit" class="btn-3">
                        <a href="logout.php">LOGOUT</a>
                    </button>
                </div>       
            </div>
    
            <div class="tye-wrapper">
                <h2>Hi <?php echo $row['u_name']; ?>, Here's what is recorded overall <br> from the information you provided</h2>
                <div class="tye">
                    <div class="urk-urk">
                        <div class="acanvas" id="first-one">
                          <h4><?php echo $totalData['Total']?> ORDERS</h4>
                            <canvas id="children">
                            </canvas>
                        </div>
                        <div class="acanvas" id="first-two">
                        <h4><?php echo $overallWeightData['overall_weight']?> KGS</h4>
                            <canvas id="stongone"></canvas>
                        </div>
                        <div class="acanvas" id="first-three">
                        <h4><?php echo $orderNumbersData['OrderNumbers']?>%</h4>
                            <canvas id="acquisitions"></canvas>
                        </div>
                        <div class="acanvas" id="first-four">
                        <h4><?php echo $totalCountData['TotalCount']?>%</h4>
                            <canvas id="beatit"></canvas>
                        </div>
                    </div>
                </div>
            </div><div class="fired-ty">
            <div class="klay">
            <canvas id="myBarChart"></canvas>
            </div>
        </div>
        </div>
        <style>
            .fired-ty{
                margin:3rem 0rem;
            }
            .klay{
                width: 170vh;
                height: 70vh;
                display:flex;
                justify-content:center;
                margin:0 auto;
                box-shadow: 0 0 1rem rgb(0, 0, 0);
                border-radius:20px
            }
        </style>
        
<script src="./charts/app.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const ctx1 = document.getElementById('children').getContext('2d');
    const ctx2 = document.getElementById('stongone').getContext('2d');
    const ctx3 = document.getElementById('acquisitions').getContext('2d');
    const ctx4 = document.getElementById('beatit').getContext('2d');

    const orderNumbersData = {
        labels: ['Order Numbers'],
        datasets: [{
            data: [<?php echo $orderNumbersPercentage; ?>, 100 - <?php echo $orderNumbersPercentage; ?>],
            backgroundColor: ['#2ECC71', '#D0D3D4'],
            hoverBackgroundColor: ['#27AE60', '#BFC9CA']
        }]
    };

    const overallWeightData = {
        labels: ['Overall Weight'],
        datasets: [{
            data: [<?php echo $overallWeightPercentage; ?>, 100 - <?php echo $overallWeightPercentage; ?>],
            backgroundColor: ['#2ECC71', '#D0D3D4'],
            hoverBackgroundColor: ['#27AE60', '#BFC9CA']
        }]
    };

    const totalData = {
        labels: ['TOTAL'],
        datasets: [{
            data: [<?php echo $totalPercentage; ?>, 100 - <?php echo $totalPercentage; ?>],
            backgroundColor: ['#2ECC71', '#D0D3D4'],
            hoverBackgroundColor: ['#27AE60', '#BFC9CA']
        }]
    };

    const totalCountData = {
        labels: ['TOTAL COUNT'],
        datasets: [{
            data: [<?php echo $totalCountPercentage; ?>, 100 - <?php echo $totalCountPercentage; ?>],
            backgroundColor: ['#2ECC71', '#D0D3D4'],
            hoverBackgroundColor: ['#27AE60', '#BFC9CA']
        }]
    };

    // Options for all charts
    const options = {
        responsive: true,
        plugins: {
            tooltip: {
                enabled: false
            },
            legend: {
                display: false
            },
            title: {
                display: true,
                text: (ctx) => {
                    if (ctx.chart.canvas.id === 'children') {
                        return 'Order Numbers';
                    } else if (ctx.chart.canvas.id === 'stongone') {
                        return 'Overall Weight';
                    } else if (ctx.chart.canvas.id === 'acquisitions') {
                        return 'TOTAL';
                    } else if (ctx.chart.canvas.id === 'beatit') {
                        return 'TOTAL COUNT';
                    }
                }
            },
            datalabels: {
                formatter: (value, ctx) => {
                    return ctx.chart.data.labels[0] + '\n' + value + '%'; // Display label and value with %
                },
                color: 'black', // Label text color
                anchor: 'end',
                align: 'start',
                offset: 5,
                font: {
                    weight: 'bold'
                }
            }
        },
    };

    new Chart(ctx1, {
        type: 'doughnut',
        data: orderNumbersData,
        options: options
    });

    new Chart(ctx2, {
        type: 'doughnut',
        data: overallWeightData,
        options: options
    });

    new Chart(ctx3, {
        type: 'doughnut',
        data: totalData,
        options: options
    });

    new Chart(ctx4, {
        type: 'doughnut',
        data: totalCountData,
        options: options
    });
});
</script>

</body>
</html>
