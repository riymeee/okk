<?php
include 'config.php';
session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['email'])) {
    echo "Vous devez être connecté pour commenter.";
    exit();
}

// Récupérez les informations de l'utilisateur
$email = $_SESSION['email'];
$user_query = "SELECT id_user, name FROM user WHERE email = '$email'";
$user_result = mysqli_query($conn, $user_query);
$user = mysqli_fetch_assoc($user_result);

// Traitez le formulaire de commentaire
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comment_submit'])) {
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];
    $id_user = $user['id_user'];

    $sql = "INSERT INTO commentaire (rating, comment, id_user) VALUES ('$rating', '$comment', '$id_user')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Commentaire ajouté avec succès";
    } else {
        echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Récupérez les commentaires
$sql = "SELECT c.comment, c.rating, u.name FROM commentaire c JOIN user u ON c.id_user = u.id_user";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Reviews</title>
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
            margin: 0;
            padding: 0;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: var(--white);
            padding: 15px 20px;
            color: black;
            box-shadow: var(--box-shadow);
        }

        .header .logo {
            font-size: 1.5rem;
            font-weight: bolder;
            color: var(--black);
        }
        .header .logo span {
            color: var(--main-color);
        }

        .navbar {
            display: flex;
            z-index: 1000;
        }

        .navbar a {
            font-size:1.2rem;
            color: black;
            text-decoration: none;
            margin: 0 15px;
        }

        .navbar a:hover {
            color: var(--main-color);
        }

        .navbar-user {
            display: flex;
            align-items: center;
        }

        .navbar-user a {
            font-size: 1.5rem;
            color: black;
            text-decoration: none;
            margin: 0 15px;
            display: flex;
            align-items: center;
        }
        .navbar-user a:hover {
            color: var(--main-color);
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

        .form-container, .comments-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            width: 100%;
            margin: 20px 0;
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
            background-color: #0088be;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
        }

        .btn:hover {
            background-color: #005f8b;
        }

        .stars {
            display: flex;
            align-items: center;
            margin: 10px 0;
        }

        .stars input {
            display: none;
        }

        .stars label {
            font-size: 1.3rem;
            color: #ccc;
            cursor: pointer;
        }

        .stars input:checked ~ label,
        .stars input:hover ~ label,
        .stars label:hover ~ label {
            color: #f5b301;
        }

        .comment {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .comment h4 {
            margin: 0 0 10px 0;
        }

        .comment p {
            margin: 5px 0;
        }
        #menu-btn {
        font-size: 2.5rem;
        cursor: pointer;
        color: var(--black);
        display: none;
        }
        @media (max-width: 1200px) {
  section {
    padding: 3rem 5%;
  }
}
@media (max-width: 991px) {
  html {
    font-size: 55%;
  }
  section {
    padding: 3rem 2rem;
  }
}

@media (max-width: 768px) {
  #menu-btn {
    display: inline-block;
    transition: 0.3s linear;
  }
  #menu-btn.fa-times {
    transform: rotate(180deg);
  }

  .header .navbar {
    position: absolute;
    top: 99%;
    left: 0;
    right: 0;
    background: var(--white);
    padding: 2rem;
    border-top: var(--border);
    transition: 0.2s linear;
    clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
  }

  .header .navbar.active {
    clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
  }

  .header .navbar a {
    display: block;
    text-align: center;
    margin: 2rem;
  }
}

@media (max-width: 450px) {
  html {
    font-size: 50%;
  }
  .heading-title {
    font-size: 3.5rem;
  }
}

    </style>
</head>
<body>
    <section class="header">
        <a href="" class="logo"><span>Lamo</span> Agency</a>

        <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="about.php">About</a>
          
            <a href="book.php">Book</a>
            <a href="review.php">Review</a>
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>

        <div class="navbar-user">
            <a href="#">Welcome, <?php echo htmlspecialchars($user['name']); ?></a>
            <a href="logout.php">Logout <i class="fas fa-sign-out-alt"></i></a>
        </div>
    </section>

    <div class="container">
        <div class="form-container">
            <form action="" method="post">
                <h3>Add a Comment</h3>
                <div class="stars">
                    <input type="radio" name="rating" id="star1" value="5" required><label for="star1"><i class="fas fa-star"></i></label>
                    <input type="radio" name="rating" id="star2" value="4" required><label for="star2"><i class="fas fa-star"></i></label>
                    <input type="radio" name="rating" id="star3" value="3" required><label for="star3"><i class="fas fa-star"></i></label>
                    <input type="radio" name="rating" id="star4" value="2" required><label for="star4"><i class="fas fa-star"></i></label>
                    <input type="radio" name="rating" id="star5" value="1" required><label for="star5"><i class="fas fa-star"></i></label>
                </div>
                <textarea name="comment" placeholder="Enter your comment" required class="box"></textarea>
                <input type="submit" name="comment_submit" value="Post the comment" class="btn">
            </form>
        </div>

        <div class="comments-container">
            <h3>Comments</h3>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='comment'>";
                    echo "<h4>" . htmlspecialchars($row['name']) . "</h4>";
                    echo "<p>Note: ";
                    for ($i = 0; $i < 5; $i++) {
                        if ($i < $row['rating']) {
                            echo "<i class='fas fa-star' style='color: #f5b301;'></i>";
                        } else {
                            echo "<i class='fas fa-star' style='color: #ccc;'></i>";
                        }
                    }
                    echo "</p>";
                    echo "<p>Comment: " . htmlspecialchars($row['comment']) . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No Comments yet.</p>";
            }
            ?>
        </div>
    </div>




    <script src="script.js"></script>


</body>
</html>


<?php
// Fermez la connexion à la base de données
mysqli_close($conn);
?>
