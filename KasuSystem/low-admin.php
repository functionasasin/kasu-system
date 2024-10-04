<?php

session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

if ($_SESSION['username'] != "admin")
    header('Location: low.php');

$servername = "localhost";
$username = "root";
$dbname = "KasuManagementSystem";

$conn = new mysqli($servername, $username);
$limit = 10;

?>

<html>

<head>
    <title>Low | Task Tracker</title>
    <link rel="stylesheet" href="./CSS/index_styles-task.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css"
        integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
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
                    <li><a class="dropdown-item delete_data" type="button" href="history_logs.php">History Logs </a>
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
                    <ul class="nav justify-content-center">
                        <li class="nav-item active-item">
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $dbname = "KasuManagementSystem";

                            $conn = new mysqli($servername, $username, "", $dbname);

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sqlStat = "SELECT * FROM Tasks WHERE Tasks.task_status = 'APPROVED';";

                            $resultS1 = $conn->query($sqlStat);

                            $AvailCount = $resultS1->num_rows; ?>

                            <a class="nav-link " href="index-tasktracker.php">
                                <span class="badge badge-pill badge-danger"><?php echo $AvailCount ?></span>
                                &nbspApproved Tasks
                            </a>

                        </li>
                        <li class="nav-item">
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $dbname = "KasuManagementSystem";

                            $conn = new mysqli($servername, $username, "", $dbname);

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sqlStat = "SELECT * FROM Tasks WHERE Tasks.task_priority = 'HIGH' AND Tasks.task_status != 'COMPLETED';";

                            $resultS1 = $conn->query($sqlStat);

                            $AvailCount = $resultS1->num_rows; ?>
                            <a class="nav-link" href="important-task.php">
                                <span class="badge badge-pill badge-danger"><?php echo $AvailCount ?></span>
                                &nbspImportant Tasks</a>
                        </li>
                        <li class="nav-item">
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $dbname = "KasuManagementSystem";

                            $conn = new mysqli($servername, $username, "", $dbname);

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sqlStat = "SELECT * FROM Tasks WHERE Tasks.task_priority = 'MEDIUM' AND Tasks.task_status != 'COMPLETED';";

                            $resultS1 = $conn->query($sqlStat);

                            $AvailCount = $resultS1->num_rows; ?>
                            <a class="nav-link" href="medium.php"> <span
                                    class="badge badge-pill badge-danger"><?php echo $AvailCount ?></span>
                                &nbspMedium</a>
                        </li>
                        <li class="nav-item">
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $dbname = "KasuManagementSystem";

                            $conn = new mysqli($servername, $username, "", $dbname);

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sqlStat = "SELECT * FROM Tasks WHERE Tasks.task_priority = 'LOW' AND Tasks.task_status != 'COMPLETED';";

                            $resultS1 = $conn->query($sqlStat);

                            $AvailCount = $resultS1->num_rows; ?>
                            <a class="nav-link active2" href="low.php"> <span
                                    class="badge badge-pill badge-danger"><?php echo $AvailCount ?></span>
                                &nbspLow</a>
                        </li>
                        <li class="nav-item">
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $dbname = "KasuManagementSystem";

                            $conn = new mysqli($servername, $username, "", $dbname);

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sqlStat = "SELECT * FROM Tasks WHERE Tasks.task_status = 'FOR APPROVAL';";

                            $resultS1 = $conn->query($sqlStat);

                            $AvailCount = $resultS1->num_rows; ?>
                            <a class="nav-link" href="for-approval.php"> <span
                                    class="badge badge-pill badge-danger"><?php echo $AvailCount ?></span>
                                &nbspFor Approval</a>
                        </li>
                        <li class="nav-item">
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $dbname = "KasuManagementSystem";

                            $conn = new mysqli($servername, $username, "", $dbname);

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sqlStat = "SELECT * FROM Tasks";

                            $resultS1 = $conn->query($sqlStat);

                            $AvailCount = $resultS1->num_rows; ?>

                            <a class="nav-link" href="all-task.php">
                                <span class="badge badge-pill badge-danger"><?php echo $AvailCount ?></span>

                                &nbspAll Tasks
                            </a>

                        </li>
                        <li class="nav-item justify-content-end">
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $dbname = "KasuManagementSystem";

                            $conn = new mysqli($servername, $username, "", $dbname);

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sqlStat = "SELECT * FROM Tasks WHERE Tasks.task_status = 'COMPLETED';";

                            $resultS1 = $conn->query($sqlStat);

                            $AvailCount = $resultS1->num_rows; ?>
                            <a class="nav-link" href="history-task.php" tabindex="-1"> <span
                                    class="badge badge-pill badge-danger"><?php echo $AvailCount ?></span>
                                &nbspTask
                                History</a>
                        </li>
                    </ul>
                    <div class="card">

                        <div class="card-header d-flex justify-content-between">
                            <h3 class="card-title">Tasks</h3>
                            <div class="card-tools align-middle">
                                <a class="btn btn-outline-success" type="submit" name="insert"
                                    href="insert-task.php">Add
                                    Task</a>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Task Title</th>
                                    <th scope="col">Task Details</th>
                                    <th scope="col">Employee Assigned</th>
                                    <th scope="col">Date Placed</th>
                                    <th scope="col">Due Date</th>
                                    <th scope="col">Priority</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $query = "SELECT * FROM Tasks WHERE Tasks.task_priority = 'LOW' AND Tasks.task_status != 'COMPLETED';";
                                $result = $conn->query($query);
                                $total_rows = mysqli_num_rows($result);

                                $total_pages = ceil($total_rows / $limit);

                                if (!isset($_GET['page'])) {
                                    $page_number = 1;
                                } else {
                                    if ($_GET['page'] == 0) {
                                        $page_number = 1;
                                    } else {
                                        $page_number = $_GET['page'];
                                    }
                                }

                                $initial_page = ($page_number - 1) * $limit;

                                $getQuery = "SELECT * FROM Tasks WHERE Tasks.task_priority = 'LOW' AND Tasks.task_status != 'COMPLETED' Limit " . $initial_page . ',' . $limit . ";";

                                $result3 = mysqli_query($conn, $getQuery);

                                if (($result3->num_rows) == "10") {
                                    $numofresults2 = 10 * ($page_number);
                                } else {
                                    $numofresults2 = ($result3->num_rows) + (10 * ($page_number - 1));
                                }


                                while ($data = mysqli_fetch_assoc($result3)) {
                                ?>

                                <tr class="item-row">

                                    <td class="border-w bg"><?php echo $data["task_name"] ?></td>
                                    <td class="border-w bg"><?php echo $data["task_desc"] ?></td>
                                    <td class="border-w bg"><?php echo $data["employee_name"] ?></td>
                                    <td class="border-w bg"><?php echo $data["date_added"] ?></td>
                                    <td class="border-w bg"><?php echo $data["date_due"] ?></td>

                                    <?php
                                        if ($data["task_priority"] == "HIGH") { ?>
                                    <td class="border-w bg" style="background-color: #e2445b;">
                                        <?php echo $data["task_priority"] ?>
                                    </td>

                                    <?php } else if ($data["task_priority"] == "MEDIUM") { ?>
                                    <td class="border-w bg" style="background-color: #fdab3d;">
                                        <?php echo $data["task_priority"] ?>
                                    </td>

                                    <?php } else  if ($data["task_priority"] == "LOW") { ?>
                                    <td class="border-w bg" style="background-color: #2eaf79;">
                                        <?php echo $data["task_priority"] ?>
                                    </td>

                                    <?php }
                                        ?>

                                    <td class=" border-w bg">
                                        <?php

                                            if ($data["task_status"] === "FOR APPROVAL") { ?>

                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button"
                                                class="btn btn-primary dropdown-toggle btn-sm rounded-5 py-1 btn-status task-statbtn shadow-none"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <?php echo $data["task_status"] ?>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                <li><a class="dropdown-item delete_data" type="button"
                                                        href="approve.php?action=edit & id=<?php echo $data['task_id'] ?>">APPROVE</a>
                                                </li>
                                                <li><a class="dropdown-item delete_data" type="button"
                                                        href="decline.php?action=edit & id=<?php echo $data['task_id'] ?>">DECLINE</a>
                                                </li>
                                            </ul>
                                        </div>


                                        <?php } else {
                                                echo $data["task_status"];
                                            } ?>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group inline">
                                            <a class="done-btn " id="btnDone" type="button" name="done"
                                                href="done.php?action=edit & id=<?php echo $data['task_id'] ?> & page=low">
                                                <img class="img-size" src="./Images/check.png" class="edit-icon" alt="">
                                            </a>
                                            <a href="delete_task.php?action=edit & id=<?php echo $data['task_id'] ?> & title=<?php echo $data['task_name'] ?> & page=low"
                                                class=" delete-btn ">
                                                <img class="img-size" src="./Images/trash2.png" class="edit-icon"
                                                    alt="">
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                                <?php

                                if ($result3 == null) { ?>

                                <tr>
                                    <th class="text-center p-0" colspan="4">No data display.</th>
                                </tr>
                                <?php }
                                $prev = $page_number;
                                ?>
                            </tbody>
                        </table>
                        <div class="row justify-content-md-center ">
                            <div class="col-lg-6 widmenu">
                                <h6 class="Page">Page <?php echo $prev ?> of <?php echo $total_pages ?></h6>
                                <h6 class="results">Showing <?php echo $numofresults2 ?> of <?php echo $total_rows ?>
                                    items
                                </h6>
                            </div>
                            <div class="col-lg-6 widmenu">


                                <nav aria-label="Page navigation example" class="pages">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link"
                                                href="low-admin.php?page=<?php echo ($page_number - 1) ?>">Previous</a>
                                        </li>
                                        <?php
                                        for ($page_number = 1; $page_number <= $total_pages; $page_number++) {
                                        ?>

                                        <li class="page-item"><a class="page-link"
                                                href="low-admin.php?page=<?php echo $page_number ?>"><?php echo $page_number ?></a>
                                        </li>

                                        <?php
                                        }

                                        if ($prev == ($page_number - 1)) {
                                        ?>

                                        <li class="page-item"><a class="page-link"
                                                href="low-admin.php?page=<?php echo ($prev) ?>">Next</a></li>
                                    </ul>
                                </nav>
                                <?php
                                        } else {
                            ?>


                                <li class="page-item"><a class="page-link"
                                        href="low-admin.php?page=<?php echo ($prev + 1) ?>">Next</a>
                                </li>
                                </ul>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                </section>
            </main>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>