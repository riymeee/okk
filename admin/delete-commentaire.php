<?php
include('../config.php');  

if (isset($_POST['comment_delete'])) {
    $comment_id = $_POST['comment_delete'];

    // Prepared statement to delete the comment
    $delete_query = $conn->prepare("DELETE FROM commentaire WHERE id_comm = ?");
    $delete_query->bind_param("i", $comment_id);

    if ($delete_query->execute()) {
        // Redirect to the view-register page after successful deletion
        header('Location: view-commentaire.php'); 
        exit();
    } else {
        echo 'Failed to delete comment.';
    }

    $delete_query->close();
} else {
    echo 'comment ID is not provided.';
}

$conn->close();
?>
