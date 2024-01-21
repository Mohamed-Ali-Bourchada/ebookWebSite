<?php
include("../login/php/userData.php");

$delete="delete from users where email='$receivedValue'";
$deleteResult=mysqli_query($connect,$delete);
$row=mysqli_num_rows($deleteResult);
if($ow>0)
{
    echo "<script>alert('your account has been successfully deleted');</script>";
    echo "<script>setTimeout(function(){ window.location.href='../login/signUp.php'; });</script>";
}
else{
    echo "<script>alert('');</script>";
    echo "<script>setTimeout(function(){ window.location.href='../login/signUp.php'; });</script>";
}


?>