<?php
include 'config.php';
session_start(); // Start the session to manage user login state
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $email = mysqli_real_escape_string($conn, $email);
    $user_query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $user_result = mysqli_query($conn, $user_query);
    $admin_query = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
    $admin_result = mysqli_query($conn, $admin_query);

    if ($user_result && mysqli_num_rows($user_result) > 0) {
        $row = mysqli_fetch_assoc($user_result);
        $_SESSION['email'] = $row['email'];
        $_SESSION['user_type'] = 'user';
        header("Location: home.php"); // Redirect to user page
        exit();
    } elseif ($admin_result && mysqli_num_rows($admin_result) > 0) {
        $row = mysqli_fetch_assoc($admin_result);
        $_SESSION['email'] = $row['email'];
        $_SESSION['user_type'] = 'admin';
        header("Location: admin/index.php"); // Redirect to admin page
        exit();
    } else {
        echo "<div class='message'>User not found or incorrect password</div>";
    }
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <style>
        :root {
            --main-color: #0088be;
            --black: #222;
            --white: #fff;
            --light-black: #777;
            --light-white: #fff9;
            --dark-bg: rgba(0, 0, 0, 0.7);
            --light-bg: #eee;
            --border: 0.1rem solid var(--black);
            --box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            --text-shadow: 0 1.5rem 3rem rgba(0, 0, 0, 0.3);
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* Light blue background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        h3 {
            margin-bottom: 20px;
            color: #004aad; /* Dark blue color */
        }

        .box {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .btn {
            background-color: var(--main-color); /* Green color */
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
        }

        .btn:hover {
            background-color: var(--black); /* Darker color on hover */
        }

        a {
            color: #004aad; /* Dark blue color */
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .message {
            background-color: #ffdddd; /* Light red background */
            color: #d8000c; /* Dark red text */
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #d8000c;
            border-radius: 5px;
            position: relative;
        }

        .message i {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
    </style>

</head>

<body>

    <div class="form-container">

        <form action="" method="post">
            <h3>Login Now</h3>
            <input type="email" name="email" placeholder="Enter your email" required class="box">
            <input type="password" name="password" placeholder="Enter your password" required class="box">
            <input type="submit" name="submit" value="Login Now" class="btn">
            <p>Don't have an account? <a href="sinup.php">Register Now</a></p>
        </form>

    </div>

</body>

</html>
