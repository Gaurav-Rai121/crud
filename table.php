<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-dark">
    <div class="container my-5">
    <a href="add.php"><button type="button" class="btn btn-primary">Add user</button></a>

    <table class="table table-dark table-striped my-2 ">
        <tr>
            <th>sno</th>
            <th>username</th>
            <th>email</th>
            <th>Gender</th>
            <th>mobile no</th>
            <th>Skill</th>
            <th>Image</th>
            <th>operations</th>
        </tr>
    

        <?php
        
        include("dbconnect.php");
        $select="SELECT * FROM `user2`"; 
        $conn=mysqli_query($connect,$select);

        while($row=mysqli_fetch_assoc($conn))
        {
            echo '
             <tr>
                 <td>'.$row['sno'].'</td>
                  <td>'.$row['user_name'].'</td>
                  <td>'.$row['email'].'</td>
                  <td>'.$row['gender'].'</td>
                  <td>'.$row['mobile'].'</td>
                  <td>'.$row['skill'].'</td>
                  <td><img width="100px" src="upload/'.$row['image'].' "></td>
                  <td> 
                     <a href="delete.php?id='.$row['sno'].'"><button type="button" class="btn btn-primary">Delete</button></a>
                     <a href="update.php?id='.$row['sno'].'"<button type="button" class="btn btn-secondary">Update</button></a>
                </tr>

            ';
        }
        
       
        
        
        
        
        
        
        
        
        
        ?>


</table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>