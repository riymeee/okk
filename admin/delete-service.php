<?php
include('../config.php');  

if (isset($_POST['service_delete'])) {
    $service_id = $_POST['service_delete'];

    // Prepared statement to delete the user
    $delete_query = $conn->prepare("DELETE FROM service WHERE id= ?");
    $delete_query->bind_param("i",  $service_id);

    if ($delete_query->execute()) {
        // Redirect to the view-register page after successful deletion
        header('Location: view-service.php'); 
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
