<html>
<head>
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f3;
            padding: 30px;
        }

        .form-container {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        input[type="text"], input[type="email"], input[type="password"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus {
            border-color: #007BFF;
            outline: none;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .success {
            color: green;
            text-align: center;
            font-size: 16px;
        }

        .error ul {
            list-style: none;
            padding: 0;
        }

        .error ul li {
            padding: 5px 0;
        }

        input::placeholder {
            color: #aaa;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Registration Form</h2>

        <form method="post">
            <input type="text" name="name" placeholder="Enter your name" required>
            <input type="email" name="email" placeholder="Enter your email" required>
            <input type="text" name="phone" placeholder="Enter your mobile number" required>
            <input type="password" name="password" placeholder="Enter your password" required>
            <input type="password" name="confirm_password" placeholder="Confirm your password" required>
            <input type="submit" name="submit" value="Register">
        </form>

        <?php
        if (isset($_POST['submit'])) {
           
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

           
            $errors = [];

            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $errors[] = "Name can only contain letters and spaces.";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email format.";
            }
            if (!preg_match("/^[0-9]{10}$/", $phone)) {
                $errors[] = "Mobile number must be 10 digits.";
            }
            if (strlen($password) < 6) {
                $errors[] = "Password must be at least 6 characters.";
            }
            if ($password !== $confirm_password) {
                $errors[] = "Passwords do not match.";
            }

           
            if (empty($errors)) {
                echo "<p class='success'>Registration successful!</p>";
            } else {
                echo "<div class='error'><ul>";
                foreach ($errors as $error) {
                    echo "<li>$error</li>";
                }
                echo "</ul></div>";
            }
        }
        ?>
    </div>

</body>
</html>

