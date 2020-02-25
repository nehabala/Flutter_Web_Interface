<?php

$server = 'remotemysql.com';
$username = 'EePApFLdTf';
$password = 'MbWceWl53D';
$database = 'EePApFLdTf';

$conn = mysqli_connect($server, $username, $password, $database );

if (!$conn) {
    echo "1 : connection failed";
    exit();
}

$number = $_POST["num"];
$insert_query = "INSERT INTO `temp`(`number`) VALUES ($number);"; 

$res = mysqli_query($conn, $insert_query) or die("2 : Insertion failed");

echo("0");
?>