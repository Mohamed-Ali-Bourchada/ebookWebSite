<?php
include("connect.php");

// Check if session is not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Redirect users who are not authenticated or not administrators
if (!isset($_SESSION["auth"]) || !isset($_SESSION["admin"])) {
    header("Location: ../login/login.php");
    exit();
}

// Check if the request method is POST

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the JSON data sent from the client-side
    $json_data = file_get_contents('php://input');
    
    // Decode the JSON data into an associative array
    $formValues = json_decode($json_data, true);

    // Check if the JSON data was successfully decoded
    if ($formValues !== null) {
        // Extract form values
        $user_id = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : null;
        $full_name = htmlspecialchars($formValues['full_name']);
        $date_birth = htmlspecialchars($formValues['date_birth']);
        $email = htmlspecialchars($formValues['email']);
        $gender = htmlspecialchars($formValues['gender']);
        $is_admin = htmlspecialchars($formValues['is_admin']);

        // Prepare and execute the SQL query using prepared statements
        $sql = "UPDATE users SET full_name = :full_name, date_of_birth = :date_birth, email = :email, gender = :gender, is_admin = :is_admin WHERE user_id = :user_id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':full_name', $full_name);
        $stmt->bindParam(':date_birth', $date_birth);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':is_admin', $is_admin);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

        // Check for errors and send JSON response
        if ($stmt->rowCount() > 0) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false, "error" => "Failed to update user."));
        }
    } else {
        // Handle case where JSON data could not be decoded
        echo json_encode(array("success" => false, "error" => "Failed to decode JSON data."));
    }
} else {
    // Handle case where request method is not POST
    echo json_encode(array("success" => false, "error" => "Invalid request method."));
}
?>
