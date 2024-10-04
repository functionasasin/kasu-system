<?php
session_start();

$servername = "localhost";
$username = "root";
$dbname = "KasuManagementSystem";

$conn = new mysqli($servername, $username, "", $dbname);

$id = $_GET['id'];

$sql = "DELETE FROM tasks WHERE tasks.task_id = " . $id . "";

$result = $conn->query($sql);

echo "<script> location.href='index-tasktracker.php'; </script>";

$stmt1 = $conn->prepare("INSERT INTO History_Log (history_id, log_date, log_title, log_details, username) VALUES (?, NOW(), ?, ?, ?)");
$stmt1->bind_param("isss", $hid, $logtitle, $logdetails, $user);


$logtitle = "Declined a task in Task Tracker";
$logdetails = $_SESSION['username'] . " has declined a task (TASK ID: " . $id . ")";
$user = $_SESSION['username'];
$stmt1->execute();