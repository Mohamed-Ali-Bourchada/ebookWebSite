<?php
include("actions/connect.php");
// Check if session is not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION["auth"])){
    header("Location: ../login/login.php");
    exit();
}
else{
    if(!isset($_SESSION["admin"])){
    header("Location: ../home.php");
    exit();
}
}
$sql = "SELECT * FROM books"; // SQL query to select all users
$result = $dbh->query($sql); // Execute the query
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <!-- BOOTSRAP JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books List</title>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <!-- BOOTSRAP JS CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- local scripts -->
<script src="java_script/script.js"></script>

<style>
@media (min-width: 768px) {
    .bd-placeholder-img-lg {
        font-size: 3.5rem;
    }
}

.bi {
    vertical-align: -.125em;
    fill: currentColor;
}
.nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
}
.nav-scroller .nav {
    display: flex;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
}
.bd-mode-toggle {
    z-index: 1500;
}

.bd-mode-toggle .dropdown-menu .active .bi {
    display: block !important;
}


</style>
</head>
<body>
<main class="d-flex justify-content-around">
<?php
include("dashboard_nav.php"); // Include navbar.php file
?>
<div class="container mt-5">
    <h1 class="text-center">List of Books</h1>
<form  method="POST" onsubmit="return confirmDeleteBooks(event, 'actions/delete_book.php')">
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Book title</th>
            <th scope="col">Writer</th>
            <th scope="col">Image</th>
            <th scope="col"><button type="submit" class="btn btn-danger btn-sm" >Delete</button></th>
           
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>" . $row['id_book'] . "</td>
                    <td>" . $row['title_book'] . "</td>
                    <td>" . $row['writer'] . "</td>";
                   echo "<td><img src='../" . $row['image_url'] . "' style='width:80px'></td>
                  <td><input type='checkbox' name='booksToDelete[]' class='form-check-input' value='" . $row['id_book'] . "'></td></tr>";

                  
        }
        ?>
        </tbody>
    </table>
    </form>
</div>
    </main>
<!-- Bootstrap Bundle with Popper.js -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
