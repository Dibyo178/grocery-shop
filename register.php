

<!DOCTYPE html>
<html class="no-js" lang="en">

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
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>




</head>

<body>


	<?php 
	
	 include './header.php';

	 include_once "./connectdb.php";
	 include_once "./connection.php";
	 
	 if (isset($_POST['btn_send'])) {
		 $reg_name = $_POST['reg_name'];
		 $reg_num = $_POST['reg_num'];
	 
		 // Prepare the statement
		 $insert = $pdo->prepare("INSERT INTO login(name, mobile) VALUES(:pname, :mobile)"); 
		 $insert->bindParam(':pname', $reg_name); 
		 $insert->bindParam(':mobile', $reg_num);
	 
		 try {
			 if ($insert->execute()) {
				 // Use SweetAlert to show a success message and redirect
				 echo '<script type="text/javascript">
					 jQuery(function validation(){
						 swal({
							 title: "Add Registration Successful!",
							 text: "Data Added",
							 icon: "success",
							 button: "Ok",
						 }).then((value) => {
							 window.location.href = "login.php"; // Redirect to login.php
						 });
					 });
				 </script>';
			 } else {
				 echo '<script type="text/javascript">
					 jQuery(function validation(){
						 swal({
							 title: "ERROR!",
							 text: "Add Registration Failed",
							 icon: "error",
							 button: "Ok",
						 });
					 });
				 </script>';
			 }
		 } catch (PDOException $e) {
			 echo '<script type="text/javascript">
				 jQuery(function validation(){
					 swal({
						 title: "ERROR!",
						 text: "'.$e->getMessage().'",
						 icon: "error",
						 button: "Ok",
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
							<h2>Create your account</h2>
							<form action="" method="post">
								<div class="single-field">
									<input type="text" name="reg_name" placeholder="UserName">
									<i class="fas fa-user"></i>
								</div>
								<div class="single-field">
									<input type="number" name="reg_num" placeholder="Mobile Number">
									<i class="fa-solid fa-phone"></i>
								</div>


								<div class="single-field mb-0">
									<button class="button-1" name="btn_send" type="submit">Create Account</button>
								</div>
							</form>
						</div>
						<div class="lr-user-holder-botm">
							<p>Already have an account? <a href="login.php">Log In</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Login Register Content -->



	<!-- Start Footer Area -->

	<?php include './footer.php'; ?>
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

	<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>

</html>