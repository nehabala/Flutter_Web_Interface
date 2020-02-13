<?php

session_start();

if (!$_SESSION["TherapistID"]) {
  $errormessage='Please log in first.';
  header("Location: ./login.php?errormessage=". $errormessage);
  exit();
}
include("dbConfig.php");


if($_SERVER["REQUEST_METHOD"] == "POST") {

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $height = $_POST['height'];
  $weight = $_POST['weight'];
  $bg = $_POST['bloodgroup'];
  $address = $_POST['address'];
  $state = $_POST['state'];
  $pincode = $_POST['pincode'];
  $contact = $_POST['contact'];
  $email = $_POST['email'];

// VALIDATION 

  $insert_query = "INSERT INTO `PatientDetails`(`PatientID`, `FirstName`, `LastName`, `Age`, `Gender`, `Height`, `Weight`, `BloodGroup`, `Address`, `State`, `Pincode`, `Contact`, `Email`) VALUES (NULL,'$fname','$lname',$age,'$gender',$height,$weight,'$bg','$address','$state',$pincode,$contact,'$email')";
  if(mysqli_query($conn,$insert_query)){


    $errmessage='Patient details updated.';

    $patid_query = "SELECT `PatientID` FROM `PatientDetails` WHERE Address ='$address' and Contact= $contact;";
    $res = mysqli_query($conn,$patid_query);
    $row =  mysqli_fetch_row($res);
    $patid = $row[0];

    $errmessage .= " Please note the Patient ID : $patid"; 

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
  <title>Flutter - Register new patient</title>
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

<!-- First Container -->

<!-- 
<div class="container-fluid bg-1 text-center">
        <span style="font-size: 50px; font-weight: bold;">Dashboard</span>
      </div> -->



<!-- Third Container (Grid) -->

<div class="container-fluid bg-2 text-center">  
  <div class="container">  
  <h1 class="margin">Upload patient details here</h1><hr><br>
  <div class="row">
    <div class="col-sm-2" >
    
    </div>
    <div class="col-sm-8" >
    <div class="jumbotron bg-1">
    <form action = "./registerNewPatientForm.php" method = "post">

    <!-- assign proper names -->
  <div class="form-group text-left">
  <p class="text-center" style="font-size: 30px;">Personal details </p><hr>

    <p>First Name</p>
    <input name="fname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter First name" required>
  </div>

  <div class="form-group text-left">
    <p>Last Name</p>
    <input name="lname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Last name" required>
  </div>

  <div class="form-group text-left">
    <p>Age</p>
    <input name="age" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter age" required>
  </div>
  
  <div class="form-check form-check-inline text-left">
  <p>Gender</p>

    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="M" >
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
<br>
<div class="form-group text-left">
    <p>Height (cms)</p>
    <input name="height" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter height" required>
  </div>
  <div class="form-group text-left">
    <p>Weight (kgs)</p>
    <input name="weight" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter weight" required>
  </div>
  <div class="form-group text-left">
      <p>Blood group</p>
      <select name="bloodgroup" id="inputState" class="form-control" required>
        <option selected>Select blood group</option>
        <option>A+</option>
        <option>A-</option>
        <option>B+</option>
        <option>B-</option>
        <option>O+</option>
        <option>O-</option>
        <option>AB+</option>
        <option>AB-</option>
      </select>
      <br>

    </div>
    <p class="text-center" style="font-size: 30px;">Contact details </p> <hr>
    <div class="form-group text-left">

    <p>Address</p>
    <input name="address" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter address" required>
  </div>

  <div class="form-group text-left">
    <p>State</p>
    <input name="state" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter state" required>
  </div>

  <div class="form-group text-left">
    <p>Pincode</p>
    <input name="pincode" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter pincode (6 digits only)" required>
  </div>

  <div class="form-group text-left">
    <p>Contact number</p>
    <input name="contact" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter contact number" required>
  </div>

  <div class="form-group text-left">
    <p>Email</p>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email ID" required>
  </div>
  <p class="text-left" style="font-size: 15px;">Patient ID will be shown once registered. </p>

  <input type="submit" name="submit" value="Register" class="btn btn-danger">
  <!-- todo: show a popup with patient -->
</form>
    </div>
    </div>
    
    <div class="col-sm-2" >
    
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
