<?php
include('config.php');

// Recherche
$searchQuery = isset($_GET['query']) ? strtolower($_GET['query']) : '';

// Fonction pour afficher les hôtels
function displayHotel($hotel) {
    echo '<div class="box">';
    echo '<img src="' . $hotel['photo'] . '" alt="">';
    echo '<div class="content">';
    echo '<h3><i class="fas fa-map-marker-alt"></i> ' . htmlspecialchars($hotel['nom'], ENT_QUOTES, 'UTF-8') . '</h3>';
    foreach (explode(',', $hotel['service']) as $service) {
        echo '<h4><i class="fas fa-utensils"></i> ' . htmlspecialchars($service, ENT_QUOTES, 'UTF-8') . '</h4>';
    }
    echo '<div class="stars">';
    for ($i = 0; $i < $hotel['rating']; $i++) {
        echo '<i class="fas fa-star"></i>';
    }
    echo '</div>';
    echo '<div class="price"> <span>' . htmlspecialchars($hotel['price'], ENT_QUOTES, 'UTF-8') . '</span></div>';
   
    echo '</div>';
    echo '</div>';
}

// Fonction pour afficher les agences
function displayAgency($agency) {
    echo '<div class="box">';
    echo '<div class="image">';
    echo '<img src="' . $agency['photo'] . '" alt="">';
    echo '</div>';
    echo '<div class="content">';
    echo '<h3>' . htmlspecialchars($agency['nom'], ENT_QUOTES, 'UTF-8') . '</h3>';
    echo '<p>' . htmlspecialchars($agency['paragraphe'], ENT_QUOTES, 'UTF-8') . '</p>';
  
    echo '<a href="' . str_replace(' ', '', $agency['nom']) . '.php" class="btn">Discover more</a>';
    echo '</div>';
    echo '</div>';
}

// Fonction pour afficher les destinations
function displayDestination($destination) {
    echo '<div class="cardn">';
    echo '<h3>' . htmlspecialchars($destination['name'], ENT_QUOTES, 'UTF-8') . '</h3>';
    echo '<img src="' . $destination['photo'] . '" alt="' . htmlspecialchars($destination['name'], ENT_QUOTES, 'UTF-8') . '">';
    echo '<a href="./offres.php?id=' . urlencode($destination['id_des']) . '" class="btn-des">Discover more</a>';
    echo '</div>';
}


