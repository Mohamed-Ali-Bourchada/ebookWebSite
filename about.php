<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start()
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
    <title>About ZipBooks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" type="image/png" href="assets/icon.png">



    <style>
    a {
        text-decoration: none;
        color: black
    }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <?php 
    require("nav_bar.php");
    ?>

    <!-- Main Content - About Page -->
    <section class="container" style="margin-top:150px">
        <div class="row">
            <div class="col-lg-8">
                <h1>About ZipBooks</h1>
                <p>Welcome to ZipBooks, your go-to platform for downloading a wide range of books in various genres.
                    Whether you're an avid reader, a student, or someone looking to explore new worlds through
                    literature, ZipBooks has something for everyone.</p>

                <p>At ZipBooks, we believe in the power of knowledge and the joy of reading. Our platform is designed
                    to provide easy access to a diverse collection of books, covering topics from fiction to
                    non-fiction, educational to entertainment.</p>

                <p>Key Features:</p>
                <ul>
                    <li>Extensive Library: Explore a vast collection of books from different genres.</li>
                    <li>User-Friendly Interface: Enjoy a seamless browsing and downloading experience.</li>
                    <li>Accessibility: Access your favorite books anytime, anywhere.</li>

                </ul>

                <p>ZipBooks is committed to promoting literacy and fostering a love for reading. Join our community
                    today and embark on a journey of knowledge, imagination, and discovery!</p>
            </div>

            <!-- Sidebar (Optional) -->
            <div class="col-lg-4">
                <h2>Contact Us</h2>
                <p>If you have any questions, feedback, or suggestions, feel free to reach out to us:</p>
                <div class="d-flex align-items-center">

                    <p class="mr-2"><a href="mailto:mohamedbourchda123@gmail.com"><i class="bi bi-envelope-at"
                                style="font-size: 30px;margin-right:30px"></i></a></p>
                    <p><a href="tel:58690686"><i class="bi bi-telephone-outbound" style="font-size: 30px;"></i></a></p>
                </div>
            </div>
    </section>


    <!-- footer -->
    <?php 
    require "footer.php";
    ?>
</body>

</html>
