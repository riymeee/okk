<?php
include('../config.php');

if (isset($_POST['offer_delete'])) {
    $offer_id = mysqli_real_escape_string($conn, $_POST['offer_delete']);

    // Prepared statement to delete the offer
    $delete_query = $conn->prepare("DELETE FROM offres_tour WHERE id = ?");
    $delete_query->bind_param("i", $offer_id);

    if ($delete_query->execute()) {
        // Redirect to the admin-offers page after successful deletion
        header('Location: view-offres.php');
        exit();
    } else {
        echo 'Failed to delete offer.';
    }

    $delete_query->close();
} else {
    echo 'Offer ID is not provided.';
}

$conn->close();
?>
