<?php
require "connection.php";

$sql = "SELECT COUNT(*) AS OrderNumbers FROM commercial";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(['OrderNumbers' => 0]); // If no rows found, return 0 as order numbers count
}

$con->close();
?>