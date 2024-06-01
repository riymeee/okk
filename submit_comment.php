<?php
include('config.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rating = $_POST['rating'];
    $comment = trim($_POST['comment']);
    $id_user = intval($_POST['id_user']);

    if (!empty($rating) && !empty($comment) && $id_user > 0) {
        $stmt = $conn->prepare("INSERT INTO commentaire (rating, comment, id_user) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $rating, $comment, $id_user);
        if ($stmt->execute()) {
            header("Location: review.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Please provide a rating and a comment.";
    }
}

$conn->close();
?>
