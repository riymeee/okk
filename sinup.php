<?php
include 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);
    if ($password != $cpassword) {
        echo "Passwords do not match";
        exit; // Exit script
    }
    if ($user_type == 'admin') {
        $table_name = 'admin';
    } elseif ($user_type == 'user') {
        $table_name = 'user';
    } else {
        echo "Invalid user type";
        exit; // Exit script
    }
    $sql = "INSERT INTO $table_name (name, email, password) VALUES ('$name', '$email', '$password')";
    if (mysqli_query($conn, $sql)) {
        if ($user_type == 'admin') {
            header("Location: admin/index.php");
        } else {
            header("Location: login.php");
        }
        exit; // Exit script to ensure redirection
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
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
            background-color: #f0f8ff;
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
            color: #004aad;
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
            background-color: var(--main-color);
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
        }
        .btn:hover {
            background-color: var(--black);
        }
        a {
            color: #004aad;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .message {
            background-color: #ffdddd;
            color: #d8000c;
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
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin-left: 10px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <?php
    if(isset($message)){
        foreach($message as $message){
            echo '
            <div class="message">
                <span>'.$message.'</span>
                <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
            </div>
            ';
        }
    }
    ?>
    <div class="form-container">
        <form action="" method="post">
            <h3>Register Now</h3>
            <input type="text" name="name" placeholder="Enter your name" required class="box">
            <input type="email" name="email" placeholder="Enter your email" required class="box">
            <input type="password" name="password" placeholder="Enter your password" required class="box">
            <input type="password" name="cpassword" placeholder="Confirm your password" required class="box">
            <select name="user_type" class="box">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <input type="submit" name="submit" value="Register Now" class="btn">
            <p>Already have an account? <a href="login.php">Login now</a></p>
        </form>
    </div>
</body>

</html>
