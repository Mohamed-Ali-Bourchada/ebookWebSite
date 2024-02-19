<?php
include("../login/php/userData.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $delete_password = $_POST["delete_account_pass"];

    //prepared statement to prevent SQL injection
    $check_user_query = "SELECT user_id FROM messages WHERE user_id IN (SELECT user_id FROM users WHERE email=? AND password=?)";
    $check_stmt = mysqli_prepare($connect, $check_user_query);
    mysqli_stmt_bind_param($check_stmt, "ss", $receivedValue, $delete_password);
    mysqli_stmt_execute($check_stmt);
    $user_exists = mysqli_stmt_num_rows($check_stmt) > 0;
    mysqli_stmt_close($check_stmt);

    if ($user_exists) {
        // Drop the foreign key constraint
        $drop_constraint_query = "ALTER TABLE messages DROP FOREIGN KEY messages_ibfk_1";
        mysqli_query($connect, $drop_constraint_query);
    }

    //  the user from the users table
    $delete_user_query = "DELETE FROM users WHERE email=? AND password=?";
    $stmt = mysqli_prepare($connect, $delete_user_query);
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