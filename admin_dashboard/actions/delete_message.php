<?php
include("connect.php");
// Check if session is not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION["auth"])){
    header("Location: ../login/login.php");
    exit();
}
else{
    if(!isset($_SESSION["admin"])){
    header("Location: ../home.php");
    exit();
}
}

    // Check if messagesToDelete is set and not empty
    if(isset($_POST['messagesToDelete'])) {
        // Loop through each selected book ID and delete it
        foreach($_POST['messagesToDelete'] as $k) {
            $sql = "DELETE FROM messages WHERE id=:id_msg";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':id_msg',$k);
            $stmt->execute();
        }
    }
    // Redirect back to list_books.php after successful deletion
    header("Location: ../list_messages.php");
    exit(); // Make sure no other output is sent before header redirect
?>
