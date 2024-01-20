<?php
include("login/php/userData.php");


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
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/png" href="assets/icon.png">

</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg  bg-white fixed-top " id="navbar" aria-label="Offcanvas navbar large">
        <div class="container-fluid">
            <a href="home.php">
                <img src="assets/logo.png" alt="logo de site web " class="mainNavLogo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2"
                aria-controls="offcanvasNavbar2">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-white" tabindex="-1" id="offcanvasNavbar2"
                aria-labelledby="offcanvasNavbar2Label">
                <div class="offcanvas-header">
                    <img src="assets/logo.png" alt="logo de site web" class="logo"></a>

                    <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contacts">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login/login.php">Login</a>
                        </li>
                        <li class="nav-item">

                            <div class="btn-group test">
                                <button type="button" class="dropdown-toggle nav-link" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bi bi-person-lines-fill"></i>
                                    <?php
                                echo $userName;
                                ?>
                                    <!-- Display the user's name with an icon -->
                                </button>
                                <div class="test">
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item nav-link" href="#"><i class="bi bi-person-fill"></i>
                                            Profile</a>
                                        <a class="dropdown-item nav-link" href="#"><i class="bi bi-gear-fill"></i>
                                            Settings</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item nav-link" href="login/login.php"><i
                                                class="bi bi-box-arrow-right"></i>
                                            Logout</a>
                                    </div>
                                </div>
                            </div>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content - About Page -->
    <section class="container mt-5">
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
                    <li>Community Engagement: Connect with fellow readers, share recommendations, and discover new
                        favorites.</li>
                </ul>

                <p>ZipBooks is committed to promoting literacy and fostering a love for reading. Join our community
                    today and embark on a journey of knowledge, imagination, and discovery!</p>
            </div>

            <!-- Sidebar (Optional) -->
            <div class="col-lg-4">
                <h2>Contact Us</h2>
                <p>If you have any questions, feedback, or suggestions, feel free to reach out to us:</p>
                <p>Email: info@zipbooks.com</p>
                <p>Phone: +1 (123) 456-7890</p>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS and Popper.js -->

</body>

</html>