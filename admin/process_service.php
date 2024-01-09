<?php
include_once('../db/connection.php');

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['submit'])) {
    // Check if file was uploaded without errors
    if (isset($_FILES["imagefile1"]) && $_FILES["imagefile1"]["error"] == 0) {
        $targetDir = "../images/"; // Directory where the images will be stored
        $targetFile = $targetDir . basename($_FILES["imagefile1"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["imagefile1"]["tmp_name"]);
        if ($check !== false) {
            // File is an image - proceed with upload
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check file size (limit to 5MB for example)
        if ($_FILES["imagefile1"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats (you can add more formats if needed)
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // Handle error cases and redirect or show an error message as needed
        } else {
            // If everything is fine, try to upload file
            if (move_uploaded_file($_FILES["imagefile1"]["tmp_name"], $targetFile)) {
                // File uploaded successfully, now store file path in the database
                $id = $_GET['service_id'];
                $imageFilePath = $targetFile;
                $heading = test_input($_POST["heading"]);
                $link = test_input($_POST["link"]);

                $stmt = $conn->prepare("INSERT INTO service_table (imagefile1, heading, link) VALUES (:imagefile1, :heading, :link)");
                $stmt->bindParam(':imagefile1', $imageFilePath);
                $stmt->bindParam(':heading', $heading);
                $stmt->bindParam(':link', $link);
                $stmt->execute();
                header("location: service.php");
            } else {
                echo "Sorry, there was an error uploading your file.";
                // Handle error cases and redirect or show an error message as needed
            }
        }
    } else {
        echo "No file was uploaded.";
        // Handle error cases and redirect or show an error message as needed
    }
}
?>
