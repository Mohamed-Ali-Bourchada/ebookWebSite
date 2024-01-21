<?php
include("../login/php/connection.php");
include("../login/php/userData.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["current_password"];
    $newPassword = $_POST["newPassword"];
    // check current_password password
    // user email is $receivedValue 
    $selectpass="SELECT * from users WHERE email='$receivedValue' AND password !='$password'";
    $selectResult=mysqli_query($connect,$selectpass);

    if (mysqli_num_rows($selectResult)>0) {
            // Check the number of rows    
            echo "<script>alert('Check Your current password Please');</script>";
            echo "<script>setTimeout(function(){ window.location.href='../settings.php'; });</script>";
            exit;    
        }
            else
            {
                $updatePass = "UPDATE users SET password = ? WHERE email = ? AND password = ?";
                $stmt = mysqli_prepare($connect, $updatePass);
                if ($stmt) 
                {
                    mysqli_stmt_bind_param($stmt, "sss", $newPassword, $receivedValue, $password); 
                    mysqli_stmt_execute($stmt);
                    $affectedRows = mysqli_stmt_affected_rows($stmt);
            
                    if ($affectedRows > 0) 
                    {
                        mysqli_stmt_close($stmt);
                        mysqli_close($connect);
                        echo "<script>alert('Your password has been successfully changed');</script>";
                        echo "<script>setTimeout(function(){ window.location.href='../settings.php'; });</script>";
                        exit;
                    } 
                    else 
                        if ($affectedRows === 0) 
                        {
                        // no update password given is the same current password
                            mysqli_stmt_close($stmt);
                            mysqli_close($connect);
                            echo "<script>alert('Password remains the same');</script>";
                            echo "<script>setTimeout(function(){ window.location.href='../settings.php'; });</script>";
                            exit;   
                        } 
                    else
                        {
                    // Handle other errors
                    echo "<script>alert('Error updating password');</script>";
                    echo "<script>setTimeout(function(){ window.location.href='../settings.php'; });</script>";
                    exit;
                        }
                } 
            }

// Redirect in case of an invalid request
header("Location: ../error.html");
exit;
}
?>