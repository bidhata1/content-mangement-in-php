<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Website</title>
  <link rel="stylesheet" href="../css/style.css">
  <script src="../js/index.js"></script>
  
</head>
<body>

  <nav>
  <div class="toggle-bar" onclick="toggleMenu()">
      &#9776; <!-- This is the hamburger icon -->
    </div>
    <!--
    <div class="logo">
      <a href="home.php">XYZ Comapany</a>
    </div>
-->
<div class="nav-items-container">
    <ul id="nav-items">
      <li><a href="index.php">Home</a></li>
      <li><a href="about.php">About Us</a></li>
      <li><a href="contact.php">Contact</a></li>
    </ul>
  </div>
  </nav>

  <div class="content">
    <div class="content1">
        <div class="hero_text">
        <?php
include_once '../db/connection.php';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch updated content from the database using prepared statement
    $id = 1; // Example ID
    $stmt = $conn->prepare("SELECT * FROM hero_contents WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
     
        // Display updated content on the frontend
        echo '<h1>' . $result['heading'] . '</h1>';
        
    } else {
        echo "No results found";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

        
          
          <!--<div class="image_section">
            <img src="../images/background.jpeg" alt="Hero Image" class="hero">
          </div>  
          -->
        
      </div>
    </div>
      <section class="section1">
    <div class="content2">
        <div class="text">
        <?php
        // Fetch the updated content from the database
        include_once '../db/connection.php';
        $stmt = $conn->prepare("SELECT * FROM motive_table WHERE id=:id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $id = 1; // Assuming the ID of the content you want to display
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Display the fetched content on the HTML page
        if ($row) {
            echo '<h2>' . htmlspecialchars($row['motive_heading']) . '</h2>';
            echo '<p>' . htmlspecialchars($row['motive_paragraph']) . '</p>';
            
        } else {
            echo "No data found";
        }
        ?>
        </div>
    </div>
    <div class="image">
        
           <img src="../images/background.jpeg" alt="Hero Image" class="hero">
        
    </div>
</section>


<section class="section2">
  <h2>Our Service</h2>
  <div class="grid-container">
    <div class="grid-item">
      <img src="../images/webd.jpg" alt="Image 1">
      <h3>Website Design</h3>
      <a href="#">Link 1</a>
    </div>
    <div class="grid-item">
      <img src="../images/app.jpg" alt="Image 2">
      <h3>App Development</h3>
      <a href="#">Link 2</a>
    </div>
    <div class="grid-item">
      <img src="../images/ui.jpg" alt="Image 3">
      <h3>UI/UX</h3>
      <a href="#">Link 3</a>
    </div>
    <div class="grid-item">
      <img src="../images/seo.jpg" alt="Image 4">
      <h3>SEO</h3>
      <a href="#">Link 4</a>
    </div>
  </div>
</section>


    <!-- More sections or content can be added here -->
  </div>
  <!--
  <section class="about_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About Us
              </h2>
            </div>
            <p>
              It is a long established fact that a reader will be distracted by the readable content of a page when
              looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of
              letters, as opposed to using 'Content here, content here', making it look like readable English. Many
              desktop publishing packages and web page editors now use Lorem Ipsum as their
            </p>
            <a href="">
              Get Started
            </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="images/about-img.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="contact_section">
      <div class="container">
        <div class="heading_container">
          <h2>
            Let's Get In Touch!
          </h2>
        </div>
      </div>
      <div class="container contact_bg layout_padding2-top">
        <div class="row">
          <div class="col-md-6">
            <div class="contact_form ">
              <form action="">
                <input type="text" placeholder="Name ">
                <input type="email" placeholder="Email">
                <input type="text" placeholder="Message" class="message_input">
                <button>
                  Send
                </button>
              </form>
            </div>
          </div>
          <div class="col-md-6">
            <div class="img-box">
              <img src="images/contact-img.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </section>

-->
    <!-- Your homepage content goes here -->
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
