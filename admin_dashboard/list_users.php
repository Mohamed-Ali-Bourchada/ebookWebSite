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
else
{
    if(!isset($_SESSION["admin"])){
    header("Location: ../home.php");
    exit();}
}
$sql = "SELECT * FROM users"; // SQL query to select all users
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- local script  -->
    <script src="java_script/script.js"></script>
</head>
<body>
<main class="d-flex justify-content-around">
<?php
include("dashboard_nav.php"); // Include navbar.php file
?>
<div class="container mt-5">
    <h1 class="text-center">List of Users</h1>
<form  method="POST" onsubmit="return confirmDelete(event, 'actions/delete_user.php')">
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Full name</th>
            <th scope="col">Date of birth</th>
            <th scope="col">Email</th>
            <th scope="col">Gender</th>
            <th scope="col">Is admin</th>
            <th scope="col">Created at</th>
            <th scope="col" class="d-flex justify-content-center"><button type="submit" class="btn btn-danger btn-sm">Delete</button></th>
        </tr>
        </thead>
        <tbody>
        <?php
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>
            <td>" . $row['user_id'] . "</td>
            <td>" . $row['full_name'] . "</td>
            <td>" . $row['date_of_birth'] . "</td>
            <td>" . $row['email'] . "</td>
            <td>" . $row['gender'] . "</td>
            <td>" . $row['is_admin'] . "</td>
            <td>" . $row['created_at'] . "</td>
            <td class='d-flex justify-content-around'>
                <input type='checkbox' name='usersToDelete[]' value='" . $row['user_id'] . "' class='form-check-input'>
                <button type='button' class='btn btn-info btn-sm text-white' onclick='modal(
                    \"" . addslashes($row['full_name']) . "\",
                    \"" . $row['date_of_birth'] . "\",
                    \"" . addslashes($row['email']) . "\",
                    \"" . $row['gender'] . "\",
                    \"" . $row['is_admin'] . "\",
                    \"" . $row['user_id'] . "\"
                )'>Modify</button>
            </td>
          </tr>";
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
