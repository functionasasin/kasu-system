<?php

session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

?>
<html>

<head>
    <title>View Item | Inventory Tracker</title>
    <link rel="stylesheet" href="./CSS/view.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
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
                    $id = $_GET['id'];

                    $sql = "SELECT * FROM supplies WHERE supplies.item_id = " . $id . "";

                    $result = $conn->query($sql);

                    while ($data = mysqli_fetch_assoc($result)) {
                    ?>

                    <div class="page payment-page">
                        <section class="payment-form dark">
                            <div class="container">
                                <div class="block-heading">
                                    <h2>View Item</h2>
                                </div>
                                <div class="row justify-content-md-center">
                                    <div class="col-lg-6 form-div">
                                        <h3>ITEM DETAILS</h3><br>

                                        <table class="item-details">
                                            <tr>
                                                <td>
                                                    <h5>ITEM ID:</h5>
                                                </td>
                                                <td>
                                                    <p><?php echo $data["item_id"] ?></p>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5>ITEM NAME:</h5>
                                                </td>
                                                <td>
                                                    <p><?php echo $data["item_name"] ?></p>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5>QUANTITY:</h5>
                                                </td>
                                                <td>
                                                    <p><?php echo $data["quantity"] ?></p>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5>ITEM TYPE:</h5>
                                                </td>
                                                <td>
                                                    <p><?php echo $data["item_type"] ?></p>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5>ITEM STATUS:</h5>
                                                </td>
                                                <td>
                                                    <p><?php echo $data["item_status"] ?></p>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5>DATE ADDED:</h5>

                                                </td>
                                                <td>
                                                    <p><?php echo $data["date_added"] ?></p>

                                                </td>
                                            </tr>
                                        </table>





                                    </div>
                                    <div class="col-lg-6 form-div2">
                                        <h3>SUPPLIER DETAILS</h3><br>

                                        <table class="supplier-details">
                                            <tr>
                                                <td>
                                                    <h5>NAME:</h5>
                                                </td>
                                                <td>
                                                    <p><?php echo $data["supplier_name"] ?></p>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5>CONTACT NO.:</h5>
                                                </td>
                                                <td>
                                                    <p><?php echo $data["supplier_num"] ?></p>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5>EMAIL ADDRESS:</h5>
                                                </td>
                                                <td>
                                                    <p><?php echo $data["supplier_email"] ?></p>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5>ADDRESS:</h5>
                                                </td>
                                                <td>
                                                    <p><?php echo $data["supplier_address"] ?></p>

                                                </td>
                                            </tr>

                                        </table>


                                    </div>

                                    <div class="form-group col-sm-2.5">
                                        <a id="btnBack" type="button" name="save" class="btn btn-primary shadow-none"
                                            href="inventorytracker-index.php">Back
                                        </a>
                                        <a id="btnSave" type="button" name="cancel"
                                            href="edit_item.php?action=edit & id=<?php echo $data['item_id'] ?>"
                                            class="btn btn-primary shadow-none">Edit Item</a>
                                        <a id="btnCancel" type="button" name="cancel"
                                            href="delete_item.php?action=edit & id=<?php echo $data['item_id'] ?> & name=<?php echo $data['item_name'] ?>"
                                            class="btn btn-primary shadow-none">Delete Item</a>
                                    </div>

                                </div>


                                <?php } ?>
                        </section>
                    </div>

                </section>
            </main>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js">
            </script>
            <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>