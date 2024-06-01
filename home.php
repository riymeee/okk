<?php include 'config.php';
if(isset($_GET['search'])){
    $filtervalues = $_GET['search'];
    header("Location: search.php?search=$filtervalues");
    exit(); }
// Récupérez la destination à partir de l'entrée utilisateur

?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-compatible"content="google">
      <meta name="viewport"content="width=device-width,initial-scale=1.0">
      
     
    <title>Home</title>
    
    <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
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
  background-color: var(--light-bg);
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
    /*
    .wrapper{
        position: relative;
        width: 400px;
        height: 440px;
        background: transparent;
        border: 2px solid var(--black);
        border-radius: 20px;
        backdrop-filter: blur(20px);
        box-shadow:0 0 30px var(--black);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
      }
    .wrapper .form-box{
        width: 100%;
        padding: 40px;
    }
    .wrapper .icon-close{
        position: absolute;
        top: 0;
        right: 0;
        width: 45px;
        height: 45px;
        background: var(--black);
        font-size: 2em;
        color: var(--white);
        display: flex;
        justify-content: center;
        align-items: center;
        border-bottom-left-radius:20px ;
        cursor: pointer;
        z-index: 1;

    }
    .form-box h2{
        font-size: 2em;
        color: var(--black);
        text-align: center;
    }
    .input-box{
        position: relative;
        width: 100%;
        height: 50px;
        border: 2px solid #162938;
        margin: 30px 0;
    }
    .input-box label{
        position: absolute;
        top: 50%;
        left: 5px;
        transform:translateY(-50%);
        font-size: 1.5rem;
        color: #162938;
        font-weight: 500;
        pointer-events: none;
        transition: .5s;
    }
    .input-box input:focus~label,
    .input-box input:valid~label{
        top: -5px;
    }
    .input-box input{
        width: 100%;
        height: 100%;
        background: transparent;
        border: none;
        outline: none;
        font-size: 1em;
        color: #162938;
        font-weight: 600;
        padding: 0 35px 0 5px;
    }

    .input-box .icon{
        position: absolute;
        right: 8px;
        font-size: 1.5rem;
        color: #162938;
        line-height: 57px;
    }
    .remember-forget{
        font-size: 1.4rem;
        color: #162938;
        font-weight: 500;
        margin: -15px 0 15px;
        display: flex;
        justify-content: space-between;
    }
    .remember-forget label input {
        accent-color: #162938;
        margin-right: 3px;
    }
    .remember-forget a{
        color: #162938;
        text-decoration: none;
    }
    .remember-forget a:hover{
        text-decoration: underline;
    }
    .login-register{
        font-size:1.4rem;
        color: #162938;
        text-align: center;
        font-weight: 500;
        margin: 25px 0 10px;
    }
    .login-register p a{
        color: #162938;
        text-decoration: none;
        font-weight: 600;

    }
.login-register p a:hover{
    text-decoration: underline;

}
*/


        /* our agencies section starts */
.home-packages {
  background: var(--light-bg);

}
.home-packages .box-container{
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
  grid: 2rem;
  
}
.home-packages .box-container .box{
  border: var(--border);
  box-shadow: var(--box-shadow);
  background: var(--white);
  padding: 1rem;
 margin-right: 1.5rem;
}
.home-packages .box-container .box .image{
  height: 25rem;
  overflow: hidden;
}

.home-packages .box-container .box .image img{
  height: 100%;
  width: 100%;
  object-fit: cover;
  transition: .2s linear;
}

.home-packages .box-container .box .content{
  padding: 1rem;
  text-align: center; 

}
.home-packages .box-container .box .content h3{
  font-size: 2.5rem;
  color: var(--black);
}
.home-packages .box-container .box .content p{
  font-size: 2rem;
  color: var(--black);
  line-height: 1;
  padding: 0.5rem 0;
}
/* Carrousel Container */

