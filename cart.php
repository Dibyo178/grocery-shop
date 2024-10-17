<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Fruits - Grocery Store and Food eCommerce HTML5 Template</title>
    <link rel="icon" href="assets/img/icon.png" type="image/gif" sizes="16x16">
    <link rel="icon" href="assets/img/icon.png" type="image/gif" sizes="18x18">
    <link rel="icon" href="assets/img/icon.png" type="image/gif" sizes="20x20">

    <!-- CSS files -->
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

<style>
    .quantity-container {
        display: flex;
        justify-content: center;
        align-items: center;
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
        margin: 0 5px;
    }

    .remove {
        border: none;
        background: none;
        cursor: pointer;
    }
</style>

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
                    <a class="button-1" href="shop.html">Continue Shopping</a>
                </div>
                <div class="col-6 update-cart text-right">
                    <a class="button-1" href="#">Update Cart</a>
                </div>
            </div>
            <div class="row cart-page-check-out-area flex-row-reverse pt-4">
                <div class="col-md-6 col-lg-4">
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
                                <li class="d-flex justify-content-between align-items-center border-top pt-3 mt-3">
                                    <h6 class="me-2">Grand Total</h6>
                                    <span class="text-end text-dark" id="grand-total">¥ 0.00</span>
                                </li>
                            </ul>
                            <div class="d-grid gap-2 pt-10 mx-auto">
                                <a class="button-1" href="checkout.html">PROCEED TO CHECKOUT</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-8">
                    <div class="card">
                        <div class="card-header bg-transparent py-3">
                            <h6 class="m-0">Use Coupon Code</h6>
                        </div>
                        <div class="card-body">
                            <form id="coupon-form">
                                <div class="form-group mb-3">
                                    <label class="form-label">Have a Coupon Code?</label>
                                    <input type="text" id="coupon-code" class="form-control" placeholder="Have a Cupon Code">
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

        // Function to display cart items and calculate totals
        function displayCartItems() {
            const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
            const cartTableBody = document.getElementById('cart-items');
            cartTableBody.innerHTML = ''; // Clear existing items

            let subtotal = 0;

            // Iterate through the cart items
            cartItems.forEach(item => {
                const quantity = parseInt(item.quantity || 1);
                const itemPrice = parseFloat(item.price);
                const itemTax = parseFloat(item.taxValue) || 0;

                const subtotalPrice = itemPrice * quantity;
                subtotal += subtotalPrice;

                // Calculate tax based on quantity
                totalTax = (itemTax * quantity); // Sum of tax values
                const totalPriceWithTax = subtotalPrice + totalTax; // Total price with tax

                // Create a new row for each cart item
                const row = `
                    <tr>
                        <td class="text-center"><img src="${item.image}" width="100" alt="Product Image"></td>
                        <td class="text-center">${item.name}</td>
                        <td class="text-center">¥${itemPrice.toFixed(2)}</td>
                        <td class="text-center quantity-container">
                            <button class="decrement" data-id="${item.id}">-</button>
                            <input type="number" value="${quantity}" min="1" data-id="${item.id}" class="quantity-input" readonly>
                            <button class="increment" data-id="${item.id}">+</button>
                        </td>
                        <td class="text-center" id="item-subtotal-${item.id}">¥${totalPriceWithTax.toFixed(2)}</td>
                        <td class="text-center"><button class="remove" data-id="${item.id}">X</button></td>
                    </tr>
                `;
                cartTableBody.insertAdjacentHTML('beforeend', row);
            });

            // Update the subtotal and grand total
            const grandTotal = subtotal + totalTax; // Grand total including tax
            document.getElementById('subtotal').innerText = `¥${subtotal.toFixed(2)}`;
            document.getElementById('tax').innerText = `¥${totalTax.toFixed(2)}`;
            document.getElementById('grand-total').innerText = `¥${grandTotal.toFixed(2)}`;
        }

        // Increment quantity
        function incrementQuantity(itemId) {
            const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
            const item = cartItems.find(item => item.id === itemId);

            if (item) {
                item.quantity = parseInt(item.quantity || 1) + 1; // Increase quantity
                localStorage.setItem('cart', JSON.stringify(cartItems));
                displayCartItems();
            }
        }

        // Decrement quantity
        function decrementQuantity(itemId) {
            const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
            const item = cartItems.find(item => item.id === itemId);

            if (item && item.quantity > 1) {
                item.quantity = parseInt(item.quantity) - 1; // Decrease quantity
                localStorage.setItem('cart', JSON.stringify(cartItems));
                displayCartItems();
            }
        }

        // Remove item from cart
        function removeItem(itemId) {
            let cartItems = JSON.parse(localStorage.getItem('cart')) || [];
            cartItems = cartItems.filter(item => item.id !== itemId); // Filter out removed item
            localStorage.setItem('cart', JSON.stringify(cartItems));
            displayCartItems();
        }

        // Apply coupon code
        document.getElementById('apply-coupon').addEventListener('click', () => {
            const couponCode = document.getElementById('coupon-code').value;

            if (couponCode === 'DISCOUNT10' && !couponApplied) {
                const discount = 10; // Fixed discount amount for simplicity
                const grandTotalElement = document.getElementById('grand-total');
                let grandTotal = parseFloat(grandTotalElement.innerText.replace('$', ''));

                grandTotal -= discount; // Apply discount
                grandTotalElement.innerText = `$${grandTotal.toFixed(2)}`;
                document.getElementById('discount-message').innerText = `Coupon applied! You saved $${discount}`;
                document.getElementById('discount-message').style.display = 'block';
                couponApplied = true; // Mark coupon as applied
            } else {
                alert('Coupon is invalid or already applied.');
            }
        });

        // Event listeners for increment, decrement, and remove buttons
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('increment')) {
                incrementQuantity(e.target.dataset.id);
            } else if (e.target.classList.contains('decrement')) {
                decrementQuantity(e.target.dataset.id);
            } else if (e.target.classList.contains('remove')) {
                removeItem(e.target.dataset.id);
            }
        });

        // Initialize cart display
        displayCartItems();
    </script>
</body>

</html>
