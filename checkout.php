<?php

include './connectdb.php';
include './connection.php';

error_reporting(E_ERROR | E_PARSE);
session_start();
$username = isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest';
$mobile = isset($_SESSION['mobile']) ? $_SESSION['mobile'] : 'Not set';

// Fetch user data
$view = mysqli_query($con, "select * from login where mobile =  '$mobile' ");
$data = mysqli_fetch_assoc($view);
$address = $data['address'];

$points = $data['points'];

// Fetch temporary cart data
$view1 = mysqli_query($con, "select * from temporary_cart where mobile =  '$mobile' ");
$data1 = mysqli_fetch_assoc($view1);
$random_id = $data1['random_id'];
$discount = $data1['discount'];
$tax = $data1['tax'];
$subtotal = $data1['subtotal'];
$grand_total = $data1['grand_total'];

// insert data


if(isset($_POST['placeorder'])){
    
    $random_id=$_POST['random_id'];
    
    $name=$_POST["name"];
//    $tax=$_POST['txttax'];
    $address=$_POST['address'];
    $mobile=$_POST['mobile'];
    $country=$_POST['country'];
    $text_select=$_POST['text_select'];
    $time=$_POST['time'];
    $subtotal=$_POST['subtotal'];
    $shippingCost=$_POST['shippingCost'];
    
    $tax=$_POST['tax'];
    
    $discount=$_POST['discount'];

    $usedPoints=$_POST['usedPoints'];

    $grand_total=$_POST['grand_total'];

    $form_check_input=$_POST['form_check_input'];

    

    // Prepare and execute insert statement for the orders table
    $insert = $pdo->prepare("INSERT INTO orders(phone, address, delivery, country, random_id, amount, tax, coupon, amount_paid) 
                             VALUES(:phone, :address, :delivery, :country, :random_id, :amount, :tax, :coupon, :amount_paid)");

    $insert->bindParam(':phone', $mobile);
    $insert->bindParam(':address', $address);
    $insert->bindParam(':delivery', $text_select);
    $insert->bindParam(':country', $country);
    $insert->bindParam(':random_id', $random_id);
    $insert->bindParam(':amount', $subtotal);
    $insert->bindParam(':tax', $tax);
    $insert->bindParam(':coupon', $discount);
    $insert->bindParam(':amount_paid', $grand_total);

    $insert->execute();
    
    
    
    
    
    
    
    
    
   
    
    
    
    
}        
        
   

if ($_SESSION['name']) {

	?>

	<!DOCTYPE html>
	<html class="no-js" lang="en">

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
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
		<!-- SweetAlert CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

		<!-- SweetAlert JS -->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>


	</head>
	<style>
		/* Custom styles for the select dropdown */
		.input-field select {
			width: 100%;
			padding: 12px 15px;
			border: 1px solid #ccc;
			border-radius: 4px;
			appearance: none;
			/* Remove default dropdown arrow */
			background-color: #fff;
			background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="none" viewBox="0 0 10 10"><path fill="%23333" d="M5 7.5L2.5 5h5L5 7.5z"/></svg>');
			/* Custom dropdown arrow */
			background-repeat: no-repeat;
			background-position: right 10px center;
			/* Positioning the arrow */
			background-size: 10px;
			/* Size of the arrow */
		}

		/* Style for the select dropdown on focus */
		.input-field select:focus {
			border-color: #007bff;
			/* Border color on focus */
			outline: none;
			/* Remove outline */
			box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
			/* Shadow on focus */
		}

		/* Optional: Make the select dropdown larger on mobile devices */
		@media (max-width: 576px) {
			.input-field select {
				padding: 10px;
				/* Adjust padding for smaller screens */
			}
		}
	</style>

	<body>

		<!-- Start Breadcrumb Area -->
		<section class="breadcrumb-area pt-100 pb-100" style="background-image:url('assets/discount-images/checkout.png');">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="breadcrumb-content">
							<h2 style="color:black
					">Checkout</h2>
							<ul>
								<!-- <li><a href="index.html" style="color:black
					">Home</a></li> -->
								<!-- <li><i class="fas fa-angle-double-right" style="color:black
					"></i></li> -->
								<!-- <li style="color:black
					">Checkout</li> -->
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

								<div class="col-md-6" style="display:none">
									<div class="input-field">
										<label>Points</label>
										<input type="text" name="points" required="required" value="<?php echo $points; ?>"
											readonly>
									</div>
								</div>


								<div class="row">
									<div class="col-md-6" style="display:none">
										<div class="input-field">
											<label>Random ID</label>
											<input type="text" name="random_id" required="required"
												value="<?php echo $random_id; ?>" readonly>
										</div>
									</div>


									<div class="col-md-6">
										<div class="input-field">
											<label>Name <span style="color:red">*</span></label>
											<input type="text" name="name" required="required"
												value="<?php echo $username; ?>" readonly>
										</div>
									</div>

									<div class="col-12">
										<div class="input-field">
											<label>Home Address <span style="color:red">*</span></label>
											<input type="text" name="address" value="<?php echo $address; ?>" readonly>
										</div>
									</div>

									<div class="col-12">
										<div class="input-field">
											<label>Phone <span style="color:red">*</span></label>
											<input type="text" name="mobile" value="<?php echo $mobile; ?>" readonly>
										</div>
									</div>
									<div class="col-12">
										<div class="input-field">
											<label>Country</label>
											<input type="text" name="country" value="Japan" readonly>
										</div>
									</div>
									<!-- Delivery Area Dropdown -->
									<div class="col-12">
										<div class="input-field">
											<label>Delivery Area <span style="color:red">*</span> </label>
											<select name="text_select" id="deliveryArea">
												<?php
												$index = 1;
												$view = mysqli_query($con, "select * from area ");
												while ($data = mysqli_fetch_assoc($view)) {
													$area = $data['area'];
													$price = $data['price'];
													?>
													<option value="<?php echo $price; ?>"><?php echo $area; ?></option>
													<?php
													$index++;
												} ?>
											</select>
										</div>
									</div>

									<div class="col-12">
										<div class="input-field">
											<label>Delivery Time <span style="color:red">*</span></label>
											<input type="time" name="time">
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Checkout Summary -->
						<div class="col-lg-4 mb-30">
							<div class="checkout-summery mb-30">
								<h2>Checkout summary</h2>
								<ul>
									<li>Subtotal <span>¥<?php echo $subtotal; ?></span></li>
									<li>Shipping <span id="shippingCost">¥0.00</span></li>
									<li>Total Tax <span>¥<?php echo $tax; ?></span></li>
									<li>Coupon <span>¥<?php echo $discount; ?></span></li>

									<li>Use Points <small style="font-weight:700">(-)</small><span id="usedPoints">
											¥00</span></li>
									<li><b>Payable Total</b><span><b
												id="payableTotal">¥<?php echo $grand_total; ?></b></span></li>
								</ul>
							</div>


							<!-- Hidden fields for form submission -->
							<input type="hidden" name="subtotal" value="<?php echo $subtotal; ?>">
							<input type="hidden" name="shippingCost" id="hiddenShippingCost" value="0.00">
							<input type="hidden" name="tax" value="<?php echo $tax; ?>">
							<input type="hidden" name="discount" value="<?php echo $discount; ?>">
							<input type="hidden" name="usedPoints" id="hiddenUsedPoints" value="0">
							<input type="hidden" name="grand_total" id="hiddenPayableTotal"
								value="<?php echo $grand_total; ?>">

							<div class="checkout-summery">
								<h2>Payment method</h2>
								<div class="form-check">
									<label class="inline">
										<input class="form-check-input" name="form_check_input" checked type="checkbox" id="cashOnDelivery">
										<span class="input"></span>Cash on delivery
									</label>
								</div>

								<?php

								if ($points >= 100) {



									?>

									<div class="form-check">
										<label class="inline">
											<input class="form-check-input" name="form_check_input" type="checkbox" id="usePoints">
											<span class="input"></span>Use Points
										</label>
									</div>

									<?php

								} else {



									?>

									<div class="form-check">
										<label class="inline">
											<input class="form-check-input" type="checkbox" id="usePointsunchecked">
											<span class="input"></span>Use Points
										</label>
									</div>


									<?php

								}

								?>


								<input style="display: none;" id="user-points" type="" name="use-points" value="">

								<button type="submit" name="placeorder" class="button-1 mt-10">Place Order</button>
							</div>
						</div>
					</div>
				</div>
			</section>
		</form>
		<!-- End Checkout Page -->

		<!-- Footer Area -->
		<?php include 'footer.php'; ?>

		<!-- Js Files -->

		<script src="./assets/js/cart.js"></script>
		<script src="assets/js/modernizr.min.js"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/jquery.nice-select.min.js"></script>
		<script src="assets/js/jquery-3.5.1.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/owl.carousel.min.js"></script>
		<script src="assets/js/jquery.nice-select.min.js"></script>
		<script src="assets/js/jquery.magnific-popup.min.js"></script>
		<script src="assets/js/script.js"></script>
		<script src="assets/js/mobile-menu.js"></script>
		<script src="assets/js/script.js"></script>
		<script src="assets/js/wow.min.js"></script>
		<script src="assets/js/ajax-form.js"></script>

		<!-- JavaScript to update Shipping and Payable Total values dynamically -->
		<script>
			document.addEventListener("DOMContentLoaded", function () {
				const deliveryAreaSelect = document.getElementById('deliveryArea');
				const shippingCostElement = document.getElementById('shippingCost');
				const payableTotalElement = document.getElementById('payableTotal');

				const subtotal = <?php echo $subtotal; ?>;
				const tax = <?php echo $tax; ?>;
				const discount = <?php echo $discount; ?>;

				function updateTotals() {
					const shippingCost = parseFloat(deliveryAreaSelect.value) || 0;
					shippingCostElement.textContent = `¥${shippingCost.toFixed(2)}`;
					const grandTotal = subtotal + tax - discount + shippingCost;
					payableTotalElement.textContent = `¥${grandTotal.toFixed(2)}`;
					console.log("Shipping Cost:", shippingCost, "Updated Payable Total:", grandTotal);
				}

				deliveryAreaSelect.addEventListener('change', updateTotals);
				updateTotals();
			});
		</script>

		<script>
			$(document).ready(function () {
				$('#deliveryArea').select2({
					minimumResultsForSearch: Infinity, // Disable search box
					width: '100%' // Make the dropdown full width
				});
			});
		</script>
		<script>
			document.addEventListener("DOMContentLoaded", function () {
				const usePointsCheckbox = document.getElementById('usePoints');
				const cashOnDeliveryCheckbox = document.getElementById('cashOnDelivery');
				const payableTotalElement = document.getElementById('payableTotal');
				const usedPointsElement = document.getElementById('usedPoints');
				const pointsValue = 100; // Amount to deduct for points usage
				let pointsUsed = false; // Track if points have been used

				// Function to parse the payable total to a number
				function getPayableTotal() {
					return parseFloat(payableTotalElement.textContent.replace('¥', '').replace(',', ''));
				}

				// Update the displayed total with points deduction
				function updatePayableTotal() {
					const currentTotal = getPayableTotal();
					let updatedTotal = currentTotal;

					// Check if points can be used (if checked and sufficient points exist)
					if (usePointsCheckbox.checked && !pointsUsed) {
						updatedTotal -= pointsValue; // Deduct the points value
						usedPointsElement.textContent = `¥${pointsValue}`; // Display the used points
						pointsUsed = true; // Set flag to true indicating points have been used
						usePointsCheckbox.disabled = true; // Disable the checkbox after using points
					} else if (!usePointsCheckbox.checked) {
						pointsUsed = false; // Reset the flag if points checkbox is unchecked
						usedPointsElement.textContent = `¥00`; // Reset used points display
					}

					// Update payable total display
					payableTotalElement.textContent = `¥${updatedTotal.toFixed(2)}`; // Format the output
				}

				// Handle using points checkbox change
				usePointsCheckbox.addEventListener('change', function () {
					if (usePointsCheckbox.checked) {
						cashOnDeliveryCheckbox.checked = false; // Uncheck cash on delivery if using points
						updatePayableTotal(); // Update totals when checkbox state changes
					}
				});

				// Handle cash on delivery checkbox change
				cashOnDeliveryCheckbox.addEventListener('change', function () {
					if (cashOnDeliveryCheckbox.checked) {
						usePointsCheckbox.checked = false; // Uncheck use points if cash on delivery is selected
						usedPointsElement.textContent = `¥00`; // Reset used points display
						pointsUsed = false; // Reset points used flag
						usePointsCheckbox.disabled = false; // Re-enable points checkbox
					}

					location.reload();

					updatePayableTotal(); // Recalculate total when changing payment method
				});

				// Initial calculation on page load
				updatePayableTotal();
			});
		</script>




		<script>
			document.addEventListener('DOMContentLoaded', function () {
				const usePointsCheckbox = document.getElementById('usePointsunchecked');
				const pointsValue = 100; // You can replace this with a dynamic value from PHP if needed

				usePointsCheckbox.addEventListener('change', function () {
					if (this.checked) {
						// Show SweetAlert when the checkbox is checked
						Swal.fire({
							title: 'Use Points',
							text: `Your points are ${pointsValue}. Do you want to use them?`,
							icon: 'info',

							confirmButtonText: 'Ok',

						}).then((result) => {


							// User did not confirm, uncheck the checkbox
							usePointsCheckbox.checked = false;

						});
					}
				});
			});
		</script>



	</body>

	</html>

	<?php
} else {
	header("Location: login.php");
}
?>