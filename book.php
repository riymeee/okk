<?php 
// Database connection
include('config.php');

// Vérifier si l'offre est sélectionnée
if(isset($_GET['offer_id'])) {
    // Récupérer l'ID de l'offre depuis l'URL
    $offer_id = $_GET['offer_id'];

    // Requête SQL pour obtenir les détails de l'offre sélectionnée
    $query_offer = "SELECT * FROM offres_tour WHERE id = $offer_id";
    $result_offer = mysqli_query($conn, $query_offer);

    // Vérifier si l'offre existe
    if(mysqli_num_rows($result_offer) > 0) {
        $offer = mysqli_fetch_assoc($result_offer);
    } else {
        echo "<script>alert('Offer not found');</script>";
        header("Location:../book.php");
        exit();
    }
} else {
    echo "<script>alert('Offer ID not provided');</script>";
    header("Location: book.php");
    exit();
}

// Enregistrer les données du formulaire de réservation
if(isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $person = $_POST['person'];
  

    // Insertion des données dans la table "book"
    $ok = "INSERT INTO book (name, email, phone, address, person, offers_id) VALUES ('$name', '$email', '$phone', '$address', '$person', '$offer_id')";



    if(mysqli_query($conn, $ok)) {
        echo "<script>alert('Booking successful!');</script>";
    } else {
        echo "Error: " . $ok . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
    <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="book.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap");
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
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Raleway", sans-serif;
  text-decoration: none;
  outline: none;
  border: none;
  text-transform: capitalize;
  transition: all 0.2s linear;
}
a {
  text-decoration: 0;
}
html {
  font-size: 65%;
  overflow-x: hidden;
  scroll-behavior: smooth;
}
html::-webkit-scrollbar {
  width: 1rem;
}
html::-webkit-scrollbar-track {
  background: var(--white);
}
html::-webkit-scrollbar-thumb {
  background: var(--main-color);
}

body{
  background-color: var(--white);
}

section {
  padding: 2rem 9%;
}
.heading{
  font-size: 4rem;
  color: var(--black);
  text-align: center;
  text-transform: uppercase;
  font-weight: bolder;
  margin-bottom: 3rem;
}

.btn {
  display: inline-block;
  background: var(--main-color);
  margin-top: 1rem;
  color: var(--white);
  font-size: 1.7rem;
  padding: 1rem 3rem;
  cursor: pointer;
  font-size: 1.7rem;
}
.btn:hover {
  background: var(--black);
  color: var(--main-color);
}
.heading-title {
  text-align: center;
  margin-bottom: 3rem;
  font-size: 6rem;
  text-transform: uppercase;
  color: var(--black);
}

 .heading{
    font-size: 3rem;
    
    color: var(--white);
    text-align: center;
    text-transform: uppercase;
    font-weight: bolder;
    margin-bottom: 3rem;
    background: url(./random.jpg)no-repeat ;
    background-size: cover;
    background-position: center;
    padding: 18rem;
   }
 
.header .logo {
  font-size: 2.5rem;
  font-weight: bolder;
  color: var(--black);
  text-transform: uppercase;
}
.header .logo span {
  color: var(--main-color);
}

.header .navbar {
  z-index: 1000;
}

