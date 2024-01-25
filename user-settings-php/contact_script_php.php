<?php
include("../login/php/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST["fullName"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $insertMessage = "INSERT INTO messages (full_name, email, subject, message) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($connect, $insertMessage);
    mysqli_stmt_bind_param($stmt, "ssss", $fullName, $email, $subject, $message);
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Your message has been sent');</script>";
        echo "<script>setTimeout(function(){ window.location.href='../contact.php'; });</script>";

    } else {
        echo "Error: " . mysqli_error($connect);
    }

    mysqli_stmt_close($stmt);
}
?>