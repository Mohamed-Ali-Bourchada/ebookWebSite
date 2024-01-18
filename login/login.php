<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ZipBooks|Login </title>
    <link rel="icon" type="image/png" href="../assets/icon.png">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles.css">


</head>

<body>
    <nav class="navbar navbar-expand-lg  bg-white fixed-top " id="navbar" aria-label="Offcanvas navbar large">
        <div class="container-fluid">
            <a href="../home.html">
                <img src="../assets/logo.png" alt="logo de site web " class="mainNavLogo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2"
                aria-controls="offcanvasNavbar2">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-white" tabindex="-1" id="offcanvasNavbar2"
                aria-labelledby="offcanvasNavbar2Label">
                <div class="offcanvas-header">
                    <img src="../assets/logo.png" alt="logo de site web" class="logo"></a>

                    <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../home.html">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#videos">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contacts">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.html">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <section class="containerL forms">
        <div class="form login">
            <div class="form-content">
                <header>Login</header>
                <form action="php/connection.php" method="POST" onsubmit="return validateLogin()">
                    <div class="field">
                        <input type="email" placeholder="Email" class="input" id="loginEmail" name="loginEmail"
                            autocomplete="off">
                        <p id="loginEmailError"></p>
                    </div>

                    <div class="field">
                        <input type="password" placeholder="Password" class="password" id="loginPass" autocomplete="off"
                            name="loginPassword">
                        <p id="loginPassError"></p>

                        <i class='bx bx-hide eye-icon'></i>
                    </div>

                    <div class="form-link">
                        <a href="#" class="forgot-pass">Forgot password?</a>
                    </div>

                    <div class="field">
                        <input type="submit" value="Login" class="button">
                    </div>
                </form>

                <div class="form-link">
                    <span>Don't have an account? <a href="#" class="link signup-link">Signup</a></span>
                </div>
            </div>


        </div>

        </div>

        <!-- Signup Form -->

        <div class="form signup">
            <div class="form-content">
                <header>Signup</header>
                <form action="php/connection.php" name="form" method="POST" onsubmit="return validateSignUp()">
                    <div class="field">
                        <input type="text" placeholder="Full name" name="fullName" id="fullName" maxlength="32" />
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
                        <input type="text" placeholder="Email" class="input" name="email" id="email">
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
                    <span>Already have an account? <a href="#" class="link login-link">Login</a></span>
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