// Fonction pour afficher les offres
function displayOffer($offer) {
    echo '<div class="box">';
    echo '<div class="content">';
    echo '<h3><i class="fas fa-plane-departure"></i> ' . htmlspecialchars($offer['villedepart'], ENT_QUOTES, 'UTF-8') . ' to ' . htmlspecialchars($offer['villearrivee'], ENT_QUOTES, 'UTF-8') . '</h3>';
    echo '<p><strong>Days: </strong>' . htmlspecialchars($offer['nombre_jour'], ENT_QUOTES, 'UTF-8') . '</p>';
    echo '<p><strong>Price: </strong>' . htmlspecialchars($offer['montant'], ENT_QUOTES, 'UTF-8') . '</p>';
    echo '<p><strong>Departure: </strong>' . htmlspecialchars($offer['heuredepart'], ENT_QUOTES, 'UTF-8') . '</p>';
    echo '<p><strong>Arrival: </strong>' . htmlspecialchars($offer['heurearrivee'], ENT_QUOTES, 'UTF-8') . '</p>';
    echo '<p><strong>Hotel: </strong>' . htmlspecialchars($offer['hotel_name'], ENT_QUOTES, 'UTF-8') . '</p>';
    echo '<p><strong>Destination: </strong>' . htmlspecialchars($offer['destination_name'], ENT_QUOTES, 'UTF-8') . '</p>';
    echo '<p><strong>Agency: </strong>' . htmlspecialchars($offer['agency_name'], ENT_QUOTES, 'UTF-8') . '</p>';
    echo '<a href="./book.php?offer_id=' . urlencode($offer['id']) . '" class="btn">Book Now</a>';
    echo '</div>';
    echo '</div>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="style.css">
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
        body{
            background-color:var(--light-bg) ;
        }
        /* Hotels */
        .hotels .box-container{
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
        }
        .hotels .box-container .box{
            flex: 1 1 30rem;
            border: .5rem;
            overflow: hidden;
            box-shadow: 0 1rem 2rem var(--box-shadow);
        }
        .hotels .box-container .box img{
            height: 25rem;
            width: 100%;
            object-fit: cover;
        }
        .hotels .box-container .box .content{
            padding: 0.1rem;
        }
        .hotels .box-container .box .content h3{
            font-size: 2rem;
            color: var(--black);
        }
        .hotels .box-container .box .content h3 i {
            color: var(--main-color);
        }
        .hotels .box-container .box .content i {
            font-size: 1.6rem;
            color: var(--main-color);
        }
        .hotels .box-container .box .content h4{
            font-size: 1.4rem;
        }
        .hotels .box-container .box .content h5{
            padding: 0.7rem;
            font-size: 1.3rem;
        }
        .hotels .box-container .box .content .stars i {
            font-size: 1.7rem;
            color: orange;
            padding-top: 1rem;
        }
        .hotels .box-container .box .content .price{
            font-size: 2rem;
            color: var(--light-black);
            padding-top: 1rem;
        }
        .hotels .box-container .box .content .price span {
            color: #666;
            font-size: 1.5rem;
        }
        .hotels .box-container .box:hover{
            box-shadow: 0 1rem 2rem var(--black);
        }

        /* Agencies */
        .agencies .box-container{
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
        }
        .agencies .box-container .box{
            flex: 1 1 30rem;
            border: .5rem;
            overflow: hidden;
            box-shadow: 0 1rem 2rem var(--box-shadow);
        }
        .agencies .box-container .box .image img{
            height: 25rem;
            width: 100%;
            object-fit: cover;
        }
        .agencies .box-container .box .content{
            padding: 0.1rem;
        }
        .agencies .box-container .box .content h3{
            font-size: 2rem;
            color: var(--black);
        }
        .agencies .box-container .box .content p{
            font-size: 1.4rem;
            color: var(--black);
        }
        .agencies .box-container .box .content a.btn{
            display: inline-block;
            margin-top: 1rem;
            padding: 0.5rem 1rem;
            background-color: var(--main-color);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1.2rem;
        }
        .agencies .box-container .box .content a.btn:hover{
            background-color: var(--main-color-dark);
        }
        .agencies .box-container .box:hover{
            box-shadow: 0 1rem 2rem var(--black);
        }

         /* Destinations */
        .destination .col{
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
        }
        .destination .cardn{
            flex: 1 1 30rem;
            border: .5rem;
            overflow: hidden;
            box-shadow: 0 1rem 2rem var(--box-shadow);
            padding: 1rem;
            text-align: center;
        }
        .destination .cardn h3{
            font-size: 2rem;
            color: var(--black);
            margin-bottom: 1rem;
        }
        .destination .cardn img{
            height: 20rem;
            width: 100%;
            object-fit: cover;
            margin-bottom: 1rem;
        }
        .destination .cardn .btn-des{
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: var(--main-color);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1.2rem;
        }
        .destination .cardn .btn-des:hover{
            background-color: var(--main-color-dark);
        }

        /* Offers */
        .offers .box-container{
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
        }
        .offers .box-container .box{
            flex: 1 1 30rem;
            border: .5rem;
            overflow: hidden;
            box-shadow: 0 1rem 2rem var(--box-shadow);
        }
        .offers .box-container .box .content{
            padding: 0.1rem;
        }
        .offers .box-container .box .content h3{
            font-size: 2rem;
            color: var(--black);
        }
        .offers .box-container .box .content p{
            font-size: 1.4rem;
            color: var(--black);
        }
        .offers .box-container .box .content a.btn{
            display: inline-block;
            margin-top: 1rem;
            padding: 0.5rem 1rem;
            background-color: var(--main-color);
            color: #fff;
            border-radius: 0.5rem;
            text-decoration: none;
        }
        .offers .box-container .box .content a.btn:hover{
            background-color: var(--black);
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

    
    <section class="hotels" id="hotels">
        <h1 class="heading">Hotels</h1>
        <div class="box-container">
            <?php
            $query = "SELECT * FROM hotel WHERE LOWER(nom) LIKE '%$searchQuery%'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    displayHotel($row);
                }
            } else {
                echo '<p>No hotels found matching your query.</p>';
            }
            ?>
        </div>
    </section>
    
    <section class="agencies" id="agencies">
        <h1 class="heading">Agencies</h1>
        <div class="box-container">
            <?php
            $query = "SELECT * FROM agences WHERE LOWER(nom) LIKE '%$searchQuery%'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    displayAgency($row);
                }
            } else {
                echo '<p>No agencies found matching your query.</p>';
            }
            ?>
        </div>
    </section>
    
    <section class="destination" id="destination">
        <h1 class="heading">Destinations</h1>
        <div class="col">
            <?php
            $query = "SELECT * FROM dest WHERE LOWER(name) LIKE '%$searchQuery%'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    displayDestination($row);
                }
            } else {
                echo '<p>No destinations found matching your query.</p>';
            }
            ?>
        </div>
    </section>
    
    <section class="offers" id="offers">
        <h1 class="heading">Offers</h1>
        <div class="box-container">
            <?php
            $query = "
                SELECT offres_tour.*, hotel.nom AS hotel_name, dest.name AS destination_name, agences.nom AS agency_name
                FROM offres_tour
                JOIN hotel ON offres_tour.id_hotel = hotel.id
                JOIN dest ON offres_tour.id_des = dest.id_des
                JOIN agences ON offres_tour.id_agence = agences.id
                WHERE 
                    LOWER(offres_tour.villedepart) LIKE '%$searchQuery%' OR
                    LOWER(offres_tour.villearrivee) LIKE '%$searchQuery%' OR
                    LOWER(hotel.nom) LIKE '%$searchQuery%' OR
                    LOWER(dest.name) LIKE '%$searchQuery%' OR
                    LOWER(agences.nom) LIKE '%$searchQuery%'
            ";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    displayOffer($row);
                }
            } else {
                echo '<p>No offers found matching your query.</p>';
            }
            ?>
        </div>
    </section>
</body>
</html>



