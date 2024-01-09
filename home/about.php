<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= stylesheet href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel= stylesheet href="../css/about.css">

	<script src="../js/index.js"></script>
    <title>Document</title>
</head>
<body>
<nav>
<div class="toggle-bar" onclick="toggleMenu()">
      &#9776; <!-- This is the hamburger icon -->
    </div>
	<div class="nav-items-container">
    <ul id="nav-items">
      <li><a href="index.php">Home</a></li>
      <li><a href="about.php">About Us</a></li>
	  
      <li><a href="contact.php">Contact</a></li>
    </ul>
  </div>
  </nav>

  <section class="about">
    <h1>About Us</h1>
    <p style="font-weight: bold"></p>

    <div class="about-info">
        <?php
        // Fetch updated content from the database
        include_once '../db/connection.php';

        $id = 3; // Assuming you want to display content with ID 3
        $stmt = $conn->prepare("SELECT * FROM about_page WHERE id=:id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            echo '<div class="about-img">';
            echo '<img src="../images/' . $row['imageUpload'] . '" alt="about">';
            echo '</div>';
            echo '<div>';
            echo '<p>' . $row['paragraphContent'] . '</p>';
            echo '</div>';
        } else {
            echo '<p>No data found</p>';
        }
        ?>
    </div>
</section>
  
	<section class="team">
		<h1>Meet Our Team</h1>
		<div class="team-cards">
			<!-- Cards here -->
			<!-- Card 1 -->
			<div class="card">
				<div class="card-img">
					<img src="../images/1.jpg" alt="User 1">
				</div>
				<div class="card-info">
					<h2 class="card-name">Bidhata</h2>
					<p class="card-role">CEO and Founder</p>
					<p class="card-email">pandey.bidhata58@gmail.com</p>
					<p><button class="button">Contact</button></p>
				</div>
			</div>

			<!-- Card 2 -->
			<div class="card">
				<div class="card-img">
					<img src="../images/back.jpg" alt="User 2">
				</div>
				<div class="card-info">
					<h2 class="card-name">Dikshya</h2>
					<p class="card-role">Co-Founder</p>
					<p class="card-email">dikshya@example.com</p>
					<p><button class="button">Contact</button></p>
				</div>
			</div>
			<!-- Card 3 -->
			<div class="card">
				<div class="card-img">
					<img src="../images/nature.jpg" alt="User 3">
				</div>
				<div class="card-info">
					<h2 class="card-name">Prasiddhi</h2>
					<p class="card-role">Developer</p>
					<p class="card-email">prasiddhi@example.com</p>
					<p><button class="button">Contact</button></p>
				</div>
			</div>
		</div>
	</section>
    <footer class="footer">
    <div class="footer-content">
      <div class="footer-left">
        <h3>My Website</h3>
        <p>A place for creativity and innovation.</p>
      </div>
      <div class="footer-right">
        <h3>Quick Links</h3>
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="about.php">About Us</a></li>
		  
          <li><a href="contact">Contact</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2023 Mywebsite. All rights reserved | Design By <i><b>Bidhata Pandey</b></i></p>
    </div>
  </footer>

</body>

</html>   
</body>
</html>
