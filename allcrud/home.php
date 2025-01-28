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
  <title>Profile Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

  <!-- Profile Container -->
  <div class="max-w-4xl mx-auto my-10 p-6 bg-white shadow-lg rounded-lg">
    <!-- Profile Header -->
    <div class="flex items-center justify-between mb-6">
      <h2 class="text-2xl font-semibold text-gray-700">Profile Page</h2>
      <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
        <a href="./logout.php">logout</a>
      </button>
    </div>

    <!-- Profile Information -->
    <div class="flex flex-col lg:flex-row lg:items-center gap-6">
      <!-- Profile Image -->
      <div class="flex-shrink-0">
        <img src="upload/<?php echo $row['image'];  ?>" alt="Profile Image" class="w-32 h-32 rounded-full border-4 border-gray-300 object-cover">
      </div>
      <!-- Profile Details -->
      <div class="flex-1">
        <p class="text-lg font-medium">
          <span class="text-gray-600">Name:</span> <span id="username"><?php echo $row['user_name'];  ?></span>
        </p>
        <p class="text-lg font-medium">
          <span class="text-gray-600">Email:</span> <span id="email"><?php echo $row['email'];  ?></span>
        </p>
        <p class="text-lg font-medium">
          <span class="text-gray-600">Mobile:</span> <span id="mobile"><?php echo $row['mobile'];  ?></span>
        </p>
        <p class="text-lg font-medium">
          <span class="text-gray-600">Gender:</span> <span id="gender"><?php echo $row['gender'];  ?></span>
        </p>
        <p class="text-lg font-medium">
          <span class="text-gray-600">Skills:</span> <span id="skills"><?php echo $row['skill'];  ?></span>
        </p>
        <p class="text-lg font-medium">
          <span class="text-gray-600">Interests:</span> <span id="interests"><?php echo $row['interest'];  ?></span>
        </p>
      </div>
    </div>

    <!-- Action Buttons -->
    <div class="mt-6 flex justify-end gap-4">
      <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
       <a href="./edit.php"> Edit Profile</a>
      </button>
     <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
        <a href="./delete.php"> Delete Account</a>
      </button>
    </div>
  </div>

</body>
</html>
