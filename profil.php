
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Redirect to login page if user is not authenticated
if (!isset($_SESSION["auth"])) {
    header("Location: login/login.php");
    exit(); 
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/profil_styles.css">

    <link rel="icon" type="image/png" href="assets/icon.png">

    <title>ZipBooks|Profil</title>

</head>

<body>
    <?php 
    include("login/php/userData.php");
    require("nav_bar.php");
    ?>

    <div class="container profile-container">
        <div class="profile-header">
            User Profile
        </div>



        <div class="profile-details">
            <div> <span class="titre">Name :</span>
                <span class="user_data"><?php 
                echo $profil_full_name?></span>
            </div>
            <div><span>Email :</span><span class="user_data"> <?php echo $profil_email?></span></div>

            <div><span>Date of birth :</span><span class="user_data_birth">
                    <?php echo $profil_date_birth?></span>
            </div>
            <div class="gender"><span>Gender : </span><span class="user_data_gender"><?php echo $profil_gender?></span>
            </div>
        </div>

        <!-- Button to go to the Settings page -->

        <a href="settings.php" class="settings_button">
            <i class="bi bi-gear-fill"></i> Go to Settings
        </a>


    </div>
    <!-- footer -->
    <?php 
    require("footer.php");
    ?>

</body>

</html>