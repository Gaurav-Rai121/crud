<?php
 include('./dbconnect.php');
 session_start();
 $userId=$_SESSION['sno'];
if($_SERVER['REQUEST_METHOD']=="POST")
{
   
    $username=$_POST['username'];
    $email=$_POST['email'];
    $mobile=$_POST['number'];
    $skills=$_POST['skill'];
    $gender=$_POST['gender'];
    $interest=$_POST['interests'];
    $convertInterset=implode(',',$interest);

    $update="UPDATE `user2` SET `user_name`='$username',`email`='$email',`mobile`='$mobile',`skill`='$skills',`gender`='$gender',`interest`='$convertInterset' WHERE `sno`='$userId'";

    $querry1=mysqli_query($mycoonnect,$update);
    if($querry1){
        header('location:home.php');
    }




       

    
}

else{
   
    $error='Something went wrong try again later';
    header('location:edit.php?error='.$error.'');
}


?>