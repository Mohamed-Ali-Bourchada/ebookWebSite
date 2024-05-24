
<?php
include("connection.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["loginEmail"];
    $password = $_POST["loginPassword"];

    // Retrieve the hashed password from the database for the provided email
    $query = "SELECT password FROM users WHERE email = ?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $hashedPassword);

    if (mysqli_stmt_fetch($stmt)) {
        // Verify the provided password against the hashed password
        if (password_verify($password, $hashedPassword)) {
            // Passwords match, user authenticated
            $_SESSION["user_email"] = $email;
            $_SESSION["auth"] = true;
            header("Location: userData.php");
            header("Location: ../../home.php");
            exit();
        }
    }

    // If the password verification fails or the email doesn't exist
    $_SESSION["login_alert"] = true;
    header("Location: ../login.php");
    exit();

    mysqli_stmt_close($stmt);
    mysqli_close($connect);
}
?>
