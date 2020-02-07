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
        <li><a href="login.php">Logout</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
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
  <div class="row">
  <p class="text-center" style="font-size: 30px;">Select patient ID </p><hr>

    <div class="col-sm-4" >
    
    </div>
    <div class="col-sm-4" >
    <div class="jumbotron bg-1">
    <form>
  
  <div class="form-group  text-left">
      <p>Patient ID</p>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>retrieve all patient IDs here</option>
      </select>
      <br>
      <small id="emailHelp" class="form-text ">If patient ID is not visible, make sure they are registered first. </small>

    </div>
    
  <button type="submit" class="btn btn-danger" ><a href="patientStatsDisplay.php">Confirm</a></button>
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
<footer class="container-fluid bg-4 text-center">
  <p>For any issues or suggestions, <a href="mailto:neha.balasundaram2016@vitstudent.ac.in" target="_top">Send us an email</a></p> 
</footer>

</body>
</html>