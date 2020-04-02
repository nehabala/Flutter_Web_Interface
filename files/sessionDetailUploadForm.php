<?php

session_start();

if (!$_SESSION["TherapistID"]) {
  $errormessage='Please log in first.';
  header("Location: ./login.php?errormessage=". $errormessage);
  exit();
}

include("dbConfig.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {

  $patientid = $_POST['patID'];
  $sessionid = $_POST['sesID'];
  $therapistid = $_SESSION["TherapistID"];

  $insert_query = "UPDATE SessionDetails SET PatientID = $patientid, TherapistID = $therapistid WHERE SessionID = $sessionid;";
  if(mysqli_query($conn,$insert_query)){
    $errmessage='Session details updated.';
	  header("Location: ./dashboard.php?errmessage=". $errmessage);
	  exit();
  }
  else{
    $errmessage='Session details not updated. Please try again.' . $insert_query;
	  header("Location: ./dashboard.php?errmessage=". $errmessage);
	  exit();

  }

}?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Flutter - Session detail upload</title>
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
    background-color: #ffffff; /* Dark Blue */
    color: #000000;
  }
  .bg-3 { 
    background-color: #0e7265; /* White */
    color: #ffffff;
  }
  .bg-4 { 
    background-color: #2f2f2f; /* Black Gray */
    color: #ffffff;
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
    color: #ffffff !important;
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
      <a class="navbar-brand" href="#"><img src="./images/logoBig.png" style="max-height: 20px; width: auto;"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php">Logout</a></li>
        <li><a href="#cont">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- First Container -->

<!-- 
<div class="container-fluid bg-1 text-center">
        <span style="font-size: 50px; font-weight: bold;">Dashboard</span>
      </div> -->



<!-- Third Container (Grid) -->

<div class="container-fluid bg-2 text-center">  
  <div class="container">  
  <h1 class="margin">Update session details here</h1><hr><br>
  <div class="row">
    <div class="col-sm-4" >
    
    </div>
    <div class="col-sm-4" >
    <div class="jumbotron bg-1">
    <form action = "./sessionDetailUploadForm.php" method = "post">
    <div class="form-group text-left">
      <p>Session ID</p>
   <select class="form-control" id="sesID" name="sesID" >
   <option selected>Choose...</option>

                   <?php
                   
                   $sesID_list_query = "SELECT SessionID FROM SessionDetails where ISNULL(TherapistID) and ISNULL(PatientID);";
                   
                   $sesID_list_query_result = mysqli_query($conn,$sesID_list_query);
                   
                   while($row =  mysqli_fetch_row($sesID_list_query_result)){
                   echo '<option>'.$row[0].'</option>';
                   }?>
      </select>
      <br>
      <small id="emailHelp" class="form-text ">If patient ID is not visible, make sure they are registered first. </small>

    </div>
  <div class="form-group  text-left">
      <p>Patient ID</p>
   <select class="form-control" id="patID" name="patID" >
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
    
  <input type="submit" name='submit' value='Submit' class="btn btn-danger">
</form>
    </div>
    </div>
    <div class="col-sm-4" >
    
    </div>
</div>
</div>
</div>

<!-- Footer -->
<footer id="cont" class="container-fluid bg-4 text-center">
  <p>For any issues or suggestions, <a href="mailto:neha.balasundaram2016@vitstudent.ac.in" target="_top">Send us an email</a></p> 
</footer>

</body>
</html>
