<?php
session_start();
include_once('../db/connection.php');
 function login_test($data) {
 	$data = trim($data);
 	$data = stripslashes($data);
 	$data = htmlspecialchars($data);
 	return $data;
 }
 if ($_SERVER["REQUEST_METHOD"]=="POST")
 {
    $username = login_test($_POST["username"]);
    $password = login_test($_POST["password"]);
    $stmt = $conn->prepare("SELECT * FROM adminlogin");
    $stmt->execute();
    $users = $stmt->fetchAll();
 
    foreach($users as $user)
    {
        if(($user['username'] == $username) && ($user['password'] == $password)){
            $_SESSION["id"] = $user['id'];
            $_SESSION["username"] = $username;
            header("location: dashboard.php");
            exit();
        }
        else{
            echo "<script language='javascript'>";
            echo "alert('WRONG INFORMATION')";
            echo "</script>";
            die();
        }

    }
    echo "<script language='javascript'>";
    echo "alert('User not found')";
    echo "</script>";
    die();


 }

?>