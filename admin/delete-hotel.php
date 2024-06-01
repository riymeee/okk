<?php
include('../config.php');  

if (isset($_POST['hotel_delete'])) {
    $hotel_id = mysqli_real_escape_string($conn, $_POST['hotel_delete']);

    // Fetch the photo associated with the hotel
    $delete_photo_query = mysqli_query($conn, "SELECT photo FROM `hotel` WHERE id = '$hotel_id'") or die('query failed');
    $fetch_delete_photo = mysqli_fetch_assoc($delete_photo_query);
    
    // Delete the photo from the folder
    if ($fetch_delete_photo) {
        unlink('uploaded_img/'.$fetch_delete_photo['photo']);
    }

    // Prepared statement to delete the hotel
    $delete_query = $conn->prepare("DELETE FROM hotel WHERE id = ?");
    $delete_query->bind_param("i", $hotel_id);

    if ($delete_query->execute()) {
        // Redirect to the view-hotel page after successful deletion
        header('Location: view-hotel.php'); 
        exit();
    } else {
        echo 'Failed to delete hotel.';
    }

    $delete_query->close();
} else {
    echo 'Hotel ID is not provided.';
}

$conn->close();
?>
