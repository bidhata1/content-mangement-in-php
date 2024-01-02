<!doctype html>
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
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(../images/back.jpg);"></a>
	        <ul class="list-unstyled components mb-5">
                 <!-- home -->
	          <li class="active">
	            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
	            <ul class="collapse list-unstyled" id="homeSubmenu">
              <li class="active">
                    <a href="#home" onclick="showSection('home')" aria-expanded="false" class="home">Home</a>
                    
                </li>
                <li>
                    <a href="#motive" onclick="showSection('motive')">Motive</a>
                </li>
                <li>
                    <a href="#service" onclick="showScetion('service')">Service</a>
                </li>
	            </ul>
	          </li>
              <!-- about -->
	          
	          <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">About</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#about" onclick="showSection('about')">About</a>
                </li>
                <li>
                    <a href="#team" onclick="showSection('team')">Team</a>
                </li>
                
              </ul>
	          </li>
	          
	          <li>
              <a href="#contact" onclick="showSection('contact')">Contact</a>
	          </li>
                <li>
                <a href="logout.php?logout=true">Logout</a>   
                </li>
	        </ul>
	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <div id="homeSection" class="dashboard-subsection" style="display: none;">
  <!-- ... (content for the 'Home' submenu section) ... -->
        </div>

        <!-- home -->
        <div id="home">
        <h2 class="mb-4">Home</h2>
        <ul class="collapse list-unstyled" id="homeSubmenu">
        <div>
        <li>
          <!-- Form to update Home page content -->
            <form action="process_heading.php" id="updateHomeContent" method="POST" onsubmit="updateContent('home'); return false;"> 
            <label for="heading">Heading:</label><br>
            <input type="text" id="heading" name="heading"><br><br>
            <button type="submit" value="submit">Update Home</button>
            </form>
        </li>
        </div>
        
        <div>  
        <li>
            <!-- Form to update Motive content -->
            <form action="process_motive.php" id="updateMotiveContent" method="POST" onsubmit="updateContent('motive'); return false;">
              <label for="motive_heading">Heading:</label><br>
              <input type="text" id="motive_heading" name="motive_heading"><br><br>

              <label for="motive_paragraph">Enter Paragraph:</label><br>
            <textarea id="motive_paragraph" name="motive_paragraph" rows="4" cols="50" placeholder="Enter Paragraph"></textarea><br><br>

              <label for="motive_image">Upload Image:</label><br>
              <input type="file" id="motive_image" name="motive_image"><br><br>
                <button type="submit">Update Motive</button>
            </form>
           
        </li>
        </div>

        <div>
        <li>
            <!-- Form to update Service content -->
            <form action="process_single_grid_item.php" method="POST" enctype="multipart/form-data" id="updateServiceContent" onsubmit="updateContent('service'); return false;">
            <div class="grid-container">
            <div class="grid-item">
                <label for="imageFile1">Image File:</label><br>
                <input type="file" id="imageFile1" name="imageFile1"><br>
                <label for="heading1">Heading:</label><br>
                <input type="text" id="heading1" name="heading" ><br>
                <label for="link1">Link:</label><br>
                <input type="text" id="link1" name="link" ><br>
            </div>
            <!-- More grid items can be added similarly -->
        </div>
        <input type="submit" value="Submit">
            </form>
</li>
</div>
        <!-- Additional forms for other content -->
    </ul>
    

        <!-- about -->
        <div id="about">
        <h2 class="mb-4">About</h2>
        <ul class="collapse list-unstyled" id="pageSubmenu">
        
            <!-- Form to update About content -->
            <form action="about_process.php" method="POST" enctype="multipart/form-data" id="updateAboutContent" onsubmit="updateContent('about'); return false;">
            <label for="imageUpload">Upload Image:</label><br>
            <input type="file" id="imageUpload" name="imageUpload"><br><br>
        
            <label for="paragraphContent">Enter Paragraph:</label><br>
            <textarea id="paragraphContent" name="paragraphContent" rows="4" cols="50" placeholder="Enter Paragraph"></textarea><br><br>
          
                <button type="submit">Update About</button>
            </form>
        </li>
        <li>
            <!-- Form to update Team content -->
            <form id="updateTeamContent" onsubmit="updateContent('team'); return false;">
                <textarea name="team_content" id="team_content" placeholder="Enter Team Content"></textarea>
                <button type="submit">Update Team</button>
            </form>
        <!-- Additional forms for other content -->
    </ul>
    

        
        </div>

        <!-- contact -->
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
    

    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/dashboard.js"></script>
  </body>
</html>