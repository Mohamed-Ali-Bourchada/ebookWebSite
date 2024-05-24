<?php
include("login/php/userData.php");
// Check if session is not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
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
    <script src="js/settingsScripts.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/contact_css.css">
    <link rel="icon" type="image/png" href="assets/icon.png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <title>ZipBooks|Home</title>

</head>

<body>
    <?php 
    require("nav_bar.php");
    if(isset($_SESSION["contact"])){
                 echo "<script>
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Your message has been sent successfully',
            showConfirmButton: false,
            timer: 1500
        });
    </script>";
        unset($_SESSION["contact"]);
    }
    ?>

    <div class="contact_section">
        <div class="icons_section">
            <div class="icons">
                <div class="single_address">
                    <i class="fa fa-map-marker"></i>
                    <h4>Our Address</h4>
                    <p>Mednine, 4185 Djerba Houmt Souk </p>
                </div>
                <div class="single_address">
                    <i class="fa fa-envelope"></i>
                    <h4>Send your message</h4>
                    <p>mohamedbourchada123@gmail.com</p>
                </div>
                <div class="single_address">
                    <i class="fa fa-phone"></i>
                    <h4>Call us on</h4>
                    <p>(+216) 58 690 686</p>
                </div>

            </div>
        </div>
        <div class="contact_form">

            <form action=" user-settings-php/contact_script_php.php" name="form" method="POST"
                onsubmit="return validateContactForm()">

                <input type="text" placeholder="Full name" class="input" name="fullName" id="fullName" maxlength="32" />
                <p id="nameError"></p>
                <input type="text" placeholder="Email" class="input" name="email" id="email" />
                <p id="emailError"></p>

                <input type="text" placeholder="Subject" class="input" name="subject" minlength="10" id="subject"
                    maxlength="100" />
                <p id="subjectError"></p>

                <div class="message">
                    <textarea name="message" id="message" placeholder="Message" minLength="35"></textarea>
                    <p id="messageError"></p>

                </div>
                <div class="field">

                    <input type="submit" value="Signup" class="button">
                </div>
            </form>
        </div>

    </div>


    <!-- footer -->
    <?php 
    require("footer.php");
    ?>
</body>

</html>