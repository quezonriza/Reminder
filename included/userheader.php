<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>RemindersList - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
   <!-- FontAwesome icon -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
   
  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
  <?php
      include("../included/dbconn.php");
  ?>
      <!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center justify-content-between">
        <div class="logo">
          <h1 class="text-light"><a href="landingpage.html"><span>RemindersList</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="../userpage/userdashboard.php">Home</a></li>
            <li><a class="nav-link scrollto" href="#about">About</a></li>
            <li><a class="nav-link scrollto" href="#services">Services</a></li>
            <li class="dropdown"><a href="#"><span>Activity Logs</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li class="dropdown"><a href="#"><span>Operations</span> <i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="add-activity.php">Add Activity</a></li>
                    <li><a href="#">Done Activity</a></li>
                    <li><a href="#">Deleted Activity</a></li>
                    <li><a href="#">Show All Activity</a></li>
                  </ul>
                </li>
                <li><a href="#">Live Chat</a></li>
              </ul>
            </li>
            <li class="dropdown"><a href="#"><span>Other Options</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="#">Edit Profile Info</a></li>
                <li class="dropdown"><a href="#"><span>Color Theme</span> <i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#"><i class="fa-solid fa-moon"></i></a></li>
                    <li><a href="#"><i class="fa-solid fa-sun"></i></a></li>
                  </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Users Engagement</span> <i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Feedback form</a></li>
                    <li><a href="#">Ratings</a></li>
                  </ul>
                </li>
                <li><a href="#">Terms and Privacy Policy</a></li>
                <li><a href="#">News and Announcement</a></li>
              </ul>
            </li>
            <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            <li><a class="nav-link scrollto" href="../userpage/announcement.php"><i class="fa-solid fa-bell"></i></a></li>
            <li><a class="nav-link scrollto" href="#message"><i class="fa-solid fa-message"></i></a></li>
            <li><a class="getstarted scrollto" href="../logout.php?logout=1">Logout</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div><!-- End Header Container -->
   <!-- The modal form -->
</header>
<!-- End Header -->

  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
</body>
</html>