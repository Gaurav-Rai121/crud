<?php
 include('./dbconnect.php');
if($_SERVER['REQUEST_METHOD']=="POST")
{
   
    $email=$_POST['email'];
    $password=$_POST['password'];
   
  

    $anyemail="SELECT * FROM `user2` WHERE `email`='$email'";
    $querry1=mysqli_query($mycoonnect,$anyemail);
    $anyrow=mysqli_num_rows($querry1);

    if($anyrow==1)
    {
        $userDetails=mysqli_fetch_assoc($querry1);
        $userpass=$userDetails['password'];
        if(password_verify($password,$userpass)){
            session_start();
            $_SESSION['sno']=$userDetails['sno'];
            $_SESSION['loggedIn']=true;
            $_SESSION['username']=$userDetails['username'];

            header('location:home.php');
        }
    }
    else{
       
        $error='No account with this email';
        header("location:login.php?error='.$error.'");
    }

    
}

else{
    header('location:login.php');
}


?>  