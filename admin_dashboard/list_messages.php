
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
$sql = "SELECT * FROM messages"; // SQL query to select all users
$result = $dbh->query($sql); // Execute the query
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <!-- BOOTSRAP JS CDN -->
     <!-- BOOTSRAP JS CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
function confirmDelete(event, actionURL) {
    var checkboxes = document.querySelectorAll('input[name="messagesToDelete[]"]:checked');
    if (checkboxes.length > 0) {
        event.preventDefault(); // Prevent the default form submission

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: true
        });

        swalWithBootstrapButtons.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire({
                    title: "Deleted!",
                    text: "Data has been deleted.",
                    icon: "success"
                }).then(() => {
                    // After the alert is closed, submit the form with the specified action URL
                    document.querySelector('form').setAttribute('action', actionURL);
                    document.querySelector('form').submit();
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: "Cancelled",
                    showConfirmButton: false,
                    timer: 1000, // Set the timer to display the error message for 1 second
                    icon: "error"
                });
            }
        });
    } else {
        Swal.fire({
            title: 'No books selected',
            text: 'Please select at least one book to delete.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
                event.preventDefault(); // Prevent the default form submission

    }
}
</script>

</head>
<body>
<main class="d-flex justify-content-around">
<?php
include("dashboard_nav.php"); // Include navbar.php file
?>
<div class="container mt-5">
    <h1 class="text-center">List of Messages</h1>
<form  method="POST" onsubmit="return confirmDelete(event, 'actions/delete_message.php')">
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">User id</th>
            <th scope="col">Full name</th>
            <th scope="col">Email</th>
            <th scope="col">Subject</th>
            <th scope="col" colspan="2">Messages</th>
            <th scope="col">Created at</th>
            <th scope="col"><button type="submit" class="btn btn-danger btn-sm">Delete</button></th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['user_id'] . "</td>
                    <td>" . $row['full_name'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['subject'] . "</td>
                     <td colspan='2'>" . $row['message'] . "</td>
                    <td>" . $row['insertion_date_time'] . "</td>
                  <td><input type='checkbox' name='messagesToDelete[]' class='form-check-input' value='" . $row['id'] . "'></td></tr>";
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
