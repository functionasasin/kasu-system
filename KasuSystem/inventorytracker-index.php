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
    <link rel="stylesheet" href="./CSS/index-styles.css">
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
                    <h1>Inventory Tracker</h1>

                </div>

                <section id="first">
                    <section id="Widgets/Menu">
                        <div class="row justify-content-md-center widmenu">
                            <div class="col-lg-6 widmenu-col">
                                <div class="widgets">
                                    <table class="center">
                                        <tr>
                                            <td class="wid-color1">
                                                <?php
                                                $servername = "localhost";
                                                $username = "root";
                                                $dbname = "KasuManagementSystem";

                                                $conn = new mysqli($servername, $username, "", $dbname);

                                                if ($conn->connect_error) {
                                                    die("Connection failed: " . $conn->connect_error);
                                                }

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
                                                $servername = "localhost";
                                                $username = "root";
                                                $dbname = "KasuManagementSystem";

                                                $conn = new mysqli($servername, $username, "", $dbname);

                                                if ($conn->connect_error) {
                                                    die("Connection failed: " . $conn->connect_error);
                                                }

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
                                                $servername = "localhost";
                                                $username = "root";
                                                $dbname = "KasuManagementSystem";

                                                $conn = new mysqli($servername, $username, "", $dbname);

                                                if ($conn->connect_error) {
                                                    die("Connection failed: " . $conn->connect_error);
                                                }

                                                $searchStatus = "Out of Stock";

                                                $sqlStat = "SELECT * FROM Supplies WHERE supplies.item_type = 'Ingredient' AND supplies.item_status like '%" . $searchStatus . "%';";

                                                $resultS1 = $conn->query($sqlStat);

                                                $AvailCount = $resultS1->num_rows; ?>


                                                <h1 class="result items"><?php echo $AvailCount ?></h1>



                                            </td>
                                            <td class="wid-label">
                                                <h4 class="widget_label">Out of Stock Ingredients</h4>
                                            </td>

                                            <td>

                                            </td>

                                            <td class="wid-color2">
                                                <?php
                                                $servername = "localhost";
                                                $username = "root";
                                                $dbname = "KasuManagementSystem";

                                                $conn = new mysqli($servername, $username, "", $dbname);

                                                if ($conn->connect_error) {
                                                    die("Connection failed: " . $conn->connect_error);
                                                }

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
                            <div class="col-lg-6">
                                <div class="menu">
                                    <div class="row justify-content-md-center menu-header"
                                        style="margin-bottom: 3% !important;">
                                        <div class="col-lg-6  widmenu-col">
                                            <h4 class="menu-title" style="font-family: ecb;">Menu</h4>
                                        </div>
                                        <div class="col-lg-6">
                                            <a class="dropdown-item" type="button" href="add_dish.php"><img
                                                    src="./Images/add-button.png" class="menu-option" alt=""></a>
                                        </div>
                                    </div>

                                    <table>


                                        <?php
                                        $servername = "localhost";
                                        $username = "root";
                                        $dbname = "KasuManagementSystem";

                                        $conn = new mysqli($servername, $username, "", $dbname);

                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }

                                        $limit = 10;

                                        $query1 = " select * from Menu ";
                                        $result1 = mysqli_query($conn, $query1);

                                        while ($data = mysqli_fetch_assoc($result1)) {
                                            if ($data["dish_status"] === "AVAILABLE") {
                                        ?>
                                        <tr class="menu-row">
                                            <td style="font-family: ecb;"><?php echo $data["dish_name"] ?></td>
                                            <td class="menu-status"><?php echo $data["dish_status"] ?></td>
                                            <td style="width: 10% !important;">
                                                <div class="btn-group menu-dd" role="group">
                                                    <button id="btnGroupDrop1" type="button"
                                                        class="btn btn-primary btn-sm rounded-0 py-0 shadow-none"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <img src="./Images/editing.png" class="menu-btn" alt="">
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                        <li><a class="dropdown-item delete_data" type="button"
                                                                href="menu_available.php?action=edit & id=<?php echo $data['dish_id'] ?>">Out
                                                                of Stock</a></li>
                                                        <li><a class="dropdown-item delete_data" type="button"
                                                                href="edit_menu.php?action=edit & id=<?php echo $data['dish_id'] ?>">Edit
                                                                Dish</a></li>
                                                        <li><a class="dropdown-item delete_data" type="button"
                                                                href="delete_dish.php?action=edit & id=<?php echo $data['dish_id'] ?> & name=<?php echo $data['dish_name'] ?>">Delete
                                                                Dish</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>

                                        <?php
                                            } else {
                                            ?>
                                        <tr class="menu-row">
                                            <td style="font-family: ecb;"><?php echo $data["dish_name"] ?></td>
                                            <td class="menu-ofs"><?php echo $data["dish_status"] ?></td>
                                            <td style="width: 10% !important;">
                                                <div class="btn-group" role="group">
                                                    <button id="btnGroupDrop1" type="button"
                                                        class="btn btn-primary btn-sm rounded-0 py-0 shadow-none"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <img src="./Images/editing.png" class="menu-btn" alt="">
                                                    </button>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                        <li><a class="dropdown-item delete_data" type="button"
                                                                href="menu_out.php?action=edit & id=<?php echo $data['dish_id'] ?>">Available</a>
                                                        </li>
                                                        <li><a class="dropdown-item delete_data" type="button"
                                                                href="edit_menu.php?action=edit & id=<?php echo $data['dish_id'] ?>">Edit
                                                                Dish</a></li>
                                                        <li><a class="dropdown-item delete_data" type="button"
                                                                href="delete_dish.php?action=edit & id=<?php echo $data['dish_id'] ?> & name=<?php echo $data['dish_name'] ?> ">Delete
                                                                Dish</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        }
                                        ?>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="Inventory">
                        <h4 class="inv-title" style="font-family: ecb;">Ingredients/Supplies</h4>

                        <form method="post">
                            <div class="input-group mb-3">
                                <input type="text" name="searchItem" class="form-control"
                                    placeholder="Search Item ID, Item Name, Item Type, or Item Status"
                                    aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <button class="ibtn btn btn-outline-secondary" type="submit"
                                    name="search">Search</button>
                                <a class="ibtn btn btn-outline-secondary" type="submit" name="insert"
                                    href="add_item.php">Insert</a>
                            </div>
                            <hr />
                        </form>
                        <form method="post">
                            <table class="table table-striped">

                                <?php

                                if (isset($_POST['search'])) {
                                    $searchItem = $_POST['searchItem'];

                                    if ($searchItem == "Available") {
                                        $sql = "SELECT supplies.item_id, supplies.item_type, supplies.item_name, supplies.quantity, supplies.date_added, supplies.item_status FROM Supplies WHERE Supplies.item_status like '%" . $searchItem . "%';";

                                        $result = $conn->query($sql);

                                        $resultCount = $result->num_rows;
                                    } elseif ($searchItem == "Out of Stock") {
                                        $sql = "SELECT supplies.item_id, supplies.item_type, supplies.item_name, supplies.quantity, supplies.date_added, supplies.item_status FROM Supplies WHERE Supplies.item_status like '%" . $searchItem . "%';";

                                        $result = $conn->query($sql);

                                        $resultCount = $result->num_rows;
                                    } elseif ($searchItem == "Ingredient") {
                                        $sql = "SELECT supplies.item_id, supplies.item_type, supplies.item_name, supplies.quantity, supplies.date_added, supplies.item_status FROM Supplies WHERE Supplies.item_type like '%" . $searchItem . "%';";

                                        $result = $conn->query($sql);

                                        $resultCount = $result->num_rows;
                                    } elseif ($searchItem == "Supply") {
                                        $sql = "SELECT supplies.item_id, supplies.item_type, supplies.item_name, supplies.quantity, supplies.date_added, supplies.item_status FROM Supplies WHERE Supplies.item_type like '%" . $searchItem . "%';";

                                        $result = $conn->query($sql);

                                        $resultCount = $result->num_rows;
                                    } elseif (is_numeric($searchItem)) {
                                        $sql = "SELECT supplies.item_id, supplies.item_type, supplies.item_name, supplies.quantity, supplies.date_added, supplies.item_status FROM Supplies WHERE Supplies.item_id =" . $searchItem . ";";

                                        $result = $conn->query($sql);

                                        $resultCount = $result->num_rows;
                                    } else {
                                        $sql = "SELECT supplies.item_id, supplies.item_type, supplies.item_name, supplies.quantity, supplies.date_added, supplies.item_status FROM Supplies WHERE Supplies.item_name  like '%" . $searchItem . "%';";

                                        $result = $conn->query($sql);

                                        $resultCount = $result->num_rows;
                                    }

                                ?>

                                <p class="result2">Results for: <?php echo $searchItem ?></p>
                                <p class="result2 items">Number of items found: <?php echo $resultCount ?>

                                    <?php
                                        if ($resultCount == 0) {
                                        } else {
                                        ?>


                                    <tr>
                                        <th class="col-name1">ITEM ID</th>
                                        <th class="col-name2">ITEM TYPE</th>
                                        <th class="col-name3">ITEM NAME</th>
                                        <th class="col-name4">QUANTITY</th>
                                        <th class="col-name9">DATE ADDED</th>
                                        <th class="col-name5">SUPPLIER DETAILS</th>
                                        <th class="col-name10">STATUS</th>
                                        <th class="col-name11"></th>
                                    </tr>

                                    <?php
                                            for ($counter = 0; $counter < $resultCount; $counter++) {
                                                $data = $result->fetch_assoc();
                                            ?>
                                    <script>
                                    setTimeout(() => {
                                        window.scrollTo(0, document.body.scrollHeight);
                                    }, 100);
                                    </script>

                                    <tr class="item-row">

                                        <td><?php echo $data["item_id"] ?></td>
                                        <td><?php echo $data["item_type"] ?></td>
                                        <td><?php echo $data["item_name"] ?></td>
                                        <td><?php echo $data["quantity"] ?></td>
                                        <td><?php echo $data["date_added"] ?></td>
                                        <td>
                                            <a id="btnCancel" type="button" name="cancel" href="index.php"
                                                class="btn btn-primary shadow-none view-btn"><img src="./Images/eye.png"
                                                    class="eye" alt=""></a>
                                        </td>
                                        <td>
                                            <?php

                                                        if ($data["item_status"] === "AVAILABLE") { ?>

                                            <div class="btn-group" role="group">
                                                <button id="btnGroupDrop1" type="button"
                                                    class="btn btn-primary dropdown-toggle btn-sm rounded-5 py-1 btn-status item-statbtn shadow-none"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <?php echo $data["item_status"] ?>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                    <li><a class="dropdown-item delete_data" type="button"
                                                            href="outofstock.php?action=edit & id=<?php echo $data['item_id'] ?>">OUT
                                                            OF STOCK</a></li>
                                                </ul>
                                            </div>




                                            <?php } else { ?>

                                            <div class="btn-group" role="group">
                                                <button id="btnGroupDrop1" type="button"
                                                    class="btn btn-primary dropdown-toggle btn-sm rounded-5 py-1 btn-status item-statbtn2 shadow-none"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <?php echo $data["item_status"] ?>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                    <li><a class="dropdown-item delete_data" type="button"
                                                            href="available.php?action=edit & id=<?php echo $data['item_id'] ?>">AVAILABLE</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <?php } ?>
                                        </td>
                                        <td class="text-center btn-row">
                                            <div class="btn-group">
                                                <a type="button"
                                                    href="edit_item.php?action=edit & id=<?php echo $data['item_id'] ?>"
                                                    class="btn btn-info btn-xs edit-btn shadow-none" title="Edit"
                                                    data-toggle="tooltip">
                                                    <img src="./Images/editing-white.png" class="edit-icon" alt="">
                                                </a>
                                                <a href="delete_item.php?action=edit & id=<?php echo $data['item_id'] ?> & name=<?php echo $data['item_name'] ?>"
                                                    class="btn btn-danger btn-xs delete-btn shadow-none">
                                                    <img src="./Images/trash2.png" class="edit-icon" alt="">
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <?php
                                            }
                                        }
                                    } else { ?>

                                    <tr>
                                        <th class="col-name1">ITEM ID</th>
                                        <th class="col-name2">ITEM TYPE</th>
                                        <th class="col-name3">ITEM NAME</th>
                                        <th class="col-name4">QUANTITY</th>
                                        <th class="col-name9">DATE ADDED</th>
                                        <th class="col-name5">SUPPLIER DETAILS</th>
                                        <th class="col-name10">STATUS</th>
                                        <th class="col-name11"></th>
                                    </tr>
                                    <?php
                                        $query = " select supplies.item_id, supplies.item_type, supplies.item_name, supplies.quantity,  supplies.date_added, supplies.item_status from Supplies ";
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

                                        $getQuery = "SELECT supplies.item_id, supplies.item_type, supplies.item_name, supplies.quantity, supplies.date_added, supplies.item_status FROM Supplies Limit " . $initial_page . ',' . $limit . ";";

                                        $result3 = mysqli_query($conn, $getQuery);

                                        if (($result3->num_rows) == "10") {
                                            $numofresults2 = 10 * ($page_number);
                                        } else {
                                            $numofresults2 = ($result3->num_rows) + (10 * ($page_number - 1));
                                        }


                                        while ($data = mysqli_fetch_assoc($result3)) {
                                        ?>

                                    <tr class="item-row">

                                        <td><?php echo $data["item_id"] ?></td>
                                        <td><?php echo $data["item_type"] ?></td>
                                        <td><?php echo $data["item_name"] ?></td>
                                        <td><?php echo $data["quantity"] ?></td>
                                        <!-- <td><?php echo $data["supplier_name"] ?></td>
                                        <td><?php echo $data["supplier_num"] ?></td>
                                        <td><?php echo $data["supplier_email"] ?></td>
                                        <td><?php echo $data["supplier_address"] ?></td> -->
                                        <td><?php echo $data["date_added"] ?></td>
                                        <td>
                                            <a id="btnCancel" type="button" name="cancel"
                                                href="view.php?action=edit & id=<?php echo $data['item_id'] ?>"
                                                class="btn btn-primary shadow-none view-btn"><img src="./Images/eye.png"
                                                    class="eye" alt=""></a>
                                        </td>
                                        <td>

                                            <?php

                                                    if ($data["item_status"] === "AVAILABLE") { ?>

                                            <div class="btn-group" role="group">
                                                <button id="btnGroupDrop1" type="button"
                                                    class="btn btn-primary dropdown-toggle btn-sm rounded-5 py-1 btn-status item-statbtn shadow-none"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <?php echo $data["item_status"] ?>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                    <li><a class="dropdown-item delete_data" type="button"
                                                            href="outofstock.php?action=edit & id=<?php echo $data['item_id'] ?>">OUT
                                                            OF STOCK</a></li>
                                                </ul>
                                            </div>




                                            <?php } else { ?>

                                            <div class="btn-group" role="group">
                                                <button id="btnGroupDrop1" type="button"
                                                    class="btn btn-primary dropdown-toggle btn-sm rounded-5 py-1 btn-status item-statbtn2 shadow-none"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <?php echo $data["item_status"] ?>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                    <li><a class="dropdown-item delete_data" type="button"
                                                            href="available.php?action=edit & id=<?php echo $data['item_id'] ?>">AVAILABLE</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <?php } ?>



                                        </td>
                                        <td class="text-center btn-row">
                                            <div class="btn-group">
                                                <a type="button"
                                                    href="edit_item.php?action=edit & id=<?php echo $data['item_id'] ?>"
                                                    class="btn btn-info btn-xs edit-btn shadow-none" title="Edit"
                                                    data-toggle="tooltip">
                                                    <img src="./Images/editing-white.png" class="edit-icon" alt="">
                                                </a>
                                                <a href="delete_item.php?action=edit & id=<?php echo $data['item_id'] ?> & name=<?php echo $data['item_name'] ?>"
                                                    class="btn btn-danger btn-xs delete-btn shadow-none">
                                                    <img src="./Images/trash2.png" class="edit-icon" alt="">
                                                </a>
                                            </div>
                                        </td>
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
                                                    href="inventorytracker-index.php?page=<?php echo ($page_number - 1) ?>">Previous</a>
                                            </li>
                                            <?php
                                            for ($page_number = 1; $page_number <= $total_pages; $page_number++) {
                                            ?>

                                            <li class="page-item"><a class="page-link"
                                                    href="inventorytracker-index.php?page=<?php echo $page_number ?>"><?php echo $page_number ?></a>
                                            </li>

                                            <?php
                                            }

                                            if ($prev == ($page_number - 1)) {
                                            ?>

                                            <li class="page-item"><a class="page-link"
                                                    href="inventorytracker-index.php?page=<?php echo ($prev) ?>">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <?php
                                            } else {
                                ?>


                                    <li class="page-item"><a class="page-link"
                                            href="inventorytracker-index.php?page=<?php echo ($prev + 1) ?>">Next</a>
                                    </li>
                                    </ul>
                                    </nav>
                                    <?php
                                            }
                                ?>

                                </div>
                            </div>
                            <?php

                                    }
                        ?>


                        </form>





                    </section>

            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>