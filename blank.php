<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?php

include './connectdb.php';
include './connection.php';

error_reporting(E_ERROR | E_PARSE);
session_start();
$username = isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest';
$mobile = isset($_SESSION['mobile']) ? $_SESSION['mobile'] : 'Not set';

// Fetch user data
$view = mysqli_query($con, "SELECT * FROM login WHERE mobile =  '$mobile'");
$data = mysqli_fetch_assoc($view);
$address = $data['address'];
$points = $data['points'];

// Fetch temporary cart data
$view1 = mysqli_query($con, "SELECT * FROM temporary_cart WHERE mobile =  '$mobile'");
$data1 = mysqli_fetch_assoc($view1);
$random_id = $data1['random_id'];
$discount = $data1['discount'];
$tax = $data1['tax'];
$subtotal = $data1['subtotal'];
$grand_total = $data1['grand_total'];

// Insert data
if (isset($_POST['placeorder'])) {
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

    $insert = $pdo->prepare("INSERT INTO orders(name, phone, address, delivery, country, random_id, amount, shipping, tax, coupon, points, amount_paid, pmode, time) 
                              VALUES(:name, :phone, :address, :delivery, :country, :random_id, :amount, :shipping, :tax, :coupon, :points, :amount_paid, :pmode, :time)");
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
    $insert->bindParam(':pmode', $form_check_input);
    $insert->bindParam(':time', $time);

    if (isset($_POST['form_check_input'])) {
        $form_check_input = $_POST['form_check_input'];
    } else {
        $form_check_input = "Cash on delivery"; // Default value if none is selected
    }

    // Insert and verify success
    if ($insert->execute()) {
        // Update user points in the login table
        $newPoints = $points - $usedPoints + 1; // Deduct used points and add 1
        $updatePoints = $pdo->prepare("UPDATE login SET points = :points WHERE mobile = :mobile");
        $updatePoints->bindParam(':points', $newPoints);
        $updatePoints->bindParam(':mobile', $mobile);
        $updatePoints->execute();

        // Delete from temporary cart table after order insertion
        mysqli_query($con, "DELETE FROM temporary_cart WHERE mobile = '$mobile'");

        // SweetAlert for successful order placement
        echo '<script type="text/javascript">
            $(document).ready(function() {
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
        // SweetAlert for failed order placement
        echo '<script type="text/javascript">
            $(document).ready(function() {
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
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaman Halal Food</title>

    <link rel="shortcut icon" href="./assets/logo/final_logo/Zaman-Halal-Food-Icon-Resize.png" type="image/x-icon">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1.min.js"></script>
</head>

<body>

    <section class="breadcrumb-area pt-100 pb-100" style="background-image:url('assets/discount-images/checkout.png');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-content">
                        <h2 style="color:black">Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                                <div class="col-12">
                                    <div class="input-field">
                                        <label>Delivery Area <span style="color:red">*</span> </label>
                                        <select name="text_select" id="deliveryArea">
                                            <?php
                                            $view = mysqli_query($con, "select * from area ");
                                            while ($data = mysqli_fetch_assoc($view)) {
                                                $area = $data['area'];
                                                $price = $data['price'];
                                            ?>
                                                <option value="<?php echo $price; ?>"><?php echo $area; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="input-field">
                                        <label>Delivery Time <span style="color:red">*</span></label>
                                        <input type="text" name="time" value="<?php echo date("Y-m-d H:i:s"); ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="input-field">
                                        <label>Subtotal <span style="color:red">*</span></label>
                                        <input type="text" name="subtotal" value="<?php echo $subtotal; ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="input-field">
                                        <label>Shipping Cost <span style="color:red">*</span></label>
                                        <input type="text" name="shippingCost" value="<?php echo $discount; ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="input-field">
                                        <label>Tax <span style="color:red">*</span></label>
                                        <input type="text" name="tax" value="<?php echo $tax; ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="input-field">
                                        <label>Discount <span style="color:red">*</span></label>
                                        <input type="text" name="discount" value="<?php echo $discount; ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="input-field">
                                        <label>Grand Total <span style="color:red">*</span></label>
                                        <input type="text" name="grand_total" value="<?php echo $grand_total; ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="input-field">
                                        <label>Use Points?</label>
                                        <input type="checkbox" id="usePointsCheckbox" />
                                    </div>
                                </div>

                                <div class="col-12" id="pointsUsageSection" style="display:none;">
                                    <div class="input-field">
                                        <label>Used Points <span style="color:red">*</span></label>
                                        <input type="number" name="usedPoints" id="usedPoints" value="0" min="0" max="<?php echo $points; ?>" readonly />
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="order-summery">
                            <h2>Your Order</h2>
                            <ul>
                                <li>Subtotal <span>¥<?php echo $subtotal; ?></span></li>
                                <li>Shipping Cost <span>¥<?php echo $shippingCost; ?></span></li>
                                <li>Tax <span>¥<?php echo $tax; ?></span></li>
                                <li>Discount <span>¥<?php echo $discount; ?></span></li>
                                <li class="total">Total <span>¥<?php echo $grand_total; ?></span></li>
                            </ul>
                            <div class="place-order">
                                <input type="submit" name="placeorder" value="Place Order" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

    <script>
        // jQuery to handle checkbox event
        $(document).ready(function () {
            $('#usePointsCheckbox').change(function () {
                if (this.checked) {
                    $('#pointsUsageSection').show();
                    $('#usedPoints').val(<?php echo $points; ?>); // Set max value
                    $('#usedPoints').attr('readonly', false);
                } else {
                    $('#pointsUsageSection').hide();
                    $('#usedPoints').val(0); // Reset value
                    $('#usedPoints').attr('readonly', true);
                }
            });
        });
    </script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
}
?>
