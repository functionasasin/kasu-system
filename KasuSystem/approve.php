<?php

session_start();


$servername = "localhost";
$username = "root";
$dbname = "KasuManagementSystem";

$conn = new mysqli($servername, $username, "", $dbname);

$id = $_GET['id'];

$query2 = "UPDATE `Tasks` SET `task_status` = 'APPROVED' WHERE `Tasks`.`task_id` = " . $id . "";
mysqli_query($conn, $query2);

$stmt1 = $conn->prepare("INSERT INTO History_Log (history_id, log_date, log_title, log_details, username) VALUES (?, NOW(), ?, ?, ?)");
$stmt1->bind_param("isss", $hid, $logtitle, $logdetails, $user);


$logtitle = "Approved a task in Task Tracker";
$logdetails = $_SESSION['username'] . " has approved task (TASK ID: " . $id . ")";
$user = $_SESSION['username'];
$stmt1->execute();

echo "<script> location.href='index-tasktracker.php'; </script>";