.header .navbar a {
  font-size: 2rem;
  margin-left: 2rem;
  color: var(--black);
}
.header .navbar a:hover {
  color: var(--main-color);
}
#menu-btn {
  font-size: 2.5rem;
  cursor: pointer;
  color: var(--black);
  display: none;
}
  .booking .book_form{
    padding:2rem;
    background: var(--light-bg);
  }
  .booking .book_form .flex{
    display: flex;
    flex-wrap: wrap;
    gap: 2rem;
  }
  .booking .book_form .flex .inputBox{
    flex: 1 1 41rem;
  }

  .booking .book_form .flex .inputBox input{
    width: 100%;
    padding: 1.2rem 1.4rem;
    font-size: 1.6rem;
    color: var(--light-black);
    text-transform: none;
    margin-top: 1.5rem;
    border: var(--border);
  }
  .booking .book_form .flex .inputBox input:focus{
    background: var(--black);
    color: var(--white);
  }
  .booking .book_form .flex .inputBox input:focus::placeholder{
    color: var(--light-white);
  }
  .booking .book_form .flex .inputBox span{
    font-size: 2rem;
    color: var(--black);
  }
  .booking .book_form .flex .inputBox .input{
    width: 100%;
    padding: 1.2rem 1.4rem;
    font-size: 1.6rem;
    color: var(--black);
    text-transform: none;
    margin-top: 1.5rem;
    border: var(--border);
  }
  .booking .book_form .btn{
    margin-top: 2rem;
  }
  .footer {
    background: url(footer-bg.jpg) no-repeat;
    background-size: cover;
    background-position: center;
  }
  .footer .box-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(25rem, 1fr));
    grid: 3rem;
  }
  .footer .box-container .box h3 {
    color: var(--white);
    font-size: 2.5rem;
    padding-bottom: 2rem;
  }
  .footer .box-container .box a {
    color: var(--light-white);
    font-size: 1.5rem;
    padding-bottom: 1rem;
    display: block;
  }
  .footer .box-container .box a i {
    color: var(--main-color);
    padding-right: 0.5rem;
    transition: 0.2s linear;
  }
  .footer .box-container .box a:hover i {
    padding-right: 2rem;
  }
  .footer .credit {
    position: absolute;
    left: 0;
    right: 0;
    text-align: center;
    padding-top: 1rem;
    margin-top: 5rem;
    border-top: 0.1.5rem solid var(--light-white);
    font-size: 2rem;
    color: var(--white);
  }
  .footer .credit span {
    color: var(--main-color);
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
  .offer-details {
    background-color: #f9f9f9; /* Light grey background */
    border: 1px solid #ddd; /* Light grey border */
    border-radius: 5px; /* Rounded corners */
    padding: 20px; /* Padding inside the div */
    margin: 20px 0; /* Margin outside the div */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow */
}

.offer-details h2 {
    font-size: 1.5em; /* Larger font size for the title */
    color: #333; /* Dark grey text color */
    margin-bottom: 10px; /* Space below the title */
}

.offer-details p {
    font-size: 1em; /* Standard font size */
    color: #555; /* Medium grey text color */
    margin: 5px 0; /* Space between paragraphs */
}

.offer-details p:first-of-type {
    margin-top: 10px; /* Extra space at the top */
}

.offer-details p:last-of-type {
    margin-bottom: 0; /* No space at the bottom */
}

    </style>
</head>
<body>
    <!-- Section de l'entête -->
    <section class="header">
        <a href="#" class="logo"><span>Lamo</span> Agency</a>
        <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="about.php">About</a>
            <a href="book.php">Book</a>
            <a href="review.php">Review</a>
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
    </section>
    <div class="heading">
        <h1>Book Now</h1>
    </div>
    <!--book section starts-->
    <section class="booking">
        <h1 class="heading-title">Book Your Trip</h1>
        <!-- Affichage des détails de l'offre -->
        <div class="offer-details">
            <h2><?php echo htmlspecialchars($offer['villedepart'], ENT_QUOTES, 'UTF-8') . ' to ' . htmlspecialchars($offer['villearrivee'], ENT_QUOTES, 'UTF-8'); ?></h2>
            <p>Duration: <?php echo htmlspecialchars($offer['nombre_jour'], ENT_QUOTES, 'UTF-8'); ?> days</p>
            <p>Price: <?php echo htmlspecialchars($offer['montant'], ENT_QUOTES, 'UTF-8'); ?> DA</p>
            <p>Departure: <?php echo htmlspecialchars($offer['heuredepart'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p>Arrival: <?php echo htmlspecialchars($offer['heurearrivee'], ENT_QUOTES, 'UTF-8'); ?></p>
        </div>
        <!-- Formulaire de réservation -->
        <form action="" method="post" class="book_form">
            <div class="flex">
                <div class="inputBox">
                    <span>Name:</span>
                    <input type="text" placeholder="Enter your name" name="name" required>
                </div>
                <div class="inputBox">
                    <span>Email:</span>
                    <input type="email" placeholder="Enter your email" name="email" required>
                </div>
                <div class="inputBox">
                    <span>Phone:</span>
                    <input type="tel" placeholder="Enter your number" name="phone" required>
                </div>
                <div class="inputBox">
                    <span>Address:</span>
                    <input type="text" placeholder="Enter your address" name="address" required>
                </div>
                <div class="inputBox">
                    <span>Number Of Persons:</span>
                    <input type="number" placeholder="Enter number of persons" name="person" required>
                </div>
            </div>
            <input type="submit" value="Submit" class="btn" name="send">
        </form>
    </section>
    <!--book section ends-->
    <!--footer section-->
    <section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>Quick Links</h3>
            <a href="home.php"><i class="fas fa-angle-right" ></i>Home</a>
            <a href="about.php"><i class="fas fa-angle-right"></i>About</a>
           
            <a href="book.php"><i class="fas fa-angle-right"></i>Book</a>
            <a href="review.php"><i class="fas fa-angle-right"></i>Review</a>
        </div>
        <div class="box">
            <h3>Extra Links</h3>
            <a href="#"><i class="fas fa-angle-right"></i>Ask Question</a>
            <a href="about.php"><i class="fas fa-angle-right"></i>About Us</a>
            <a href="#"><i class="fas fa-angle-right"></i>Privacy Policy</a>
            <a href="#"><i class="fas fa-angle-right"></i>Terms Of Use</a>
        </div>
        <div class="box">
            <h3>Contact Infos</h3>
            <a href="#"><i class="fas fa-phone"></i>+213 576-645-363</a>
            <a href="#"><i class="fas fa-phone"></i>+213 676-645-363</a>
            <a href="#"><i class="fas fa-envelope"></i>lamoagence@gmail.com</a>
            <a href="#"><i class="fas fa-map"></i>Annaba, Algeria-474849</a>
        </div>
        <div>

        <div class="box">
        <h3>Follow us</h3>
        <a href="#"><i class="fab fa-facebook-f"></i>facebook</a>
        <a href="#"><i class="fab fa-twitter"></i>twitter</a>
        <a href="#"><i class="fab fa-instagram"></i>instagram</a>
    </div>
    <div class="credit">Created By <span>Lamo</span> | All Rights Reserved!</div>

 </section>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
