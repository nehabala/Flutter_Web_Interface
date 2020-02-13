<?php

session_start();
    if (!$_SESSION["TherapistID"]) {
      $errormessage='Please log in first.';
      header("Location: ./login.php?errormessage=". $errormessage);
      exit();
    }

    include("dbConfig.php");

    $patientID = 0;
    if(isset($_GET["patid"])){
      $patientID = $_GET["patid"];
    }
    //for patient details field names
    $col_names_query = "SHOW columns FROM PatientDetails; ";

    $col_names_query_result = mysqli_query($conn,$col_names_query);

    $cols = array();
    while($col_names_row = mysqli_fetch_assoc($col_names_query_result)){

      array_push($cols,$col_names_row['Field']) ;
    }
    //for the actual details
    $patient_details_query = "SELECT * FROM `PatientDetails` WHERE PatientID = $patientID;";
              
    $patient_details_query_result = mysqli_query($conn,$patient_details_query);

    $row =  mysqli_fetch_row($patient_details_query_result);

    $fname = $row[1]; 
    $lname = $row[2]; 
    $age = $row[3]; 
    $gender = $row[4];
    $height = $row[5];
    $weight = $row[6];
    $bg = $row[7]; 
    $address = $row[8]; 
    $state = $row[9]; 
    $pincode = $row[10]; 
    $contact = $row[11]; 
    $email = $row[12]; 

    // for the sessions of the patient

    $session_details_query = "SELECT * FROM `SessionDetails` WHERE PatientID = $patientID ORDER BY SessionID;";
    $session_details_query_result = mysqli_query($conn,$session_details_query);
    
    //for patient details field names
    $sess_col_names_query = "SHOW columns FROM SessionDetails; ";

    $sess_col_names_query_result = mysqli_query($conn,$sess_col_names_query);

    $sess_cols = array();
    while($sess_col_names_row = mysqli_fetch_assoc($sess_col_names_query_result)){

      array_push($sess_cols,$sess_col_names_row['Field']) ;
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

  .whitebg {
      background-color: #ffffff;
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

  .table-borderless td,
.table-borderless th {
    border: 0;
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

<!-- First container -->
<div class="container-fluid bg-1 text-center">  
  <div class="container" style="padding-left: 7%; padding-right: 7%;"> 
  <div class="jumbotron bg-3 text-left">
  <p class="text-center" style="font-size: 30px;">Patient details of <strong><?php echo "$fname $lname";?> </strong></p> <br>
  
  
  <div class="table-responsive text-center">
  <table class="table table-borderless">
  <?php
  $i = 0;
//add t head if u want
  for($i = 0; $i < count($cols); $i++ ){
    echo '<tr> <td> <strong>' . $cols[$i] . '</strong></td> <td>' . $row[$i] . '</td></tr>' ;
  }

?>  
  </table>
  </div>

    </div>
  </div>
</div>


<!-- Second Container -->

<div class="container-fluid bg-1 text-center">  
  <div class="container">  
  <div class="row">
  <p class="text-center" style="font-size: 30px;">Session data for <strong><?php echo "$fname $lname";?> </strong></p><hr>

  <div class="jumbotron bg-2 text-left">
  <div class="table-responsive">
  <table class="table ">
  <thead>
  <tr>
  <?php
  foreach($sess_cols as $t){
    echo "<th> $t </th>";

  }

  ?>
   
    </tr>
  </thead>
  <tbody>

  <?php
    
    while($session_details_cols = mysqli_fetch_assoc($session_details_query_result)){
      echo "<tr>";
      foreach($session_details_cols as $t){

        echo "<td> $t </td>";
      }

      echo "</tr>";
    }
  ?>
    
  </tbody>
</table>
</div>
  </div>

  <p class="text-center" style="font-size: 30px;">Progress charts </p><hr>

  <div class="jumbotron ">
  <div class="row" >
  <p class="text-center" style="font-size: 20px; color:black;">Pie chart for .... </p>

        <div id="piechart" style="width:100%; min-height:450px; align:center;"></div>
        </div>
        <br>
        <p class="text-center" style="font-size: 20px; color:black;">Curve chart for .... </p>

        <div>
    <div id="curve_chart" style="width:100%; min-height:450px; align:center;"></div>

    </div>
  </div>
  
  

  </div>
  <a href="patientStats.php" class="btn btn-danger btn-lg">
    <span class="glyphicon glyphicon-user"></span> Change patient
  </a>
  <a href="dashboard.php" class="btn btn-danger btn-lg">
    <span class=" glyphicon glyphicon-arrow-left "></span> Back to dashboard
  </a>
    <!-- <div class="col-sm-2" >
    
    </div>
    <div class="col-sm-8" >
    <div class="jumbotron bg-1">
    <form>
  
  
    </div>
    </div>
    <div class="col-sm-2" >
    
    </div> -->
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


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['Work', 8],
  ['Eat', 2],
  ['TV', 4],
  ['Gym', 2],
  ['Sleep', 8]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':''};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>


</body>
</html>
