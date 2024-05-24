<?php
include("connect.php");
// Check if session is not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION["auth"])){
    header("Location: ../login/login.php");
}
else{
    if(!isset($_SESSION["admin"])){
    header("Location: ../home.php");
}
}
// Check if usersToDelete is set and not empty
if(isset($_POST['usersToDelete']) && !empty($_POST['usersToDelete'])) {
    // Loop through each selected user ID and check if they are admin
    foreach($_POST['usersToDelete'] as $k) {
        // // Check if the user is admin
        // $checkAdmin = "SELECT email FROM users WHERE user_id=:id_user AND is_admin = 1"; // Assuming 'is_admin' is a column indicating whether the user is an admin
        // $stmtAdmin = $dbh->prepare($checkAdmin);
        // $stmtAdmin->bindParam(':id_user', $k);
        // $stmtAdmin->execute();
        // $isAdmin = $stmtAdmin->fetch(PDO::FETCH_ASSOC);

        // // If the user is not an admin, delete the account
        // if(!$isAdmin) {
            $sql = "DELETE FROM users WHERE user_id=:id_user";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':id_user', $k);
            $stmt->execute();
        // }
        //  else{
        //     $_SESSION['cant_delete_admin']=true;
        //  }
    }
}

// Redirect back to list_users.php after deletion
header("Location: ../list_users.php");
?>
