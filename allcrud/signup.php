<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
        <h2>Sign Up</h2>
        <form action="handlesignup.php" method="post" enctype="multipart/form-data">
            <!-- Username Field -->
            <p>Username: <input type="text" name="username" required></p>
            
            <!-- Email Field -->
            <p>Email: <input type="email" name="email" required></p>
            
            <!-- Mobile Number Field -->
            <p class="gridTwo">Mobile Number: <input type="number" name="number" required></p>
            <p class="gridTwo">Gender:
                <select name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </p>

            <!-- Skills Radio Buttons -->
            <p class="radio-group">Skills:
                <input type="radio" name="skill" value="c" required> C
                <input type="radio" name="skill" value="c++" required> C++
                <input type="radio" name="skill" value="java" required> Java
            </p>

            


            <!-- Image Upload Field -->
            <p>Image: <input type="file" name="image" accept="image/*" required></p>

            <!-- Interests Checkbox -->
            <p class="checkbox-group">Interests:
                <input type="checkbox" name="interests[]" value="coding"> Coding
                <input type="checkbox" name="interests[]" value="design"> Design
                <input type="checkbox" name="interests[]" value="marketing"> Marketing
            </p>

            <!-- Password Field -->
            <p>Password: <input type="password" name="password" required></p>

            <!-- Confirm Password Field -->
            <p>Confirm Password: <input type="password" name="confirm_password" required></p>

            <!-- Submit Button -->
            <input type="submit" value="Save">
        </form>
    </div>
</body>
</html>
