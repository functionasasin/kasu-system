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
    <title>Sign In | Kasu Management System</title>
    <link rel="stylesheet" href="./CSS/signin.css">
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
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="firstname" class="form-control input_user" value=""
                                placeholder="First Name">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="lastname" class="form-control input_user" value=""
                                placeholder="Last Name">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="text" name="email" class="form-control input_user" value=""
                                placeholder="Email">
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control input_pass" value=""
                                placeholder="Password">
                        </div>

                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" name="signup" class="btn login_btn">Create Account</button>
                        </div>

                        <div class="d-flex justify-content-center">
                            <p class="caption">Already have an account?</p>
                        </div>
                        <div class="d-flex justify-content-center login_container">
                            <a type="button" name="button" class="btn login_btn2" href="login.php">Login</a>
                        </div>
                    </form>

                    <?php
                    session_start();

                    $servername = "localhost";
                    $username = "root";
                    $dbname = "KasuManagementSystem";

                    $conn = new mysqli($servername, $username, "", $dbname);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }


                    if (isset($_POST['signup'])) {

                        $username =  $_POST['username'];
                        $first_name =  $_POST['firstname'];
                        $last_name = $_POST['lastname'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];

                        $sql = "SELECT * FROM Users WHERE Users.username='" . $username . "'";
                        $result = $conn->query($sql);

                        $resultCount = $result->num_rows;

                        if ($resultCount > 0) {
                            echo "Username already taken. Please try again!";
                        } else {

                            $stmt1 = $conn->prepare("INSERT INTO Users (user_id, username, user_fn, user_ln, user_email, user_pass) VALUES (?, ?, ?, ?, ?, ?)");
                            $stmt1->bind_param("isssss", $uid, $uname, $fname, $lname, $Uemail, $upass);

                            $fname = $first_name;
                            $lname = $last_name;
                            $uname = $username;
                            $Uemail = $email;
                            $upass = $password;
                            $stmt1->execute();


                            $stmt1 = $conn->prepare("INSERT INTO History_Log (history_id, log_date, log_title, log_details, username) VALUES (?, NOW(), ?, ?, ?)");
                            $stmt1->bind_param("isss", $hid, $logtitle, $logdetails, $user);


                            $logtitle = "User signed in";
                            $logdetails = $user_name . " has signed in";
                            $user = $_SESSION['username'];
                            $stmt1->execute();

                            $_SESSION['username'] = $username;
                            echo "<script> location.href='index.php'; </script>";
                            exit;
                        }
                    }

                    ?>
                </div>


            </div>
        </div>
    </div>
</body>

</html>