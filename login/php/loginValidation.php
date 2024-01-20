<?php
include("connection.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["loginEmail"];
    $password = $_POST["loginPassword"];

    // statements to prevent SQL injection
    $checkLogin = "SELECT * FROM users WHERE email = ? AND password = ?";
    $stmt = mysqli_prepare($connect, $checkLogin);
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);

    // Check if a row is returned
    if (!mysqli_stmt_fetch($stmt)) {
        $_SESSION["login_alert"] = "1";
        header("Location: ../login.php");
    } else {
        // Redirect to userData.php with the user's email and open the home page 
        $_SESSION["user_email"]=$email;
        header("Location: userData.php");
        header("Location: ../../home.php");

    }

    mysqli_close($connect);
}
?>