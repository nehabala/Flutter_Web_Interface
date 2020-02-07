<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
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
  <h1 class="margin">Upload patient details here</h1><hr><br>
  <div class="row">
    <div class="col-sm-2" >
    
    </div>
    <div class="col-sm-4" >
    <div class="jumbotron bg-1">
    <form>

    <!-- assign proper names -->
  <div class="form-group text-left">
  <p class="text-center" style="font-size: 30px;">Personal details </p><hr>

    <p>First Name</p>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter First name">
  </div>

  <div class="form-group text-left">
    <p>Last Name</p>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Last name">
  </div>

  <div class="form-group text-left">
    <p>Age</p>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter age">
  </div>
  
  <div class="form-check form-check-inline text-left">
  <p>Gender</p>

    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="M">
    <label class="form-check-label" for="inlineRadio1">Male</label>
    </div>
  <div class="form-check form-check-inline text-left">
    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="F">
    <label class="form-check-label" for="inlineRadio2">Female</label>
</div>
<div class="form-check form-check-inline text-left">
    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="O">
    <label class="form-check-label" for="inlineRadio3">Others</label>
</div>
<br>
<div class="form-group text-left">
    <p>Height (cms)</p>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter height">
  </div>
  <div class="form-group text-left">
    <p>Weight (kgs)</p>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter weight">
  </div>
  <div class="form-group text-left">
      <p>Blood group</p>
      <select id="inputState" class="form-control">
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
    <p class="text-left" style="font-size: 15px;">Patient ID will be shown once registered. </p>

  
  <button type="submit" class="btn btn-danger"><a href="dashboard.php">Register</a></button>
  <!-- todo: show a popup with patient -->
</form>
    </div>
    </div>
    <div class="col-sm-4" >
    <div class="jumbotron bg-1">
      <form>  
    <p class="text-center" style="font-size: 30px;">Contact details </p> <hr>
    <div class="form-group text-left">

    <p>Address</p>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter address">
  </div>

  <div class="form-group text-left">
    <p>State</p>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter state">
  </div>

  <div class="form-group text-left">
    <p>Pincode</p>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter pincode (6 digits only)">
  </div>

  <div class="form-group text-left">
    <p>Contact number</p>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter contact number">
  </div>

  <div class="form-group text-left">
    <p>Email</p>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email ID">
  </div>
  <button type="submit" class="btn btn-danger"><a href="dashboard.php">Register</a></button>

</form>
    </div>
    </div>
    <div class="col-sm-2" >
    
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
