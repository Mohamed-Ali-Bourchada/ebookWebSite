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

    // Check if booksToDelete is set and not empty
    if(isset($_POST['booksToDelete'])) {
        // Loop through each selected book ID and delete it
        foreach($_POST['booksToDelete'] as $k) {
            $sql = "DELETE FROM books WHERE id_book=:id_book";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':id_book', $k);
            $stmt->execute();
        }
    }
    // Redirect back to list_books.php after successful deletion
    header("Location: ../list_books.php");
    exit(); // Make sure no other output is sent before header redirect
?>
