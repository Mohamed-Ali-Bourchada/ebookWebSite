<?php 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST["fullName"];
    $dateBirth = $_POST["dateBirth"];
    $gender = $_POST["gender"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    


$connect = new mysqli("localhost","root","","ebook");
if($connect){
    $checkEmail="select * from users where email='$email'";
    $resultEmail=mysqli_query($connect,$checkEmail);
    if(mysqli_num_rows($resultEmail)>0){
           $_SESSION["email_alert"]="1";
           
            header("Location: ../login.php");
          
         }
    else{
    
    $sql="insert into users (full_name,date_of_birth,gender,email,password)values('$fullName','$dateBirth','$gender','$email','$password')";
    $result=mysqli_query($connect,$sql);
    if($result){
        header("Location: ../../home.html");
       
    }
    else{
        header("Location:../error.html");
    }
    }
    }
  else{
    
    header("Location:../error.html");  
}  

}

?>