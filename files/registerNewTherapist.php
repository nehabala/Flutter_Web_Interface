<?php

session_start();

if (!$_SESSION["TherapistID"]) {
  $errormessage='Please log in first.';
  header("Location: ./login.php?errormessage=". $errormessage);
  exit();
}
include("dbConfig.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {

  $fname = $_POST['fullname'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $qual = $_POST['qualification'];
  $spec = $_POST['speciality'];
  $address = $_POST['address'];
  $contact = $_POST['contact'];
  $email = $_POST['email'];
  $password = $_POST['password'];

// VALIDATION 

  $insert_query = "INSERT INTO `Therapist`(`TherapistID`, `Name`, `LastName`, `Age`, `Gender`, `Qualification`, `Speciality`, `Contact`, `Address`, `Password`) VALUES (NULL,'$fname',$age,'$gender',$qual,$spec,$contact,'$address','$password')";
  if(mysqli_query($conn,$insert_query)){


    $errmessage='Therapist details updated.';

    $therapistid_query = "SELECT `TherapistID` FROM `TherapistDetails` WHERE Address ='$address' and Contact= $contact;";
    $res = mysqli_query($conn,$therapistid_query);
    $row =  mysqli_fetch_row($res);
    $therapistid = $row[0];

    $errmessage .= " Please note the Therapist ID : $therapistid"; 

	  header("Location: ./dashboard.php?errmessage=". $errmessage);
	  exit();
  }
  else{
    $errmessage='Patient details not updated. Please try again.' . $insert_query;
	  header("Location: ./dashboard.php?errmessage=". $errmessage);
	  exit();

  }

}?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Flutter - Register new therapist</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  body {
    font: 12px Montserrat, sans-serif;
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
        <li><a href="#cont">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>



<!-- First Container (Grid) -->

<div class="container-fluid bg-2 text-center">  
<div class="alert alert-danger" role="alert">
  This is a danger alert—check it out!
</div>
  <div class="container">  
  <h1 class="">Therapist registration</h1>
  <h4 class="margin">Please fill in your details here</h4><hr><br>

  <div class="row">
    <div class="col-sm-2" >
    
    </div>
    <div class="col-sm-8" >
    <div class="jumbotron bg-1">
    <form action = "" method = "post">

    <!-- assign proper names -->
  <div class="form-group text-left">
  <p class="text-center" style="font-size: 30px;">Personal details </p><hr>

    <p>Full Name</p>
    <input type="text" name="fullname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Full name">
  </div>
  <div class="form-group text-left">
    <p>Age</p>
    <input type="text" name="age" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter age">
  </div>
  
  <div class="form-check form-check-inline text-left">
  <p>Gender</p>

    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="M">
    <label class="form-check-label" for="inlineRadio1">Male</label>
    </div>
  <div class="form-check form-check-inline text-left">
    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="F">
    <label class="form-check-label" for="inlineRadio2">Female</label>
</div>
<div class="form-check form-check-inline text-left">
    <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="O">
    <label class="form-check-label" for="inlineRadio3">Others</label>
</div>
<div class="form-group text-left">
    <p>Qualification</p>
    <input type="text" name="qualification" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your qualification">
  </div>

  <div class="form-group text-left">
    <p>Speciality</p>
    <input type="text" name="speciality" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your speciality area">
  </div>
<br>

    <p class="text-center" style="font-size: 30px;">Contact details </p> <hr>
    <div class="form-group text-left">

    <p>Address</p>
    <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter address">
  </div>

  <div class="form-group text-left">
    <p>Contact number</p>
    <input type="text" name="contact" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter contact number">
  </div>

  <div class="form-group text-left">
    <p>Email</p>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email ID">
  </div>

  <div class="form-group text-left">
    <p>Password</p>
    <input type="password" name="password1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email ID">
  </div>
  <div class="form-group text-left">
    <p>Confirm password</p>
    <input type="password" name="password2" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email ID">
  </div>
  <p class="text-left" style="font-size: 15px;">Your Therapist ID will be shown once you have registered. </p>

  <button type="submit" Value="submit" class="btn btn-danger">Register</button>
  <!-- todo: show a popup with therapist ID -->
</form>
    </div>
    </div>
   
    <div class="col-sm-2" >
    
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
