<?php

include './connectdb.php';

include './connection.php';



$index = 1;

$view = mysqli_query($con, "select * from  discount ");

$data = mysqli_fetch_assoc($view);

$disciount_name = $data['token'];

$price = $data['price'];

?>


<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Include SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Include SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .quantity-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
        }

        .quantity-container button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 16px;
        }

        .quantity-container button:hover {
            background-color: #45a049;
        }

        .quantity-container input {
            width: 40px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .remove {
            border: none;
            background: none;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <?php include './header.php'; ?>

    <!-- Start Breadcrumb Area -->
    <section class="breadcrumb-area pt-100 pb-100" style="background-image:url('./assets/discount-images/cart.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-content">
                        <h2>Cart</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><i class="fas fa-angle-double-right"></i></li>
                            <li>Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Breadcrumb Area -->

    <!-- Start Cart Section -->
    <div class="section-padding">
        <div class="container">
            <div class="row table-responsive">
                <table class="table shopping-cart-tabel table-bordered align-middle">
                    <thead>
                        <tr class="text-uppercase">
                            <th class="text-center">Image</th>
                            <th class="text-center">Product Name</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Qty</th>
                            <th class="text-center">Subtotal</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="cart-items">
                        <!-- Dynamic rows will be inserted here -->
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-6">
                    <a class="button-1" href="shop.php">Continue Shopping</a>
                </div>

                <?php

                if (!$_SESSION['name']) {

                ?>

                    <div class="col-6 text-right">
                    
                        <a class="button-1" href="./login.php">Update Cart</a>
                    </div>

                <?php
                } else {

                ?>
           

                    <div class="col-6 update-cart text-right">

                    <p style="color:red">***NB: Please complete all your shopping and then update cart. </p><br>
                    
                        <a class="button-1" href="">Update Cart</a>
                    </div>

                <?php


                }

                ?>



            </div>
            <div class="row cart-page-check-out-area flex-row-reverse pt-4">
                <div class="col-md-6 col-lg-4" style="display: none;" id="checkout-area">
                    <div class="card">
                        <div class="card-header py-3">
                            <h6 class="m-0 mb-1">Order Total</h6>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="me-2 text-body">Subtotal</h6>
                                    <span class="text-end" id="subtotal">$0.00</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="me-2 text-body">Taxes</h6>
                                    <span class="text-end" id="tax">¥ 0.00</span>
                                </li>

                                <li class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="me-2 text-body">Coupon Code</h6>
                                    <span class="coupon-value">¥0.00</span>
                                </li>

                                <li class="d-flex justify-content-between align-items-center border-top pt-3 mt-3">
                                    <h6 class="me-2">Grand Total</h6>
                                    <span class="text-end text-dark" id="grand-total">¥ 0.00</span>
                                </li>
                            </ul>
                            <div class="d-grid gap-2 pt-10 mx-auto">
                                
                                <a class="button-1" href="checkout.php">PROCEED TO CHECKOUT</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-8" style="display: none;" id="checkout-cupon">
                    <div class="card">
                        <div class="card-header bg-transparent py-3">
                            <h6 class="m-0">Use Coupon Code</h6>
                        </div>
                        <div class="card-body">
                            <form id="coupon-form">
                                <div class="form-group mb-3">
                                    <label class="form-label">Have a Coupon Code?</label>
                                    <input type="text" id="coupon-code" class="form-control" placeholder="xxxx">
                                </div>
                                <button type="button" class="button-1" id="apply-coupon">Apply</button>

                                <!-- Loading Icon -->
                                <div id="loading-icon" style="display:none; text-align:center;">
                                    <img src="assets/discount-images/loading.gif" alt="Loading" style="width: 30px; height: 30px;">
                                </div>
                                <!-- Discount message -->
                                <div id="discount-message" style="display:none; color: green;"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart Section -->

    <!-- Start Footer Area -->
    <?php include './footer.php'; ?>
    <!-- End Footer Area -->

    <div class="scroll-area">
        <i class="fa fa-angle-up"></i>
    </div>

    <!-- JavaScript files -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/ajax-form.js"></script>
    <script src="assets/js/mobile-menu.js"></script>
    <script src="assets/js/modernizr.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="./assets/js/cart.js"></script>


    <script>
        let totalTax = 0; // Declare totalTax globally
        let couponApplied = false; // Flag to track if a coupon has been applied
        let couponValue = 0; // Coupon value to be displayed

        // Function to display cart items and calculate totals
        function displayCartItems() {
            const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
            const cartTableBody = document.getElementById('cart-items');
            cartTableBody.innerHTML = ''; // Clear existing items

            let subtotal = 0;
            totalTax = 0; // Reset total tax for recalculation

            // Iterate through the cart items
            cartItems.forEach(item => {
                const quantity = parseInt(item.quantity || 1);
                const itemPrice = parseFloat(item.price);
                const itemTax = parseFloat(item.taxValue) || 0;

                const subtotalPrice = itemPrice * quantity;
                subtotal += subtotalPrice;

                // Calculate total price with tax for each item
                const totalPriceWithTax = subtotalPrice + (itemTax * quantity); // Total price with tax

                totalTax += itemTax * quantity; // Accumulate total tax

                const row = document.createElement('tr');
                row.innerHTML = `
            <td class="text-center"><img src="${item.image}" alt="${item.name}" width="80"></td>
            <td class="text-center">${item.name}</td>
            <td class="text-center">¥${itemPrice.toFixed(2)}</td>
            <td class="text-center">
                <div class="quantity-container">
                    <button class="decrement" data-id="${item.id}">-</button>
                    <input type="text" value="${quantity}" class="quantity" data-id="${item.id}" readonly>
                    <button class="increment" data-id="${item.id}">+</button>
                </div>
            </td>
            <td class="text-center">¥${subtotalPrice.toFixed(2)}</td>
            <td class="text-center"><button class="remove" data-id="${item.id}"><i class="fas fa-trash"></i></button></td>
        `;
                cartTableBody.appendChild(row);
            });

            // Update subtotal and grand total
            document.getElementById('subtotal').textContent = `¥${subtotal.toFixed(2)}`;
            document.getElementById('tax').textContent = `¥${totalTax.toFixed(2)}`;
            const grandTotal = subtotal + totalTax - couponValue; // Apply coupon value only once
            document.getElementById('grand-total').textContent = `¥${grandTotal.toFixed(2)}`;

            // Update coupon value display
            document.querySelector('.coupon-value').textContent = `¥${couponValue.toFixed(2)}`;
        }

        // Remove item from cart with SweetAlert confirmation
        function removeItem(itemId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    let cartItems = JSON.parse(localStorage.getItem('cart')) || [];
                    cartItems = cartItems.filter(item => item.id !== itemId); // Filter out removed item
                    localStorage.setItem('cart', JSON.stringify(cartItems)); // Update local storage
                    displayCartItems(); // Refresh cart display

                    Swal.fire(
                        'Deleted!',
                        'Your item has been deleted.',
                        'success'
                    );
                }
            });
        }

        // Event listeners for increment, decrement, and remove buttons
        document.addEventListener('click', function(event) {
            const target = event.target;

            if (target.classList.contains('increment')) {
                const itemId = target.dataset.id; // Get item ID from the increment button
                const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
                const item = cartItems.find(item => item.id === itemId); // Find the corresponding cart item
                if (item) {
                    item.quantity = (parseInt(item.quantity) || 1) + 1; // Increment quantity
                    localStorage.setItem('cart', JSON.stringify(cartItems));
                    displayCartItems(); // Refresh cart display
                }
            } else if (target.classList.contains('decrement')) {
                const itemId = target.dataset.id; // Get item ID from the decrement button
                const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
                const item = cartItems.find(item => item.id === itemId); // Find the corresponding cart item
                if (item && item.quantity > 1) {
                    item.quantity = (parseInt(item.quantity) || 1) - 1; // Decrement quantity
                    localStorage.setItem('cart', JSON.stringify(cartItems));
                    displayCartItems(); // Refresh cart display
                }
            } else if (target.closest('.remove') || target.closest('.fa-trash')) {
                const itemId = target.closest('.remove').dataset.id; // Get item ID from the delete button
                removeItem(itemId); // Remove item from cart with confirmation
            }
        });

        // Function to apply coupon code
        // Apply coupon code functionality
        document.getElementById('apply-coupon').addEventListener('click', function() {
            const couponCode = document.getElementById('coupon-code').value.trim();

            // Check if the coupon code matches the discount token from the database
            if (couponCode === '<?php echo $disciount_name; ?>') {
                couponValue = parseFloat('<?php echo $price; ?>'); // Apply the discount price
                couponApplied = true;

                // Display success message
                document.getElementById('discount-message').style.display = 'block';
                document.getElementById('discount-message').textContent = `Coupon applied successfully! Discount: ¥${couponValue.toFixed(2)}`;
                displayCartItems(); // Refresh the cart display with the discount applied
            } else {
                // Display error message if the coupon code is invalid
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Coupon',
                    text: 'Please enter a valid coupon code.'
                });
            }
        });
        // Initialize the cart display when the page loads
        document.addEventListener('DOMContentLoaded', function() {
            displayCartItems(); // Display the cart items and calculate totals on page load
        });
    </script>



    <!-- Add SweetAlert Library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- previous code of update cart -->


    <!-- <script>
    document.addEventListener('DOMContentLoaded', function () {
    const updateCartButton = document.querySelector('.update-cart a');

    if (updateCartButton) {
        updateCartButton.addEventListener('click', function (e) {
            e.preventDefault();

            // Gather data for each item in the cart
            let cartItems = [];
            document.querySelectorAll('#cart-items tr').forEach(row => {
                let productNameElement = row.querySelector('td:nth-child(2)');
                let priceElement = row.querySelector('td:nth-child(3)');
                let qtyElement = row.querySelector('input.quantity');

                if (productNameElement && priceElement && qtyElement) {
                    let productName = productNameElement.innerText;
                    let price = parseFloat(priceElement.innerText.replace('¥', ''));
                    let qty = parseInt(qtyElement.value);

                    // Calculate subtotal for each item
                    let subtotal = price * qty;

                    // Generate a single random ID for this update
                    let randomId = Math.floor(Math.random() * 1000000); 

                    // Push item data to cartItems array
                    cartItems.push({
                        product_name: productName,
                        price: price,
                        qty: qty,
                        subtotal: subtotal,
                        random_id: randomId // Assign the same random ID to all items
                    });
                }
            });

            // Send cart items to update_cart.php
            fetch('update_cart.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(cartItems)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Cart Updated',
                        text: 'Your cart has been updated successfully!',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        // Display the checkout area
                        document.getElementById('checkout-area').style.display = 'block';
                        // Show coupon code area
                        document.getElementById('checkout-cupon').style.display = 'block';
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message,
                        confirmButtonText: 'Try Again'
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Unable to connect to the server.',
                    confirmButtonText: 'Try Again'
                });
                console.error('Error:', error);
            });
        });
    }
});

