<?php

if ($_SERVER["HTTPS"] != "on") {
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html>

<head>
    <title>Forgot Password | Kasu Management System</title>
    <link rel="stylesheet" href="./CSS/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
        integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>

<body>

    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="./Images/kasu-logo.png" class="brand_logo" alt="Logo">
                    </div>
                </div>
                <h5 class="title">KASU MANAGEMENT SYSTEM</h5>
                <h6 class="subtitle" style="text-align:center">Forgot Password</h6>
                <div class="d-flex justify-content-center form_container">
                    <form method="POST">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="username" class="form-control input_user" value=""
                                placeholder="Username">
                        </div>

                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" name="login" class="btn login_btn">Recover Password</button>
                        </div>

                        <div class="d-flex justify-content-center  login_container">
                            <a type="button" name="button" class="btn login_btn2" href="login.php">Back</a>
                        </div>

                    </form>
                </div>

                <?php
                session_start();
                $servername = "localhost";
                $username = "root";
                $dbname = "KasuManagementSystem";

                $conn = new mysqli($servername, $username, "", $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                if (isset($_POST['login'])) {

                    $user_name = $_POST['username'];

                    $sql = "SELECT * FROM Users WHERE Users.username like '%" . $user_name . "%';";

                    $result = $conn->query($sql);

                    $resultCount = $result->num_rows;

                    if ($resultCount > 0) {
                        $data = $result->fetch_assoc();

                        $msg = "The password of your account with the Username of '" . $data['username'] . "' is: " . $data['user_pass'];

                        mail($data['user_email'], "Kasu Management System Password Recovery", $msg);
                ?>

                <script>
                window.alert("Account details is sent to your email.");
                </script>
                <?php
                        echo "<script> location.href='login.php'; </script>";
                    } else { ?>
                <script>
                window.alert("Username does not exist.");
                </script>
                <?php }
                }

                ?>


            </div>
        </div>
    </div>
</body>

</html>