<?php

include './connectdb.php';

include './connection.php';


error_reporting(E_ERROR | E_PARSE);
session_start();
$username = isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest';
$mobile = isset($_SESSION['mobile']) ? $_SESSION['mobile'] : 'Not set';

$view = mysqli_query($con, "select * from login where mobile =  '$mobile' ");

$data = mysqli_fetch_assoc($view);


	$address= $data['address'];

?>


<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Include SweetAlert2 -->
</head>

<body>
	<!-- Preloader -->
	<?php include './header.php'; ?>

	<section class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="my-account-menu">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item" role="presentation">
								<a href="#" class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" role="tab" aria-controls="home" aria-selected="true">Dashboard <i class="fas fa-home"></i></a>
							</li>
							<li class="nav-item" role="presentation">
								<a href="#" class="nav-link" id="order-tab" data-bs-toggle="tab" data-bs-target="#order" role="tab" aria-controls="order" aria-selected="false">Orders <i class="far fa-file-alt"></i></a>
							</li>
							<li class="nav-item" role="presentation">
								<a href="#" class="nav-link" id="address-tab" data-bs-toggle="tab" data-bs-target="#address" role="tab" aria-controls="address" aria-selected="false">address <i class="fas fa-map-marker-alt"></i></a>
							</li>
							<li class="nav-item" role="presentation">
								<a href="#" class="nav-link" id="acdetails-tab" data-bs-toggle="tab" data-bs-target="#acdetails" role="tab" aria-controls="acdetails" aria-selected="false">Account Details <i class="fas fa-user"></i></a>
							</li>
							<li class="nav-item">
								<a href="logout.php" class="nav-link" title="Logout">Logout <i class="fas fa-sign-out-alt"></i></a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-9">
					<div class="my-account-main-content">
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								<div class="my-account-main-content-item">
									<h2>Dashboard</h2>
									<p>From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.</p>
								</div>
							</div>
							<div class="tab-pane fade" id="order" role="tabpanel" aria-labelledby="order-tab">
								<div class="my-account-main-content-item">
									<h2>Orders</h2>
									<div class="table-responsive text-center">
										<table class="table table-bordered table-hover">
											<thead>
												<tr>
													<th>Order</th>
													<th>Date</th>
													<th>Status</th>
													<th>Total</th>
													<th>View Order</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>Jun 22, 2019</td>
													<td>Pending</td>
													<td>$3000</td>
													<td><a href="pdf.php" class="btn btn-warning"><i style="color:#fff" class="fa-solid fa-eye"></i></a></td>
													<td><a href="#" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
								<div class="my-account-main-content-item">
									<h2>Billing Address</h2>
									<p><?php echo $address; ?></p>
									<p><strong>Mobile:</strong><?php echo $mobile;?></p>
								</div>
							</div>
							<div class="tab-pane fade" id="acdetails" role="tabpanel" aria-labelledby="acdetails-tab">
								<div class="my-account-main-content-item">
									<h2>Account details </h2>
									<form id="accountForm" method="POST">
										<div class="single-field">
											<label>Name</label>
											<input type="text" value="<?php echo $username; ?>" id="name" name="name" placeholder="Enter Your Name" required>
										</div>
										<div class="single-field">
											<label>Address</label>
											<input type="text" id="address" name="address" value="<?php echo $address;?>" placeholder="Enter Your Address" required>
										</div>
										<div class="single-field">
											<label>Mobile</label>
											<input type="text" value="<?php echo $mobile; ?>" id="mobile" name="mobile" placeholder="Enter your mobile" required>
										</div>
										<div class="single-field">
											<button class="button-1" type="submit">Save Now</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Start Footer Area -->
	<?php include 'footer.php'; ?>
	<!-- End Footer Area -->

	<div class="scroll-area">
		<i class="fa fa-angle-up"></i>
	</div>

	<!-- Js Files -->
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
		// JavaScript to handle form submission with AJAX
		document.addEventListener("DOMContentLoaded", function () {
			const accountForm = document.getElementById("accountForm");
			if (accountForm) {
				accountForm.addEventListener("submit", function(event) {
					event.preventDefault();
					const formData = new FormData(this);

					fetch("save_account.php", {
							method: "POST",
							body: formData
						})
						.then(response => response.json())
						.then(data => {
							if (data.success) {
								Swal.fire({
									icon: "success",
									title: "Saved!",
									text: "Your account details have been saved successfully.",
									confirmButtonText: "OK"
								});
							} else {
								Swal.fire({
									icon: "error",
									title: "Error!",
									text: data.message || "There was an issue saving your details.",
									confirmButtonText: "OK"
								});
							}
						})
						.catch(error => console.error("Error:", error));
				});
			}
		});
	</script>
</body>
</html>
