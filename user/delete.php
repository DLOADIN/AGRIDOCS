<?php
require '../connection.php';

$id = $_GET['id'];
$sql=mysqli_query($con, "DELETE FROM business WHERE id = $id");
header("location:view.php");
?>