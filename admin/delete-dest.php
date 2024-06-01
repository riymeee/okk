<?php
include('../config.php');  

if (isset($_POST['dest_delete'])) {
    $dest_id = $_POST['dest_delete'];

    // Prepared statement to delete the user
    $delete_query = $conn->prepare("DELETE FROM dest WHERE id_des= ?");
    $delete_query->bind_param("i", $dest_id);

    if ($delete_query->execute()) {
        // Redirect to the view-register page after successful deletion
        header('Location: view-des.php'); 
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
