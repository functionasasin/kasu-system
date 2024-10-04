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

$sql = "SELECT * FROM orderDetails WHERE orderDetails.order_id = " . $id . "";

$result = $conn->query($sql);

while ($data = mysqli_fetch_assoc($result)) {

?>


<html>

<head>
    <title>View Order | Delivery Tracker</title>
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

                <!-- body-->
                <!-- <div class="main">
                    <p class="titlepage">View Order</p>
                    <hr class="hr1"> -->
                <div id="first">
                    <div class="form-box">
                        <div class="row ">
                            <div class="ord-view">
                                <h2> Order Details: </h2><br>
                                <h3>ORDER ID: </h3>
                                <div class="iv"><?php echo $data["order_id"] ?></div>
                                <h3>ORDER TYPE: </h3>
                                <div class="iv"><?php echo $data["order_type"] ?></div>
                                <h3>ORDER DETAILS: </h3>
                                <div class="iv"><?php echo $data["order_details"] ?></div>
                            </div>
                            <div class="rn">
                                <h2> Recipient Information: </h2><br>
                                <h3>RECIPIENT NAME: </h3>
                                <div class="iv"><?php echo $data["recipient_name"] ?></div>
                                <h3>CONTACT NO.: </h3>
                                <div class="iv"><?php echo $data["order_contact"] ?></div>
                                <h3>ADDRESS: </h3>
                                <div class="iv"><?php echo $data["order_address"] ?></div>
                                <h3>CITY: </h3>
                                <div class="iv"><?php echo $data["order_city"] ?></div>
                                <h3>REGION: </h3>
                                <div class="iv"><?php echo $data["order_region"] ?></div>
                                <h3>ZIP: </h3>
                                <div class="iv"><?php echo $data["order_zip"] ?></div>
                            </div>
                            <div class="f">
                                <h3>TOTAL PRICE: </h3>
                                <div class="iv"><?php echo $data["order_price"] ?></div>
                                <h3>ORDER STATUS: </h3>
                                <div class="iv"><?php echo $data["order_status"] ?></div>
                            </div>
                            <form action="POST">
                                <div class="form-group col-sm-2.5 btn-down">
                                    <button id="btnBack" type="submit" name="back"
                                        class="btn btn-primary shadow-none">Back
                                    </button>
                            </form>
                            <?php

                                if (isset($_POST['back'])) {
                                    $pageback = $_GET['pageback'];
                                    echo $pageback;

                                    echo "<script> location.href='" . $pageback . ".php'; </script>";
                                }

                                ?>

                            <a id="btnSave" type="button" name="cancel"
                                href="edit-order-details.php?action=edit & id=<?php echo $data['order_id'] ?>"
                                class="btn btn-primary shadow-none">Edit Item</a>
                            <a id="btnCancel" type="button" name="cancel"
                                href="delete_order.php?action=edit & id=<?php echo $data['order_id'] ?>"
                                class="btn btn-primary shadow-none">Delete Item</a>
                        </div>


                    </div>
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

    <?php }

    ?>
</body>

</html>