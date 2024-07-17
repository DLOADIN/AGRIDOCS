<?php
require "connection.php";

$sql = "SELECT SUM(u_netweight) AS overall_weight FROM packaging";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(['overall_weight' => 0]); // If no rows found, return 0 as overall weight
}

$con->close();
?>