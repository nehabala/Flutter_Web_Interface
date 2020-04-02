<?php

$server = 'remotemysql.com';
$username = 'EePApFLdTf';
$password = 'MbWceWl53D';
$database = 'EePApFLdTf';

$conn = mysqli_connect($server, $username, $password, $database );

if (!$conn) {
    echo "1";
    exit();
}

//recieve all the fields, and insert it into the sessiondetails table
$number = $_POST["num"];
$insert_query = "INSERT INTO `temp`(`number`) VALUES ($number);"; 
$res = mysqli_query($conn, $insert_query) or die("1");

//to get id, use the other field's data
$sid_query = "SELECT sid FROM `temp` WHERE number=$number;";;
$sid_res = mysqli_query($conn, $sid_query) or die("1");
$sid = mysqli_fetch_row($sid_res);
echo($sid[0]);
?>