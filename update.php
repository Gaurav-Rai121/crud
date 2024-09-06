<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
require("dbconnect.php");
$id=$_GET['id'];
$check="SELECT * FROM `user2` WHERE sno='$id'";
$querr3= mysqli_query($connect,$check);
$row=mysqli_fetch_assoc($querr3);
$name=$row['user_name'];
$email=$row['email'];
$mobile=$row['mobile'];
$skill=$row['skill'];
$gender1=$row['gender'];
$image=$row['image'];
?>
    <form action="#" method="post"  enctype="multipart/form-data">
        <p>Username: <input type="text" name="username" id=""  value=<?php echo $name ?>></p>
        <p>Email: <input type="email" name="email" id="" value=<?php echo $email ?>></p>
        <p>Mobile Number: <input type="number" name="number" id="" value=<?php echo $mobile ?>></p>
        <p>Skills: 
        <input type="radio" name="skill" id="" value="c"
        <?php
               if($skill=="c")
               {
                echo "checked";
               }
             ?>>c
        <input type="radio" name="skill" id="" value="c++"
        <?php
               if($skill=="c++")
               {
                echo "checked";
               }
             ?>
        >c++
        <input type="radio" name="skill" id="" value="java"
        <?php
               if($skill=="java")
               {
                echo "checked";
               }
             ?>>java
        </p>

        <p>Gender: <select name="gender" id="">
            <option name="gender" 
             <?php
               if($gender1=="Male")
               {
                echo "selected";
               }
             ?>>Male</option>
            <option name="gender"
            <?php
               if($gender1=="female")
               {
                echo "selected";
               }
             ?>
             >female</option>
        </select></p>

        <p>Image: <input type="file" name="image" id="" ></p>
        <input type="hidden" name="old_image" id="" value=<?php echo $image ?>></p>
        <input type="submit"  value="save">
    </form>
    <?php
require("dbconnect.php");

if($_SERVER['REQUEST_METHOD']=="POST")
{
    $id=$_REQUEST['id'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $mobile=$_POST['number'];
    $skills=$_POST['skill'];
    $gender=$_POST['gender'];
    $name=$_FILES['image']['name'];
    $tmp_name=$_FILES['image']['tmp_name'];

    $destination="upload/".$name;

   $update="UPDATE `user2` SET `user_name`='$username',`email`='$email',`mobile`='$mobile',`skill`='$skills',`gender`='$gender',`image`='$name'
    WHERE `sno`='$id'";

   $querr4=mysqli_query($connect,$update);

    
        move_uploaded_file($tmp_name,$destination);
        header("location:table.php");
    
    
}
?>
</body>
</html>