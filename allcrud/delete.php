<?php
session_start();
include('./dbconnect.php');
$userId=$_SESSION['sno'];
$userDetails="DELETE FROM `user2` WHERE `sno`='$userId'";
$querry1=mysqli_query($mycoonnect,$userDetails);
header('location:login.php');






?>