<?php 
include("connection.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST["fullName"];
    $dateBirth = $_POST["dateBirth"];
    $gender = $_POST["gender"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
     
     // checking email is already existe or not
    $checkEmail="select * from users where email='$email'";
    $resultEmail=mysqli_query($connect,$checkEmail);
   
    if(mysqli_num_rows($resultEmail)>0){
           $_SESSION["email_alert"]="1";
           
            header("Location: ../signUp.php");
          
          
         }
    else{
        $apiKey="a391df9d141242369f9e633f5651f110";
          // Initialize cURL.
              $ch = curl_init();

              // Set the URL that you want to GET by using the CURLOPT_URL option.
              curl_setopt($ch, CURLOPT_URL, "https://emailvalidation.abstractapi.com/v1/?api_key=$apiKey&email=$email");

              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

              curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
              
              $response = curl_exec($ch);
              curl_close($ch);
              $data=json_decode($response,true);
            if ($data['deliverability'] === "UNDELIVERABLE" || $data["is_disposable_email"]["value"] === true){
                echo "<script>alert('Email not valid try another one Please');</script>";
                echo "<script>setTimeout(function(){ window.location.href='../signUp.php'; });</script>";
                 exit();
                   
              }                           
             else
                {     
                    // insert user data 
                    // statements to prevent SQL injection

                    $stmt = mysqli_prepare($connect, "insert into users (full_name,date_of_birth,gender,email,password)VALUES (?, ?, ?, ?, ?)");

                    if($stmt)
                    {
                        mysqli_stmt_bind_param($stmt, "sssss", $fullName,$dateBirth,$gender,$email,$hashed_password);
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

                }
            
    
 
    } 
}
else{
header("Location:../error.html");
    }
mysqli_close($connect);
?>