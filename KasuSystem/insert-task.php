<?php

session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

if ($_SESSION['username'] == "Admin")
    header('Location: insert-task-admin.php');

$servername = "localhost";
$username = "root";
$dbname = "KasuManagementSystem";

$conn = new mysqli($servername, $username, "", $dbname);
$limit = 10;

?>
<html>

<head>
    <title>Insert Task | Task Tracker</title>
    <link rel="stylesheet" href="./CSS/insert_task.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <style></style>
</head>

<body>
    <nav class="navbar sticky-top flex-md-nowrap p-2 shadow kasu-top">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="index.php">Kasu Management System</a>

        <ul class="nav px-0 account">
            <li class="nav-item">
                <h5 style="margin-top: 5px;"><?php echo $_SESSION['username'] ?></h5>
            </li>
            <li class="dropdown">
                <a type="button" class="nav-link option-btn2" data-bs-toggle="dropdown">
                    <img src="./Images/option.png" class="option-navicon" alt="">
                </a>
                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                    <li><a class="dropdown-item delete_data" type="button" href="history_logs.php">History Logs</a>
                    </li>

                    <li>
                        <div class="dropdown-divider"></div>
                    </li>

                    <li>
                        <a class="dropdown-item delete_data" type="button" href="logout.php">Log
                            Out
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class=" row sidebar-div">
            <nav id="sidebarMenu" class="col-md-5 col-lg-2 d-md-block sidebar collapse kasu-side">
                <img src="./Images/kasu-logo.png" alt="" class="kasu-logo">
                <div class="sidebar-sticky pt-3 side-items">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="index.php">
                                <img src="./Images/home.png" alt="" class="sidebar-icons">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="index-tasktracker.php">
                                <img src="./Images/to-do-list (1).png" alt="" class="sidebar-icons">
                                Task Tracker
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="inventorytracker-index.php">
                                <img src="./Images/shipping.png" alt="" class="sidebar-icons">
                                Inventory Tracker
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.deliverytracker.php">
                                <img src="./Images/motorbike.png" alt="" class="sidebar-icons">
                                Delivery Tracker
                            </a>
                        </li>

                    </ul>


                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1>Task Tracker</h1>

                </div>

                <section id="first">
                    <div class="page payment-page">
                        <section class="payment-form dark">
                            <div class="container">
                                <div class="block-heading">
                                    <h2>Today Task Form</h2>
                                </div>
                                <form method="POST">
                                    <div class="row justify-content-md-center">
                                        <div class="col-lg-6 form-div">
                                            <div class="form-group col-sm-11">
                                                <label for="">Task Title:</label>
                                                <input type="text" name="tasktitle" class="form-control"
                                                    placeholder="Enter Task Title" required>
                                            </div>
                                            <div class="form-group col-sm-11">
                                                <label for="">Task Details:</label>
                                                <textarea type="text" rows="3" name="taskdetails" class="form-control"
                                                    placeholder="Enter Task Details" required></textarea>
                                            </div>
                                            <div class="form-group col-sm-11">
                                                <label for="">Employee Assigned:</label>
                                                <input type="text" name="emp_name" class="form-control"
                                                    placeholder="Enter Employee Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 form-div2">

                                            <div class="form-group col-sm-9">
                                                <label for="">Due Date:</label><br>
                                                <input type="date" name="due_date" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Priority:</label>
                                                <select class="form-control" id="exampleFormControlSelect1"
                                                    name="taskprio">
                                                    <option style="background-color: #e2445b;" value="HIGH">High
                                                    </option>
                                                    <option style="background-color: #fdab3d;" value="MEDIUM">Medium
                                                    </option>
                                                    <option style="background-color: #2eaf79;" value="LOW">Low</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-10">
                                            <a id="btnCancel" type="button" name="cancel" href="index-tasktracker.php"
                                                class="btn btn-primary shadow-none">Cancel</a>
                                            <button id="btnSave" type="submit" name="save"
                                                class="btn btn-primary shadow-none">Add
                                                Task</button>
                                        </div>
                                    </div>

                                </form>
                                <?php

                                if (isset($_POST['save'])) {

                                    $stmt1 = $conn->prepare("INSERT INTO Tasks (task_id, task_name, task_desc, employee_name, task_priority,task_status, date_added, date_due) VALUES (?, ?, ?, ?, ?, ?, NOW(), ?)");
                                    $stmt1->bind_param("issssss", $tid, $tname, $tdesc, $ename, $tprio, $tstatus, $due);

                                    $tname = $_POST['tasktitle'];
                                    $tprio = $_POST['taskprio'];
                                    $tdesc = $_POST['taskdetails'];
                                    $ename = $_POST['emp_name'];
                                    $due = $_POST['due_date'];
                                    $tstatus = "FOR APPROVAL";
                                    $stmt1->execute();


                                    $stmt1 = $conn->prepare("INSERT INTO History_Log (history_id, log_date, log_title, log_details, username) VALUES (?, NOW(), ?, ?, ?)");
                                    $stmt1->bind_param("isss", $hid, $logtitle, $logdetails, $user);


                                    $logtitle = "Inserted task in Task Tracker";
                                    $logdetails = "Task Title: " . $tname . " | " . "Task Details: " . $tdesc
                                        . " | " . "Employee Assigned: " . $ename . " | " . "Due Date: " . $due
                                        . " | " . "Priority: " . $tprio . " | " . "Status: " . $tstatus;
                                    $user = $_SESSION['username'];
                                    $stmt1->execute();

                                    echo "<script> location.href='index-tasktracker.php'; </script>";
                                }
                                ?>
                            </div>
                        </section>
                    </div>
                </section>
            </main>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>


</html>