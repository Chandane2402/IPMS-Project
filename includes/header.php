

<!DOCTYPE html>
<?php include 'core/init.php';?>

<?php
  function getIp() {
    //Get IP Address
      $ip = $_SERVER['REMOTE_ADDR'];   
      if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
          $ip = $_SERVER['HTTP_CLIENT_IP'];
      } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
          $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
      }  
      return $ip;
  }
?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Internship</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">  
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script> 
</head>

<body>
  <header>
    <!--Navbar -->
    <nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color">
      <a class="navbar-brand" href="index.php">Internships</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
        aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <?php 
              if(!isset($_SESSION['email'])){
                echo "
                <li class='nav-item'><a href='myaccount.php' class='nav-link' style='border-radius: 10em;'>Student</a></li>
                <li class='nav-item'><a href='employer/myaccount.php' class='nav-link' style='border-radius: 10em;'>Company</a></li>
                ";
              }
              else{
                echo "<li class='nav-item'><a href='myaccount.php' class='nav-link' style='border-radius: 10em;'>My Account</a></li>";
                echo "<li class='nav-item'><a href='logout.php' class='nav-link' style='border-radius: 10em;'>Logout</a></li>";
              }
            ?>
        </ul>
  <ul class="navbar-nav ml-auto nav-flex-icons">
    <li class="nav-item">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    </li>
    <li class="nav-item">  
      <a class="nav-link waves-effect waves-light" href="./sendMail-tutorial-main/contact.html" target="_blank" rel="noopener noreferrer">  
        <i class="fas fa-question-circle">Help</i>  
      </a>  
    </li>
    <li class="nav-item">  
      <a class="nav-link waves-effect waves-light" href="https://www.youtube.com/@TASLIMRAZASHABBEERAHMADKADAKOL" target="_blank" rel="noopener noreferrer">  
       <i class="fab fa-youtube"></i>  
      </a>  
    </li>  
    <li class="nav-item">  
      <a class="nav-link waves-effect waves-light" href="https://www.linkedin.com/in/taslimraza-kadakol-38655428b?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app " target="_blank" rel="noopener noreferrer">  
        <i class="fab fa-linkedin-in"></i>  
      </a>  
    </li>
  </ul>
      </div>
    </nav>
    <!--/.Navbar -->
  </header>