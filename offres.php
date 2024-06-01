<?php
// Database connection
include('config.php');

// Fetch destination offers based on a specific destination if provided


$destination_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$query = "SELECT offres_tour.*, dest.name AS dest_name 
          FROM offres_tour
          INNER JOIN dest ON offres_tour.id_des = dest.id_des
          WHERE dest.id_des = $destination_id";
$query_run = mysqli_query($conn, $query); 
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destination Offers</title> 
    <style> 
      #background-video {
    position: fixed;
    right: 0;
    bottom: 0;
    min-width: 100%;
    min-height: 100%;
    z-index: -1; /* Place the video behind other content */
    object-fit: cover; /* Ensure the video covers the entire area */
}
        .container {
            padding: 20px; 
        } 
        .heading { 
            text-align: center; 
            margin-bottom: 20px; 
        } 
        .offers {
            display: flex; 
            flex-wrap: wrap; 
            gap: 20px; 
            justify-content: center; 
        } 
        .offer-card { 
            border: 1px solid #ddd; 
            border-radius: 8px; 
            background-color: #ffffff; 
            overflow: hidden; 
            width: 300px; 
            text-align: center; 
            padding: 20px; 
        } 
        .offer-card img { 
            width: 100%; 
            height: auto; 
        } 
        .offer-card h3 { 
            font-size: 1.2em;
            margin: 10px 0; 
        } 
        .offer-card p { 
            font-size: 1em;
            color: #333; 
        } 
        .offer-card .btn-book {
            display: inline-block;
            margin-top: 10px; 
            padding: 8px 12px; 
            background-color: #007BFF; 
            color: #FFFFFF; 
            text-decoration: none; 
            border-radius: 4px; 
            transition: background-color 0.3s ease; 
        } 
        .offer-card .btn-book:hover { 
            background-color: #0056b3; 
        } 
    </style> 
</head> 
<body> 
<body>
    <video autoplay muted loop id="background-video">
        <source src="./1990001019_pin.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="container"> 
        <div class="heading">
            <?php
            // Get the destination name to display in the heading 
            if ($row = mysqli_fetch_assoc($query_run)) {
                echo '<h1>Offers for ' . htmlspecialchars($row['dest_name'], ENT_QUOTES, 'UTF-8') . '</h1>'; 
                // Reset the pointer to the first row
                mysqli_data_seek($query_run, 0);
            } else { 
                echo '<h1>No Offers Available</h1>'; 
            } 
            ?>
        </div>
        <div class="offers"> 
            <?php 
            if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) { 
            ?> 
                <div class="offer-card"> 
                    <h3><?= htmlspecialchars($row['villedepart'], ENT_QUOTES, 'UTF-8') ?> to <?= htmlspecialchars($row['villearrivee'], ENT_QUOTES, 'UTF-8') ?></h3> 
                    <p>Duration: <?= htmlspecialchars($row['nombre_jour'], ENT_QUOTES, 'UTF-8') ?> days</p> 
                    <p>Price: <?= htmlspecialchars($row['montant'], ENT_QUOTES, 'UTF-8') ?> DA</p> 
                    <p>Departure: <?= htmlspecialchars($row['heuredepart'], ENT_QUOTES, 'UTF-8') ?></p> 
                    <p>Arrival: <?= htmlspecialchars($row['heurearrivee'], ENT_QUOTES, 'UTF-8') ?></p> 
                    <a href="book.php?offer_id=<?= urlencode($row['id']) ?>" class="btn-book">Book Now</a>
                </div> 
            <?php 
                } 
            } else {
                echo '<p>No offers found for this destination.</p>';
            } 
            ?>
        </div>
    </div> 
</body> 
</html>
