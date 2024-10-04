<?php
$servername = "localhost";
$username = "root";
$dbname = "KasuManagementSystem";

$conn = new mysqli($servername, $username, "", $dbname);

$sql1 = "CREATE TABLE Supplies (
        item_id INT NOT NULL AUTO_INCREMENT,
        item_name VARCHAR(50) NOT NULL,
        quantity VARCHAR(50) NOT NULL,
        item_type VARCHAR(50) NOT NULL,
        supplier_name VARCHAR(50) NOT NULL,
        supplier_num VARCHAR(50) NOT NULL,
        supplier_email VARCHAR(50) NOT NULL,
        supplier_address VARCHAR(100) NOT NULL,
        date_added DATE NOT NULL,
        item_status VARCHAR(50) NOT NULL,
        PRIMARY KEY (item_id)
        )";

$sql2 = "CREATE TABLE Menu (
        dish_id INT NOT NULL AUTO_INCREMENT,
        dish_name VARCHAR(50) NOT NULL,
        dish_status VARCHAR(50) NOT NULL,
        PRIMARY KEY (dish_id)
        )";

$sql3 = "CREATE TABLE Users (
        user_id INT NOT NULL AUTO_INCREMENT,
        username VARCHAR(50) NOT NULL,
        user_fn VARCHAR(50) NOT NULL,
        user_ln VARCHAR(50) NOT NULL,
        user_email VARCHAR(50) NOT NULL,
        user_pass VARCHAR(50) NOT NULL,
        PRIMARY KEY (user_id)
        )";

$sql4 = "CREATE TABLE History_Log(
        history_id INT NOT NULL AUTO_INCREMENT,
        log_date VARCHAR(50) NOT NULL,
        log_title VARCHAR(50) NOT NULL,
        log_details VARCHAR(500) NOT NULL,
        username VARCHAR(50) NOT NULL,
        PRIMARY KEY (history_id)
        )";

$sql5 = "CREATE TABLE Tasks (
        task_id INT NOT NULL AUTO_INCREMENT,
        task_name VARCHAR(50) NOT NULL,
        task_desc VARCHAR(50) NOT NULL,
        employee_name VARCHAR(50) NOT NULL,
        date_added DATE NOT NULL,
        date_due DATE NOT NULL,
        task_priority VARCHAR(50) NOT NULL,
        task_status VARCHAR(50) NOT NULL,
        PRIMARY KEY (task_id)
        )";


$sql6 = "CREATE TABLE orderDetails (
        order_id INT NOT NULL AUTO_INCREMENT,
        order_contact VARCHAR(50) NOT NULL,
        order_region VARCHAR(50) NOT NULL,
        order_city VARCHAR(50) NOT NULL,
        order_address VARCHAR(50) NOT NULL,
        order_zip VARCHAR(50) NOT NULL,
        recipient_name VARCHAR(50) NOT NULL,
        order_type VARCHAR(100) NOT NULL,
        order_details VARCHAR(200) NOT NULL,
        order_price VARCHAR(50) NOT NULL,
        order_status VARCHAR(50) NOT NULL,
        PRIMARY KEY (order_id)
        )";


$conn->query($sql1);
$conn->query($sql2);
$conn->query($sql3);
$conn->query($sql4);
$conn->query($sql5);
$conn->query($sql6);

// SAMPLE RECORDS IN DATABASE //

// USER ACCOUNTS //

$stmt1 = $conn->prepare("INSERT INTO Users (user_id, username, user_fn, user_ln, user_email, user_pass) VALUES (?, ?, ?, ?, ?, ?)");
$stmt1->bind_param("isssss", $uid, $uname, $fname, $lname, $Uemail, $upass);

$uname = "cbathan";
$fname = "Christian";
$lname = "Bathan";
$Uemail = "cabathan1229@gmail.com";
$upass = "1234";
$stmt1->execute();

$uname = "admin";
$fname = "Marco";
$lname = "Basug";
$Uemail = "marcoadmin@gmail.com";
$upass = "admin1234";
$stmt1->execute();

// INVENTORY TRACKER DISHES //

$stmt1 = $conn->prepare("INSERT INTO Menu (dish_id, dish_name, dish_status) VALUES (?, ?, ?)");
$stmt1->bind_param("iss", $menuid, $menuname, $menustatus);

$menuname = "Spicy Vinegar";
$menustatus = "AVAILABLE";
$stmt1->execute();

