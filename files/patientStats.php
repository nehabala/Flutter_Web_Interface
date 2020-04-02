<?php

    session_start();
    if (!$_SESSION["TherapistID"]) {
      $errormessage='Please log in first.';
      header("Location: ./login.php?errormessage=". $errormessage);
      exit();
    }

    include("dbConfig.php");
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      $patid =  $_POST['patid'];
      header("Location: ./patientStatsDisplay.php?patid=". $patid);
	    exit();

    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Flutter - Patient details and statistics</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  body {
    font: 15px Montserrat, sans-serif;
    color: #f5f6f7;
  }
  p {font-size: 15px;}
  .margin {margin-bottom: 45px;}
  .bg-1 { 
    background-color: #65a4ba; /* Green */
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
<nav class="navbar bg-4 navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><img src="./images/logo.png" style="max-height: 20px; width: auto;"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php">Logout</a></li>
        <li><a href="#cont">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- First Container (Grid) -->

<div class="container-fluid  text-center">  
  <div class="container">  
  <div class="row">
  <p class="text-center" style="font-size: 30px; color: black;">Select patient ID to view details and stats </p><hr>

    <div class="col-sm-4" >
    
    </div>
    <div class="col-sm-4" >
    <div class="jumbotron bg-1">
    <form action = "./patientStats.php" method = "post">
  
    <div class="form-group  text-left">
      <p>Patient ID</p>
   <select class="form-control" id="patid" name="patid" required >
   <option selected>Choose...</option>

                   <?php
                   
                   $patID_list_query = "SELECT PatientID FROM PatientDetails";
                   
                   $patID_list_query_result = mysqli_query($conn,$patID_list_query);
                   
                   while($row =  mysqli_fetch_row($patID_list_query_result)){
                   echo '<option>'.$row[0].'</option>';
                   }?>
      </select>
      <br>
      <small id="emailHelp" class="form-text ">If patient ID is not visible, make sure they are registered first. </small>

    </div>
    
    <input type="submit" name="submit" value="View details" class="btn btn-danger">
</form>
    </div>
    </div>
    <div class="col-sm-4" >
    
    </div>
</div>
</div>
</div>

<!-- Second Container -->
<!-- <div class="container-fluid bg-3 text-center">
  <h2 class="margin"><strong>About this project</strong></h2>
  <div class="row ">
        <p style="padding-left: 20%; padding-right: 20%;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
  </div>
  </div> -->



<!-- Footer -->
<footer id="cont" class="container-fluid bg-4 text-center">
  <p>For any issues or suggestions, <a href="mailto:neha.balasundaram2016@vitstudent.ac.in" target="_top">Send us an email</a></p> 
</footer>

</body>
</html>
