<?php

session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

$servername = "localhost";
$username = "root";
$dbname = "KasuManagementSystem";

$conn = new mysqli($servername, $username);

if (empty(mysqli_fetch_array(mysqli_query($conn, "SHOW DATABASES LIKE '$dbname' ")))) {
    require_once('connection.php');
    require_once('database.php');
}

?>

<html>

<head>
    <title>Inventory Tracker</title>
    <link rel="stylesheet" href="./CSS/dashboard-styles.css">
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
                            <a class="nav-link active" href="index.php">
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

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 contents">
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
                    <h1>Dashboard</h1>

                </div>

                <section id="first">
                    <div class="row justify-content-md-center widmenu">
                        <div class="col-lg-6 widmenu-col">
                            <div class="menu">
                                <div class="row  menu-header" style="margin-bottom: 3% !important;">
                                    <div class="col-lg-6  widmenu-col">
                                        <h4 class="menu-title" style="font-family: ecb;">Important Tasks</h4>
                                    </div>
                                </div>

                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Task Title</th>
                                            <th scope="col">Due Date</th>
                                            <th scope="col">Priority</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $limit = 4;

                                        $conn = new mysqli($servername, $username, "", $dbname);

                                        $query = "SELECT * FROM Tasks WHERE Tasks.task_priority = 'HIGH' AND Tasks.task_status != 'COMPLETED';";
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

                                        $getQuery = "SELECT * FROM Tasks WHERE Tasks.task_priority = 'HIGH' AND Tasks.task_status = 'APPROVED' Limit " . $initial_page . ',' . $limit . ";";

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
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="widgets2">
                                <table class="center">
                                    <tr>
                                        <td class="wid-color1">
                                            <?php


                                            $searchStatus = "Available";

                                            $sqlStat = "SELECT * FROM Supplies WHERE supplies.item_type = 'Ingredient' AND supplies.item_status like '%" . $searchStatus . "%';";

                                            $resultS1 = $conn->query($sqlStat);

                                            $AvailCount = $resultS1->num_rows; ?>


                                            <h1 class="result items"><?php echo $AvailCount ?></h1>



                                        </td>
                                        <td class="wid-label">
                                            <h4 class="widget_label">Available Ingredients</h4>
                                        </td>

                                        <td>

                                        </td>

                                        <td class="wid-color1">
                                            <?php


                                            $searchStatus = "Available";

                                            $sqlStat = "SELECT * FROM Supplies WHERE supplies.item_type = 'Supply' AND supplies.item_status like '%" . $searchStatus . "%';";

                                            $resultS1 = $conn->query($sqlStat);

                                            $AvailCount = $resultS1->num_rows; ?>


                                            <h1 class="result items"><?php echo $AvailCount ?></h1>



                                        </td>
                                        <td class="wid-label">
                                            <h4 class="widget_label">Available Supplies</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="wid-color2">

                                            <?php

                                            $searchStatus = "Out of Stock";

                                            $sqlStat = "SELECT * FROM Supplies WHERE supplies.item_type = 'Ingredient' AND supplies.item_status like '%" . $searchStatus . "%';";

                                            $resultS1 = $conn->query($sqlStat);

                                            $AvailCount = $resultS1->num_rows; ?>


                                            <h1 class="result items"><?php echo $AvailCount ?></h1>



                                        </td>
                                        <td class="wid-label">
                                            <h4 class="widget_label">Out of Stock Ingredients</h4>
                                        </td>

                                        <td class="tdspace">

                                        </td>

                                        <td class="wid-color2">
                                            <?php


                                            $searchStatus = "Out of Stock";

                                            $sqlStat = "SELECT * FROM Supplies WHERE supplies.item_type = 'Supply' AND supplies.item_status like '%" . $searchStatus . "%';";

                                            $resultS1 = $conn->query($sqlStat);

                                            $AvailCount = $resultS1->num_rows; ?>


                                            <h1 class="result items"><?php echo $AvailCount ?></h1>

                                        </td>
                                        <td class="wid-label">
                                            <h4 class="widget_label">Out of Stock Supplies</h4>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                        </div>
                    </div>


                    <div class="row justify-content-md-center widmenu3">
                        <div class="col-lg-4 widmenu-col">
                            <div class="menu">
                                <div class="row justify-content-md-center menu-header"
                                    style="margin-bottom: 3% !important;">
                                    <div class="col-lg-6  widmenu-col">
                                        <h4 class="menu-title" style="font-family: ecb;">Menu</h4>
                                    </div>
                                    <div class="col-lg-6">
                                        <!-- <a class="dropdown-item" type="button" href="add_dish.php"><img
                                                    src="./Images/add-button.png" class="menu-option" alt=""></a> -->
                                    </div>
                                </div>

                                <table class="center">
                                    <tr>
                                        <td class="wid-color1M">
                                            <?php


                                            $searchStatus = "Available";

                                            $sqlStat = "SELECT * FROM Menu WHERE menu.dish_status = 'Available'";

                                            $resultS1 = $conn->query($sqlStat);

                                            $AvailCount = $resultS1->num_rows; ?>


                                            <h1 class="result items"><?php echo $AvailCount ?></h1>



                                        </td>
                                        <td class="wid-labelM">
                                            <h4 class="widget_label">Available Dishes</h4>
                                        </td>

                                    <tr>
                                        <td>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="wid-color1M">

                                            <?php

                                            $searchStatus = "Out of Stock";

                                            $sqlStat = "SELECT * FROM Menu WHERE menu.dish_status = 'Out of Stock'";

                                            $resultS1 = $conn->query($sqlStat);

                                            $AvailCount = $resultS1->num_rows; ?>


                                            <h1 class="result items"><?php echo $AvailCount ?></h1>



                                        </td>
                                        <td class="wid-labelM">
                                            <h4 class="widget_label">Out of Stock Dishes</h4>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="widgets">
                                <div class="row justify-content-md-center menu-header"
                                    style="margin-bottom: 3% !important;">
                                    <div class="col-lg-6  widmenu-col">
                                        <h4 class="menu-title" style="font-family: ecb;">Delivery Tracker</h4>
                                    </div>
                                    <div class="col-lg-6">
                                        <!-- <a class="dropdown-item" type="button" href="add_dish.php"><img
                                                    src="./Images/add-button.png" class="menu-option" alt=""></a> -->
                                    </div>
                                </div>
                                <table class="center1">
                                    <tr>
                                        <td class="wid-color1D">
                                            <?php


                                            $searchStatus = "Available";

                                            $sqlStat = "SELECT * FROM orderDetails";

                                            $resultS1 = $conn->query($sqlStat);

                                            $AvailCount = $resultS1->num_rows; ?>


                                            <h1 class="result items"><?php echo $AvailCount ?></h1>



                                        </td>
                                        <td class="wid-labelD">
                                            <h4 class="widget_label">Total Parcel</h4>
                                        </td>

                                        <td class="tdspace">

                                        </td>

                                        <td class="wid-color1D">
                                            <?php


                                            $searchStatus = "Available";

                                            $sqlStat = "SELECT * FROM orderDetails WHERE orderDetails.order_status = 'ACCEPTED';";

                                            $resultS1 = $conn->query($sqlStat);

                                            $AvailCount = $resultS1->num_rows; ?>


                                            <h1 class="result items"><?php echo $AvailCount ?></h1>



                                        </td>
                                        <td class="wid-labelD">
                                            <h4 class="widget_label">Order Accepted</h4>
                                        </td>
                                        <td class="tdspace">

                                        </td>

                                        <td class="wid-color1D">
                                            <?php


                                            $searchStatus = "Available";

                                            $sqlStat = "SELECT * FROM orderDetails WHERE orderDetails.order_status = 'OUT FOR DELIVERY';";

                                            $resultS1 = $conn->query($sqlStat);

                                            $AvailCount = $resultS1->num_rows; ?>


                                            <h1 class="result items"><?php echo $AvailCount ?></h1>



                                        </td>
                                        <td class="wid-labelD">
                                            <h4 class="widget_label">Out for Delivery</h4>
                                        </td>
                                        <td class="tdspace">

                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="wid-color1D">

                                            <?php

                                            $searchStatus = "Out of Stock";

                                            $sqlStat = "SELECT * FROM orderDetails WHERE orderDetails.order_status = 'DELIVERED';";

                                            $resultS1 = $conn->query($sqlStat);

                                            $AvailCount = $resultS1->num_rows; ?>


                                            <h1 class="result items"><?php echo $AvailCount ?></h1>



                                        </td>
                                        <td class="wid-labelD">
                                            <h4 class="widget_label">Delivered</h4>
                                        </td>

                                        <td class="tdspace">

                                        </td>

                                        <td class="wid-color1D">
                                            <?php

                                            $searchStatus = "Out of Stock";

                                            $sqlStat = "SELECT * FROM orderDetails WHERE orderDetails.order_status = 'COLLECTED';";

                                            $resultS1 = $conn->query($sqlStat);

                                            $AvailCount = $resultS1->num_rows; ?>


                                            <h1 class="result items"><?php echo $AvailCount ?></h1>

                                        </td>
                                        <td class="wid-labelD">
                                            <h4 class="widget_label">Collected</h4>
                                        </td>
                                        <td class="tdspace">

                                        </td>

                                        <td class="wid-color1D">
                                            <?php

                                            $searchStatus = "Available";

                                            $sqlStat = "SELECT * FROM orderDetails WHERE orderDetails.order_status = 'PICKED-UP';";

                                            $resultS1 = $conn->query($sqlStat);

                                            $AvailCount = $resultS1->num_rows; ?>


                                            <h1 class="result items"><?php echo $AvailCount ?></h1>



                                        </td>
                                        <td class="wid-labelD">
                                            <h4 class="widget_label">Picked-Up</h4>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                        </div>
                    </div>

                </section>



            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>