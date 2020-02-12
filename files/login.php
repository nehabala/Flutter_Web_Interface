<?php

include("dbConfig.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
$errmessage ='';

$tid = $_POST['tid'];
$pwd = $_POST['pwd'];

$login_auth_query = "SELECT Name, Password FROM TherapistDetails WHERE TherapistID = " . "'" . $tid . "' ;" ;

$login_auth_query_result = mysqli_query($conn,$login_auth_query);

$row = mysqli_fetch_row($login_auth_query_result);

if(!$row[0]){
    $errmessage='Therapist ID does not exist';
	header("Location: ./login.php?errmessage=". $errmessage);
	exit();
}
    
else if (!$pwd){
    $errmessage.='Password not entered';
	header("Location: ./login.php?errmessage=". $errmessage);
	exit();

}

if (($pwd == $row[1])&&($pwd)){

    //start a session
    $_SESSION["TherapistID"] = $tid;
    $_SESSION["TherapistName"] = $row[0];
	//echo $_SESSION["TherapistName"];
    header("Location: ./dashboard.php");
    
}

else {
    $errmessage='Incorrect password';
    header("Location: ./login.php?errmessage=". $errmessage);
	exit();
    //display prompt saying try again;
}}




?>

<!DOCTYPE html>
<html>
    
<head>
	<title>Flutter Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	
	<style>

    body,
		html {
			margin: 0;
			padding: 0;
			height: 100%;
			/* background: #c4c4c4 !important; */
		}
		.user_card {
			height: 400px;
			width: 350px;
			margin-top: auto;
			margin-bottom: auto;
			background: #1abc9c;
			position: relative;
			display: flex;
			justify-content: center;
			flex-direction: column;
			padding: 10px;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			-webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			-moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			border-radius: 5px;

		}
		.brand_logo_container {
			position: absolute;
			height: 170px;
			width: 170px;
			top: -75px;
			border-radius: 50%;
			background: #c4c4c4;
			padding: 10px;
			text-align: center;
		}
		.brand_logo {
			height: 150px;
			width: 150px;
			border-radius: 50%;
			border: 2px solid white;
		}
		.form_container {
			margin-top: 100px;
		}
		.login_btn {
			width: 100%;
			background: #c0392b !important;
			color: white !important;
		}
		.login_btn:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
		.login_container {
			padding: 0 2rem;
		}
		.input-group-text {
			background: #c0392b !important;
			color: white !important;
			border: 0 !important;
			border-radius: 0.25rem 0 0 0.25rem !important;
		}
		.input_user,
		.input_pass:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
		.custom-checkbox .custom-control-input:checked~.custom-control-label::before {
			background-color: #c0392b !important;
		}
        .bg-4 { 
            background-color: #2f2f2f; /* Black Gray */
            color: #fff;
        }
    </style>

</head>

<body>
<?php
    //session_start();
    if(isset($_GET["errormessage"])){
      echo  '<div style="font-size: 15px; margin: 5%;" class="alert alert-info text-center">';
      echo   $_GET["errormessage"];
      echo   '</div>';
	}

    ?>
	<div class="container h-100">
	<br>
	<?php
    //session_start();
    if(isset($_GET["errmessage"])){
      echo  '<div class="alert alert-warning text-center">';
      echo   '<strong>Error! </strong>' . $_GET["errmessage"];
      echo   '</div>';
	}

    ?>


		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
			
				<div class="d-flex justify-content-center">

					<!-- <div class="brand_logo_container">
						<p><span class="glyphicon glyphicon-user"></span>Login</p>
                    </div> -->
                    <span style="font-size: 50px; font-weight: bold; color: #ffffff;">Login</span>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form action = "./login.php" method = "post">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="tid" class="form-control input_user" value="" placeholder="Enter Therapist ID">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="pwd" class="form-control input_pass" value="" placeholder="Enter password">
						</div>
						<!-- <div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">Remember me</label>
							</div>
						</div> -->
						<p class="text-left" style="font-size: 15px; color:white;">Not registered yourself yet? Click <a href="registerNewTherapist.php">here </a> </p>

							<div class="d-flex justify-content-center mt-3 login_container">
				 	<input type="submit" name="submit" value="Login" class="btn login_btn">
				   </div>
					</form>
				</div>
		
				<!-- <div class="mt-4">
					<div class="d-flex justify-content-center links">
						Don't have an account? <a href="#" class="ml-2">Sign Up</a>
					</div>
					<div class="d-flex justify-content-center links">
						<a href="#">Forgot your password?</a>
					</div>
				</div> -->
			</div>
		</div>
    </div>
    <footer class="container-fluid bg-4 text-center">
            <p style="margin-top:1%; padding-top: 2.5%;padding-bottom: 2.5%;">For any issues or suggestions, <a href="mailto:neha.balasundaram2016@vitstudent.ac.in" target="_top">Send us an email</a></p> 
          </footer>
</body>
</html>
