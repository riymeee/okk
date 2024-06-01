<?php include('config.php');

?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-compatible"content="google">
      <meta name="viewport"content="width=device-width,initial-scale=1.0">
      
     
    <title>Fancyellow</title>
    
    <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="Fancyellow.css">
    <style>
         .btn-des {
            display: inline-block;
            padding: 7px 9px;
            font-size: 10px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-des:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .btn-des:active {
            background-color: #004080;
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
    <!-- Section de l'entête -->
     <!-- Section de home -->
     <section class="home" id="home" >
        
        <div class="content">
            <h3> Welcome To skylink-travel Agency</h3>
            <p>Travel around the world</p>
            
        </div>
    
    
    

</div>
<div class="video-container">
    <video src="./1990001019_pin (2).mp4"id="video slider" loop autoplay muted></video>
   
</div>
</section>

<!--section destination starts -->
<section id="popular-destination">
        <div class="heading">
            <h1>Top Destinations</h1>
            <h2>Make your Destination</h2>
        </div>
        <div class="content">
            <?php
            $query_destinations = "SELECT * FROM dest";
            $query_run_destinations = mysqli_query($conn, $query_destinations);
            if (mysqli_num_rows($query_run_destinations) > 0) {
                while ($row_destination = mysqli_fetch_assoc($query_run_destinations)) {
                    $image_path = 'admin/uploaded_img/' . $row_destination['photo'];
                    if (file_exists($image_path)) {
                        echo '
                        <div class="cardn" style="background-image: url(\'' . $image_path . '\');">
                            <h3>' . $row_destination['name'] . '</h3>
                            <a href="offres.php?id=' . $row_destination['id_des'] . '" class="btn-des">Discover More</a>
                        </div>
                        ';
                    } else {
                        echo '<p>Image not found: ' . $image_path . '</p>';
                    }
                }
            } else {
                echo '<p>No destinations found</p>';
            }
            ?>
        </div>
    </section>
    <!-- Section destination ends-->
    <section class="hotels" id="hotels">
    <h1 class="heading">
        <span>h</span>
        <span>o</span>
        <span>t</span>
        <span>e</span>
        <span>l</span>
        <span>s</span>
    </h1>
    <div class="box-container">
        <?php
        // Vérifier si l'ID de l'agence est passé via GET
        $id_agence = isset($_GET['id_agence']) ? intval($_GET['id_agence']) : 0;

        if ($id_agence > 0) {
            // Sélectionner uniquement les hôtels de l'agence spécifique
            $query = "SELECT * FROM hotel WHERE id_agence = $id_agence";
        } else {
            // Si aucun ID d'agence n'est fourni, sélectionner tous les hôtels
            $query = "SELECT * FROM hotel";
        }

        $query_run = mysqli_query($conn, $query);

        if (mysqli_num_rows($query_run) > 0) {
            while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                <div class="box">
                    <img src="admin/uploaded_img/<?= $row['photo']; ?>" alt="<?= $row['nom']; ?>">
                    <div class="content">
                        <h3><i class="fas fa-map-marker-alt"></i> <?= $row['nom']; ?> </h3>
                        <h4><i class="fas fa-utensils"></i> <?= $row['service']; ?> </h4>
                        <div class="stars">
                            <?php for ($i = 0; $i < $row['rating']; $i++) { ?>
                                <i class="fas fa-star"></i>
                            <?php } ?>
                        </div>
                        <div class="price"><?= $row['price']; ?> <span>DA/night</span></div>
                      
                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="box">
                <p>No hotels found.</p>
            </div>
            <?php
        }
        ?>
    </div>
</section>

    
      <!-- Section hotels ends-->
<!-- Section de gallery starts-->
<section class="gallery" id="gallery">
    <h1 class="heading">
        <span>g</span>
        <span>a</span>
        <span>l</span>
        <span>l</span>
        <span>e</span>
        <span>r</span>
        <span>y</span>
    </h1>
    <div class="box-container">
        <div class="box">
        <img src="./Greece.jpg" alt="">
        <div class="content">
            <h3>amazing places</h3>
            <p>liore;skdkjdckdsn:;dkyzsyhdsksdkbgdssjhds</p>
            <a href="#" class="btn">see more</a>
        </div>
    </div>
    <div class="box">
        <img src="./zanzibar.jpg" alt="">
        <div class="content">
            <h3>amazing places</h3>
            <p>liore;skdkjdckdsn:;dkyzsyhdsksdkbgdssjhds</p>
            <a href="#" class="btn">see more</a>
        </div>
    </div>
    <div class="box">
        <img src="./jordan.jpg" alt="">
        <div class="content">
            <h3>amazing places</h3>
            <p>liore;skdkjdckdsn:;dkyzsyhdsksdkbgdssjhds</p>
            <a href="#" class="btn">see more</a>
        </div>
    </div>
    
</div>
</section>
<!-- Section de gallery ends-->
<!-- Section de service starts-->

<section class="services" id="services">
    <h1 class="heading">
        <span>S</span>
        <span>e</span>
        <span>r</span>
        <span>v</span>
        <span>i</span>
        <span>c</span>
        <span>e</span>
    </h1>
    <div class="box-container">
        <div class="box">
            <i class="fas fa-hotel"></i>
            <h3>affordable hotels</h3>
            <p>lozrfzjhzfhtzvdgqsjqsvdqscshjdythgvj,wnfytgqc</p>
        </div>
        <div class="box">
            <i class="fas fa-utensils"></i>
            <h3>food & drinks</h3>
            <p>lozrfzjhzfhtzvdgqsjqsvdqscshjdythgvj,wnfytgqc</p>
        </div>
        <div class="box">
            <i class="fas fa-bullhorn"></i>
            <h3>safety guide</h3>
            <p>lozrfzjhzfhtzvdgqsjqsvdqscshjdythgvj,wnfytgqc</p>
        </div>
        <div class="box">
            <i class="fas fa-globe-asia"></i>
            <h3>around te world</h3>
            <p>lozrfzjhzfhtzvdgqsjqsvdqscshjdythgvj,wnfytgqc</p>
        </div>
        <div class="box">
            <i class="fas fa-plane"></i>
            <h3>fastest travel</h3>
            <p>lozrfzjhzfhtzvdgqsjqsvdqscshjdythgvj,wnfytgqc</p>
        </div>
      
    </div>
    
    </section>
    
    
    
    
    <!-- Section de srvice ends-->
    










 
<!--footer section-->
<section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>Quick Links</h3>
            <a href="home.php"><i class="fas fa-angle-right" ></i>Home</a>
            <a href="about.php"><i class="fas fa-angle-right"></i>About</a>
            <a href="offres.php"><i class="fas fa-angle-right"></i>Offres</a>
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
<script>
    document.getElementById('agency').addEventListener('change', function() {
        document.getElementById('agency-form').submit();
    });
</script>


</body>
</html>