$menuname = "Original Vinegar";
$menustatus = "AVAILABLE";
$stmt1->execute();

$menuname = "Lemon Garlic Tinapa";
$menustatus = "AVAILABLE";
$stmt1->execute();

$menuname = "Chili Garlic";
$menustatus = "AVAILABLE";
$stmt1->execute();

$stmt1->close();

// INVENTORY TRACKER ITEMS //

$stmt = $conn->prepare("INSERT INTO Supplies (item_id, item_name, quantity, item_type, supplier_name, supplier_num, supplier_email, supplier_address, date_added, item_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)");
$stmt->bind_param("issssssss", $itemid, $itemname, $itemqty, $itemtype, $sName, $sNum, $sEmail, $sAddress, $itemstatus);

$itemname = "Garlic";
$itemqty = "10kg";
$itemtype = "Ingredient";
$sName = "Grocery";
$sNum = "09121212111";
$sEmail = "grocery@gmail.com";
$sAddress = "32 Palengke St., Pasay City, NCR";
$itemstatus = "AVAILABLE";
$stmt->execute();

$itemname = "Garlic";
$itemqty = "10kg";
$itemtype = "Ingredient";
$sName = "Grocery";
$sNum = "09121212111";
$sEmail = "grocery@gmail.com";
$sAddress = "32 Palengke St., Pasay City, NCR";
$itemstatus = "AVAILABLE";
$stmt->execute();

$itemname = "Garlic";
$itemqty = "10kg";
$itemtype = "Ingredient";
$sName = "Grocery";
$sNum = "09121212111";
$sEmail = "grocery@gmail.com";
$sAddress = "32 Palengke St., Pasay City, NCR";
$itemstatus = "AVAILABLE";
$stmt->execute();

$itemname = "Garlic";
$itemqty = "10kg";
$itemtype = "Ingredient";
$sName = "Grocery";
$sNum = "09121212111";
$sEmail = "grocery@gmail.com";
$sAddress = "32 Palengke St., Pasay City, NCR";
$itemstatus = "AVAILABLE";
$stmt->execute();

$itemname = "Garlic";
$itemqty = "10kg";
$itemtype = "Ingredient";
$sName = "Grocery";
$sNum = "09121212111";
$sEmail = "grocery@gmail.com";
$sAddress = "32 Palengke St., Pasay City, NCR";
$itemstatus = "AVAILABLE";
$stmt->execute();

$itemname = "Garlic";
$itemqty = "10kg";
$itemtype = "Ingredient";
$sName = "Grocery";
$sNum = "09121212111";
$sEmail = "grocery@gmail.com";
$sAddress = "32 Palengke St., Pasay City, NCR";
$itemstatus = "AVAILABLE";
$stmt->execute();

$itemname = "Garlic";
$itemqty = "10kg";
$itemtype = "Ingredient";
$sName = "Grocery";
$sNum = "09121212111";
$sEmail = "grocery@gmail.com";
$sAddress = "32 Palengke St., Pasay City, NCR";
$itemstatus = "AVAILABLE";
$stmt->execute();

$itemname = "Garlic";
$itemqty = "10kg";
$itemtype = "Ingredient";
$sName = "Grocery";
$sNum = "09121212111";
$sEmail = "grocery@gmail.com";
$sAddress = "32 Palengke St., Pasay City, NCR";
$itemstatus = "AVAILABLE";
$stmt->execute();

$itemname = "Garlic";
$itemqty = "10kg";
$itemtype = "Ingredient";
$sName = "Grocery";
$sNum = "09121212111";
$sEmail = "grocery@gmail.com";
$sAddress = "32 Palengke St., Pasay City, NCR";
$itemstatus = "AVAILABLE";
$stmt->execute();

$itemname = "Garlic";
$itemqty = "10kg";
$itemtype = "Ingredient";
$sName = "Grocery";
$sNum = "09121212111";
$sEmail = "grocery@gmail.com";
$sAddress = "32 Palengke St., Pasay City, NCR";
$itemstatus = "AVAILABLE";
$stmt->execute();

$itemname = "Garlic";
$itemqty = "10kg";
$itemtype = "Ingredient";
$sName = "Grocery";
$sNum = "09121212111";
$sEmail = "grocery@gmail.com";
$sAddress = "32 Palengke St., Pasay City, NCR";
$itemstatus = "AVAILABLE";
$stmt->execute();

