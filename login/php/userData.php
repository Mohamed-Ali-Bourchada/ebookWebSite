<?php
include("connection.php");
session_start();
// Retrieve the value from SESSION
$receivedValue=$_SESSION["user_email"];
// Prepare and execute the SQL query
$stmt = mysqli_prepare($connect, "SELECT full_name FROM users WHERE email = ?");
mysqli_stmt_bind_param($stmt, "s", $receivedValue);
mysqli_stmt_execute($stmt);

// Get the result and check if any row is returned
$result = mysqli_stmt_get_result($stmt);
$getName = mysqli_fetch_row($result);

if ($getName) {
    $fullName = $getName[0];
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

mysqli_close($connect);
?>