// function for delete users 
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
            title: 'No users selected',
            text: 'Please select at least one user to delete.',
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
                    <input type="text" id="full_name" name="full_name" class="form-control" style="width: 70%;" value="${fullName}">
                </div>
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <label for="date_birth" class="me-2">Date of Birth</label>
                    <input type="date" id="date_birth" name="date_birth" class="form-control" style="width: 70%;" value="${dateBirth}">
                </div>
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <label for="email" class="me-2">Email</label>
                    <input type="text" id="email" name="email" class="form-control" style="width: 70%;" value="${email}">
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
            const fullName = document.getElementById("full_name").value;
            const dateBirth = document.getElementById("date_birth").value;
            const email = document.getElementById("email").value;
            const gender = document.querySelector('input[name="gender"]:checked').value;
            const isAdmin = document.querySelector('input[name="is_admin"]:checked').value;
            
            // Validate fields
            if (!fullName || !dateBirth || !email || !gender || isAdmin === undefined) {
                Swal.showValidationMessage('All fields are required');
                return false;
            }
            // Validate full name (only alphabetic characters and spaces)
            const fullNamePattern = /^[A-Za-z\s]+$/;
            if (!fullNamePattern.test(fullName)) {
                Swal.showValidationMessage('Full Name must contain only alphabetic characters and spaces');
                return false;
            }
              const datePattern = /^\d{4}-\d{2}-\d{2}$/;
            if (!datePattern.test(dateBirth)) {
                Swal.showValidationMessage('Invalid date format. Use YYYY-MM-DD');
                return false;
            }

            // Check if age is higher than 12
            const today = new Date();
            const birthDate = new Date(dateBirth);
            let age = today.getFullYear() - birthDate.getFullYear();
            const monthDiff = today.getMonth() - birthDate.getMonth();
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            if (age < 13) {
                Swal.showValidationMessage('User must be older than 12 years');
                return false;
            }
            // Validate email format
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                Swal.showValidationMessage('Invalid email format');
                return false;
            }
            
         

            return {
                user_id: user_id,
                full_name: fullName,
                date_birth: dateBirth,
                email: email,
                gender: gender,
                is_admin: isAdmin
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
        }).then(function(result){
            if (result.success) {
                Swal.fire('Success', 'User updated successfully', 'success');
                if (result.is_admin == 0) {
                    setTimeout(function(){
                        window.location.href = "../signOut.php";
                    }, 1500);
                } else {
                    setTimeout(function(){
                        window.location.reload();
                    }, 1500);
                }
            } else {
                Swal.fire('Error', result.error, 'error');
            }
        }).catch(function(error){
            console.error('Error:', error);
            Swal.fire('Error', 'An error occurred while updating the user', 'error');
        });
    }
}




// alert delete messages
function confirmDeleteMessages(event, actionURL) {
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
            title: 'No messages selected',
            text: 'Please select at least one message to delete.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
                event.preventDefault(); // Prevent the default form submission

    }
}





function confirmDeleteBooks(event, actionURL) {
    var checkboxes = document.querySelectorAll('input[name="booksToDelete[]"]:checked');
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