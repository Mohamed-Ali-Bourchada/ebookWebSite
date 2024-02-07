<?php
include("login/php/userData.php");
include("login/php/connection.php");

$test = "0"; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = $_POST["search"];
    $search = strtolower($search);
    $select = "SELECT * FROM books WHERE LOCATE('$search', LOWER(title_book)) > 0";
    $result = mysqli_query($connect, $select);

    if ($result && mysqli_num_rows($result) > 0) {
        $test = "1"; 
    }
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
    <link rel="icon" type="image/png" href="assets/icon.png">
    <title>ZipBooks|Home</title>
    <script>
    function searchTest() {
        var search = document.getElementById("search").value;
        if (search == "") {
            return false

        }
    }
    </script>

</head>

<body>
    <nav class="bg-white navbar navbar-expand-lg   fixed-top " id="navbar" aria-label="Offcanvas navbar large">
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
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>

                        <li class="nav-item">

                            <div class="btn-group test">
                                <button type="button" class="dropdown-toggle nav-link" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bi bi-person-lines-fill"></i> <?php
                            echo $userName;
                            ?>
                                    <!-- Display the user's name with an icon -->
                                </button>
                                <div class="test">
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item nav-link" href="profil.php"><i
                                                class="bi bi-person-fill"></i>
                                            Profile</a>
                                        <a class="dropdown-item nav-link" href="settings.php"><i
                                                class="bi bi-gear-fill"></i>
                                            Settings</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item nav-link" href="login/login.php"><i
                                                class="bi bi-box-arrow-right"></i>
                                            Logout</a>
                                    </div>
                                </div>
                            </div>

                        </li>
                        <li class="nav-item">
                            <form class="form" onsubmit="return searchTest()" method="POST"
                                style="display: flex; align-items: center;">
                                <input class="form-control " type="search" name="search" placeholder="Search"
                                    aria-label="Search" id="search"
                                    style="margin-right:15px;margin-left:10px;border-radius:50px" />

                                <button class="btn" type="submit" id="searchButton">Search</button>

                            </form>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

    </nav>
    <div class="cover-container">

        <div class="cover-text">
            <h1>Discover the Joy of Reading</h1>
            <p>Explore diverse books at Zip Books, immerse in captivating stories, and enrich your knowledge.</p>
            <a href="#ebookSection" class="btn btn-primary">Explore Books</a>
        </div>
        <div class="container">

        </div>
    </div>
    <!-- list of books -->
    <div class="main" id="ebookSection">
        <?php
    if ($test == "1") {
        while ($data = $result->fetch_assoc()) {
            echo "<div class='ebook-card'>";
            echo "<img src='{$data['image_url']}' alt='{$data['title_book']}'  loading='lazy' style='width: 100%;'>";
            echo "<h2>{$data['title_book']}</h2>";
            echo "<p>By {$data['writer']}</p>";
            echo "<a href='{$data['file_url']}'class='bg-success' target='_blank'>Download <i class='bi bi-download'></i></a>";
            echo "</div>"; 
        }
    } else if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($search)) {
        echo "<p>No results found for '{$search}'.</p>";
    } else {
        // Display all data when the user hasn't performed a search
        $select_books_data = "SELECT * FROM books";
        $result_books_data = mysqli_query($connect, $select_books_data);

        while ($data = $result_books_data->fetch_assoc()) {
            echo "<div class='ebook-card'>";
            echo "<img src='{$data['image_url']}' alt='{$data['title_book']}' loading='lazy' style='width: 100%;'>";
            echo "<h2>{$data['title_book']}</h2>";
            echo "<p>By {$data['writer']}</p>";
            echo "<a href='{$data['file_url']}' target='_blank'>Download <i class='bi bi-download'></i></a>";
            echo "</div>"; // close ebook-card div
        }
    }
    ?>
    </div>

    <!-- footer -->
    <footer class="bg-white text-center py-3 site-footer ">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <p class="copyright-text">Copyright &copy; 2024 All Rights Reserved <span
                            style="color:#FF6F03;text-decoration:underline">Mohamed
                            Ali
                            Bourchada</span>
                    </p>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="social-icons">
                        <li><a class="facebook" href="https://www.facebook.com/mohamed.bourchada.7/"
                                target="_blank"><img src="assets/facebook.png" alt="facebook Icon" /></a>
                        </li>
                        <li><a class="twitter" href="https://twitter.com/MohamedBrrr" target="_blank"><img
                                    src="assets/twitter.png" alt="twitter Icon" /></a>
                        </li>
                        <li><a class="instagram" href="https://www.instagram.com/mohamed_bourchada/"
                                target="_blank"><img src="assets/instagram.png" alt="instagram Icon" /></a>
                        </li>
                        <li><a class="github" href="https://github.com/dalios-tg" target="_blank"><img
                                    src="assets/github.png" alt="github Icon" /></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>