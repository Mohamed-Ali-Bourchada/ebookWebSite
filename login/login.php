<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ZipBooks|Login </title>
    <link rel="icon" type="image/png" href="../assets/icon.png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">


</head>

<body>
    <?php 
    session_start();

        require("nav_bar.php");
        if(isset($_SESSION["login_alert"])){
                echo "<script>
        Swal.fire({
            position: 'top-center',
            icon: 'error',
            title: 'Check your email or password please',
            showConfirmButton: false,
            timer: 1500
        });
    </script>";
        unset($_SESSION["login_alert"]);
        }
         if(isset($_SESSION["signUpAlert"])){
                echo "<script>
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Signup valid you can login now',
            showConfirmButton: false,
            timer: 1500
        });
    </script>";
        unset($_SESSION["signUpAlert"]);
}
        ?>
    <section class="containerL forms">
        <div class="form login">
            <div class="form-content">
                <header>Login</header>
                   

            
                <form action=" php/loginValidation.php" method="POST" onsubmit="return validateLogin()">

                    <div class="field">
                        <input type="text" placeholder="Email" class="input" id="loginEmail" name="loginEmail"
                            autocomplete="off">
                        <p id="loginEmailError"></p>
                    </div>

                    <div class="field">
                        <input type="password" placeholder="Password" class="password" id="loginPass" autocomplete="off"
                            name="loginPassword">
                        <p id="loginPassError"></p>

                        <i class='bx bx-hide eye-icon'></i>
                    </div>



                    <div class="field">
                        <input type="submit" value="Login" class="button">
                    </div>
                </form>

                <div class="form-link">
                    <span>Don't have an account? <a href="signUp.php">Signup</a></span>
                </div>
            </div>



        </div>

        </div>

        </section>
        <?php 
    require("footer.php");
    ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
        <script src="js/script.js"></script>
</body>

</html>