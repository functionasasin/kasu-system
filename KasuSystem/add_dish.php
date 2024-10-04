<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

?>
<html>

<head>
    <title>Add Dish | Inventory Tracker</title>
    <link rel="stylesheet" href="./CSS/add_dish.css">
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
                            <a class="nav-link" href="tasktracker-index.php">
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
                    <h1>Inventory Tracker</h1>

                </div>


                <section id="first">

                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $dbname = "KasuManagementSystem";

                    $conn = new mysqli($servername, $username, "", $dbname);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    ?>

                    <div class="page payment-page">
                        <section class="payment-form dark">
                            <div class="container">
                                <div class="block-heading">
                                    <h2>Add Dish</h2>
                                </div>
                                <form method="POST">
                                    <div class="form-group col-sm-11 form-div">
                                        <label for="">Dish Name</label>
                                        <input type="text" name="DN" class="form-control" placeholder="Enter Dish Name"
                                            aria-label="MM" aria-describedby="basic-addon1" required>
                                    </div>

                                    <div class="form-group col-sm-5 form-div">
                                        <label for="status">Dish Status</label> <br>
                                        <select class="form-control" name="status" required>
                                            <option value="AVAILABLE">Available</option>
                                            <option value="OUT OF STOCK" selected>Out of Stock</option>
                                        </select>
                                    </div>
                                    <div class="row justify-content-md-center">

                                        <div class="form-group col-sm-2.5">
                                            <button id="btnSave" type="submit" name="save" class="btn btn-primary">Add
                                                Dish</button>
                                            <a id="btnCancel" type="button" name="cancel"
                                                href="inventorytracker-index.php" class="btn btn-primary">Cancel</a>
                                        </div>
                                    </div>

                                </form>

                                <?php

                                if (isset($_POST['save'])) {

                                    $stmt1 = $conn->prepare("INSERT INTO Menu (dish_id, dish_name, dish_status) VALUES (?, ?, ?)");
                                    $stmt1->bind_param("iss", $menuid, $menuname, $menustatus);

                                    $menuname = $_POST['DN'];
                                    $menustatus = $_POST['status'];
                                    $stmt1->execute();

                                    echo "<script> location.href='inventorytracker-index.php'; </script>";

                                    $stmt1 = $conn->prepare("INSERT INTO History_Log (history_id, log_date, log_title, log_details, username) VALUES (?, NOW(), ?, ?, ?)");
                                    $stmt1->bind_param("isss", $hid, $logtitle, $logdetails, $user);


                                    $logtitle = "Added dish to Inventory Tracker";
                                    $logdetails = "Dish Name: " . $menuname . " | " . "Dish Status: " . $menustatus;
                                    $user = $_SESSION['username'];
                                    $stmt1->execute();
                                }

                                ?>

                            </div>
                        </section>
                    </div>

                </section>
            </main>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>