$itemname = "Garlic";
$itemqty = "10kg";
$itemtype = "Ingredient";
$sName = "Grocery";
$sNum = "09121212111";
$sEmail = "grocery@gmail.com";
$sAddress = "32 Palengke St., Pasay City, NCR";
$itemstatus = "AVAILABLE";
$stmt->execute();

$itemname = "Garlic";
$itemqty = "10kg";
$itemtype = "Ingredient";
$sName = "Grocery";
$sNum = "09121212111";
$sEmail = "grocery@gmail.com";
$sAddress = "32 Palengke St., Pasay City, NCR";
$itemstatus = "AVAILABLE";
$stmt->execute();

$itemname = "Garlic";
$itemqty = "10kg";
$itemtype = "Ingredient";
$sName = "Grocery";
$sNum = "09121212111";
$sEmail = "grocery@gmail.com";
$sAddress = "32 Palengke St., Pasay City, NCR";
$itemstatus = "AVAILABLE";
$stmt->execute();

$itemname = "Garlic";
$itemqty = "10kg";
$itemtype = "Ingredient";
$sName = "Grocery";
$sNum = "09121212111";
$sEmail = "grocery@gmail.com";
$sAddress = "32 Palengke St., Pasay City, NCR";
$itemstatus = "AVAILABLE";
$stmt->execute();

$itemname = "Garlic";
$itemqty = "10kg";
$itemtype = "Ingredient";
$sName = "Grocery";
$sNum = "09121212111";
$sEmail = "grocery@gmail.com";
$sAddress = "32 Palengke St., Pasay City, NCR";
$itemstatus = "AVAILABLE";
$stmt->execute();

$itemname = "Garlic";
$itemqty = "10kg";
$itemtype = "Ingredient";
$sName = "Grocery";
$sNum = "09121212111";
$sEmail = "grocery@gmail.com";
$sAddress = "32 Palengke St., Pasay City, NCR";
$itemstatus = "AVAILABLE";
$stmt->execute();

$itemname = "Garlic";
$itemqty = "10kg";
$itemtype = "Ingredient";
$sName = "Grocery";
$sNum = "09121212111";
$sEmail = "grocery@gmail.com";
$sAddress = "32 Palengke St., Pasay City, NCR";
$itemstatus = "AVAILABLE";
$stmt->execute();

$itemname = "Garlic";
$itemqty = "10kg";
$itemtype = "Ingredient";
$sName = "Grocery";
$sNum = "09121212111";
$sEmail = "grocery@gmail.com";
$sAddress = "32 Palengke St., Pasay City, NCR";
$itemstatus = "AVAILABLE";
$stmt->execute();

$itemname = "Garlic";
$itemqty = "10kg";
$itemtype = "Ingredient";
$sName = "Grocery";
$sNum = "09121212111";
$sEmail = "grocery@gmail.com";
$sAddress = "32 Palengke St., Pasay City, NCR";
$itemstatus = "AVAILABLE";
$stmt->execute();

$itemname = "Garlic";
$itemqty = "10kg";
$itemtype = "Ingredient";
$sName = "Grocery";
$sNum = "09121212111";
$sEmail = "grocery@gmail.com";
$sAddress = "32 Palengke St., Pasay City, NCR";
$itemstatus = "AVAILABLE";
$stmt->execute();

$stmt->close();

// TASK TRACKER TASKS //

$stmt1 = $conn->prepare("INSERT INTO Tasks (task_id, task_name, task_desc, employee_name, task_priority,task_status, date_added, date_due) VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW())");
$stmt1->bind_param("isssss", $tid, $tname, $tdesc, $ename, $tprio, $tstatus);

$tname = "Create order";
$tprio = "HIGH";
$tdesc = "make 3 orders of vinegar";
$ename = "Marco";
$tstatus = "APPROVED";
$stmt1->execute();

$tname = "Create order";
$tprio = "MEDIUM";
$tdesc = "make 3 orders of vinegar";
$ename = "Cesca";
$tstatus = "FOR APPROVAL";
$stmt1->execute();

$tname = "Create order";
$tprio = "LOW";
$tdesc = "make 3 orders of vinegar";
$ename = "Christ";
$tstatus = "COMPLETED";
$stmt1->execute();

