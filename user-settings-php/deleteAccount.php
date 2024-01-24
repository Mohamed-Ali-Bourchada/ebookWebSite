<?php
include("../login/php/userData.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $delete_password = $_POST["delete_account_pass"];

    // Using prepared statement to prevent SQL injection
    $delete = "DELETE FROM users WHERE email=? AND password=?";
    $stmt = mysqli_prepare($connect, $delete);
    mysqli_stmt_bind_param($stmt, "ss", $receivedValue, $delete_password);
    mysqli_stmt_execute($stmt);

    $affectedRows = mysqli_stmt_affected_rows($stmt);

    mysqli_stmt_close($stmt);

    if ($affectedRows > 0) {
        echo "<script>alert('Your account has been successfully deleted');</script>";
        echo "<script>setTimeout(function(){ window.location.href='../login/signUp.php'; });</script>";
    } else {
        echo "<script>alert('Invalid password. Please check your password and try again.');</script>";
        echo "<script>setTimeout(function(){ window.location.href='../settings.php'; });</script>";
    }
}
?>