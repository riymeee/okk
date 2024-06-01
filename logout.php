<?php
session_start();
session_destroy();
header('Location: login.php');
exit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <!-- Inclure Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 0;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #0088be;
            padding: 15px 20px;
            color: white;
        }

        .header .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .navbar {
            display: flex;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
        }

        .navbar a:hover {
            text-decoration: underline;
        }

        .navbar-user {
            display: flex;
            align-items: center;
        }

        .navbar-user a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
            font-weight: bold;
            display: flex;
            align-items: center;
        }

        .navbar-user a i {
            margin-left: 5px;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .message-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            width: 100%;
            margin: 20px 0;
            text-align: center;
        }

        h3 {
            margin-bottom: 20px;
            color: #004aad;
        }
    </style>
</head>
<body>
    <section class="header">
        <a href="#" class="logo"><span>Lamo</span> Agency</a>

        <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="about.php">About</a>
            <a href="offres.php">Offres</a>
            <a href="book.php">Book</a>
            <a href="review.php">Review</a>
        </nav>
    </section>

    <div class="container">
        <div class="message-container">
            <h3>Vous avez été déconnecté avec succès.</h3>
            <p>Vous serez redirigé vers la page de connexion.</p>
        </div>
    </div>
</body>
</html>