.slider {
            position: relative;
            width: 100%;
            max-width: 100%;
            margin: auto;
            overflow: hidden;
        }
        .slides {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }
        .slides img {
            width: 100vw;
            height: 100vh;
            object-fit: cover;
        }
        .navigation {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }
        .navigation button {
            background: rgba(0, 0, 0, 0.5);
            border: none;
            color: white;
            padding: 10px;
            cursor: pointer;
        }
        .navigation button:hover {
            background: rgba(0, 0, 0, 0.8);
        }
        .pagination {
            position: absolute;
            bottom: 20px;
            width: 100%;
            text-align: center;
        }
        .pagination span {
            display: inline-block;
            width: 10px;
            height: 10px;
            margin: 0 5px;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            cursor: pointer;
        }
        .pagination .active {
            background: white;
        }

    </style>
</head>
<body>
 
      <!-- header section starts -->
      <section class="header">
        <a href="#" class="logo"><span>Lamo</span> Agency</a>

        <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="about.php">About</a>
            <a href="book.php">Book</a>
            <a href="review.php">Review</a>
           

        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>

        <div class="icons"> 
            <i class="fas fa-search" id="search-btn"></i>
            <a href="./login.php" id="login-btn"><i class="fas fa-user"></i></a>
</div>
        </div>
        <form action="search.php" method="GET" class="search-bar-container">
    <input type="search" id="search-bar" name="query" placeholder="Search here...">
    <button type="submit" class="fas fa-search"></button>
</form>

    </section>
    <!-- header section ends -->
     <!-- login form starts 
    
        <div class="login-form-container">
            <i class="fas fa-time" id="form-close"></i>
            <form action="#">
                <i class="fa-sharp fa-solid fa-xmark close-icon"></i>
                <h3>Login</h3>
                <input type="email" class="box" placeholder="Enter your email">
                <input type="password" class="box" placeholder="Enter your password">
                <input type="submit" value="login now" class="btn">
                <input type="checkbox" id="remember">
                <label for="remember">remember me</label>
                <p>forget password? <a href="#">click here</a></p>
                <p>don't have an account?<a href="#">register now</a></p>
            </form>
         
      
            <i class="fas fa-time" id="form-close"></i>
            <form action="#">
                <i class="fa-sharp fa-solid fa-xmark close-icon"></i>
                <h3>Registraction</h3>
                <input type="username" class="box" placeholder="Enter your username">
                <input type="email" class="box" placeholder="Enter your email">
                <input type="password" class="box" placeholder="Enter your password">
                <input type="password" class="box" placeholder="Enter your confirm password">
                <div class="inputBox">
                <select name="person" id="" class="input">
                    <option value="0">User</option>
                    <option value="0">admin</option>
                </select>
            </div>

                <input type="submit" value="register now" class="btn">
                <input type="checkbox" id="remember">
                <label for="remember">remember me</label>
                <p>forget password? <a href="#">click here</a></p>
                <p>you have an account?<a href="#">login now</a></p>
            </form>
        </div> -->
       <!-- login form starts -->














    <!-- login form ends -->
    <!--home section starts-->
    <section class="home" id="home" >
        
                    <div class="content">
                        <h3> Explore, Discover, Travel</h3>
                        <p>Travel around the world</p>
                        <a href="sinup.php" class="btn">Sign up</a>
                    </div>
                
                
        
            </div>
            <div class="video-container">
                <video src="./vid-3.mp4"id="video slider" loop autoplay muted></video>
                <video src="./vid-4.mp4"id="video slider" loop autoplay muted></video>
            </div>
    </section>
    <!-- home section ends -->




 <!-- box reservation section starts-->
    <section class="book">
        <div class="container flex_space">
            <div class="text">
                <h3><span> Find </span>  Your Destination</h3>
            </div>
            <form class="grid" action="filter.php" method="GET">
    
    <input type="number" name="nbr_jour" placeholder="Number of days">
    <input type="text" name="pays" placeholder="Where are you going?" id="destination_input">
    <input type="number" id="prix" name="prix" min="0" step="100" placeholder="Enter the price">
    <input type="submit" value="CHECK AVAILABILITY">
