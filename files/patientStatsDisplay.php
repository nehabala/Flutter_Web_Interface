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

<div class="container-fluid bg-1 text-center">  
  <div class="container">  
  <div class="row">
  <p class="text-center" style="font-size: 30px;">Session data for (Patient name) </p><hr>

  <div class="jumbotron bg-2 text-left">
  <div class="table-responsive">
  <table class="table ">
  <thead>
    <tr>
      <th scope="col">S.No.</th>
      <th scope="col">Session ID</th>
      <th scope="col">Date and Time</th>
      <th scope="col">Activity number</th>
      <th scope="col">Total time</th>
      <th scope="col">Total distraction time</th>
      <th scope="col">Total attention time</th>
      <th scope="col">Number of distractions</th>



    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>


    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>



    </tr>
    <tr>
      <th scope="row">3</th>
      <td >Larry the Bird</td>
      <td>@twitter</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>



    </tr>
  </tbody>
</table>
</div>
  </div>

  <p class="text-center" style="font-size: 30px;">Progress charts </p><hr>

  <div class="jumbotron whitebg">
  <div class="row">
    <div class="col-md-6">
        <div id="piechart"></div>
    </div>
    <div class="col-md-6">
    <div id="curve_chart" ></div>

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
  var options = {'title':'My Average Day', 'width':550, 'height':400};

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
