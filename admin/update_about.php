<?php
include_once '../db/connection.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    // Handle image upload if a new image is provided
    $imageUpload = $_FILES['imageUpload']['name'];
    $targetDirectory = "../uploads/"; // Specify the target directory for uploaded images

    if ($imageUpload) {
        $targetFile = $targetDirectory . basename($_FILES['imageUpload']['name']);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the file is an actual image
        $check = getimagesize($_FILES['imageUpload']['tmp_name']);
        if ($check === false) {
            echo "File is not an image.";
            exit();
        }

        // Check file size (if needed)
        if ($_FILES['imageUpload']['size'] > 500000) {
            echo "Sorry, your file is too large.";
            exit();
        }

        // Allow only certain file formats (if needed)
        if ($imageFileType !== "jpg" && $imageFileType !== "png" && $imageFileType !== "jpeg" && $imageFileType !== "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit();
        }

        // Move the uploaded file to the target directory
        if (!move_uploaded_file($_FILES['imageUpload']['tmp_name'], $targetFile)) {
            echo "Sorry, there was an error uploading your file.";
            exit();
        }
    }

    // Update the database with the new content
    $paragraphContent = $_POST['paragraphContent'];

    // Prepare and execute the update query
    $stmt = $conn->prepare("UPDATE about_page SET imageUpload = :imageUpload, paragraphContent = :paragraphContent WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':imageUpload', $imageUpload, PDO::PARAM_STR);
    $stmt->bindParam(':paragraphContent', $paragraphContent, PDO::PARAM_STR);

    $stmt->execute();

    // Redirect back to the page after updating
    header("Location: about.php");
    exit();
}
?>
