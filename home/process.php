<?php
include_once('../db/connection.php');
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data); 
    return $data;
}
$id = $_GET['id'];
$name = test_input($_POST["name"]);
$email = test_input($_POST["email"]);
$message = test_input($_POST["message"]);
$stmt = $conn->prepare("INSERT INTO contact_details (name, email, message) VALUES (:name, :email, :message)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':message', $message);
$stmt->execute();
header("location: ../home/contact.php");

?>