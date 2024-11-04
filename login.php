<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



<!DOCTYPE html>
<html  class="no-js" lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Zaman Halal Food</title>

	 <link rel="shortcut icon" href="./assets/logo/favicon.png" type="image/x-icon">

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap-icons.css">
	<link rel="stylesheet" href="assets/css/fontawesome.all.min.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="assets/css/nice-select.css">
	<link rel="stylesheet" href="assets/css/animate.css">
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<link rel="stylesheet" href="assets/css/normalize.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body>

 <?php 
 include './header.php'; 

 include_once './connectdb.php';
include_once "./connection.php";

error_reporting(E_ERROR | E_PARSE);
session_start();

if (isset($_POST['btn_login'])) {
    $username = $_POST['number'];

    // Prepare and execute the query
    $select = $pdo->prepare("SELECT * FROM login WHERE mobile = :mobile");
    $select->bindParam(':mobile', $username, PDO::PARAM_STR);
    $select->execute();
    $row = $select->fetch(PDO::FETCH_ASSOC);

    // Check if user exists and handle login
    if ($row && $row['mobile'] === $username) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['mobile'] = $row['mobile'];

        echo '<script type="text/javascript">
            jQuery(function validation() {
                swal({
                    title: "Successfully Logged in!",
                    text: "Welcome, ' . $_SESSION['name'] . '!",
                    icon: "success",
                    button: "Ok",
                }).then(() => {
                    window.location.href = "index.php"; // Redirect after alert
                });
            });
        </script>';
    } else {
        echo '<script type="text/javascript">
            jQuery(function validation() {
                swal({
                    title: "Incorrect Contact Number!",
                    text: "Please try again.",
                    icon: "error",
                    button: "OK",
                });
            });
        </script>';
    }
}
 ?>

	<!-- Start Login Register Content -->
	<div class="lr-page pt-100 pb-100">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="lr-user-holder">
						<div class="lr-user-holder-form">
							<h2>Log in to Your Account</h2>
							<form action="" method="post">
								<div class="single-field">
									<input type="number" name="number" placeholder="Mobile Number">
									<i class="fa-solid fa-phone"></i>
								</div>
								<!-- <div class="single-field">
									<input type="password" name="password" placeholder="Password">
									<i class="fas fa-lock"></i>
								</div> -->
								<div class="single-field mb-0">
									<button class="button-1" name="btn_login" type="submit">Login In</button>
								</div>
							</form>
						</div>
						<div class="lr-user-holder-botm">
							<p>Dont have an account? <a href="register.php">Sign In</a></p>
							<!-- <p class="forget pt-5">Loass Your Password ! <a href="#">Forgot Password?</a></p> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Login Register Content -->
	

	<!-- Start Footer Area -->
	<?php  include './footer.php'; ?>
	<!-- End Footer Area -->

	<div class="scroll-area">
       <i class="fa fa-angle-up"></i>
    </div>

 
    <!-- Js File -->
	<script src="./assets/js/cart.js"></script>
    <script src="assets/js/modernizr.min.js"></script>
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/ajax-form.js"></script>
    <script src="assets/js/mobile-menu.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>