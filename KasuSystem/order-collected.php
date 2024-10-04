<?php
session_start();

$servername = "localhost";
$username = "root";
$dbname = "KasuManagementSystem";

$conn = new mysqli($servername, $username, "", $dbname);
$limit = 10;
$query2 = "SELECT * FROM orderDetails WHERE orderDetails.order_status = 'COLLECTED';";
$result3 = mysqli_query($conn, $query2);

?>

<html>

<head>
    <title>Order Collected | Delivery Tracker</title>
    <link rel="stylesheet" href="./css/styles.css">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>


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
                        <li class="nav-item ">
                            <a class="nav-link " href="index.deliverytracker.php">
                                <img src="./Images/motorbike.png" alt="" class="sidebar-icons">
                                Delivery Tracker
                            </a>

                        </li>
                        <li class="nav-item submenu"><a class="nav-link" href="order-add-new.php">Order</a></li>
                        <li class="nav-item submenu"><a class="nav-link active"
                                href="index.deliverytracker.php">List</a></li>


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
                    <h1>Delivery Tracker</h1>

                </div>

                <!-- <div class="main">
                    <p class="titlepage">Collected Order Details</p>
                    <hr> -->

                <div id="first">
                    <ul class="nav justify-content-center">
                        <li class="nav-item active-item">
                            <?php
                            $sqlStat = "SELECT * FROM orderDetails";

                            $resultS1 = $conn->query($sqlStat);

                            $AvailCount = $resultS1->num_rows; ?>
                            <a class="nav-link" href="index.deliverytracker.php" tabindex="-1"> <span
                                    class="badge badge-pill badge-danger"><?php echo $AvailCount ?></span>
                                &nbspOrder List
                            </a>

                        </li>
                        <li class="nav-item">
                            <?php
                            $sqlStat = "SELECT * FROM orderDetails WHERE orderDetails.order_status = 'ACCEPTED';";

                            $resultS1 = $conn->query($sqlStat);

                            $AvailCount = $resultS1->num_rows; ?>
                            <a class="nav-link" href="order-acc.php" tabindex="-1"> <span
                                    class="badge badge-pill badge-danger"><?php echo $AvailCount ?></span>
                                &nbspAccepted</a>
                        </li>
                        <li class="nav-item">
                            <?php
                            $sqlStat = "SELECT * FROM orderDetails WHERE orderDetails.order_status = 'COLLECTED';";

                            $resultS1 = $conn->query($sqlStat);

                            $AvailCount = $resultS1->num_rows; ?>
                            <a class="nav-link active2" href="order-collected.php" tabindex="-1"> <span
                                    class="badge badge-pill badge-danger"><?php echo $AvailCount ?></span>
                                &nbspCollected</a>
                        </li>
                        <li class="nav-item">
                            <?php
                            $sqlStat = "SELECT * FROM orderDetails WHERE orderDetails.order_status = 'READY TO PICKUP';";

                            $resultS1 = $conn->query($sqlStat);

                            $AvailCount = $resultS1->num_rows; ?>
                            <a class="nav-link" href="order-ready-to-pickup.php" tabindex="-1"> <span
                                    class="badge badge-pill badge-danger"><?php echo $AvailCount ?></span>
                                &nbspReady to Pickup</a>
                        </li>
                        <li class="nav-item">
                            <?php
                            $sqlStat = "SELECT * FROM orderDetails WHERE orderDetails.order_status = 'OUT FOR DELIVERY';";

                            $resultS1 = $conn->query($sqlStat);

                            $AvailCount = $resultS1->num_rows; ?>
                            <a class="nav-link" href="order-out-for-delivery.php" tabindex="-1"> <span
                                    class="badge badge-pill badge-danger"><?php echo $AvailCount ?></span>
                                &nbspOut for Delivery</a>
                        </li>
                        <li class="nav-item">
                            <?php
                            $sqlStat = "SELECT * FROM orderDetails WHERE orderDetails.order_status = 'DELIVERED';";

                            $resultS1 = $conn->query($sqlStat);

                            $AvailCount = $resultS1->num_rows; ?>
                            <a class="nav-link" href="order-delivered.php" tabindex="-1"> <span
                                    class="badge badge-pill badge-danger"><?php echo $AvailCount ?></span>

                                &nbspDelivered
                            </a>

                        </li>
                        <li class="nav-item justify-content-end">
                            <?php

                            $sqlStat = "SELECT * FROM orderDetails WHERE orderDetails.order_status = 'PICKED-UP';";

                            $resultS1 = $conn->query($sqlStat);

                            $AvailCount = $resultS1->num_rows; ?>
                            <a class="nav-link" href="order-pickup.php" tabindex="-1"> <span
                                    class="badge badge-pill badge-danger"><?php echo $AvailCount ?></span>
                                &nbspPicked-Up</a>
                        </li>
                    </ul>
                    <div class="form-box">
                        <table class="table-order-status">
                            <?php
                            $searchStatus = "Collected";

                            $sqlStat = "SELECT * FROM orderDetails WHERE orderDetails.order_status like '%" . $searchStatus . "%';";

                            $resultS1 = $conn->query($sqlStat);

                            $AvailCount = $resultS1->num_rows; ?>
                            <div class="pg">
                                <p class="result items">Number of items found: <?php echo $AvailCount ?></p>
                            </div>

                            <tr>
                                <th class="col-name1 th-font border-w bg">ORDER ID</th>
                                <th class="col-name3  th-font border-w bg">DETAILS</th>
                                <th class="col-name2  th-font border-w bg">RECEPIENT</th>
                                <th class="col-name1 th-font border-w bg">ORDER TYPE</th>
                                <th class="col-name3  th-font border-w bg">PRICE</th>
                                <th class="col-name3  th-font border-w bg">STATUS</th>
                                <th colspan="2" class="col-name4  th-font border-w bg">ACTION</th>
                            </tr>
                            <?php
                            while ($data = mysqli_fetch_assoc($result3)) {
                            ?>


                            <tr class="item-row">

                                <td class="border-w bg"><?php echo $data["order_id"] ?></td>
                                <td class="border-w bg"><?php echo $data["order_details"] ?></td>
                                <td class="border-w bg"><?php echo $data["recipient_name"] ?></td>
                                <td class="border-w bg"><?php echo $data["order_type"] ?></td>
                                <td class="border-w bg"><?php echo $data["order_price"] ?></td>
                                <td class="border-w bg">
                                    <?php
                                        if ($data["order_status"] === "ACCEPTED") { ?>
                                    <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button"
                                            class="btn btn-primary dropdown-toggle btn-sm rounded-5 py-1 btn-status order-statbtn shadow-none"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <?php echo $data["order_status"] ?>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <li><a class="dropdown-item delete_data" type="button"
                                                    href="collected.php?action=edit & id=<?php echo $data['order_id'] ?>">COLLECTED</a>
                                            </li>
                                            <li><a class="dropdown-item delete_data" type="button"
                                                    href="readytopickup.php?action=edit & id=<?php echo $data['order_id'] ?>">READY
                                                    TO PICKUP</a>
                                            </li>
                                            <li><a class="dropdown-item delete_data" type="button"
                                                    href="outfordelivery.php?action=edit & id=<?php echo $data['order_id'] ?>">OUT
                                                    FOR DELIVERY</a>
                                            </li>
                                            <li><a class="dropdown-item delete_data" type="button"
                                                    href="delivered.php?action=edit & id=<?php echo $data['order_id'] ?>">DELIVERED</a>
                                            </li>
                                            <li><a class="dropdown-item delete_data" type="button"
                                                    href="pickedup.php?action=edit & id=<?php echo $data['order_id'] ?>">PICKED-UP</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php } elseif ("COLLECTED") { ?>

                                    <div class="btn-group-st" role="group">
                                        <button id="btnGroupDrop1" type="button"
                                            class="btn btn-primary dropdown-toggle btn-sm rounded-5 py-1 btn-status order-statbtn2 shadow-none"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <?php echo $data["order_status"] ?>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <li><a class="dropdown-item delete_data" type="button"
                                                    href="accepted.php?action=edit & id=<?php echo $data['order_id'] ?>">ACCEPTED</a>
                                            </li>
                                            <li><a class="dropdown-item delete_data" type="button"
                                                    href="readytopickup.php?action=edit & id=<?php echo $data['order_id'] ?>">READY
                                                    TO PICKUP</a>
                                            </li>
                                            <li><a class="dropdown-item delete_data" type="button"
                                                    href="outfordelivery.php?action=edit & id=<?php echo $data['order_id'] ?>">OUT
                                                    FOR DELIVERY</a>
                                            </li>
                                            <li><a class="dropdown-item delete_data" type="button"
                                                    href="delivered.php?action=edit & id=<?php echo $data['order_id'] ?>">DELIVERED</a>
                                            </li>
                                            <li><a class="dropdown-item delete_data" type="button"
                                                    href="pickedup.php?action=edit & id=<?php echo $data['order_id'] ?>">PICKED-UP</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php } elseif ("READY TO PICKUP") { ?>
                                    <div class="btn-group-st" role="group">
                                        <button id="btnGroupDrop1" type="button"
                                            class="btn btn-primary dropdown-toggle btn-sm rounded-5 py-1 btn-status order-statbtn2 shadow-none"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <?php echo $data["order_status"] ?>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <li><a class="dropdown-item delete_data" type="button"
                                                    href="accepted.php?action=edit & id=<?php echo $data['order_id'] ?>">ACCEPTED</a>
                                            </li>
                                            <li><a class="dropdown-item delete_data" type="button"
                                                    href="collected.php?action=edit & id=<?php echo $data['order_id'] ?>">COLLECTED</a>
                                            </li>
                                            <li><a class="dropdown-item delete_data" type="button"
                                                    href="outfordelivery.php?action=edit & id=<?php echo $data['order_id'] ?>">OUT
                                                    FOR DELIVERY</a>
                                            </li>
                                            <li><a class="dropdown-item delete_data" type="button"
                                                    href="delivered.php?action=edit & id=<?php echo $data['order_id'] ?>">DELIVERED</a>
                                            </li>
                                            <li><a class="dropdown-item delete_data" type="button"
                                                    href="pickedup.php?action=edit & id=<?php echo $data['order_id'] ?>">PICKED-UP</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php } elseif ("OUT FOR DELIVERY") { ?>
                                    <div class="btn-group-st" role="group">
                                        <button id="btnGroupDrop1" type="button"
                                            class="btn btn-primary dropdown-toggle btn-sm rounded-5 py-1 btn-status order-statbtn2 shadow-none"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <?php echo $data["order_status"] ?>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <li><a class="dropdown-item delete_data" type="button"
                                                    href="accepted.php?action=edit & id=<?php echo $data['order_id'] ?>">ACCEPTED</a>
                                            </li>
                                            <li><a class="dropdown-item delete_data" type="button"
                                                    href="collected.php?action=edit & id=<?php echo $data['order_id'] ?>">COLLECTED</a>
                                            </li>
                                            <li><a class="dropdown-item delete_data" type="button"
                                                    href="readytopickup.php?action=edit & id=<?php echo $data['order_id'] ?>">READY
                                                    TO PICKUP</a>
                                            </li>
                                            <li><a class="dropdown-item delete_data" type="button"
                                                    href="delivered.php?action=edit & id=<?php echo $data['order_id'] ?>">DELIVERED</a>
                                            </li>
                                            <li><a class="dropdown-item delete_data" type="button"
                                                    href="pickedup.php?action=edit & id=<?php echo $data['order_id'] ?>">PICKED-UP</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php } elseif ("DELIVERED") { ?>
                                    <div class="btn-group-st" role="group">
                                        <button id="btnGroupDrop1" type="button"
                                            class="btn btn-primary dropdown-toggle btn-sm rounded-5 py-1 btn-status order-statbtn2 shadow-none"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <?php echo $data["order_status"] ?>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <li><a class="dropdown-item delete_data" type="button"
                                                    href="accepted.php?action=edit & id=<?php echo $data['order_id'] ?>">ACCEPTED</a>
                                            </li>
                                            <li><a class="dropdown-item delete_data" type="button"
                                                    href="collected.php?action=edit & id=<?php echo $data['order_id'] ?>">COLLECTED</a>
                                            </li>
                                            <li><a class="dropdown-item delete_data" type="button"
                                                    href="readytopickup.php?action=edit & id=<?php echo $data['order_id'] ?>">READY
                                                    TO PICKUP</a>
                                            </li>
                                            <li><a class="dropdown-item delete_data" type="button"
                                                    href="outfordelivery.php?action=edit & id=<?php echo $data['order_id'] ?>">OUT
                                                    FOR DELIVERY</a>
                                            </li>
                                            <li><a class="dropdown-item delete_data" type="button"
                                                    href="pickedup.php?action=edit & id=<?php echo $data['order_id'] ?>">PICKED-UP</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php } elseif ("PICKED-UP") { ?>
                                    <div class="btn-group-st" role="group">
                                        <button id="btnGroupDrop1" type="button"
                                            class="btn btn-primary dropdown-toggle btn-sm rounded-5 py-1 btn-status order-statbtn2 shadow-none"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <?php echo $data["order_status"] ?>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <li><a class="dropdown-item delete_data" type="button"
                                                    href="accepted.php?action=edit & id=<?php echo $data['order_id'] ?>">ACCEPTED</a>
                                            </li>
                                            <li><a class="dropdown-item delete_data" type="button"
                                                    href="collected.php?action=edit & id=<?php echo $data['order_id'] ?>">COLLECTED</a>
                                            </li>
                                            <li><a class="dropdown-item delete_data" type="button"
                                                    href="readytopickup.php?action=edit & id=<?php echo $data['order_id'] ?>">READY
                                                    TO PICKUP</a>
                                            </li>
                                            <li><a class="dropdown-item delete_data" type="button"
                                                    href="outfordelivery.php?action=edit & id=<?php echo $data['order_id'] ?>">OUT
                                                    FOR DELIVERY</a>
                                            </li>
                                            <li><a class="dropdown-item delete_data" type="button"
                                                    href="delivered.php?action=edit & id=<?php echo $data['order_id'] ?>">DELIVERED</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <?php } ?>
                                </td>
                                <td class="text-center btn-row border-w bg">
                                    <div class="btn-group inline">
                                        <a class="view-btn " id="" type="button" name="cancel"
                                            href="view_order.php?action=edit & id=<?php echo $data['order_id'] ?> & pageback=order-collected">
                                            <img class="img-sz eye" src="./Images/eye.png" alt=""></a>
                                        <a type="button"
                                            href="edit-order-details.php?action=edit & id=<?php echo $data['order_id'] ?>"
                                            class="edit-btn " title="Edit" data-toggle="tooltip">
                                            <img class="img-sz" src="./Images/editing-white.png" class="edit-icon"
                                                alt="">
                                        </a>
                                        <a href="delete_order.php?action=edit & id=<?php echo $data['order_id'] ?>"
                                            class=" delete-btn ">
                                            <img class="img-sz" src="./Images/trash2.png" class="edit-icon" alt="">
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <?php } ?>
                        </table>
                        <?php

                        $query = "SELECT * FROM orderDetails WHERE orderDetails.order_status like '%" . $searchStatus . "%';";
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

                        $getQuery = "SELECT * FROM orderDetails WHERE orderDetails.order_status like '%" . $searchStatus . "%' Limit " . $initial_page . ',' . $limit . ";";

                        $result3 = mysqli_query($conn, $getQuery);

                        if (($result3->num_rows) == "10") {
                            $numofresults2 = 10 * ($page_number);
                        } else {
                            $numofresults2 = ($result3->num_rows) + (10 * ($page_number - 1));
                        }


                        while ($data = mysqli_fetch_assoc($result3)) {
                        ?>


                        <?php }

                        if ($result3 == null) { ?>

                        <tr>
                            <th class="text-center p-0" colspan="4">No data display.</th>
                        </tr>
                        <?php }
                        $prev = $page_number;
                        ?>
                        <div class="row justify-content-md-center widmenu2">
                            <div class="col-lg-3 table-footer">
                                <h6 class="">Page <?php echo $prev ?> of <?php echo $total_pages ?></h6>
                                <h6 class="">Showing <?php echo $numofresults2 ?> of
                                    <?php echo $total_rows ?> items
                                </h6>
                            </div>
                            <div class="col-lg-6 table-footer">

                                <div class="pagination ">
                                    <div class="pagination inline sk">
                                        <div class="page-item "><a class="page-link"
                                                href="order-collected.php?page=<?php echo ($page_number - 1) ?>">Previous</a>
                                        </div>
                                        <?php
                                        for ($page_number = 1; $page_number <= $total_pages; $page_number++) {
                                        ?>

                                        <div class="page-item"><a class="page-link"
                                                href="order-collected.php?page=<?php echo $page_number ?>"><?php echo $page_number ?></a>
                                        </div>

                                        <?php
                                        }

                                        if ($prev == ($page_number - 1)) {
                                        ?>

                                        <div class="page-item"><a class="page-link"
                                                href="order-collected.php?page=<?php echo ($prev) ?>">Next</a></div>
                                    </div>
                                </div>
                                <?php
                                        } else {
                            ?>


                                <div class="page-item"><a class="page-link"
                                        href="order-collected.php?page=<?php echo ($prev + 1) ?>">Next</a></div>

                                </nav>
                                <?php
                                        }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </main>
        <!-- <footer></footer> -->
        <!-- sidenav dropdown script-->
        <script>
        /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
        </script>

</body>

</html>