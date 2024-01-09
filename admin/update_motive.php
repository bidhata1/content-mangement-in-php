// Updates the motive content in the database
<?php
include_once '../db/connection.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    // Handle image upload if a new image is provided
    $targetDirectory = "../images/";
    $imageUpload = '';

    if ($_FILES['motive_image']['size'] > 0) {
        $targetFile = $targetDirectory . basename($_FILES['motive_image']['name']);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the file is an actual image
        $check = getimagesize($_FILES['motive_image']['tmp_name']);
        if ($check === false) {
            echo "File is not an image.";
            exit();
        }

        // Check file size
        if ($_FILES['motive_image']['size'] > 500000) {
            echo "Sorry, your file is too large.";
            exit();
        }

        // Allow only certain file formats
        if ($imageFileType !== "jpg" && $imageFileType !== "png" && $imageFileType !== "jpeg" && $imageFileType !== "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit();
        }

        // Move the uploaded file to the target directory
        if (!move_uploaded_file($_FILES['motive_image']['tmp_name'], $targetFile)) {
            echo "Sorry, there was an error uploading your file.";
            exit();
        }

        // Store the image name in the variable to be updated in the database
        $imageUpload = $_FILES['motive_image']['name'];
    }

    // Update the database with the new content
   
    $motive_heading = $_POST['motive_heading'];
    $motive_paragraph = $_POST['motive_paragraph'];


    // Prepare and execute the update query
    $stmt = $conn->prepare("UPDATE motive_table SET motive_image = :motive_image, motive_heading = :motive_heading, motive_paragraph = :motive_paragraph WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':motive_heading', $motive_heading, PDO::PARAM_STR);
    $stmt->bindParam(':motive_paragraph', $motive_paragraph, PDO::PARAM_STR);
    $stmt->bindParam(':motive_image', $imageUpload, PDO::PARAM_STR);
    

    $stmt->execute();

    // Redirect back to the page after updating
    header("Location: motive.php");
    exit();
}
?>
