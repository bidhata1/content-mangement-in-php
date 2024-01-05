<?php
include_once '../db/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    // Handle image upload if there's a new image
    $targetDir = "../images/";
    $targetFile = $targetDir . basename($_FILES["imageUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if ($imageFileType != "") {
        if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $targetFile)) {
            $imageUpload = basename($_FILES["imageUpload"]["name"]);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Update content in the database
    $stmt = $conn->prepare("UPDATE about_page SET imageUpload = :imageUpload, paragraphContent = :paragraphContent WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':imageUpload', $imageUpload);
    $stmt->bindParam(':paragraphContent', $_POST['paragraphContent']);
    $stmt->execute();

    // Redirect to the page after updating
    header("Location: about.php?success=1");
    exit();
} else {
    // Redirect to an error page or display an error message
    header("Location: error_page.php");
    exit();
}
?>
