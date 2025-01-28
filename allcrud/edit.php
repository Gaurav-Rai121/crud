<?php
session_start();
$userLogin=$_SESSION['loggedIn'];
if(!$userLogin)
{
   header('location:login.php');
}

include('./dbconnect.php');
$userId=$_SESSION['sno'];
$userDetails="SELECT * FROM `user2` WHERE `sno`='$userId'";
$querry1=mysqli_query($mycoonnect,$userDetails);
$row=mysqli_fetch_assoc($querry1);








?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 60%;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            overflow: hidden; /* Prevents the form from overflowing */
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        form p {
            margin-bottom: 10px;
            display: flex;
            flex-direction: column;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="password"],
        input[type="file"],
        select {
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
            width: 100%;
            box-sizing: border-box;
            height: 35px; /* Sets a consistent height for inputs */
        }

        .radio-group,
        .checkbox-group,.gridTwo {
            grid-column: span 2; /* Spans across both columns */
        }

        input[type="radio"],
        input[type="checkbox"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            grid-column: span 2; /* To span across two columns */
            margin-top: 20px;
            height: 40px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Optional: To handle responsiveness on small screens */
        @media (max-width: 768px) {
            form {
                grid-template-columns: 1fr;
            }

            .container {
                width: 90%;
            }

            input[type="submit"] {
                grid-column: span 1;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Page</h2>
        <form action="handleedit.php" method="post" enctype="multipart/form-data">
            <!-- Username Field -->
            <p>Username: <input type="text" name="username" value=<?php echo $row['user_name'];  ?> required></p>
            
            <!-- Email Field -->
            <p>Email: <input type="email" name="email" value=<?php echo $row['email'];  ?> required></p>
            
            <!-- Mobile Number Field -->
            <p class="gridTwo">Mobile Number: <input type="number" name="number" value=<?php echo $row['mobile'];  ?> required></p>
            <p class="gridTwo">Gender:
                <select name="gender" required>
                    <option value="male"
                    <?php 
                    if($row['gender']=='male'){
                        echo'selected';
                    }   ?>
                    >Male</option>
                    <option value="female"
                    <?php 
                    if($row['gender']=='female'){
                        echo'selected';
                    }   ?>>Female</option>
                </select>
            </p>

            <!-- Skills Radio Buttons -->
            <p class="radio-group">Skills:
                <input type="radio" name="skill" value="c" 
                <?php 
                    if($row['skill']=='c'){
                        echo'checked';
                    }   ?>
                required> C
                <input type="radio" name="skill" value="c++" required
                <?php 
                    if($row['skill']=='c++'){
                        echo'checked';
                    }   ?>> C++
                <input type="radio"
                <?php 
                    if($row['skill']=='java'){
                        echo'checked';
                    }   ?> name="skill" value="java" required> Java
            </p>

            <!-- Interests Checkbox -->
            <p class="checkbox-group">Interests:
                <input type="checkbox" name="interests[]" value="coding"
                <?php 
                    $values=explode(',',$row['interest']);
                    if(in_array('coding',$values)){
                        echo'checked';
                    }   ?>> Coding
                <input type="checkbox" name="interests[]" value="design"
                <?php 
                    $values=explode(',',$row['interest']);
                    if(in_array('design',$values)){
                        echo'checked';
                    }   ?>> Design
                <input type="checkbox" name="interests[]" value="marketing"
                <?php 
                    $values=explode(',',$row['interest']);
                    if(in_array('marketing',$values)){
                        echo'checked';
                    }   ?>> Marketing
            </p>

   

            <!-- Submit Button -->
            <input type="submit" value="Edit">
        </form>
    </div>
</body>
</html>
