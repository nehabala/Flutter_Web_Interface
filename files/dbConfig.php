<?php
   $server = 'sql12.freemysqlhosting.net';
   $username = 'sql12341521';
   $password = 'LmhnxinX4q';
   $database = 'sql12341521';

   $conn = mysqli_connect($server, $username, $password, $database );
   
   if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
   }
   
   ?>