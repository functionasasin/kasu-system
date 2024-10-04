<?php

$servername = "localhost";
$username = "root";
$dbname = "KasuManagementSystem";
$conn = new mysqli($servername, $username, "", $dbname);

session_start();


?>
<html>

<head>
    <title>Delivery Tracker</title>
    <link rel="stylesheet" href="./css/styles.css">
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
                            <a class="nav-link active" href="index.deliverytracker.php">
                                <img src="./Images/motorbike.png" alt="" class="sidebar-icons">
                                Delivery Tracker
                            </a>

                        </li>
                        <li class="nav-item submenu"><a class="nav-link" href="order-add-new.php">Order</a></li>
                        <li class="nav-item submenu"><a class="nav-link" href="order-list.php">List</a></li>
                        <li class="nav-item submenu"><a class="nav-link" href="order-acc.php">Order Accepted</a></li>
                        <li class="nav-item submenu"><a class="nav-link" href="order-collected.php">Collected</a></li>
                        <li class="nav-item submenu"><a class="nav-link" href="order-ready-to-pickup.php">Ready to
                                Pickup</a></li>
                        <li class="nav-item submenu"><a class="nav-link" href="order-ready-to-pickup.php">Out for
                                Delivery</a></li>
                        <li class="nav-item submenu"><a class="nav-link" href="order-out-for-delivery.php">Delivered</a>
                        </li>
                        <li class="nav-item submenu"><a class="nav-link" href="order-pickup.php">Pickup</a></li>

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


                <div class="main">
                    <p class="titlepage">Dashboard</p>
                    <hr>
                    <?php

                    $sqlStat = "SELECT * FROM orderDetails";

                    $resultS1 = $conn->query($sqlStat);

                    $AvailCount = $resultS1->num_rows; ?>

                    <div class="widget">
                        <a class="widget-link" href="order-list.php">
                            <div class="r">
                                <div class="t"> <?php echo $AvailCount ?></div>
                                <p class="widgetTxt"> Total Parcel</p><img class="d_widgeticon" src="./img/parcel.png">
                            </div>
                        </a>
                        <?php
                        $searchStatus = "Accepted";

                        $sqlStat = "SELECT * FROM orderDetails WHERE orderDetails.order_status like '%" . $searchStatus . "%';";

                        $resultS1 = $conn->query($sqlStat);

                        $AvailCount = $resultS1->num_rows; ?>

                        <a class="widget-link" href="order-acc.php">
                            <div class="r">
                                <div class="t"> <?php echo $AvailCount ?></div>
                                <p class="widgetTxt"> Order Accepted</p><img class="d_widgeticon"
                                    src="./img/parcel.png">
                            </div>
                        </a>

                        <?php

                        $searchStatus = "Collected";

                        $sqlStat = "SELECT * FROM orderDetails WHERE orderDetails.order_status like '%" . $searchStatus . "%';";

                        $resultS1 = $conn->query($sqlStat);

                        $AvailCount = $resultS1->num_rows; ?>

                        <a class="widget-link" href="order-collected.php">
                            <div class="r">
                                <div class="t"> <?php echo $AvailCount ?></div>
                                <p class="widgetTxt"> Collected</p><img class="d_widgeticon" src="./img/parcel.png">
                            </div>
                        </a>
                    </div>

                    <div class="widget">
                        <?php
                        $searchStatus = "Ready to Pickup";

                        $sqlStat = "SELECT * FROM orderDetails WHERE orderDetails.order_status like '%" . $searchStatus . "%';";

                        $resultS1 = $conn->query($sqlStat);

                        $AvailCount = $resultS1->num_rows; ?>

                        <a class="widget-link" href="order-ready-to-pickup.php">
                            <div class="r">
                                <div class="t"> <?php echo $AvailCount ?></div>
                                <p class="widgetTxt"> Ready to Pickup</p><img class="d_widgeticon"
                                    src="./img/parcel.png">
                            </div>
                        </a>

                        <?php

                        $searchStatus = "Collected";

                        $sqlStat = "SELECT * FROM orderDetails WHERE orderDetails.order_status like '%" . $searchStatus . "%';";

                        $resultS1 = $conn->query($sqlStat);

                        $AvailCount = $resultS1->num_rows; ?>

                        <a class="widget-link" href="order-collected.php">
                            <div class="r">
                                <div class="t"> <?php echo $AvailCount ?></div>
                                <p class="widgetTxt"> Collected</p><img class="d_widgeticon" src="./img/parcel.png">
                            </div>
                        </a>

                        <?php
                        $searchStatus = "Out for Delivery";

                        $sqlStat = "SELECT * FROM orderDetails WHERE orderDetails.order_status like '%" . $searchStatus . "%';";

                        $resultS1 = $conn->query($sqlStat);

                        $AvailCount = $resultS1->num_rows; ?>

                        <a class="widget-link" href="order-out-for-delivery.php">
                            <div class="r">
                                <div class="t"> <?php echo $AvailCount ?></div>
                                <p class="widgetTxt">Out for Delivery</p><img class="d_widgeticon"
                                    src="./img/parcel.png">
                            </div>
                        </a>


                    </div>
                    <div style="clear: left;">

                        <div class="widget">
                            <?php
                            $searchStatus = "Delivered";

                            $sqlStat = "SELECT * FROM orderDetails WHERE orderDetails.order_status like '%" . $searchStatus . "%';";

                            $resultS1 = $conn->query($sqlStat);

                            $AvailCount = $resultS1->num_rows; ?>

                            <a class="widget-link" href="order-delivered.php">
                                <div class="r">
                                    <div class="t"> <?php echo $AvailCount ?></div>
                                    <p class="widgetTxt"> Delivered</p><img class="d_widgeticon" src="./img/parcel.png">
                                </div>
                            </a>

                            <?php
                            $searchStatus = "Picked-up";

                            $sqlStat = "SELECT * FROM orderDetails WHERE orderDetails.order_status like '%" . $searchStatus . "%';";

                            $resultS1 = $conn->query($sqlStat);

                            $AvailCount = $resultS1->num_rows; ?>

                            <a class="widget-link" href="order-pickup.php">
                                <div class="r">
                                    <div class="t"> <?php echo $AvailCount ?></div>
                                    <p class="widgetTxt"> Picked-up</p><img class="d_widgeticon" src="./img/parcel.png">
                                </div>
                            </a>

                        </div>
                    </div>
                </div>
            </main>

            <!-- <footer></footer> -->
            <!-- sidenav dropdown script-->
            <!-- <script>
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
            </script> -->

</body>

</html>