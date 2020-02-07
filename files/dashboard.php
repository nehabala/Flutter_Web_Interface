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
        <li><a href="login.php">Logout</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
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
  <div class="container">  
  <h1 class="margin">What do you want to do?</h1><hr><br>
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
<div class="container-fluid bg-3 text-center">
  <h2 class="margin"><strong>About this project</strong></h2>
  <div class="row ">
        <p style="padding-left: 20%; padding-right: 20%;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
  </div>
  
  <?php
$servername = "remotemysql.com";
$username = "EePApFLdTf";
$password = "MbWceWl53D";
$dbname = "EePApFLdTf";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT number FROM temp";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "num: " . $row["number"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
  
  ?> 


</div>



<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>For any issues or suggestions, <a href="mailto:neha.balasundaram2016@vitstudent.ac.in" target="_top">Send us an email</a></p> 
</footer>

</body>
</html>
