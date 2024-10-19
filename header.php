<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Zaman Halal Food</title>
    <!-- <link rel="icon" href="assets/logo/favicon.png" type="image/gif" sizes="16x16"> -->
    <!-- <link rel="icon" href="assets/img/icon.png" type="image/gif" sizes="18x18">
    <link rel="icon" href="assets/img/icon.png" type="image/gif" sizes="20x20"> -->


    <link rel="shortcut icon" href="./assets/logo/favicon.png" type="image/x-icon">
    <!-- #region  link-->
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

    <!-- update link -->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- jquery cdn -->

    <script src="lightbox-plus-jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- jquery cdn -->

    <script src="lightbox-plus-jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- update js -->


    <!-- update js -->




</head>

<style>
    /* Minicart Products Container */
    #minicart-products {
        display: flex;
        flex-direction: column;
        /* Set to column for a list display */
        max-height: 400px;
        /* Adjust height as needed */
        overflow-y: auto;
        /* Enable vertical scrolling if needed */
    }

    /* Minicart Product Item */
    .minicart-product-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px;
        border-bottom: 1px solid #ddd;
        background-color: #f9f9f9;
        margin-bottom: 10px;
        transition: background-color 0.3s;
        max-width: 100%;
        /* Ensure full width */
    }

    .minicart-product-item:hover {
        background-color: #e8f5e9;
    }

    /* Flexbox layout for the product content */
    .minicart-product-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
    }

    /* Minicart Product Image */
    .minicart-product-img {
        flex-shrink: 0;
        margin-right: 15px;
    }

    .minicart-product-img img {
        width: 80px;
        /* Adjusted for list display */
        height: 60px;
        /* Adjusted for list display */
        object-fit: cover;
        border-radius: 5px;
    }

    /* Minicart Product Details */
    .minicart-product-details {
        flex-grow: 1;
        margin-right: 15px;
    }

    .minicart-product-details h4 {
        font-size: 16px;
        margin: 0;
        font-weight: 600;
        color: #333;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .minicart-product-details span {
        display: block;
        color: #666;
        font-size: 14px;
        margin-top: 5px;
    }

    /* Center the quantity control buttons */
    /* Center the quantity control buttons with Grid */
    .quantity-control {
        display: grid;
        grid-template-columns: repeat(3, auto);
        /* Three columns: minus button, quantity, plus button */
        gap: 0px;
        /* Add gap between the grid items */
        justify-content: center;
        /* Center the entire grid */
        align-items: center;
        /* Vertically center the items */
        margin-top: 5px;
    }

    .quantity-control button {
        background: #7ca440;
        color: white;
        border: none;
        padding: 5px;
        /* Small padding for compact buttons */
        width: 30px;
        /* Fixed width for smaller button size */
        height: 30px;
        /* Make the buttons square */
        cursor: pointer;
        transition: background 0.3s;
        border-radius: 5px;
        /* Rounded corners */
    }

    .quantity-control button:hover {
        background: #5b8a32;
    }

    .quantity-control span {
        font-size: 16px;
        text-align: center;
        padding: 5px;
        /* Add padding for quantity text */
        min-width: 30px;
        /* Ensure quantity span doesn't shrink too much */
        height: 30px;
        /* Keep the span height consistent with buttons */
        display: flex;
        align-items: center;
        justify-content: center;
    }


    /* Remove Button */
    .minicart-product-remove {
        flex-shrink: 0;
    }

    .minicart-product-remove button {
        background: none;
        border: none;
        font-size: 24px;
        color: #ff6f61;
        cursor: pointer;
        outline: none;
    }

    .minicart-product-remove button:hover {
        color: #e85040;
    }

    /* Minicart Header */
    #item-count {
        font-size: 18px;
        color: #7ca440;
    }

    /* Total Price and Buttons */
    .minicart-bottom .title h2 {
        font-size: 20px;
        font-weight: 700;
        color: #7ca440;
    }

    .minicart-bottom .button-b .button-2,
    .minicart-bottom .button-b .button-1 {
        display: block;
        width: 100%;
        padding: 10px;
        text-align: center;
        background-color: #7ca440;
        color: #fff;
        text-transform: uppercase;
        margin-top: 10px;
        border-radius: 5px;
    }

    .minicart-bottom .button-b .button-2 {
        background-color: #fff;
        color: #333;
        border: 1px solid #7ca440;
    }

    .minicart-bottom .button-b .button-1:hover,
    .minicart-bottom .button-b .button-2:hover {
        background-color: #5b8a32;
        color: #fff;
    }

    /* Alert Styles */
    .alert {
        background-color: #f8f9fa;
        color: #333;
        border: 1px solid #ddd;
        padding: 10px;
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1000;
        border-radius: 5px;
    }


    /* alredy  have peroduct  */

    #add-to-cart-alert {
        display: none;
        /* Initially hidden */
        background-color: #4CAF50;
        /* Green */
        color: white;
        padding: 15px;
        margin-bottom: 20px;
        position: fixed;
        z-index: 9999;
        right: 20px;
        top: 20px;
        transition: opacity 0.5s;
    }

    #add-to-cart-alert.warning {
        background-color: #f44336;
        /* Red for warning */
    }


    /* responsive iphone 12 and se  */

    @media only screen and (max-width: 390px) {



        .col-10 {
            flex: 0 0 auto;
            width: 100.333333%;
        }
    }