</script> -->


    <!-- end previous code  -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const updateCartButton = document.querySelector('.update-cart a');
            const proceedToCheckoutButton = document.querySelector('.button-1[href="checkout.php"]'); // Checkout button

            let latestRandomId; // To store the latest random_id

            if (updateCartButton) {
                updateCartButton.addEventListener('click', function(e) {
                    e.preventDefault();

                    let cartItems = [];
                    document.querySelectorAll('#cart-items tr').forEach(row => {
                        let productNameElement = row.querySelector('td:nth-child(2)');
                        let priceElement = row.querySelector('td:nth-child(3)');
                        let qtyElement = row.querySelector('input.quantity');

                        if (productNameElement && priceElement && qtyElement) {
                            let productName = productNameElement.innerText;
                            let price = parseFloat(priceElement.innerText.replace('¥', ''));
                            let qty = parseInt(qtyElement.value);

                            cartItems.push({
                                product_name: productName,
                                price: price,
                                qty: qty,
                                subtotal: price * qty,
                            });
                        }
                    });

                    fetch('update_cart.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify(cartItems)
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Store the random_id returned from the server
                                latestRandomId = data.random_id;

                                // Display checkout areas
                                document.getElementById('checkout-area').style.display = 'block';
                                document.getElementById('checkout-cupon').style.display = 'block';

                                Swal.fire({
                                    icon: 'success',
                                    title: 'Cart Updated',
                                    text: 'Your cart has been updated successfully!',
                                    confirmButtonText: 'OK'
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: data.message,
                                    confirmButtonText: 'Try Again'
                                });
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Unable to connect to the server.',
                                confirmButtonText: 'Try Again'
                            });
                        });
                });
            }

            // Handle "Proceed to Checkout" button click
            if (proceedToCheckoutButton) {
                proceedToCheckoutButton.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Send checkout details with latestRandomId
                    const checkoutData = {
                        random_id: latestRandomId,
                        discount: parseFloat(document.querySelector('.coupon-value').innerText.replace('¥', '') || '0'),
                        tax: parseFloat(document.getElementById('tax').innerText.replace('¥', '') || '0'),
                        subtotal: parseFloat(document.getElementById('subtotal').innerText.replace('¥', '') || '0'),
                        grand_total: parseFloat(document.getElementById('grand-total').innerText.replace('¥', '') || '0')
                    };

                    fetch('proceed_checkout.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify(checkoutData)
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                window.location.href = 'checkout.php';
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Checkout Error',
                                    text: data.message,
                                    confirmButtonText: 'Try Again'
                                });
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Unable to proceed to checkout.',
                                confirmButtonText: 'Try Again'
                            });
                        });
                });
            }
        });
    </script>
</body>

</html>