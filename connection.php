<?php
session_start();
$con=mysqli_connect('localhost','root','','agridocs');

if(!$con){
  die(mysqli_error($con));
}
?>
