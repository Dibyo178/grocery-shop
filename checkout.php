<!DOCTYPE html>
<html  class="no-js" lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Zaman Halal Food</title>

	 <link rel="shortcut icon" href="./assets/logo/final_logo/Zaman-Halal-Food-Icon-Resize.png" type="image/x-icon">

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

</head>
<body>

   <?php include './header.php'; ?>
	<!-- End Mincart Section -->

	<!-- Start Breadcrumb Area -->
	<section class="breadcrumb-area pt-100 pb-100" style="background-image:url('assets/discount-images/checkout.png');">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="breadcrumb-content">
						<h2 style="color:black
					">Checkout</h2>
						<ul>
							<li><a href="index.html" style="color:black
					">Home</a></li>
							<li><i class="fas fa-angle-double-right" style="color:black
					"></i></li>
							<li style="color:black
					">Checkout</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section> 
	<!-- End Breadcrumb Area -->

	<!-- Start Checkout Page -->
	<form method="post" action="">

	<section class="section-padding-2">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mb-30">
					<div class="checkout-form-main">
						<h2>Billing details</h2>
						<form action="#">
							<div class="row">
								<div class="col-md-6">
									<div class="input-field">
										<label>First Name <span style="color:red">*</span> </label>
										<input type="text" required="required" name="namme" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-field">
										<label>Last name <span style="color:red">*</span></label>
										<input type="text" required="required" name="lnamme">
									</div>
								</div>
								<div class="col-12">
									<div class="input-field">
										<label>Home Address <span style="color:red">*</span></label>
										<input type="text" name="address" >
									</div>
								</div>
						
								<div class="col-12">
									<div class="input-field">
										<label>Phone <span style="color:red">*</span> </label>
										<input type="text" name="phone" >
									</div>
								</div>
								<div class="col-12">
									<div class="input-field">
										<label>Country <span style="color:red">*</span> </label>
										<input type="text" name="phone" value="Japan" readonly style="outline:none" >
									</div>
								</div>
								<div class="col-12">
									<div class="input-field">
										<label>Delivery Area <span style="color:red">*</span> </label>
										<select name="country">
											<option value="20">United Kingdom</option>
											<option value="20">China</option>
											<option value="40">United Arab Emirates</option>
											<option value="3">Germany</option>
											<option value="4">France</option>
											<option value="5">Japan</option>
											<option value="6">Bangladesh</option>
											<option value="7">India</option>
											<option value="8">London</option>
											<option value="9">Afghanistan</option>
										</select>
									</div>
								</div>
								<div class="col-12">
									<div class="input-field">
										<label>Time Slot <span style="color:red">*</span> </label>
										<input type="time" name="zip" width="200px" >
									</div>
								</div>
								<!-- <div class="col-12">
									<div class="input-field">
										<div class="form-check">
	                                    	<label class="inline">
	                                    		<input class="form-check-input" type="checkbox">
	                                    		<span class="input"></span>Ship to a different address?
	                                    	</label>
										</div>
									</div>
								</div> -->
								<!-- <div class="col-12">
									<div class="input-field">
										<label>Order notes (Optional) </label>
										<textarea name="ordernote" ></textarea>
									</div>
								</div> -->
							</div>
						</form>
					</div>
				</div>
				<div class="col-lg-4 mb-30">
					<div class="checkout-summery mb-30">
						<h2>Checkout summary</h2>
						<ul>
							<li>Subtotal <span>¥530.00</span></li>
							<li>Shipping <span>¥530.00</span></li>
							<li>Total Tax <span>¥530.00</span></li>
							<li>Coupon <span>¥0.00</span></li>
							<li>Total <span>¥530.00</span></li>
							<li><b>Payable Total</b><span><b>¥530.00</b></span></li>
						</ul>
					</div>
					<div class="checkout-summery">
						<h2>Payment method</h2>
						<div class="form-check">
                        	<label class="inline">
                        		<input class="form-check-input" type="checkbox">
                        		<span class="input"></span>Direct bank transfer 
                        	</label>
                        </div>
                        <div class="form-check">
                        	<label class="inline">
                        		<input class="form-check-input" type="checkbox">
                        		<span class="input"></span>Cash on delivery 
                        	</label>
                        </div>
                        <div class="form-check">
                        	<label class="inline">
                        		<input class="form-check-input" type="checkbox">
                        		<span class="input"></span>Check payments 
                        	</label>
                        </div>
                        <div class="form-check">
                        	<label class="inline">
                        		<input class="form-check-input" type="checkbox">
                        		<span class="input"></span>PayPal 
                        	</label>
						</div>
						<button type="submit" class="button-1 mt-10">Place Order</button>
					</div>
				</div>
			</div>
		</div>
	</section>
		
	</form>

	<!-- End Checkout Page -->
	
	
	

	<!-- Start Footer Area -->
	<?php include 'footer.php'; ?>
	<!-- End Footer Area -->

	<div class="scroll-area">
       <i class="fa fa-angle-up"></i>
    </div>


    <!-- Js File -->
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