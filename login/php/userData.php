<?php
include("connection.php");
// Check if session is not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Retrieve the value from SESSION
$receivedValue=$_SESSION["user_email"];


// Prepare and execute the SQL query
$stmt = mysqli_prepare($connect, "SELECT full_name,date_of_birth,gender FROM users WHERE email = ?");
mysqli_stmt_bind_param($stmt, "s", $receivedValue);
mysqli_stmt_execute($stmt);

// Get the result and check if any row is returned
$result = mysqli_stmt_get_result($stmt);
$getResult = mysqli_fetch_row($result);

if ($getResult) {
    $profil_full_name = $getResult[0];
    $profil_email = $receivedValue;
    $profil_date_birth = $getResult[1];
    if($getResult[2]=='M'){
        $profil_gender = 'Male';
    }
    else{
        $profil_gender = 'Female';

    }
    

    $fullName = $getResult[0];
    $spacePosition = strpos($fullName, ' ');
    if($spacePosition!=false){
        $userName = substr($fullName,0,$spacePosition);
    }
    else{
    $userName=$fullName;
    }
  
} else {
    // Redirect to error.html if no user is found
    header("Location: ../error.html");
}


?>