</form>
        </div>

    </section>
 <!-- box reservation  section ends -->
    <!--agencies section starts-->
    <section class="home-packages">
        <h1 class="heading">Our Agencies</h1>
        <div class="box-container">
            <?php 
            
            $query_agences = "SELECT * FROM agences";
            $result_agences = mysqli_query($conn, $query_agences);
            if(mysqli_num_rows($result_agences) > 0) {
                while($row_agence = mysqli_fetch_assoc($result_agences)) { ?>
                    <div class="box">
                        <div class="image">
                            <img src="admin/uploaded_img/<?php echo $row_agence['photo']; ?>" alt="<?php echo $row_agence['nom']; ?>">
                        </div>
                        <div class="content">
                            <h3><?php echo $row_agence['nom']; ?></h3>
                            <p><?php echo $row_agence['paragraphe']; ?></p>
                            
                            <a href="<?php echo strtolower(str_replace(' ', '-', $row_agence['nom'])) . '.php'; ?>" class="btn">Discover more</a>
                        </div>
                    </div>
                <?php } 
            } else {
                echo '<p>No agencies available at the moment.</p>';
            }
            ?>
        </div>
    </section>

 <!--agencies section ends-->

<!--offre section start-->
<h1 class="heading">
            <span>o</span>
            <span>f</span>
            <span>f</span>
            <span>r</span>
            <span>e</span>
            <span>s</span>
        </h1>

<div class="slider">
        <div class="slides">
            <img src="./hotel-green-golf.jpg" alt="Image 1">
            <img src="./NH_Opéra_.jpg" alt="Image 2">
            <img src="./hotelistanbul.jpg" alt="Image 3">
            <img src="./spain.jpg" alt="Image 3">
            <img src="./plage.jpg" alt="Image 3">
            <img src="./dubia.jpg" alt="Image 3">


            <!-- Add more images as needed -->
        </div>
        <div class="navigation">
            <button id="prev">&#10094;</button>
            <button id="next">&#10095;</button>
        </div>
        <div class="pagination" id="pagination">
            <!-- Pagination dots will be generated here -->
        </div>
    </div>


    <script>
        const slides = document.querySelector('.slides');
        const images = document.querySelectorAll('.slides img');
        const prevButton = document.getElementById('prev');
        const nextButton = document.getElementById('next');
        const pagination = document.getElementById('pagination');

        let currentIndex = 0;

        // Create pagination dots
        images.forEach((image, index) => {
            const dot = document.createElement('span');
            dot.dataset.index = index;
            dot.addEventListener('click', () => goToSlide(index));
            pagination.appendChild(dot);
        });

        function updatePagination() {
            document.querySelectorAll('.pagination span').forEach(dot => {
                dot.classList.remove('active');
            });
            document.querySelector(`.pagination span[data-index="${currentIndex}"]`).classList.add('active');
        }

        function goToSlide(index) {
            if (index < 0) {
                currentIndex = images.length - 1;
            } else if (index >= images.length) {
                currentIndex = 0;
            } else {
                currentIndex = index;
            }
            const offset = -currentIndex * 100;
            slides.style.transform = `translateX(${offset}vw)`;
            updatePagination();
        }

        prevButton.addEventListener('click', () => goToSlide(currentIndex - 1));
        nextButton.addEventListener('click', () => goToSlide(currentIndex + 1));

        // Initialize the first slide and pagination
        goToSlide(0);
    </script>




















    <script src="script.js"></script>
</body>
</html>





















<!--offre section ends-->

























   <!--<h1 class="heading-title"> Our Agencies</h1>
    <div class="box-container">
        <div class="box">
            <img src="SaharaDesert.jpg" alt="">
            <h3>Tinariwen-Tours</h3>
        </div>
        <div class="box">
            <img src="omra.jpg" alt="">
            <h3>alhayat-voyages</h3>
        </div>
        <div class="box">
            <img src="alger.jpg" alt="">
            <h3>Fancyellow</h3>
        </div>
        <div class="box">
            <img src="orann.jpg" alt="">
            <h3>skylink-travel</h3>
        </div>
    </div>-->
   </section>

    <!--agencies section ends-->











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
            <a href="./about.html"><i class="fas fa-angle-right"></i>About Us</a>
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















 











 <script src="script.js"></script>
 <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
 <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</body>
</html>