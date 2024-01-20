<?php 
include("connection.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST["fullName"];
    $dateBirth = $_POST["dateBirth"];
    $gender = $_POST["gender"];
    $password = $_POST["password"];
    $email = $_POST["email"];
     // checking email is already existe or not
    $checkEmail="select * from users where email='$email'";
    $resultEmail=mysqli_query($connect,$checkEmail);
   
    if(mysqli_num_rows($resultEmail)>0){
           $_SESSION["email_alert"]="1";
           
            header("Location: ../signUp.php");
          
         }
    else{
    // insert user data 
    $stmt = mysqli_prepare($connect, "insert into users (full_name,date_of_birth,gender,email,password)VALUES (?, ?, ?, ?, ?)");

    if($stmt){
        mysqli_stmt_bind_param($stmt, "sssss", $fullName,$dateBirth,$gender,$email,$password);
        $success = mysqli_stmt_execute($stmt);
        if($success){
            header("Location: ../login.php");
             $_SESSION["signUpAlert"]="1";

        }
        else{
            header("Location:../error.html");

        }
        mysqli_stmt_close($stmt);

    }
    else{
        header("Location:../error.html");
    }
    }
    mysqli_close($connect);

    } 

?>