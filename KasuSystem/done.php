<?php
session_start();

$servername = "localhost";
$username = "root";
$dbname = "KasuManagementSystem";

$conn = new mysqli($servername, $username, "", $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$page = $_GET['page'];

$stmt = $conn->prepare("UPDATE Tasks SET tasks.task_status =? WHERE tasks.task_id = " . $id . "");
$stmt->bind_param("s", $tstatus);

$tstatus = "COMPLETED";
$stmt->execute();


$stmt1 = $conn->prepare("INSERT INTO History_Log (history_id, log_date, log_title, log_details, username) VALUES (?, NOW(), ?, ?, ?)");
$stmt1->bind_param("isss", $hid, $logtitle, $logdetails, $user);


$logtitle = "Completed task in Task Tracker";
$logdetails = $_SESSION['username'] . " has completed a task (TASK ID: " . $id . ")";
$user = $_SESSION['username'];
$stmt1->execute();

echo "<script> location.href='" . $page . ".php'</script>";