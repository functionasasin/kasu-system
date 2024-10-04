<?php
session_start();

$servername = "localhost";
$username = "root";
$dbname = "KasuManagementSystem";

$conn = new mysqli($servername, $username, "", $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



?>

<html>

<head>
    <title>Add Order | Delivery Tracker</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/flex.css">
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
                            <a class="nav-link" href="index.deliverytracker.php">
                                <img src="./Images/motorbike.png" alt="" class="sidebar-icons">
                                Delivery Tracker
                            </a>

                        </li>
                        <li class="nav-item submenu"><a class="nav-link active" href="order-add-new.php">Order</a></li>
                        <li class="nav-item submenu"><a class="nav-link" href="index.deliverytracker.php">List</a></li>

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
                    <p class="titlepage">New Order Details</p>
                    <hr class="hr1"> -->

                <div id="first">
                    <div class="form-box">
                        <form method="POST">
                            <div class="inline">
                                <label class="new-l-label" for="name">Name</label>
                                <label class="new-l-label" for="contact">Contact</label>
                            </div>

                            <div class="inline">
                                <input type="text" class="new-l-form" id="name" name="name">
                                <input type="text" class="new-l-form" id="contact" name="contact"><br><br>
                            </div>

                            <div class="inline">
                                <label class="new-l-label" for="order_region">Region</label>
                                <label class="new-l-label" for="order_city">City</label>
                            </div>

                            <div class="inline">
                                <input type="text" class="new-l-form" id="order-region" name="order_region">
                                <input type="text" class="new-l-form" id="order-city" name="order_city"><br><br>
                            </div>

                            <div class="inline">
                                <label class="new-l-label" for="order-address">Address</label>
                                <label class="new-l-label" for="order-city">Zip Code/Postal Code</label>
                            </div>

                            <div class="inline">
                                <input type="text" class="new-l-form" id="order-address" name="order_address">
                                <input type="number" class="new-l-form" id="order-zip" name="order_zip"><br><br>
                            </div>

                            <div class="inline otm">
                                <p class="orderType ot" style="font-weight: bold;">Type </p>

                                <div class="form-group ">
                                    <label for="status">Order Type</label>
                                    <select class="form-col ot" name="type" required>
                                        <option value="DELIVER">Deliver</option>
                                        <option value="PICKUP" selected>Pickup</option>
                                    </select>
                                </div>
                                <p class="orderType ot"> Deliver = Deliver to Recipient Address (₱50 Shipping Fee
                                    for Metro
                                    Manila only.) Pickup = Pickup to nearest
                                    Branch</p>
                            </div>

                            <hr class="order-form-hr">

                            <table class="q">
                                <tr>
                                    <th>
                                        QUANTIY
                                    </th>
                                    <th>
                                        DISH NAME
                                    </th>
                                    <th>
                                        PRICE
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <input id="form1" min="0" name="quantity1" value="0" type="number"
                                            class="form-control form-control-sm" />
                                    </td>
                                    <td>
                                        Original Vinegar
                                    </td>
                                    <td>
                                        150
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input id="form1" min="0" name="quantity2" value="0" type="number"
                                            class="form-control form-control-sm" />
                                    </td>
                                    <td>
                                        Spicy Vinegar
                                    </td>
                                    <td>
                                        150
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input id="form1" min="0" name="quantity3" value="0" type="number"
                                            class="form-control form-control-sm" />
                                    </td>
                                    <td>
                                        Lemon Garlic Tinapa
                                    </td>
                                    <td>
                                        150
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input id="form1" min="0" name="quantity4" value="0" type="number"
                                            class="form-control form-control-sm" />
                                    </td>
                                    <td>
                                        Chili Garlic
                                    </td>
                                    <td>
                                        150
                                    </td>
                                </tr>
                            </table>

                            <hr class="order-form-hr2">

                            <div class="form-group col-sm-2.5 btn-down">
                                <button id="btnSave" type="submit" name="save" class="btn btn-primary shadow-none">Add
                                    Item</button>
                                <a id="btnCancel" type="button" name="cancel" href="index.deliverytracker.php"
                                    class="btn btn-primary shadow-none">Cancel</a>
                            </div>
                        </form>


                        <?php

                        if (isset($_POST['submit'])) {

                            $stmt1 = $conn->prepare("INSERT INTO orderDetails (order_id, order_contact, order_region, order_city, order_address, order_zip, recipient_name, order_type, order_details, order_price, order_status) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
                            $stmt1->bind_param("issssssssss", $orderid,  $contact, $region, $city, $address, $zip, $name, $ordertype, $orderdetails, $orderprice, $orderstatus);

                            $name = $_POST['name'];
                            $contact = $_POST['contact'];
                            $region = $_POST['order_region'];
                            $city = $_POST['order_city'];
                            $address = $_POST['order_address'];
                            $zip = $_POST['order_zip'];
                            $recipientname = "Marco";
                            $ordertype = $_POST['type'];

                            if ($_POST['quantity1'] > 0) {
                                $dish1 = $_POST['quantity1'] * 150;
                                $msg1 = $_POST['quantity1'] . "x Original Vinegar = ₱" . $dish1 . " | ";
                            } else {
                                $dish1 = 0;
                                $msg1 = "";
                            }

                            if ($_POST['quantity2'] > 0) {
                                $dish2 = $_POST['quantity2'] * 150;
                                $msg2 = $_POST['quantity2'] . "x Spicy Vinegar = ₱" . $dish2 . " | ";
                            } else {
                                $dish2 = 0;
                                $msg2 = "";
                            }

                            if ($_POST['quantity3'] > 0) {
                                $dish3 = $_POST['quantity3'] * 150;
                                $msg3 = $_POST['quantity3'] . "x Lemon Garlic Tinapa = ₱" . $dish3 . " | ";
                            } else {
                                $dish3 = 0;
                                $msg3 = "";
                            }

                            if ($_POST['quantity4'] > 0) {
                                $dish4 = $_POST['quantity4'] * 150;
                                $msg4 = $_POST['quantity4'] . "x Chili Garlic = ₱" . $dish4 . " | ";
                            } else {
                                $dish4 = 0;
                                $msg4 = "";
                            }

                            $orderdetails = $msg1 . $msg2 . $msg3 . $msg4;

                            if ($_POST['type'] == "DELIVER") {
                                $orderprice = ($dish1 + $dish2 + $dish3 + $dish4) + 50;
                            } else {
                                $orderprice = $dish1 + $dish2 + $dish3 + $dish4;
                            }

                            $orderstatus = "ACCEPTED";
                            $stmt1->execute();

                            echo "<script> location.href='order-list.php'; </script>";

                            $stmt1 = $conn->prepare("INSERT INTO History_Log (history_id, log_date, log_title, log_details, username) VALUES (?, NOW(), ?, ?, ?)");
                            $stmt1->bind_param("isss", $hid, $logtitle, $logdetails, $user);


                            $logtitle = "Added new order in Delivery Tracker";
                            $logdetails = "Name: " . $name . " | " . "Contact No.: " . $contact
                                . " | " . "Region: " . $region . " | " . "City: " . $city
                                . " | " . "Address: " . $address . " | " . "Zip: " . $zip
                                . " | " . "Recipient Name: " . $recipientname . " | " . "Order Type: " . $ordertype
                                . " | " . "OG Vinegar: " . $dish1 . " | " . "S. Vinegar: " . $dish2
                                . " | " . "LGT: " . $dish3 . " | " . "C. Garlic: " . $dish4;
                            $user = $_SESSION['username'];
                            $stmt1->execute();
                        }

                        ?>


                    </div>
                </div>
        </div>
        </main>

        <!-- <footer></footer>  -->
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