<?php
include('../config.php');  

if (isset($_POST['user_delete'])) {
    $users_id = $_POST['user_delete'];

    // Prepared statement to delete the user
    $delete_query = $conn->prepare("DELETE FROM user WHERE id_user = ?");
    $delete_query->bind_param("i", $users_id);

    if ($delete_query->execute()) {
        // Redirect to the view-register page after successful deletion
        header('Location: view-register.php'); 
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
