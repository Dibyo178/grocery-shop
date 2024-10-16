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

</style>

<body>

    <?php include './header.php'; ?>
    <!-- End Mincart Section -->

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
                            <form>
                                <div class="form-group mb-3">
                                    <label class="form-label">Have a Coupon Code?</label>
                                    <input type="text" class="form-control" placeholder="xxxx">
                                </div>
                                <button class="button-1">Apply</button>
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

<script>
    function displayCartItems() {
    const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
    const taxValue = parseFloat(localStorage.getItem('taxValue')) || 0; // Get tax value from local storage
    const cartTableBody = document.getElementById('cart-items');
    cartTableBody.innerHTML = ''; // Clear existing items

    var subtotal = 0;
    let initialTaxValue = 0;

    // Iterate through the cart items
    cartItems.forEach(item => {
        const row = document.createElement('tr');

        const subtotalPrice = parseFloat(item.price) * parseInt(item.quantity || 1);
        subtotal += subtotalPrice;

        const findTaxValue = parseFloat(item.taxValue);
        initialTaxValue += findTaxValue;

        // Create table rows for each cart item
        row.innerHTML = `
            <td class="text-center product-thumbnail">
                <a href="#"><img src="${item.image}" alt="product"></a>
            </td>
            <td class="text-center product-name">
                <a href="#">${item.name}</a>
            </td>
            <td class="text-center product-price-cart">
                <span class="amount">¥${parseFloat(item.price).toFixed(2)}</span>
            </td>
            <td class="text-center product-quantity">
                <div class="quantity-container">
                    <button class="decrement" onclick="updateQuantity('${item.id}', -1)">-</button>
                    <input type="number" min="1" value="${item.quantity || 1}" id="qty-${item.id}" readonly>
                    <button class="increment" onclick="updateQuantity('${item.id}', 1)">+</button>
                </div>
            </td>
            <td class="text-center product-subtotal">
                <span class="amount">¥${subtotalPrice.toFixed(2)}</span>
            </td>
            <td class="product-remove text-center">
                <a href="#" onclick="removeItem('${item.id}')"><i class="fas fa-times"></i></a>
            </td>
        `;
        cartTableBody.appendChild(row);
    });

    // Calculate grand total including subtotal and initial tax value
    const grandTotal = (subtotal + initialTaxValue).toFixed(2);

    // Update the displayed subtotal, tax, and grand total
    document.getElementById('subtotal').innerText = `¥${subtotal.toFixed(2)}`;
    document.getElementById('tax').innerText = `¥${initialTaxValue.toFixed(2)}`;
    document.getElementById('grand-total').innerText = `¥${grandTotal}`;
}

// Function to update quantity
function updateQuantity(itemId, change) {
    const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
    const item = cartItems.find(i => i.id === itemId);

    if (item) {
        let newQty = item.quantity + change;

        // Ensure quantity is not less than 1
        if (newQty < 1) {
            newQty = 1;
        }

        item.quantity = newQty;
        localStorage.setItem('cart', JSON.stringify(cartItems)); // Update local storage
        displayCartItems(); // Refresh the displayed cart items
    }
}

// Function to remove an item from the cart
function removeItem(itemId) {
    const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
    const updatedCart = cartItems.filter(item => item.id !== itemId);
    localStorage.setItem('cart', JSON.stringify(updatedCart));
    displayCartItems(); // Refresh the displayed cart items
}

// Call the displayCartItems function on page load
document.addEventListener('DOMContentLoaded', displayCartItems);

</script>

</body>

</html>
