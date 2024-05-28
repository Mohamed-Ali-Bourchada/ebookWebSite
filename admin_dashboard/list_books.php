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
$sql = "SELECT * FROM books"; // SQL query to select all books
$result = $dbh->query($sql); // Execute the query
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books List</title>
<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- BOOTSRAP JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


 <!-- BOOTSRAP CSS CDN -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<!-- local Links -->
<script src="java_script/script.js"></script>
<link rel="icon" type="image/png" href="../assets/icon.png">


</head>
<body>
<main class="d-flex justify-content-around">
<?php
include("dashboard_nav.php");?>
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
            <th scope="col">File</th>

            <th scope="col" class="d-flex justify-content-center"><button type="submit" class="btn btn-danger btn-sm">Delete</button></th>
           
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>" . $row['id_book'] . "</td>
                    <td style='width:20em'>" . $row['title_book'] . "</td>
                    <td style='width:10em'>" . $row['writer'] . "</td>";
                   echo "<td style='width:10em;text-align:center'><img src='../" . $row['image_url'] . "' style='width:100px'/></td>
                   ";
                    echo "<td style='width:15em'>
                            <div class='card' style='width: 15rem;'>
                                <div class='card-body'>
                                    <p class='card-text'>Click below to view the PDF:</p>
                                    <a href='../" . $row['file_url'] . "' class='btn btn-primary' target='_blank'>
                                        <i class='bi bi-file-earmark-pdf' style='font-size: 1.2rem; margin-right: 8px;'></i> View PDF
                                    </a>
                                </div>
                            </div>
                        </td>

                  <td style='width:8em;text-align:center'><input type='checkbox' name='booksToDelete[]' class='form-check-input' value='" . $row['id_book'] . "'>
                  <button type='button' class='btn btn-info btn-sm text-white' onclick='modal(
                    \"" . addslashes($row['title_book']) . "\",
                    \"" . $row['writer'] . "\",
                    \"" . addslashes($row['image_url']) . "\"
            
                )'>Modify</button></td></tr>";

                  
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
