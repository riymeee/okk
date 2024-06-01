<?php
include('../config.php');  

if (isset($_POST['book_delete'])) {
    $book_id = $_POST['book_delete'];

    // Prepared statement to delete the booking
    $delete_query = $conn->prepare("DELETE FROM book WHERE id = ?");
    $delete_query->bind_param("i", $book_id);

    if ($delete_query->execute()) {
        // Redirect to the view-book page after successful deletion
        header('Location: view-book.php'); 
        exit();
    } else {
        echo 'Failed to delete booking.';
    }

    $delete_query->close();
} else {
    echo 'Booking ID is not provided.';
}

$conn->close();
?>
