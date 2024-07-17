<?php
require "connection.php";

$sql = "SELECT SUM(u_total) AS Total FROM proforma";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(['Total' => 0]); 
}

$con->close();
?>