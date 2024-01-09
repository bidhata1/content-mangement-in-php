<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= stylesheet href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel= stylesheet href="../css/contact.css">
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

  <section class="contact">
    <div class="container">
      <h2>Contact Us</h2>
      <form action="process.php" method="post" class="contact-form">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" placeholder="Your Name" required>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Your Email" required>
        </div>

        <div class="form-group">
          <label for="message">Message</label>
          <textarea id="message" name="message" placeholder="Your Message" rows="5" required></textarea>
        </div>

        <button type="submit">Submit</button>
      </form>
    </div>
  </section>
    <!-- Other sections -->

  </div>
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
          
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2023 Mywebsite. All rights reserved | Design By <i><b>Bidhata Pandey</b></i></p>
    </div>
  </footer>
</body>
</html>