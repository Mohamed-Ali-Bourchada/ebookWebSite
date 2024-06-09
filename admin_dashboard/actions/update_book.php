<?php
include("connect.php");

// Check if session is not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["auth"])) {
    header("Location: ../login/login.php");
    exit();
} else {
    if (!isset($_SESSION["admin"])) {
        header("Location: ../home.php");
        exit();
    }
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
        $book_id = htmlspecialchars($formValues['id']);
        $title = htmlspecialchars($formValues['title']);
        $writer = htmlspecialchars($formValues['writer']);
        $image_url = htmlspecialchars($formValues['image_url']);
        $file_url = htmlspecialchars($formValues['file_url']);

        // Start building the SQL query
        $sql = "UPDATE books SET title = :title, writer = :writer";
        
        // Add image_url to the query if it has data
        if (!empty($image_url)) {
            $sql .= ", image_url = :image_url";
        }
        
        // Add file_url to the query if it has data
        if (!empty($file_url)) {
            $sql .= ", file_url = :file_url";
        }
        
        $sql .= " WHERE id_book = :book_id";

        // Prepare and execute the SQL query using prepared statements
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':writer', $writer);

        // Bind image_url only if it has data
        if (!empty($image_url)) {
            $stmt->bindParam(':image_url', $image_url);
        }

        // Bind file_url only if it has data
        if (!empty($file_url)) {
            $stmt->bindParam(':file_url', $file_url);
        }

        $stmt->bindParam(':book_id', $book_id);
        $stmt->execute();

        // Check for errors and send JSON response
        if ($stmt->rowCount() > 0) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false, "error" => "Failed to update book."));
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
