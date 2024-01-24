<?php
include("../login/php/userData.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dateBirth = $_POST["dateBirth"];
    $delete_password = $_POST["delete_account_pass"];

    // SELECT to check if the password is valid
    $selectPass = "SELECT * FROM users WHERE password=?";
    $stmtSelect = mysqli_prepare($connect, $selectPass);
    mysqli_stmt_bind_param($stmtSelect, "s", $delete_password);
    mysqli_stmt_execute($stmtSelect);
    $resSelect = mysqli_stmt_get_result($stmtSelect);

    if (mysqli_num_rows($resSelect) > 0) {
        // Password is valid,
        $update = "UPDATE users SET date_of_birth=? WHERE email=? AND password=?";
        $stmtUpdate = mysqli_prepare($connect, $update);
        mysqli_stmt_bind_param($stmtUpdate, "sss", $dateBirth, $receivedValue, $delete_password);
        mysqli_stmt_execute($stmtUpdate);

        $affectedRows = mysqli_stmt_affected_rows($stmtUpdate);

        mysqli_stmt_close($stmtUpdate);

        if ($affectedRows > 0) {
            echo "<script>alert('Your Date of Birth has been successfully updated');</script>";
            echo "<script>setTimeout(function(){ window.location.href='../settings.php'; });</script>";
        } else {
            echo "<script>alert('Same Date of Birth!');</script>";
            echo "<script>setTimeout(function(){ window.location.href='../settings.php'; });</script>";
        }
    } else {
        // Invalid password
        echo "<script>alert('Invalid password. Please check your password and try again.');</script>";
        echo "<script>setTimeout(function(){ window.location.href='../settings.php'; });</script>";
    }
    mysqli_stmt_close($stmtSelect);
}
?>