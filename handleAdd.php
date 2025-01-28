<?php

require("dbconnect.php");

if($_SERVER['REQUEST_METHOD']=="POST")
{
    $username=$_POST['username'];
    $email=$_POST['email'];
    $mobile=$_POST['number'];
    $skills=$_POST['skill'];
    $gender=$_POST['gender'];

    $name=$_FILES['image']['name'];
    $tmp_name=$_FILES['image']['tmp_name'];

    $destination="upload/".$name;




   

    $check="SELECT * FROM `user2` WHERE user_name='$username'";
    $querr= mysqli_query($connect,$check);

    $row= mysqli_num_rows($querr);
    if($row>0)
    {
        header("location:error.php");
    }

    else{
        $insert="INSERT INTO `user2`(`user_name`, `email`, `mobile`, `skill`, `gender`, `image`) 
                  VALUES ('$username','$email','$mobile','$skills','$gender','$name')";
        $querr2= mysqli_query($connect,$insert); 
        move_uploaded_file($tmp_name,$destination);
        header("location:table.php");
    }
    
}







?>