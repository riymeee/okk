<?php
include('config.php');

// Récupération des valeurs du formulaire
$nbr_jour = isset($_GET['nbr_jour']) ? $_GET['nbr_jour'] : '';
$pays = isset($_GET['pays']) ? $_GET['pays'] : '';
$prix = isset($_GET['prix']) ? $_GET['prix'] : '';

// Construction de la requête SQL en fonction des valeurs fournies
$query = "SELECT * FROM offres_tour WHERE 1";

if (!empty($nbr_jour)) {
    $query .= " AND nombre_jour >= " . mysqli_real_escape_string($conn, $nbr_jour);
}

if (!empty($pays)) {
    $query .= " AND (LOWER(villedepart) LIKE '%" . mysqli_real_escape_string($conn, strtolower($pays)) . "%' OR LOWER(villearrivee) LIKE '%" . mysqli_real_escape_string($conn, strtolower($pays)) . "%')";
}

if (!empty($prix)) {
    $query .= " AND montant <= " . mysqli_real_escape_string($conn, $prix);
}

// Exécution de la requête
$result = mysqli_query($conn, $query);

// Traitement des résultats
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Afficher les offres filtrées ici
        echo '<div class="box">';
        echo '<div class="content">';
        echo '<h3><i class="fas fa-plane-departure"></i> ' . htmlspecialchars($row['villedepart'], ENT_QUOTES, 'UTF-8') . ' to ' . htmlspecialchars($row['villearrivee'], ENT_QUOTES, 'UTF-8') . '</h3>';
        echo '<p><strong>Days: </strong>' . htmlspecialchars($row['nombre_jour'], ENT_QUOTES, 'UTF-8') . '</p>';
        echo '<p><strong>Price: </strong> DA'  . htmlspecialchars($row['montant'], ENT_QUOTES, 'UTF-8') . '</p>';
        echo '<p><strong>Departure: </strong>' . htmlspecialchars($row['heuredepart'], ENT_QUOTES, 'UTF-8') . '</p>';
        echo '<p><strong>Arrival: </strong>' . htmlspecialchars($row['heurearrivee'], ENT_QUOTES, 'UTF-8') . '</p>';
        echo '<a href="./book.php?offer_id=' . urlencode($row['id']) . '" class="btn">Book Now</a>';
        echo '</div>';
        echo '</div>';
    }
} else {
    // Aucune offre trouvée
    echo '<p>No offers found matching your criteria.</p>';
}

// Fermer la connexion
mysqli_close($conn);
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    body {
    font-family: Arial, sans-serif; /* Police de caractères par défaut */
    background-color: #f0f0f0; /* Couleur de fond gris clair */
    color: #333; /* Couleur du texte principale */
    margin: 0; /* Supprime les marges par défaut du corps */
    padding: 0; /* Supprime les remplissages par défaut du corps */
    line-height: 1.6; /* Hauteur de ligne pour un espacement optimal entre les lignes de texte */
}
    /* Style général pour la boîte contenant les offres */
.box {
    background-color: #fff; /* Fond blanc */
    border: 1px solid #ddd; /* Bordure grise */
    border-radius: 5px; /* Coins arrondis */
    margin-bottom: 20px; /* Marge en bas */
    padding: 20px; /* Espacement intérieur */
}

/* Style pour le contenu à l'intérieur de la boîte */
.box .content {
    font-family: Arial, sans-serif; /* Police par défaut */
    color: #333; /* Couleur du texte */
}

/* Style pour l'icône de départ */
.box .content i {
    color: #007bff; /* Couleur bleue */
    margin-right: 5px; /* Marge à droite */
}

/* Style pour les liens "Book Now" */
.box .content .btn {
    display: inline-block; /* Affichage en ligne */
    padding: 10px 20px; /* Remplissage intérieur */
    background-color: #007bff; /* Fond bleu */
    color: #fff; /* Texte blanc */
    text-decoration: none; /* Pas de soulignement */
    border-radius: 5px; /* Coins arrondis */
    transition: background-color 0.3s; /* Transition en douceur */
}

/* Style au survol des liens "Book Now" */
.box .content .btn:hover {
    background-color: #0056b3; /* Fond bleu foncé */
}

/* Style pour les titres */
.box .content h3 {
    margin-top: 0; /* Pas de marge en haut */
}

/* Style pour les paragraphes de détails */
.box .content p {
    margin: 10px 0; /* Marge autour des paragraphes */
}

</style>