$tname = "Create order";
$tprio = "HIGH";
$tdesc = "make 3 orders of vinegar";
$ename = "Basug";
$tstatus = "FOR APPROVAL";
$stmt1->execute();

$tname = "Create order";
$tprio = "LOW";
$tdesc = "make 3 orders of vinegar";
$ename = "Tengco";
$tstatus = "APPROVED";
$stmt1->execute();

$tname = "Create order";
$tprio = "MEDIUM";
$tdesc = "make 3 orders of vinegar";
$ename = "Bathan";
$tstatus = "COMPLETED";
$stmt1->execute();

$tname = "Create order";
$tprio = "HIGH";
$tdesc = "make 3 orders of vinegar";
$ename = "Marco";
$tstatus = "APPROVED";
$stmt1->execute();

$tname = "Create order";
$tprio = "MEDIUM";
$tdesc = "make 3 orders of vinegar";
$ename = "Cesca";
$tstatus = "FOR APPROVAL";
$stmt1->execute();

$tname = "Create order";
$tprio = "LOW";
$tdesc = "make 3 orders of vinegar";
$ename = "Christ";
$tstatus = "COMPLETED";
$stmt1->execute();

$tname = "Create order";
$tprio = "HIGH";
$tdesc = "make 3 orders of vinegar";
$ename = "Basug";
$tstatus = "FOR APPROVAL";
$stmt1->execute();

$tname = "Create order";
$tprio = "LOW";
$tdesc = "make 3 orders of vinegar";
$ename = "Tengco";
$tstatus = "APPROVED";
$stmt1->execute();

$tname = "Create order";
$tprio = "MEDIUM";
$tdesc = "make 3 orders of vinegar";
$ename = "Bathan";
$tstatus = "COMPLETED";
$stmt1->execute();

$tname = "Create order";
$tprio = "HIGH";
$tdesc = "make 3 orders of vinegar";
$ename = "Marco";
$tstatus = "APPROVED";
$stmt1->execute();

$tname = "Create order";
$tprio = "MEDIUM";
$tdesc = "make 3 orders of vinegar";
$ename = "Cesca";
$tstatus = "FOR APPROVAL";
$stmt1->execute();

$tname = "Create order";
$tprio = "LOW";
$tdesc = "make 3 orders of vinegar";
$ename = "Christ";
$tstatus = "COMPLETED";
$stmt1->execute();

$tname = "Create order";
$tprio = "HIGH";
$tdesc = "make 3 orders of vinegar";
$ename = "Basug";
$tstatus = "FOR APPROVAL";
$stmt1->execute();

$tname = "Create order";
$tprio = "LOW";
$tdesc = "make 3 orders of vinegar";
$ename = "Tengco";
$tstatus = "APPROVED";
$stmt1->execute();

$tname = "Create order";
$tprio = "MEDIUM";
$tdesc = "make 3 orders of vinegar";
$ename = "Bathan";
$tstatus = "COMPLETED";
$stmt1->execute();

$stmt1->close();

// DELIVERY TRACKER ORDERS //

$stmt1 = $conn->prepare("INSERT INTO orderDetails (order_id, order_contact, order_region, order_city, order_address, order_zip, recipient_name, order_type, order_details, order_price, order_status) VALUES ( ?, ?,?,?,?,?,?,?,?,?,?)");
$stmt1->bind_param("issssssssss", $orderid, $contact, $region, $city, $address, $zip, $name, $ordertype, $orderdetails, $orderprice, $orderstatus);

$name = "Cesca";
$contact = "09176587723";
$region = "NCR";
$city = "Taguig";
$address = "Grace Residence";
$zip = "1632";
$ordertype = "DELIVER";
$orderdetails = "Lorem Ipsum";
$orderprice = "650";
$orderstatus = "COLLECTED";
$stmt1->execute();

$name = "Marco";
$contact = "09176587723";
$region = "CAR";
$city = "Baguio";
$address = "Pines Residence";
$zip = "1632";
$ordertype = "PICKUP";
$orderdetails = "Lorem Ipsum";
$orderprice = "300";
$orderstatus = "READY TO PICKUP";
$stmt1->execute();

$name = "Angelo";
$contact = "09176587723";
$region = "NCR";
$city = "Las Pinas";
$address = "BF Residence";
$zip = "1632";
$ordertype = "DELIVER";
$orderdetails = "Lorem Ipsum";
$orderprice = "450";
$orderstatus = "ACCEPTED";
$stmt1->execute();

