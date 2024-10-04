<?php

session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

$servername = "localhost";
$username = "root";
$dbname = "KasuManagementSystem";

$conn = new mysqli($servername, $username, "", $dbname);
$limit = 10;

if (empty(mysqli_fetch_array(mysqli_query($conn, "SHOW DATABASES LIKE '$dbname' ")))) {
    require_once('connection.php');
    require_once('database.php');
}

?>

<html>

<head>
    <title>Hisotry Logs</title>
    <link rel="stylesheet" href="./CSS/history_logs.css">
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
                    <li><a class="dropdown-item delete_data" type="button" href="history_logs.php">History Logs
                        </a></li>

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
                            <a class="nav-link" href="index-tasktracker.php">
                                <img src="./Images/to-do-list (1).png" alt="" class="sidebar-icons">
                                Task Tracker
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="inventorytracker-index.php">
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
                    <h1>History Logs</h1>

                </div>

                <section id="Inventory">
                    <h4 class="inv-title" style="font-family: ecb;">Activities</h4>


                    <table class="table table-striped">



                        <tr>
                            <th class="col-name1">HISTORY ID</th>
                            <th class="col-name2">LOG DATE</th>
                            <th class="col-name3">LOG TITLE</th>
                            <th class="col-name4">LOG DETAILS</th>
                            <th class="col-name9">USER</th>
                        </tr>
                        <?php
                        $query = " select * from History_log ";
                        $result = mysqli_query($conn, $query);
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

                        $getQuery = "SELECT * FROM History_log Limit " . $initial_page . ',' . $limit . ";";

                        $result3 = mysqli_query($conn, $getQuery);

                        if (($result3->num_rows) == "10") {
                            $numofresults2 = 10 * ($page_number);
                        } else {
                            $numofresults2 = ($result3->num_rows) + (10 * ($page_number - 1));
                        }


                        while ($data = mysqli_fetch_assoc($result3)) {
                        ?>

                        <tr class="item-row">

                            <td><?php echo $data["history_id"] ?></td>
                            <td><?php echo $data["log_date"] ?></td>
                            <td><?php echo $data["log_title"] ?></td>
                            <td><?php echo $data["log_details"] ?></td>
                            <td><?php echo $data["username"] ?></td>

                        </tr>

                        <?php
                        }

                        if ($result3 == null) { ?>
                        <tr>
                            <th class="text-center p-0" colspan="4">No data display.</th>
                        </tr>
                        <?php }
                        $prev = $page_number;
                        ?>

                    </table>

                    <div class="row justify-content-md-center widmenu2">
                        <div class="col-lg-6 table-footer">
                            <h6 class="Page">Page <?php echo $prev ?> of <?php echo $total_pages ?></h6>
                            <h6 class="results">Showing <?php echo $numofresults2 ?> of
                                <?php echo $total_rows ?> items
                            </h6>
                        </div>
                        <div class="col-lg-6 table-footer">


                            <nav aria-label="Page navigation example" class="pages">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link"
                                            href="history_logs.php?page=<?php echo ($page_number - 1) ?>">Previous</a>
                                    </li>
                                    <?php
                                    for ($page_number = 1; $page_number <= $total_pages; $page_number++) {
                                    ?>

                                    <li class="page-item"><a class="page-link"
                                            href="history_logs.php?page=<?php echo $page_number ?>"><?php echo $page_number ?></a>
                                    </li>

                                    <?php
                                    }

                                    if ($prev == ($page_number - 1)) {
                                    ?>

                                    <li class="page-item"><a class="page-link"
                                            href="history_logs.php?page=<?php echo ($prev) ?>">Next</a>
                                    </li>
                                </ul>
                            </nav>
                            <?php
                                    } else {
                        ?>


                            <li class="page-item"><a class="page-link"
                                    href="history_logs.php?page=<?php echo ($prev + 1) ?>">Next</a>
                            </li>
                            </ul>
                            </nav>
                            <?php
                                    }
                        ?>

                        </div>
                    </div>
                    <?php


                    ?>


                    </form>





                </section>

            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>