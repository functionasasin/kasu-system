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
    <title>Login | Kasu Management System</title>
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
                <div class="d-flex justify-content-center form_container">
                    <form method="POST">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="username" class="form-control input_user" value=""
                                placeholder="Username">
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control input_pass" value=""
                                placeholder="Password">
                        </div>

                        <div class="d-flex justify-content-center links">
                            <a href="forgotpw.php">Forgot your password?</a>
                        </div>

                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" name="login" class="btn login_btn">Login</button>
                        </div>
                        <div class="d-flex justify-content-center">
                            <p class="caption">Don't have an account?</p>
                        </div>
                        <div class="d-flex justify-content-center  login_container">
                            <a type="button" name="button" class="btn login_btn2" href="signin.php">Sign Up</a>
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
                    $user_password = $_POST['password'];

                    $sql = "SELECT * FROM Users WHERE Users.username like '%" . $user_name . "%';";

                    $result = $conn->query($sql);

                    $resultCount = $result->num_rows;

                    // echo $resultCount;

                    if ($resultCount > 0) {
                        $data = $result->fetch_assoc();

                        if ($user_password == $data['user_pass']) {
                            $_SESSION['username'] = $data['username'];

                            $stmt1 = $conn->prepare("INSERT INTO History_Log (history_id, log_date, log_title, log_details, username) VALUES (?, NOW(), ?, ?, ?)");
                            $stmt1->bind_param("isss", $hid, $logtitle, $logdetails, $user);


                            $logtitle = "User logged in";
                            $logdetails = $user_name . " has logged in";
                            $user = $_SESSION['username'];
                            $stmt1->execute();

                            echo "<script> location.href='index.php'; </script>";

                            // exit;
                        } else { ?>
                <script>
                window.alert("Incorrect Password. Please try again!");
                </script>
                <!-- <p class="mb-5 pb-lg-2">Incorrect Password. Please try again!</p> -->
                <?php }
                    } else { ?>
                <script>
                window.alert("Username does not exist.");
                </script>
                <!-- <p class="mb-5 pb-lg-2">Username does not exist.</p> -->
                <?php }
                }

                ?>


            </div>
        </div>
    </div>
</body>

</html>