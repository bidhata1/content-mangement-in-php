<?php
session_start();

// Check if the user is logged in by verifying the session variables
if (!isset($_SESSION["id"]) || !isset($_SESSION["username"])) {
    // If session variables are not set, redirect to the login page or perform other actions
    header("location: login.php"); // Redirect to the login page
    exit();
}

// Access the session variables for the logged-in user
$id = $_SESSION["id"];
$username = $_SESSION["username"];

// Your dashboard content here
// Display the user's dashboard, perform actions, etc.
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link  href="../css/dashboard.css" rel="stylesheet">
  <title>Document</title>
</head>
<body>
  

<div class="wrapper d-flex align-items-stretch">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>WELCOME</h3>
            </div>

            <ul class="list-unstyled components">
            <img src="../images/logo.jpg" alt="admin" width="100px" height="100px" >
<li class="active">
    <a href="dashboard.php" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="homeLink">Home</a>
    <ul class="collapse list-unstyled" id="homeSubmenu">
        <li>
            <a href="home.php">Home</a>
        </li>
        <li>
            <a href="motive.php">Motive</a>
        </li>
        <li>
            <a href="service.php">Service</a>
        </li>
    </ul>
</li>

                
<li>
    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="aboutLink">About</a>
    <ul class="collapse list-unstyled" id="pageSubmenu">
        <li>
            <a href="about.php">About</a>
        </li>
        <li>
            <a href="team.php">Team</a>
        </li>
    </ul>
</li>

                <li>
                    <a href="contacts.php">Contact</a>
                </li>
            </ul>

           
        </nav>

        <!-- Page Content  -->
<div id="content" class="p-4 p-md-5">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">&#9776;</span>
            </button>
            <div>
            <button class="btn-logout"><a href="logout.php?logout=true">Logout</a></button>
             </div>
                      
          </div>
        </nav>
      
</div>
    
    </body>
    
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/dashboard.js"></script>
</html>
