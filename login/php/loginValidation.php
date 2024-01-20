<?php
include("connection.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["loginEmail"];
    $password = $_POST["loginPassword"];
    $checkLogin="select * from users where email='$email'and password='$password'";
    $result=mysqli_query($connect,$checkLogin);
    if(mysqli_num_rows($result)==0){
        $_SESSION["login_alert"]="1";
        header("Location:../login.php");
    }
    else{
        header("Location:../../home.php");

    }
    mysqli_close($connect);

}

?>