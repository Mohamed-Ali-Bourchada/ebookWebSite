<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("login/php/userData.php");
if(!isset($_SESSION["auth"])){
header("Location: login/login.php");
exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="login/css/style.css">
    <link rel="stylesheet" href="css/settingsStyle.css">
    <script src="js/settingsScripts.js"></script>

    <link rel="icon" type="image/png" href="assets/icon.png">
    <title>ZipBooks|Settings</title>
</head>

<body>
  <?php 
    require("nav_bar.php");
    ?>
    <div class="content">
        <section class="section">
            <h2>Change Password</h2>
            <form action="user-settings-php/passwordCheck.php" name="form" method="POST"
                onsubmit="return newPasswordValidation()">
                <div class="field">
                    <input type="password" placeholder="Current Password" autocomplete="off" class="password"
                        name="current_password" id="current_password">
                    <p id="current_passError"></p>
                </div>
                <div class="field">
                    <input type="password" placeholder="New Password" autocomplete="off" class="password"
                        name="newPassword" id="pass">
                    <p id="newPassError"></p>
                </div>

                <div class="field">
                    <input type="password" placeholder="Confirm New Password" autocomplete="off" class="password"
                        id="confirmPass">
                    <p id="newConfirmPassError">
                    </p>
                    <i class='bx bx-hide eye-icon'></i>
                </div>

                <div class="field">

                    <input type="submit" value="Change password" class="button">
                </div>
            </form>
        </section>

        <section class="section">
            <h2>Delete Account</h2>
            <form action="user-settings-php/deleteAccount.php" method="post" onsubmit="return deletePassword()">
                <div class="field">
                    <input type="password" name="delete_account_pass" placeholder="Password" autocomplete="off"
                        class="password" id="delete_password">
                    <p id="delete_password_error"></p>
                    <i class='bx bx-hide eye-icon'></i>
                </div>
                <div class="field">

                    <input type="submit" value="Delete my account" class="button">
                </div>
            </form>
        </section>

        <section class="section last-section">
            <h2>Update Profile Information</h2>
            <form action="user-settings-php/updateFullName.php" method="post" onsubmit="return nameValidation()">

                <div class="field">
                    <input type="text" placeholder="Full name" class="input" name="fullName" id="fullName"
                        maxlength="32" />
                    <p id="nameError"></p>

                </div>
                <div class="field">
                    <input type="password" name="delete_account_pass" placeholder="Password" autocomplete="off"
                        class="password" id="delete_password2">
                    <p id="delete_password_error2"></p>
                    <i class='bx bx-hide eye-icon'></i>
                </div>
                <div class="field">

                    <input type="submit" value="Update Full name" class="button">
                </div>
            </form>
            <form action="user-settings-php/updateDateBirth.php" method="post" onsubmit="return dateValidation()">

                <div class="dateBirth">
                    <div class="field">
                        <label for="dateBirth" class="birth">Date of birth : </label>
                        <input type="date" id="dateBirth" name="dateBirth" />
                        <p id="ageError"></p>
                    </div>
                    <div class="field">
                        <input type="password" name="delete_account_pass" placeholder="Password" autocomplete="off"
                            class="password" id="delete_password3">
                        <p id="delete_password_error3"></p>
                        <i class='bx bx-hide eye-icon'></i>
                    </div>
                    <div class="field">

                        <input type="submit" value="Update date of birth" class="button">
                    </div>
            </form>
        </section>
    </div>
    <?php 
    require("footer.php");
    ?>

</body>

</html>