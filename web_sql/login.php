<?php
session_start();
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email_id"];
    $password = $_POST["password"];
    
   $query = "SELECT * FROM assdt_users WHERE email_id='$email'";
    $result = $mysqli->query($query);

    if ($result->num_rows == 1) {

        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        if (password_verify($password, $hashed_password)) {
            $_SESSION["email"] = $email;
            //echo "success";
            header("Location: Dashbaord.php");
        } else {
            echo "Invalid email or password";
        }
    } else {
        echo "Invalid email or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Include your CSS files -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/style-responsive.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/font.css" type="text/css"/>
    <link href="css/font-awesome.css" rel="stylesheet"> 
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <div class="log-w3">
        <div class="w3layouts-main">
            <h2>Sign In Now</h2>
            <form action="login.php" method="post" id="loginForm">
                <input type="email" class="ggg" name="email_id" id="email" placeholder="E-MAIL">
                <input type="password" class="ggg" name="password" id="password" placeholder="PASSWORD">
                <span><input type="checkbox" />Remember Me</span>
                <h6><a href="#">Forgot Password?</a></h6>
                <div class="clearfix"></div>
                <input type="submit" value="Sign In" name="login">
            </form>
            <div id="error-message"></div>
            <p>Don't Have an Account ?<a href="register.php">Create an account</a></p>
        </div>
    </div>

    <script>
        $(document).ready(function () {
    $("#loginForm").submit(function (event) {
        event.preventDefault();

        var email = $("#email").val();
        var password = $("#password").val();

        if (email === "") {
            alert("Email is required");
        } else if (password === "") {
            alert("Password is required");
        } else {
            $.ajax({
                type: "POST",
                url: "login.php",
                data: $(this).serialize(),
                success: function (response) {
                    console.log("Server Response: ", response);

                    if (response.trim() === "success") {
                        console.log("Login successful");
                        window.location.href = "dashboard.php";
                    } else {
                        console.log("Login failed");
                        alert("Invalid email or password");
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Request Error:", error);
                    alert("An unexpected error occurred");
                }
            });
        }
    });
});

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/jquery.scrollTo.js"></script>
</body>
</html>
