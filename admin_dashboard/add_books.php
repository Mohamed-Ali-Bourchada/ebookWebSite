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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Book</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            width: 100%;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-container label {
            font-weight: bold;
        }
        .btn{
           width: 100%;
        }
    </style>
    <link rel="icon" type="image/png" href="../assets/icon.png">


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
<script src="java_script/script.js"></script></head>
<body>
    <div class="d-flex justify-content-around">
    <?php include("dashboard_nav.php"); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="form-container bg-white p-4 rounded shadow">
                <h2 class="text-center mb-4">Insert Book</h2>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="title_book" class="form-label">Title Book</label>
                        <input type="text" class="form-control" id="title_book" name="title_book" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="writer" class="form-label">Writer</label>
                        <input type="text" class="form-control" id="writer" name="writer" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="image_url" class="form-label">Image URL</label>
                        <input type="file" class="form-control" id="image_url" name="image_url" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="file_url" class="form-label">File URL</label>
                        <input type="file" class="form-control" id="file_url" name="file_url" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Insert</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
    <!-- Bootstrap Bundle with Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    // Database connection
    include("actions/connect.php");

    $title_book = $_POST["title_book"];
    $writer = $_POST["writer"];
    $image_url = $_FILES["image_url"]["name"];
    $file_url = $_FILES["file_url"]["name"];

    // Validate image file
    $allowed_image_extensions = array('png', 'jpg', 'jpeg');
    $image_extension = strtolower(pathinfo($image_url, PATHINFO_EXTENSION));
    if (!in_array($image_extension, $allowed_image_extensions)) {
        echo "<script>
                Swal.fire({
                    title: 'Error',
                    text: 'Invalid image file format. Please upload a PNG, JPG, or JPEG file.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
              </script>";
        exit; // Stop execution if the image format is invalid
    }

    // Validate PDF file
    $allowed_pdf_extensions = array('pdf');
    $pdf_extension = strtolower(pathinfo($file_url, PATHINFO_EXTENSION));
    if (!in_array($pdf_extension, $allowed_pdf_extensions)) {
        echo "<script>
                Swal.fire({
                    title: 'Error',
                    text: 'Invalid PDF file format. Please upload a PDF file.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
              </script>";
        exit; // Stop execution if the PDF format is invalid
    }

    // Check if the book already exists
    $book_exists_sql = "SELECT COUNT(*) FROM books WHERE title_book = :title_book";
    $book_exists_stmt = $dbh->prepare($book_exists_sql);
    $book_exists_stmt->bindParam(':title_book', $title_book);
    $book_exists_stmt->execute();
    $book_row_count = $book_exists_stmt->fetchColumn();

    if ($book_row_count == 0) {
        // Move the uploaded files to the desired directory
        $target_dir_img = "../assets/books_images/";
        $target_dir_files = "../assets/pdfs_files/";
        $image_target_file = $target_dir_img . basename($image_url);
        $file_target_file = $target_dir_files . basename($file_url);

        // Ensure directories exist
        if (!is_dir($target_dir_img)) {
            mkdir($target_dir_img, 0777, true);
        }
        if (!is_dir($target_dir_files)) {
            mkdir($target_dir_files, 0777, true);
        }

        // Move uploaded files to the target directories
        if (move_uploaded_file($_FILES["image_url"]["tmp_name"], $image_target_file) && move_uploaded_file($_FILES["file_url"]["tmp_name"], $file_target_file)) {
            $image_target_db = "assets/books_images/" . basename($image_url);
            $file_target_db = "assets/pdfs_files/" . basename($file_url);
            $sql = "INSERT INTO books (title_book, image_url, writer, file_url) VALUES (:title_book, :image_url, :writer, :file_url)";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':title_book', $title_book);
            $stmt->bindParam(':image_url', $image_target_db);
            $stmt->bindParam(':writer', $writer);
            $stmt->bindParam(':file_url', $file_target_db);

            if ($stmt->execute()) {
                echo "<script>
                        Swal.fire({
                            title: 'Success',
                            text: 'Book added successfully',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                      </script>";
            } else {
                echo "<script>
                        Swal.fire({
                            title: 'Error',
                            text: 'An error occurred while adding the book',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                      </script>";
            }
        } else {
            echo "<script>
                    Swal.fire({
                        title: 'Error',
                        text: 'Failed to upload files. Please try again.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                  </script>";
        }
    } else {
        echo "<script>
                Swal.fire({
                    title: 'Error',
                    text: 'The book title already exists. Please select another title.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
              </script>";
    }
}
?>
