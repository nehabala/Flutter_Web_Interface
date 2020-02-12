<?php
   $server = 'remotemysql.com';
   $username = 'EePApFLdTf';
   $password = 'MbWceWl53D';
   $database = 'EePApFLdTf';

   $conn = mysqli_connect($server, $username, $password, $database );
   
   if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
   }
   
   ?>