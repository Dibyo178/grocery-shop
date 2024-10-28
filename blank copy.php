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

// Fetch temporary cart data
$view1 = mysqli_query($con, "select * from temporary_cart where mobile =  '$mobile' ");
$data1 = mysqli_fetch_assoc($view1);
$random_id = $data1['random_id'];
$discount = $data1['discount'];
$tax = $data1['tax'];
$subtotal = $data1['subtotal'];
$grand_total = $data1['grand_total'];

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

	</head>
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
                        <div class="row">
                            <div class="col-md-6" style="display:none">
                                <div class="input-field">
                                    <label>Random ID</label>
                                    <input type="text" required="required" value="<?php echo $random_id; ?>" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-field">
                                    <label>Name</label>
                                    <input type="text" required="required" value="<?php echo $username; ?>" readonly>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="input-field">
                                    <label>Home Address</label>
                                    <input type="text" value="<?php echo $address; ?>" readonly>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="input-field">
                                    <label>Phone</label>
                                    <input type="text" value="<?php echo $mobile; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-field">
                                    <label>Country</label>
                                    <input type="text" value="Japan" readonly>
                                </div>
                            </div>
                            <!-- Delivery Area Dropdown -->
                            <div class="col-12">
							<div class="input-field">
												<label>Delivery Area <span style="color:red">*</span> </label>
												<select name="country" id="deliveryArea">
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
                                    <label>Delivery Time</label>
                                    <input type="time" name="zip">
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
                            <li><b>Payable Total</b><span><b id="payableTotal">¥<?php echo $grand_total; ?></b></span></li>
                        </ul>
                    </div>

                    <div class="checkout-summery">
                        <h2>Payment method</h2>
                        <div class="form-check">
                            <label class="inline">
                                <input class="form-check-input" type="checkbox" id="cashOnDelivery">
                                <span class="input"></span>Cash on delivery
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="inline">
                                <input class="form-check-input" type="checkbox" id="usePoints">
                                <span class="input"></span>Use Points
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
    document.addEventListener("DOMContentLoaded", function() {
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

</body>
</html>

<?php
} else {
    header("Location: login.php");
}
?>