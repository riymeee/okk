<?php
include('includes/header.php');
include('includes/sidebar.php');
include('../config.php');

?>
<style>
    .card {
    width: 100%;
    background-color: #fff;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
    text-align: center;
}
.ok{
    background-color:#008CBA;
}
</style>

<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
                                <div class="card ok text-white mb-4">
                                    <div class="card-body">admis added</div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <?php 
                                                $select_admin = mysqli_query($conn, "SELECT * FROM `admin`") or die('query failed');
                                                $number_of_admin = mysqli_num_rows($select_admin);
                                            ?>
                                            <h3><?php echo $number_of_admin; ?></h3>
                                              <a class="small text-white stretched-link" href="view-login.php">View Details</a>
                                        </div>
                                </div>
        </div>
        <div class="col-xl-3 col-md-6">
                                <div class="card ok text-white mb-4">
                                    <div class="card-body">users added</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php 
                                        $select_users = mysqli_query($conn, "SELECT * FROM `user`") or die('query failed');
                                        $number_of_users = mysqli_num_rows($select_users);
                                    ?>
                                    <h3><?php echo $number_of_users; ?></h3>
                                    <a class="small text-white stretched-link" href="view-register.php">View Details</a>
                                    </div>
                                </div>
        </div>
        <div class="col-xl-3 col-md-6">
                                <div class="card ok text-white mb-4">
                                    <div class="card-body">Hotels</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php 
                                        $select_author = mysqli_query($conn, "SELECT * FROM `hotel`") or die('query failed');
                                        $number_of_author = mysqli_num_rows($select_author);
                                    ?>
                                    <h3><?php echo $number_of_author; ?></h3>
                                    <a class="small text-white stretched-link" href="view-hotel.php">View Details</a>
                                    </div>
                                </div>
        </div>
        <div class="col-xl-3 col-md-6">
                                <div class="card ok text-white mb-4">
                                    <div class="card-body">Agences </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php 
                                        $select_category = mysqli_query($conn, "SELECT * FROM `agences`") or die('query failed');
                                        $number_of_category = mysqli_num_rows($select_category);
                                     ?>
                                     <h3><?php echo $number_of_category; ?></h3>
                                     <a class="small text-white stretched-link" href="view-agences.php">View Details</a>
                                    </div>
                                </div>
        </div>
        <div class="col-xl-3 col-md-6">
                                <div class="card ok text-white mb-4">
                                    <div class="card-body">Booking
                                    </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                        <?php 
                                            $select_books = mysqli_query($conn, "SELECT * FROM `book`") or die('query failed');
                                            $number_of_books = mysqli_num_rows($select_books);
                                        ?>
                                        <h3><?php echo $number_of_books; ?></h3>
                                        <a class="small text-white stretched-link" href="view-book.php">View Details</a>
                                    </div>
                                </div>
        </div>
        <div class="col-xl-3 col-md-6">
                                <div class="card ok text-white mb-4">
                                    <div class="card-body">Destination</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <?php 
                                            $select_message = mysqli_query($conn, "SELECT * FROM `dest`") or die('query failed');
                                            $number_of_message = mysqli_num_rows($select_message);
                                        ?>
                                        <h3><?php echo $number_of_message; ?></h3>
                                        <a class="small text-white stretched-link" href="view-des.php">View Details</a> 
                                    </div>
                                </div>
        </div>
        <div class="col-xl-3 col-md-6">
                                <div class="card ok text-white mb-4">
                                    <div class="card-body">Offres</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php 
                                        $select_books_opened  = mysqli_query($conn, "SELECT * FROM `offres_tour`") or die('query failed');
                                        $number_of_books_opened  = mysqli_num_rows($select_books_opened );
                                    ?>
                                    <h3><?php echo $number_of_books_opened ; ?></h3>
                                    <a class="small text-white stretched-link" href="view-offres.php">View Details</a>
                                    </div>
                                </div>
        </div>
        <div class="col-xl-3 col-md-6">
                                <div class="card ok text-white mb-4">
                                    <div class="card-body">Commentaires</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php 
                                        $select_books_opened  = mysqli_query($conn, "SELECT * FROM `commentaire`") or die('query failed');
                                        $number_of_books_opened  = mysqli_num_rows($select_books_opened );
                                    ?>
                                    <h3><?php echo $number_of_books_opened ; ?></h3>
                                    <a class="small text-white stretched-link" href="view-commentaire.php">View Details</a>
                                    </div>
                                </div>
        </div>
        
</div>

<?php

include('includes/scripts.php');
?>