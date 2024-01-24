<?php
session_start();
$message = "";
if (isset($_SESSION["email_alert"])) {
    $message = "Email already exists, please try another one.";
    unset($_SESSION["email_alert"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ZipBooks|Signup </title>
    <link rel="icon" type="image/png" href="../assets/icon.png">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </style>
</head>

<body>


    <section class="containerL">

        <!-- Signup Form -->
        <div class="form signup">

            <div class="form-content">
                <header>Signup
                    <p style="color:red;text-align:center;font-size:13px;font-weight:600;padding-top:5px">
                        <?php echo $message; ?>
                    </p>
                </header>

                <form action=" php/registerValidation.php" name="form" method="POST" onsubmit="return validateSignUp()">
                    <div class="field">
                        <input type="text" placeholder="Full name" class="input" name="fullName" id="fullName"
                            maxlength="32" />
                        <p id="nameError"></p>

                    </div>
                    <div class="dateBirth">
                        <div class="field">
                            <label for="dateBirth" class="birth">Date of birth : </label>
                            <input type="date" id="dateBirth" name="dateBirth" />
                            <p id="ageError"></p>
                        </div>
                    </div>
                    <div class="field">
                        <input type="text" placeholder="Email" class="input checkEmail" name="email" id="email">
                        <p id="emailError"></p>
                    </div>
                    <div class="gender">
                        <label for="gender">Gender : </label>
                        <input type="radio" name="gender" value="M" id="male"> Male
                        <input type="radio" name="gender" value="F" id="female"> Female
                        <p id="genderError"></p>
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Create password" autocomplete="off" class="password"
                            name="password" id="pass">
                        <p id="passError"></p>
                    </div>

                    <div class="field">
                        <input type="password" placeholder="Confirm password" autocomplete="off" class="password"
                            id="confirmPass">
                        <p id="confirmPassError">
                        </p>
                        <i class='bx bx-hide eye-icon'></i>
                    </div>

                    <div class="field">

                        <input type="submit" value="Signup" class="button">
                    </div>
                </form>

                <div class="form-link">
                    <span>Already have an account? <a href="login.php">Login</a></span>
                </div>
            </div>







        </div>
    </section>
    <!-- JavaScript -->
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>