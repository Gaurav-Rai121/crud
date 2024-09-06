<?php
$server="localhost";
$user="root";
$password="";
$database="mydatab";


$connect=mysqli_connect($server,$user,$password,$database);

if($connect)
{
    echo "server is connected";
}





?>