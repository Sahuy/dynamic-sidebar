<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["full_name"];
    $email = $_POST["email_id"];
    $phone = $_POST["mobile_number"];
    $password = $_POST["password"];

    
        $ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $emailExistsQuery = "SELECT COUNT(*) as email_count FROM assdt_users WHERE email_id='$email'";
        $result = $mysqli->query($emailExistsQuery);
        $row = $result->fetch_assoc();
        
        if ($row['email_count'] > 0) {
            echo "Error: Email already exists.";
        } else {
        
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO assdt_users (full_name, email_id, mobile_number, password, last_login_ip) VALUES ('$name', '$email', '$phone', '$hashed_password', '$ip')";
        
            if ($mysqli->query($query) === TRUE) {
                header("Location: login.php");
            } else {
                echo "Error: " . $query . "<br>" . $mysqli->error;
            }
        }
    

    $mysqli->close();
}
?>

<!DOCTYPE html>
<head>
<title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Registration :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
<div class="reg-w3">
<div class="w3layouts-main">
	<h2>Register Now</h2>
		<form id="myForm" action="register.php" method="post">
			<input type="text" class="ggg" id="full_name" name="full_name" placeholder="NAME">
			<input type="email" class="ggg" id="email_id" name="email_id" placeholder="E-MAIL">
            <span id="email-error" class="text-danger"></span>
			<input type="text" class="ggg" id="mobile_number" name="mobile_number" placeholder="PHONE">
			<input type="password" class="ggg" id="password" name="password" placeholder="PASSWORD">
			<h4><input type="checkbox" />I agree to the Terms of Service and Privacy Policy</h4>
			
				<div class="clearfix"></div>
				<input type="submit" value="submit" name="register">
		</form>
		<p>Already Registered.<a href="login.php">Login</a></p>
</div>
</div>
 <script>
    $(document).ready(function(){
        $("#myForm").submit(function(event){
             
        if($("#full_name").val() === ""){
            alert("Name is required");
            event.preventDefault();
        }
        
        // Email validation
        var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if(!emailRegex.test($("#email_id").val())){
            alert("Invalid email format");
            event.preventDefault();
        }

        var phoneRegex = /^[0-9]{10}$/;
        if(!phoneRegex.test($("#mobile_number").val())){
            alert("Invalid phone number format");
            event.preventDefault();
        }

        // Password validation
        if($("#password").val().length < 8){
            alert("Password should be at least 8 characters long");
            event.preventDefault();
        }
    });
});

</script>  

<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
