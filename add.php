<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="handleAdd.php" method="post"  enctype="multipart/form-data">
        <p>Username: <input type="text" name="username" id=""></p>
        <p>Email: <input type="email" name="email" id=""></p>
        <p>Mobile Number: <input type="number" name="number" id=""></p>
        <p>Skills: <input type="radio" name="skill" id="" value="c">c
        <input type="radio" name="skill" id="" value="c++">c++
        <input type="radio" name="skill" id="" value="java">java
        </p>

        <p>Gender: <select name="gender" id="">
            <option name="gender">Male</option>
            <option name="gender">female</option>
        </select></p>

        <p>Image: <input type="file" name="image" id=""></p>
        <input type="submit"  value="save">
    </form>
</body>
</html>