</style>




<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- Start Header Area -->
    <header class="header">
        <!-- Header Top -->
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 align-self-center">
                        <div class="logo d-mobile-none">
                            <a href="index.php">
                                <img src="assets/logo/final.png" alt="logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <!-- Category Or Search -->
                        <div class="select-search-option">
                            <div class="select-category">
                                <select name="cate">
                                    <option value="0">Select Category</option>
                                    <option value="1">Vegetables</option>
                                    <option value="2">Fruits</option>
                                    <option value="3">Salads</option>
                                    <option value="4">Fish & Seafood</option>
                                    <option value="5">Fresh Meat</option>
                                    <option value="6">Health Product</option>
                                    <option value="7">Butter & Eggs</option>
                                </select>
                            </div>
                            <div class="search-form">
                                <form action="#">
                                    <div class="search">
                                        <input type="text" id="search-input" placeholder="Search for items..."
                                            oninput="filterItems()" />
                                        <div id="loading"><i class="fa-solid fa-spinner fa-spin"></i></div>
                                        <div id="not-found">No items found</div>
                                        <ul id="dropdata">
                                            <li>
                                                <a href="#" style="color: black; text-decoration: none">
                                                    <div class="col-lg-6 border_part">
                                                        <div class="search_part col-lg-12">
                                                            <div class="search_img">
                                                                <img src="./assets/discount-images/bg-remove/dry-lptoa.png"
                                                                    alt="TShirt Image">
                                                            </div>
                                                            <div class="search_des">
                                                                <h3>TShirt</h3>
                                                                <p>1900 BDT</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <!-- Repeat as necessary for more items -->
                                                <a href="#" style="color: black; text-decoration: none">
                                                    <div class="col-lg-6 border_part">
                                                        <div class="search_part col-lg-12">
                                                            <div class="search_img">
                                                                <img src="./assets/discount-images/bg-remove/dry-lptoa.png"
                                                                    alt="TShirt Image">
                                                            </div>
                                                            <div class="search_des">
                                                                <h3>TShirt</h3>
                                                                <p>1900 BDT</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>

                                                <a href="#" style="color: black; text-decoration: none">
                                                    <div class="col-lg-6 border_part">
                                                        <div class="search_part col-lg-12">
                                                            <div class="search_img">
                                                                <img src="./assets/discount-images/bg-remove/dry-lptoa.png"
                                                                    alt="TShirt Image">
                                                            </div>
                                                            <div class="search_des">
                                                                <h3>TShirt</h3>
                                                                <p>1900 BDT</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>

                                                <a href="#" style="color: black; text-decoration: none">
                                                    <div class="col-lg-6 border_part">
                                                        <div class="search_part col-lg-12">
                                                            <div class="search_img">
                                                                <img src="./assets/discount-images/bg-remove/dry-lptoa.png"
                                                                    alt="TShirt Image">
                                                            </div>
                                                            <div class="search_des">
                                                                <h3>TShirt</h3>
                                                                <p>1900 BDT</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>

                                                <a href="#" style="color: black; text-decoration: none">
                                                    <div class="col-lg-6 border_part">
                                                        <div class="search_part col-lg-12">
                                                            <div class="search_img">
                                                                <img src="./assets/discount-images/bg-remove/dry-lptoa.png"
                                                                    alt="TShirt Image">
                                                            </div>
                                                            <div class="search_des">
                                                                <h3>TShirt</h3>
                                                                <p>1900 BDT</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>

                                                <a href="#" style="color: black; text-decoration: none">
                                                    <div class="col-lg-6 border_part">
                                                        <div class="search_part col-lg-12">
                                                            <div class="search_img">
                                                                <img src="./assets/discount-images/bg-remove/dry-lptoa.png"
                                                                    alt="TShirt Image">
                                                            </div>
                                                            <div class="search_des">
                                                                <h3>TShirt</h3>
                                                                <p>1900 BDT</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                
                                            </li>
                                        </ul>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Header Top Right -->
                        <div class="header-top-right">
                            <ul>
                                <li class="call">
                                    <i class="bi bi-telephone-inbound"></i>
                                    <span>+91 235 548 7548</span>
                                </li>
                                <li class="point">
                                  <span>Points</span>  <a href="wishlist.html" style="color:white;background:#7ca440;padding:10px"><i style="font-size:15px;color:white"
                                            class="fa-solid fa-yen-sign"></i> :0.05</a>
                                </li>
                                <!-- <li class="wishlist">
                                    <a href="wishlist.html"><i class="bi bi-suit-heart"></i> <span>2</span></a>
                                </li> -->
                                <li class="signin-option">
                                    <a href="login.html"><i class="far fa-user"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Bottom -->
        <div class="header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-10">
                        <!-- Logo -->
                        <div class="logo mobile-bar-logo">
                            <a href="index.php">
                                <img src="assets/logo/mobile/logo.png" alt="img">
                            </a>
                        </div>
                        <div class="mobile-bar">
                            <div class="canvas_open">
                                <a href="javascript:void(0)">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <!-- <span></span> -->
                                </a>
                            </div>
                        </div>
                        <div class="mobile-bar-wishlist-or-sign header-top-right">
                            <ul>
                                <li class="point">
                                  <span>Points</span> : <a href="wishlist.html" style="color:black"><i style="font-size:large"
                                            class="fa-solid fa-yen-sign"> </i><span> 21321 </span></a>
                                </li>

                                <!-- <li class="wishlist">
                                    <a href="wishlist.html"><i class="bi bi-suit-heart"></i> <span>2</span></a>
                                </li> -->
                                <li class="signin-option">
                                    <a href="login.html"><i class="far fa-user"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="menu">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="index.php">Home</a>
                                        
                                    </li>
                                    <li><a href="about.php">About Us</a></li>
                                    <li>
                                        <a href="./shop.php"> Shop</a>
                                    </li>
                                    <!-- <li class="menu-item-has-children">
                                        <a href="#">Page</a>
                                        <ul>
                                            <li><a href="team.html">Team</a></li>
                                            <li><a href="cart.html">Cart</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="account.html">My Account</a></li>
                                            <li><a href="login.html">Login Account</a></li>
                                            <li><a href="register.html">Register Account</a></li>
                                            <li><a href="faq.html">Faq</a></li>
                                            <li><a href="404.html">404 Error</a></li>
                                        </ul>
                                    </li> -->

                                    <li>
                                        <a href="./blog.php">Blog</a>
                                        
                                    </li>
                                    <li><a href="contact.php">Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <div class="col-2 align-self-center">
                        <div class="header-mini-cart-icon">
                            <div class="icon" id="minicart_open">
                                <i class="fas fa-shopping-basket"></i>
                                <span>0</span> <!-- Item count here -->
                            </div>
                        </div>
                    </div>
                </div>
    </header>
    <!-- Start Mobile Menu Area -->
    <div class="mobile-menu-area">

        <!--offcanvas menu area start-->
        <div class="off_canvars_overlay">

        </div>
        <div class="offcanvas_menu">
            <div class="offcanvas_menu_wrapper">
                <div class="canvas_close">
                    <a href="javascript:void(0)"><i class="fas fa-times"></i></a>
                </div>
                <div class="mobile-logo">
                    <a href="index.html">
                        <img style="width:100px" src="./assets/logo/favicon.png" alt="logo">
                    </a>
                </div>
                <div id="menu" class="text-left ">
                    <ul class="offcanvas_main_menu">
                        <li class="active">
                            <a href="./index.php">Home</a>
                        
                        </li>
                        <li class="menu-item-has-children">
                            <a href="about.html"> About Us</a>
                        </li>

                        <li>
                            <a href="./shop.php"> Shop</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Page</a>
                            <ul class="sub-menu">
                                <li><a href="team.html">Team</a></li>
                                <li><a href="cart.html">Cart</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="account.html">My Account</a></li>
                                <li><a href="login.html">Login Account</a></li>
                                <li><a href="register.html">Register Account</a></li>
                                <li><a href="faq.html">Faq</a></li>
                                <li><a href="404.html">404 Error</a></li>
                            </ul>
                        </li>

                        <li class="menu-item-has-children">
                            <a href="blog.php"> Blog</a>
                        </li>

                        
                        <li class="menu-item-has-children">
                            <a href="contact.html"> Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--offcanvas menu area end-->
    <!-- End Header Area -->
    <div class="off_canvars_overlay">

    </div>


    <!-- Start Mincart Section -->
    <div class="minicart-sidebar">
        <div class="minicart-sidebar-full">
            <div class="minicart-header">
                <div class="left">
                    <i class="bi bi-bag-fill"></i>
                    <span id="item-count">0 Item</span>
                </div>
                <div class="mini-cart-off">
                    <i class="bi bi-x-lg"></i>
                </div>
            </div>
            <div class="minicart-product-item-full" id="minicart-products">
                <!-- Product items will be added here -->
            </div>
            <div class="minicart-bottom">
                <div class="title">
                    <h2>Total : <span id="total-price">$0.00</span></h2>
                </div>
                <div class="button-b">
                    <a class="button-2" id="view-cart" href="cart.php">
                        <span>View Cart</span>
                        <i class="fa-solid fa-spinner fa-spin" id="loading-spinner" style="display:none;"></i>
                    </a>
                    <a class="button-1" href="checkout.html">Proceed Checkout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- End Mincart Section -->


    <!-- alert -->

    <!-- Progress Bar Alert -->
    <!-- Progress Bar Alert -->
    <div id="add-to-cart-alert" style="display: none; position: fixed; top: 20px; right: 20px; z-index: 1000;">
        <div class="alert alert-success" style="width: 300px;">
            <strong>Success!</strong> Product added to cart.
            <div class="progress" style="height: 5px;">
                <div class="progress-bar" role="progressbar" style="width: 100%; transition: width 2s;"></div>
            </div>
        </div>
    </div>


    <!-- End Mincart Section -->

    <script src="./assets/js/update.js"></script>


</body>

</html>