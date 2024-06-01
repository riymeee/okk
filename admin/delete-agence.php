<?php
include('../config.php');  

if (isset($_POST['agence_delete'])) {
    $agence_id = $_POST['agence_delete'];

    // Prepared statement to delete the user
    $delete_query = $conn->prepare("DELETE FROM agences WHERE id = ?");
    $delete_query->bind_param("i", $agence_id);

    if ($delete_query->execute()) {
        // Redirect to the view-register page after successful deletion
        header('Location: view-agences.php'); 
        exit();
    } else {
        echo 'Failed to delete user.';
    }

    $delete_query->close();
} else {
    echo 'User ID is not provided.';
}

$conn->close();
?>