$name = "Cesca";
$contact = "09176587723";
$region = "NCR";
$city = "Taguig";
$address = "Grace Residence";
$zip = "1632";
$ordertype = "DELIVER";
$orderdetails = "Lorem Ipsum";
$orderprice = "650";
$orderstatus = "DELIVERED";
$stmt1->execute();

$name = "Marco";
$contact = "09176587723";
$region = "CAR";
$city = "Baguio";
$address = "Pines Residence";
$zip = "1632";
$ordertype = "PICKUP";
$orderdetails = "Lorem Ipsum";
$orderprice = "300";
$orderstatus = "OUT FOR DELIVERY";
$stmt1->execute();

$name = "Angelo";
$contact = "09176587723";
$region = "NCR";
$city = "Las Pinas";
$address = "BF Residence";
$zip = "1632";
$ordertype = "DELIVER";
$orderdetails = "Lorem Ipsum";
$orderprice = "450";
$orderstatus = "PICKED-UP";
$stmt1->execute();

$name = "Cesca";
$contact = "09176587723";
$region = "NCR";
$city = "Taguig";
$address = "Grace Residence";
$zip = "1632";
$ordertype = "DELIVER";
$orderdetails = "Lorem Ipsum";
$orderprice = "650";
$orderstatus = "COLLECTED";
$stmt1->execute();

$name = "Marco";
$contact = "09176587723";
$region = "CAR";
$city = "Baguio";
$address = "Pines Residence";
$zip = "1632";
$ordertype = "PICKUP";
$orderdetails = "Lorem Ipsum";
$orderprice = "300";
$orderstatus = "READY TO PICKUP";
$stmt1->execute();

$name = "Angelo";
$contact = "09176587723";
$region = "NCR";
$city = "Las Pinas";
$address = "BF Residence";
$zip = "1632";
$ordertype = "DELIVER";
$orderdetails = "Lorem Ipsum";
$orderprice = "450";
$orderstatus = "ACCEPTED";
$stmt1->execute();

$name = "Cesca";
$contact = "09176587723";
$region = "NCR";
$city = "Taguig";
$address = "Grace Residence";
$zip = "1632";
$ordertype = "DELIVER";
$orderdetails = "Lorem Ipsum";
$orderprice = "650";
$orderstatus = "DELIVERED";
$stmt1->execute();

$name = "Marco";
$contact = "09176587723";
$region = "CAR";
$city = "Baguio";
$address = "Pines Residence";
$zip = "1632";
$ordertype = "PICKUP";
$orderdetails = "Lorem Ipsum";
$orderprice = "300";
$orderstatus = "OUT FOR DELIVERY";
$stmt1->execute();

$name = "Angelo";
$contact = "09176587723";
$region = "NCR";
$city = "Las Pinas";
$address = "BF Residence";
$zip = "1632";
$ordertype = "DELIVER";
$orderdetails = "Lorem Ipsum";
$orderprice = "450";
$orderstatus = "PICKED-UP";
$stmt1->execute();

$name = "Cesca";
$contact = "09176587723";
$region = "NCR";
$city = "Taguig";
$address = "Grace Residence";
$zip = "1632";
$ordertype = "DELIVER";
$orderdetails = "Lorem Ipsum";
$orderprice = "650";
$orderstatus = "COLLECTED";
$stmt1->execute();

$name = "Marco";
$contact = "09176587723";
$region = "CAR";
$city = "Baguio";
$address = "Pines Residence";
$zip = "1632";
$ordertype = "PICKUP";
$orderdetails = "Lorem Ipsum";
$orderprice = "300";
$orderstatus = "READY TO PICKUP";
$stmt1->execute();

$name = "Angelo";
$contact = "09176587723";
$region = "NCR";
$city = "Las Pinas";
$address = "BF Residence";
$zip = "1632";
$ordertype = "DELIVER";
$orderdetails = "Lorem Ipsum";
$orderprice = "450";
$orderstatus = "ACCEPTED";
$stmt1->execute();

$name = "Cesca";
$contact = "09176587723";
$region = "NCR";
$city = "Taguig";
$address = "Grace Residence";
$zip = "1632";
$ordertype = "DELIVER";
$orderdetails = "Lorem Ipsum";
$orderprice = "650";
$orderstatus = "DELIVERED";
$stmt1->execute();

