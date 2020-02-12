<?php

session_start();
    if (!$_SESSION["TherapistID"]) {
      $errormessage='Please log in first.';
      header("Location: ./login.php?errormessage=". $errormessage);
      exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Flutter Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  body {
    font: 30px Montserrat, sans-serif;
    line-height: 1.8;
    color: #f5f6f7;
  }
  p {font-size: 15px;}
  .margin {margin-bottom: 45px;}
  .bg-1 { 
    background-color: #1abc9c; /* Green */
    color: #ffffff;
  }
  .bg-2 { 
    background-color: #474e5d; /* Dark Blue */
    color: #ffffff;
  }
  .bg-3 { 
    background-color: #0e7265; /* White */
    color: #ffffff;
  }
  .bg-4 { 
    background-color: #2f2f2f; /* Black Gray */
    color: #fff;
  }
  .container-fluid {
    padding-top: 70px;
    padding-bottom: 70px;
  }
  .navbar {
    padding-top: 15px;
    padding-bottom: 15px;
    border: 0;
    border-radius: 0;
    margin-bottom: 0;
    font-size: 12px;
    letter-spacing: 5px;
  }
  .navbar-nav  li a:hover {
    color: #1abc9c !important;
  }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Flutter</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php">Logout</a></li>
        <li><a href="#abt">About</a></li>
        <li><a href="#cont">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- First Container -->
<div class="container-fluid bg-1 text-center " style="padding-top: 20px; padding-bottom: 20px;">
        <span style="font-size: 60px; font-weight: bold;">Dashboard</span>
      </div>


<!-- Third Container (Grid) -->

<div class="container-fluid bg-2 text-center">  
<?php
    if(isset($_GET["errmessage"])){
      echo  '<div style="font-size: 15px;" class="alert alert-warning">';
      echo   $_GET["errmessage"];
      echo   '</div>';
	}

    ?>
  <div class="container">  
  <h1 style="font-size: 40px;">Welcome, <?php echo $_SESSION["TherapistName"]; ?>!</h1>
  <h4 class="">What do you want to do?</h4><hr><br>
  <div class="row">
    <div class="col-sm-4" >
    <div class="jumbotron bg-1">
    <div><span style="font-size: 50px; font-weight: bold;">Update</span>
    </div>
    <p>Session details</p>
    <a href="sessionDetailUploadForm.php" class="btn btn-danger btn-lg">
    <span class="glyphicon glyphicon-upload"></span> Update
    </a>
    </div>
    </div>
    <div class="col-sm-4" >
    <div class="jumbotron bg-1">
    <div><span style="font-size: 50px; font-weight: bold;">Register</span>
    </div>
    <p>New patient</p>
    <a href="registerNewPatientForm.php" class="btn btn-danger btn-lg">
    <span class="glyphicon glyphicon-plus"></span> Register
    </a>
    </div>
    </div>
    <div class="col-sm-4" >
    <div class="jumbotron bg-1">
    <div><span style="font-size: 50px; font-weight: bold;">View</span>
    </div>
    <p>Patient statistics</p>
    <a href="patientStats.php" class="btn btn-danger btn-lg">
    <span class="glyphicon glyphicon-stats"></span> View
    </a>
    </div>
    </div>
</div>
</div>
</div>

<!-- Second Container -->
<div id="abt" class="container-fluid bg-3 text-center">
  <h2 class="margin"><strong>About this project</strong></h2>
  <div class="row ">
      <p style="padding-left: 20%; padding-right: 20%;">The main part of this project is a Virtual Reality application to be used with a Virtual Reality High-End Head Mounted Display (VR HMD) 
      to be used as activities in the therapy for children with ADHD. The application simulates a virtual world, into which the user is 
      transported into with the HMD, with activities, that are used by therapists to improve aspects like concentration, patience and memory in the children 
      receiving therapy.</p><p style="padding-left: 20%; padding-right: 20%;"><strong> These activities will be timed and scored, and the scores will be shown to the therapists at the end of the session. This is where this website comes in.
      Therapists will be able to view the collected data and make use of it to aid their therapy methods for the patients.</strong>
      </p>
    </div>
</div>
<!-- Footer -->
<footer id="cont" class="container-fluid bg-4 text-center">
  <p>For any issues or suggestions, <a href="mailto:neha.balasundaram2016@vitstudent.ac.in" target="_top">Send us an email</a></p> 
</footer>

</body>
</html>
