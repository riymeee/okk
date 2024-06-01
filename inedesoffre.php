<?php
// Connexion à la base de données
include('config.php');

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Requête SQL pour récupérer toutes les destinations
$sql = "SELECT * FROM dest";
$result = $conn->query($sql);

// Fermer la connexion après avoir récupéré les données
$destinations = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $destinations[] = $row;
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinations</title>
    <style>
        .destination {
            border: 1px solid #ccc;
            margin: 20px;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }
        .destination img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .box-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .box {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 10px;
            width: 30%;
        }
    </style>
</head>
<body>
    <h1>Destinations</h1>
    <div class="box-container">
        <?php foreach ($destinations as $destination): ?>
            <div class="box destination">
                <h2><?php echo htmlspecialchars($destination['name']); ?></h2>
                <img src="<?php echo htmlspecialchars($destination['photo']); ?>" alt="<?php echo htmlspecialchars($destination['name']); ?>">
                <a href="offres.php?id_des=<?php echo $destination['id_des']; ?>" class="btn">Voir les offres</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
