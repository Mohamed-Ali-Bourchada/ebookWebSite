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
     <!-- BOOTSRAP JS CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>

    // function for delete confirmation
function confirmDelete(event, actionURL) {
    var checkboxes = document.querySelectorAll('input[name="usersToDelete[]"]:checked');
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

// modal for update user data
async function modal(fullName, dateBirth, email, gender, isAdmin, user_id) {
    const { value: formValues } = await Swal.fire({
        title: "Edit User",
        html: `
            <div class="d-flex flex-column">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <label for="full_name" class="me-2">Full Name</label>
                    <input id="full_name" name="full_name" class="form-control" style="width: 70%;" value="${fullName}">
                </div>
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <label for="date_birth" class="me-2">Date of Birth</label>
                    <input id="date_birth" name="date_birth" class="form-control" style="width: 70%;" value="${dateBirth}">
                </div>
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <label for="email" class="me-2">Email</label>
                    <input id="email" name="email" class="form-control" style="width: 70%;" value="${email}">
                </div>
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <label for="gender" class="me-2">Gender</label>
                    <label><input type="radio" name="gender" class="form-check-input" value="M" ${gender === 'M' ? 'checked' : ''}> Male</label>
                    <label><input type="radio" name="gender" class="form-check-input" value="F" ${gender === 'F' ? 'checked' : ''}> Female</label>
                </div>
                
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <label for="is_admin" class="me-2">Is Admin</label>
                    <label><input type="radio" name="is_admin" class="form-check-input" value="1" ${isAdmin === '1' ? 'checked' : ''}> Yes</label>
                    <label><input type="radio" name="is_admin" class="form-check-input" value="0" ${isAdmin === '0' ? 'checked' : ''}> No</label>

                </div>
            </div>
        `,
        focusConfirm: false,
        preConfirm: () => {
            return {
                user_id: user_id,
                full_name: document.getElementById("full_name").value,
                date_birth: document.getElementById("date_birth").value,
                email: document.getElementById("email").value,
                gender: document.querySelector('input[name="gender"]:checked').value,
                is_admin: document.querySelector('input[name="is_admin"]:checked').value
            };
        }
    });

    if (formValues) {
        // Send the data to the PHP endpoint via AJAX
        fetch('actions/update_user.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(formValues)
        }).then(function(response){
            return response.json();
        }).then(function(formValues){
            if (formValues.success) {
                Swal.fire('Success', 'User updated successfully', 'success');
                if (formValues.is_admin == 0) {
                    setTimeout(function(){
                        window.location.href = "../signOut.php";
                    }, 1500);
                } else {
                    setTimeout(function(){
                        window.location.reload();
                    }, 1500);
                }
} else {
    Swal.fire('Error', formValues.error, 'error');
}

        }).catch(function(error){
            console.error('Error:', error);
            Swal.fire('Error', 'An error occurred while updating the user', 'error');
        });
    }
}


</script>
</head>
<body>
<main class="d-flex justify-content-around">
<?php
include("dashboard_nav.php"); // Include navbar.php file

// if(isset($_SESSION["cant_delete_admin"])){
//      echo "<script>Swal.fire({
//             title: 'No books selected',
//             text: 'Please select at least one book to delete.',
//             icon: 'error',
//             confirmButtonText: 'OK'
//         });
//                 event.preventDefault(); // Prevent the default form submission

//     };
// </script>";
// }
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
