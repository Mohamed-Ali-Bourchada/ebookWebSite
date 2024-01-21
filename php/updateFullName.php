<?php
include("../login/php/userData.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST["fullName"];
$update="UPDATE users SET full_name ='$fullName'where email= '$receivedValue'";
$updateResult=mysqli_query($connect,$update);
if($updateResult){
    if(mysqli_affected_rows($connect)>0)
{
    echo "<script>alert('your Full name has been successfully updated');</script>";
    echo "<script>setTimeout(function(){ window.location.href='../settings.php'; });</script>";
}
else if(mysqli_affected_rows($connect)===0){
    echo "<script>alert('same full name please write another full name to update it');</script>";
    echo "<script>setTimeout(function(){ window.location.href='../settings.php'; });</script>";
}
else{
    echo "<script>alert('Update failed');</script>";
    echo "<script>setTimeout(function(){ window.location.href='../settings.php'; });</script>";
}
}


}

?>