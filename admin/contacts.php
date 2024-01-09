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



<!Doctype html>
<html lang="en">
  <head>
  	<title>dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/dashboard.css">
  </head>
  <body>
		
		  <div class="wrapper d-flex align-items-stretch">
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
              <span class="sr-only">Toggle Menu</span>
            </button>
            <div>
            <button class="btn-logout"><a href="logout.php?logout=true">Logout</a></button>
             </div>
                      
          </div>
        </nav>
      
           
       
        
        <div id="contact">
        <h2 class="mb-4">Contact</h2>
        <?php
                include_once('../db/connection.php');
                    try {
                        $query = "SELECT * FROM contact_details"; // Replace 'your_table' with your actual table name
                         $statement = $conn->query($query);

                        if ($statement->rowCount() > 0) {
                            echo "<table border='1'>
                            <thead>
                                <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                </tr>
                            </thead>
                            <tbody>";

                                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>
                                <td>" . htmlspecialchars($row["id"]) . "</td>
                                <td>" . htmlspecialchars($row["name"]) . "</td>
                                <td>" . htmlspecialchars($row["email"]) . "</td>
                                
                                <td>" . htmlspecialchars($row["message"]) . "</td>
                                <td><button href='update.php?id=" . $row["id"] . "'>Update</a></td>
                                <td><button href='delete.php?id=" . $row["id"] . "'>Delete</a></td>
                         </tr>";
                            }
                            echo "</tbody></table>";
                } 
                    else {
                        echo "No results found";
                            }
                }   catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                    }
            ?> 
        
        </div>
      
      </div>  
		</div>
    <script>
  // Function to handle showing the submenu when clicking on the main menu item
  /*
  function showSubMenu(submenuId) {
    // Hide all submenus first
    const submenus = document.querySelectorAll('.collapse.list-unstyled');
    submenus.forEach((submenu) => {
      submenu.classList.remove('show');
    });

    // Show the clicked submenu
    const clickedSubmenu = document.getElementById(submenuId);
    clickedSubmenu.classList.add('show');
  }
  
  // Add event listeners to the main menu items
  document.addEventListener('DOMContentLoaded', function() {
    const homeMenuItem = document.querySelector('a[href="#homeSubmenu"]');
    const aboutMenuItem = document.querySelector('a[href="#pageSubmenu"]');
    const contactMenuItem = document.querySelector('a[href="#contact"]');
    
    homeMenuItem.addEventListener('click', function(event) {
      event.preventDefault();
      showSubMenu('homeSubmenu');
    });
    
    aboutMenuItem.addEventListener('click', function(event) {
      event.preventDefault();
      showSubMenu('pageSubmenu');
    });
    
    contactMenuItem.addEventListener('click', function(event) {
      event.preventDefault();
      showSubMenu('contact');
    });
  });*/
  
</script>
    

    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/dashboard.js"></script>
  </body>
</html>