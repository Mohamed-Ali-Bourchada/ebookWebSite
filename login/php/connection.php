<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST["fullName"];
    $dateBirth = $_POST["dateBirth"];
    $gender = $_POST["gender"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    

$connect = new mysqli("localhost","root","","ebook");
if($connect){
    $sql="insert into users (full_name,date_of_birth,gender,email,password)values('$fullName','$dateBirth','$gender','$email','$password')";
    $result=mysqli_query($connect,$sql);
    if($result){
        echo"data inserted";
        var_dump($_POST);
    }
    else{
        echo"error";
    }
}
}
?>