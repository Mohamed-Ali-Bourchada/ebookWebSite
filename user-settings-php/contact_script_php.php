<?php
include("../login/php/connection.php");
include("../login/php/userData.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST["fullName"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    // select user id 
    $select_user_id = "SELECT user_id FROM users WHERE email=?";
    $stmt_select = mysqli_prepare($connect, $select_user_id);
    mysqli_stmt_bind_param($stmt_select, "s", $receivedValue);
    mysqli_stmt_execute($stmt_select);
    mysqli_stmt_bind_result($stmt_select, $user_id);
    
    mysqli_stmt_fetch($stmt_select);
    mysqli_stmt_close($stmt_select);

    // Inserting message into the messages table
    $insertMessage = "INSERT INTO messages (user_id, full_name, email, subject, message) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connect, $insertMessage);
    mysqli_stmt_bind_param($stmt, "issss", $user_id, $fullName, $email, $subject, $message);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Your message has been sent');</script>";
        echo "<script>setTimeout(function(){ window.location.href='../contact.php'; });</script>";
    } else {
        echo "Error: " . mysqli_error($connect);
    }

    mysqli_stmt_close($stmt);
}
?>