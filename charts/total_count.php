<?php
require "connection.php";

$sql = "SELECT COUNT(*) AS TotalCount FROM `certificate`";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(['TotalCount' => 0]); // If no rows found, return 0 as total count
}

$con->close();
?>