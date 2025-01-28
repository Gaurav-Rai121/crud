<?php 

$server='localhost';
$username='root';
$password='';
$database='mydatab';

$mycoonnect=mysqli_connect($server,$username,$password,$database);

if($mycoonnect)
{
    //echo'db is connecetd';
}
else{
    die('db is not connecetd');
}


?>