$name = "Marco";
$contact = "09176587723";
$region = "CAR";
$city = "Baguio";
$address = "Pines Residence";
$zip = "1632";
$ordertype = "PICKUP";
$orderdetails = "Lorem Ipsum";
$orderprice = "300";
$orderstatus = "OUT FOR DELIVERY";
$stmt1->execute();

$name = "Angelo";
$contact = "09176587723";
$region = "NCR";
$city = "Las Pinas";
$address = "BF Residence";
$zip = "1632";
$ordertype = "DELIVER";
$orderdetails = "Lorem Ipsum";
$orderprice = "450";
$orderstatus = "PICKED-UP";
$stmt1->execute();

$name = "Cesca";
$contact = "09176587723";
$region = "NCR";
$city = "Taguig";
$address = "Grace Residence";
$zip = "1632";
$ordertype = "DELIVER";
$orderdetails = "Lorem Ipsum";
$orderprice = "650";
$orderstatus = "COLLECTED";
$stmt1->execute();

$name = "Marco";
$contact = "09176587723";
$region = "CAR";
$city = "Baguio";
$address = "Pines Residence";
$zip = "1632";
$ordertype = "PICKUP";
$orderdetails = "Lorem Ipsum";
$orderprice = "300";
$orderstatus = "READY TO PICKUP";
$stmt1->execute();

$name = "Angelo";
$contact = "09176587723";
$region = "NCR";
$city = "Las Pinas";
$address = "BF Residence";
$zip = "1632";
$ordertype = "DELIVER";
$orderdetails = "Lorem Ipsum";
$orderprice = "450";
$orderstatus = "ACCEPTED";
$stmt1->execute();

$name = "Cesca";
$contact = "09176587723";
$region = "NCR";
$city = "Taguig";
$address = "Grace Residence";
$zip = "1632";
$ordertype = "DELIVER";
$orderdetails = "Lorem Ipsum";
$orderprice = "650";
$orderstatus = "DELIVERED";
$stmt1->execute();

$name = "Marco";
$contact = "09176587723";
$region = "CAR";
$city = "Baguio";
$address = "Pines Residence";
$zip = "1632";
$ordertype = "PICKUP";
$orderdetails = "Lorem Ipsum";
$orderprice = "300";
$orderstatus = "OUT FOR DELIVERY";
$stmt1->execute();

$name = "Angelo";
$contact = "09176587723";
$region = "NCR";
$city = "Las Pinas";
$address = "BF Residence";
$zip = "1632";
$ordertype = "DELIVER";
$orderdetails = "Lorem Ipsum";
$orderprice = "450";
$orderstatus = "PICKED-UP";
$stmt1->execute();

$name = "Cesca";
$contact = "09176587723";
$region = "NCR";
$city = "Taguig";
$address = "Grace Residence";
$zip = "1632";
$ordertype = "DELIVER";
$orderdetails = "Lorem Ipsum";
$orderprice = "650";
$orderstatus = "COLLECTED";
$stmt1->execute();

$name = "Marco";
$contact = "09176587723";
$region = "CAR";
$city = "Baguio";
$address = "Pines Residence";
$zip = "1632";
$ordertype = "PICKUP";
$orderdetails = "Lorem Ipsum";
$orderprice = "300";
$orderstatus = "READY TO PICKUP";
$stmt1->execute();

$name = "Angelo";
$contact = "09176587723";
$region = "NCR";
$city = "Las Pinas";
$address = "BF Residence";
$zip = "1632";
$ordertype = "DELIVER";
$orderdetails = "Lorem Ipsum";
$orderprice = "450";
$orderstatus = "ACCEPTED";
$stmt1->execute();

$name = "Cesca";
$contact = "09176587723";
$region = "NCR";
$city = "Taguig";
$address = "Grace Residence";
$zip = "1632";
$ordertype = "DELIVER";
$orderdetails = "Lorem Ipsum";
$orderprice = "650";
$orderstatus = "DELIVERED";
$stmt1->execute();

$name = "Marco";
$contact = "09176587723";
$region = "CAR";
$city = "Baguio";
$address = "Pines Residence";
$zip = "1632";
$ordertype = "PICKUP";
$orderdetails = "Lorem Ipsum";
$orderprice = "300";
$orderstatus = "OUT FOR DELIVERY";
$stmt1->execute();

