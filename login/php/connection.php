<?php 

$connect = new mysqli("localhost","root","","ebook");
if(!$connect)
{
    header("Location:../error.html");
}
    ?>