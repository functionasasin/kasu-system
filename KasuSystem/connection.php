<?php

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "smartpr";

$con = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

if (!$con) {
  die("Failed to connect: " . mysqli_connect_error());
}
