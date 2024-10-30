<?php
include './connectdb.php';
include './connection.php';

error_reporting(E_ERROR | E_PARSE);
session_start();
$username = isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest';
$mobile = isset($_SESSION['mobile']) ? $_SESSION['mobile'] : 'Not set';

// Fetch user data
$view = mysqli_query($con, "select * from login where mobile = '$mobile'");
$data = mysqli_fetch_assoc($view);
$address = $data['address'];
$points = $data['points'];

// Fetch temporary cart data
$view1 = mysqli_query($con, "select * from temporary_cart where mobile = '$mobile'");
$data1 = mysqli_fetch_assoc($view1);
$random_id = $data1['random_id'];
$discount = $data1['discount'];
$tax = $data1['tax'];
$subtotal = $data1['subtotal'];
$grand_total = $data1['grand_total'];

// Place order and delete temporary cart data on form submission
if (isset($_POST['placeorder'])) {
	// Collect POST data
	$random_id = $_POST['random_id'];
	$name = $_POST["name"];
	$address = $_POST['address'];
	$mobile = $_POST['mobile'];
	$country = $_POST['country'];
	$text_select = $_POST['text_select'];
	$time = $_POST['time'];
	$subtotal = $_POST['subtotal'];
	$shippingCost = $_POST['shippingCost'];
	$tax = $_POST['tax'];
	$discount = $_POST['discount'];
	$usedPoints = $_POST['usedPoints'];
	$grand_total = $_POST['grand_total'];
	$form_check_input = $_POST['form_check_input'];

	// Prepare and execute insert statement for the orders table
	$insert = $pdo->prepare("INSERT INTO orders(name, phone, address, delivery, country, random_id, amount, shipping, tax, coupon, points, amount_paid) 
							 VALUES(:name, :phone, :address, :delivery, :country, :random_id, :amount, :shipping, :tax, :coupon, :points, :amount_paid)");
	$insert->bindParam(':name', $name);
	$insert->bindParam(':phone', $mobile);
	$insert->bindParam(':address', $address);
	$insert->bindParam(':delivery', $text_select);
	$insert->bindParam(':country', $country);
	$insert->bindParam(':random_id', $random_id);
	$insert->bindParam(':amount', $subtotal);
	$insert->bindParam(':shipping', $shippingCost);
	$insert->bindParam(':tax', $tax);
	$insert->bindParam(':coupon', $discount);
	$insert->bindParam(':points', $usedPoints);
	$insert->bindParam(':amount_paid', $grand_total);

	// Insert and verify success
	if ($insert->execute()) {
		// Delete from temporary cart table after order insertion
		mysqli_query($con, "DELETE FROM temporary_cart WHERE mobile = '$mobile'");

		// SweetAlert for successful order placement and redirect
		echo '<script type="text/javascript">
			jQuery(function validation() {
				swal({
					title: "Order Placed!",
					text: "Your order has been successfully placed.",
					icon: "success",
					button: "Ok",
				}).then(() => {
					localStorage.clear(); // Clear local storage on success
					window.location.href = "index.php"; // Redirect to home page
				});
			});
		</script>';
	} else {
		echo '<script type="text/javascript">
			jQuery(function validation() {
				swal({
					title: "Order Placement Failed",
					text: "Please try again.",
					icon: "error",
					button: "OK",
				});
			});
		</script>';
	}
}

if ($_SESSION['name']) {

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Zaman Halal Food</title>
	<!-- Add other styles and scripts here -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
	<!-- Start Checkout Page -->
	<form method="post" action="">
		<section class="section-padding-2">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 mb-30">
						<div class="checkout-form-main">
							<h2>Billing details</h2>
							<div class="row">
								<div class="col-md-6">
									<div class="input-field">
										<label>Name <span style="color:red">*</span></label>
										<input type="text" name="name" required="required" value="<?php echo $username; ?>" readonly>
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
								<!-- Additional form fields here -->
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
								<li>Use Points <small style="font-weight:700">(-)</small><span id="usedPoints"> ¥00</span></li>
								<li><b>Payable Total</b><span><b id="payableTotal">¥<?php echo $grand_total; ?></b></span></li>
							</ul>
						</div>
						<input type="hidden" name="subtotal" value="<?php echo $subtotal; ?>">
						<input type="hidden" name="shippingCost" id="hiddenShippingCost" value="0.00">
						<input type="hidden" name="tax" value="<?php echo $tax; ?>">
						<input type="hidden" name="discount" value="<?php echo $discount; ?>">
						<input type="hidden" name="usedPoints" id="hiddenUsedPoints" value="0">
						<input type="hidden" name="grand_total" id="hiddenPayableTotal" value="<?php echo $grand_total; ?>">

						<button type="submit" name="placeorder" class="button-1 mt-10">Place Order</button>
					</div>
				</div>
			</div>
		</section>
	</form>
	<!-- End Checkout Page -->

</body>
</html>

<?php
} else {
	header("Location: login.php");
}
?>
