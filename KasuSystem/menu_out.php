<?php
session_start();

$servername = "localhost";
$username = "root";
$dbname = "KasuManagementSystem";

$conn = new mysqli($servername, $username, "", $dbname);

$id = $_GET['id'];

$query2 = "UPDATE `menu` SET `dish_status` = 'AVAILABLE' WHERE `menu`.`dish_id` = " . $id . "";
mysqli_query($conn, $query2);

$stmt1 = $conn->prepare("INSERT INTO History_Log (history_id, log_date, log_title, log_details, username) VALUES (?, NOW(), ?, ?, ?)");
$stmt1->bind_param("isss", $hid, $logtitle, $logdetails, $user);


$logtitle = "Changed dish status in Inventory Tracker";
$logdetails = $_SESSION['username'] . " has changed the status of a dish to AVAILABLE (DISH ID: " . $id . ")";
$user = $_SESSION['username'];
$stmt1->execute();

header("Location:" . $_SERVER['HTTP_REFERER']);