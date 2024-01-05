<?php
include_once '../db/connection.php';

$stmt = $conn->prepare("UPDATE motive_table SET motive_heading = :motive_heading, motive_paragraph = :motive_paragraph, motive_image = :motive_image WHERE id = :id");
$stmt->bindParam(':motive_heading', $_POST['motive_heading']);
$stmt->bindParam(':motive_paragraph', $_POST['motive_paragraph']);
$stmt->bindParam(':motive_image', $_POST['motive_image']);
$stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
$stmt->execute();

header("Location: motive.php?success=1");
exit();


?>