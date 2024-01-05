<?php
// update_content.php
// Assuming form data is posted and received
include_once '../db/connection.php';

    // Update content in the database
    $stmt = $conn->prepare("UPDATE hero_contents SET heading = :heading WHERE id = :id");
    $stmt->bindParam(':heading', $_POST['heading']);
    
    $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
    $stmt->execute();

    // Redirect to admin panel or display success message
    header("Location: home.php?success=1");
    exit();

?>
