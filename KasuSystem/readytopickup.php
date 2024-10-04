<?php
session_start();

$servername = "localhost";
$username = "root";
$dbname = "KasuManagementSystem";

$conn = new mysqli($servername, $username, "", $dbname);

$id = $_GET['id'];

$query2 = "UPDATE `orderDetails` SET `order_status` = 'READY TO PICKUP' WHERE `orderDetails`.`order_id` = " . $id . "";
mysqli_query($conn, $query2);

$stmt1 = $conn->prepare("INSERT INTO History_Log (history_id, log_date, log_title, log_details, username) VALUES (?, NOW(), ?, ?, ?)");
$stmt1->bind_param("isss", $hid, $logtitle, $logdetails, $user);


$logtitle = "Changed order status in Delivery Tracker";
$logdetails = $_SESSION['username'] . " has changed the status of an order to READY TO PICK-UP (ORDER ID: " . $id . ")";
$user = $_SESSION['username'];
$stmt1->execute();

echo "<script> location.href='index.deliverytracker.php'; </script>";