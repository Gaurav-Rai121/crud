<?php
 include('./dbconnect.php');
if($_SERVER['REQUEST_METHOD']=="POST")
{
   
    $username=$_POST['username'];
    $email=$_POST['email'];
    $mobile=$_POST['number'];
    $skills=$_POST['skill'];
    $gender=$_POST['gender'];
    $interest=$_POST['interests'];
    $convertInterset=implode(',',$interest);
    $name=$_FILES['image']['name'];
    $tmp_name=$_FILES['image']['tmp_name'];
    $password=$_POST['password'];
    $con_pass=$_POST['confirm_password'];
    $upload='upload/'.$name;

    $anyemail="SELECT * FROM `user2` WHERE `email`='$email'";
    $querry1=mysqli_query($mycoonnect,$anyemail);
    $anyrow=mysqli_num_rows($querry1);

    if($anyrow>0)
    {
        $error='email is already is in used';
        header('location:login.php?error='.$error.'');
    }
    else{
       
        if($password==$con_pass){
            $hashpass= password_hash($password,PASSWORD_DEFAULT);
            $insert="INSERT INTO `user2`( `user_name`, `email`, `mobile`, `skill`, `gender`, `interest`, `password`, `image`) 
            VALUES ('$username','$email','$mobile','$skills','$gender','$convertInterset','$hashpass','$name')";

            $querry2=mysqli_query($mycoonnect,$insert);

            if($querry2)
            {
                move_uploaded_file($tmp_name,$upload);
                header('location:login.php');
            }

            else{
                $error='image is not uploaded';
                header("location:login.php?error='.$error.'");
            }

        }
        else{
            $error='Password not matched';
            header("location:login.php?error='.$error.'");
        }
    }

    
}

else{
    header('location:signup.php');
}


?>