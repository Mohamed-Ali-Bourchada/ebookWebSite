<?php
include("../login/php/userData.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dateBirth = $_POST["dateBirth"];
$update="UPDATE users SET date_of_birth ='$dateBirth'where email= '$receivedValue'";
$updateResult=mysqli_query($connect,$update);
if($updateResult){
    if(mysqli_affected_rows($connect)>0)
{
    echo "<script>alert('your Date of birth has been successfully updated');</script>";
    echo "<script>setTimeout(function(){ window.location.href='../settings.php'; });</script>";
}
else if(mysqli_affected_rows($connect)===0){
    echo "<script>alert('its the same date of birth please write another date');</script>";
    echo "<script>setTimeout(function(){ window.location.href='../settings.php'; });</script>";
}
else{
    echo "<script>alert('Update failed!');</script>";
    echo "<script>setTimeout(function(){ window.location.href='../settings.php'; });</script>";
}
}


}

?>