$name = "Angelo";
$contact = "09176587723";
$region = "NCR";
$city = "Las Pinas";
$address = "BF Residence";
$zip = "1632";
$ordertype = "DELIVER";
$orderdetails = "Lorem Ipsum";
$orderprice = "450";
$orderstatus = "PICKED-UP";
$stmt1->execute();

$name = "Cesca";
$contact = "09176587723";
$region = "NCR";
$city = "Taguig";
$address = "Grace Residence";
$zip = "1632";
$ordertype = "DELIVER";
$orderdetails = "Lorem Ipsum";
$orderprice = "650";
$orderstatus = "COLLECTED";
$stmt1->execute();

$name = "Marco";
$contact = "09176587723";
$region = "CAR";
$city = "Baguio";
$address = "Pines Residence";
$zip = "1632";
$ordertype = "PICKUP";
$orderdetails = "Lorem Ipsum";
$orderprice = "300";
$orderstatus = "READY TO PICKUP";
$stmt1->execute();

$name = "Angelo";
$contact = "09176587723";
$region = "NCR";
$city = "Las Pinas";
$address = "BF Residence";
$zip = "1632";
$ordertype = "DELIVER";
$orderdetails = "Lorem Ipsum";
$orderprice = "450";
$orderstatus = "ACCEPTED";
$stmt1->execute();

$name = "Cesca";
$contact = "09176587723";
$region = "NCR";
$city = "Taguig";
$address = "Grace Residence";
$zip = "1632";
$ordertype = "DELIVER";
$orderdetails = "Lorem Ipsum";
$orderprice = "650";
$orderstatus = "DELIVERED";
$stmt1->execute();

$name = "Marco";
$contact = "09176587723";
$region = "CAR";
$city = "Baguio";
$address = "Pines Residence";
$zip = "1632";
$ordertype = "PICKUP";
$orderdetails = "Lorem Ipsum";
$orderprice = "300";
$orderstatus = "OUT FOR DELIVERY";
$stmt1->execute();

$name = "Angelo";
$contact = "09176587723";
$region = "NCR";
$city = "Las Pinas";
$address = "BF Residence";
$zip = "1632";
$ordertype = "DELIVER";
$orderdetails = "Lorem Ipsum";
$orderprice = "450";
$orderstatus = "PICKED-UP";
$stmt1->execute();

$name = "Cesca";
$contact = "09176587723";
$region = "NCR";
$city = "Taguig";
$address = "Grace Residence";
$zip = "1632";
$ordertype = "DELIVER";
$orderdetails = "Lorem Ipsum";
$orderprice = "650";
$orderstatus = "COLLECTED";
$stmt1->execute();

$name = "Marco";
$contact = "09176587723";
$region = "CAR";
$city = "Baguio";
$address = "Pines Residence";
$zip = "1632";
$ordertype = "PICKUP";
$orderdetails = "Lorem Ipsum";
$orderprice = "300";
$orderstatus = "READY TO PICKUP";
$stmt1->execute();

$name = "Angelo";
$contact = "09176587723";
$region = "NCR";
$city = "Las Pinas";
$address = "BF Residence";
$zip = "1632";
$ordertype = "DELIVER";
$orderdetails = "Lorem Ipsum";
$orderprice = "450";
$orderstatus = "ACCEPTED";
$stmt1->execute();

$name = "Cesca";
$contact = "09176587723";
$region = "NCR";
$city = "Taguig";
$address = "Grace Residence";
$zip = "1632";
$ordertype = "DELIVER";
$orderdetails = "Lorem Ipsum";
$orderprice = "650";
$orderstatus = "DELIVERED";
$stmt1->execute();

$name = "Marco";
$contact = "09176587723";
$region = "CAR";
$city = "Baguio";
$address = "Pines Residence";
$zip = "1632";
$ordertype = "PICKUP";
$orderdetails = "Lorem Ipsum";
$orderprice = "300";
$orderstatus = "OUT FOR DELIVERY";
$stmt1->execute();

$name = "Angelo";
$contact = "09176587723";
$region = "NCR";
$city = "Las Pinas";
$address = "BF Residence";
$zip = "1632";
$ordertype = "DELIVER";
$orderdetails = "Lorem Ipsum";
$orderprice = "450";
$orderstatus = "PICKED-UP";
$stmt1->execute();

$stmt1->close();

$conn->close();