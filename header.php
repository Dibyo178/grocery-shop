<?php


include './connectdb.php';

include './connection.php';


session_start();


error_reporting(E_ERROR | E_PARSE);

$username = isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest';
$mobile = isset($_SESSION['mobile']) ? $_SESSION['mobile'] : 'Not set';



?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Zaman Halal Food</title>



    <link rel="shortcut icon" href="./assets/logo/final_logo/Zaman-Halal-Food-Icon-Resize.png" type="image/x-icon">
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


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- jquery cdn -->

    <script src="lightbox-plus-jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
        background-color: green;
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
        background-color: green;
        /* Red for warning */
    }


    /* responsive iphone 12 and se  */

    /* Responsive Styles */
    /* Media query for screens up to 768px */
    @media (max-width: 768px) {
        .select-search-option {
            flex-direction: column;
            /* Stack elements vertically */
            width: 100%;
            /* Full width */
        }

        .select-search-option .select-category {
            width: 100%;
            /* Full width */
            margin-bottom: 10px;
            /* Space between elements */
        }

        .select-search-option .search-form form {
            width: 100%;
            /* Full width */
        }

        .header-top-right {
            flex-direction: column;
            /* Stack items vertically */
            align-items: flex-start;
            /* Align items to the start */
            margin-top: 10px;
            /* Space above */
        }

        .header-top-right ul {
            display: flex;
            flex-direction: column;
            /* Stack items vertically */
            padding: 0;
            margin: 0;
        }

        .header-top-right ul li {
            margin-left: 0;
            /* Reset margin */
            margin-bottom: 10px;
            /* Space between items */
        }

        .header-top {
            padding: 10px 0;
            /* Reduce padding */
        }

        .logo {
            text-align: center;
            /* Center logo */
            margin-bottom: 10px;
            /* Space below logo */
        }

        .header-mini-cart-icon {
            justify-content: flex-end;
            /* Align to the end */
            width: 100%;
            /* Full width */
            margin-top: 10px;
            /* Space above */
        }
    }

    /* Media query for screens up to 576px */
    @media (max-width: 576px) {

        .header-top-right ul li.call i,
        .header-top-right ul li.need-help a i {
            font-size: 18px;
            /* Smaller icon size */
        }

        .header-top-right ul li span,
        .header-top-right ul li.need-help a {
            font-size: 12px;
            /* Smaller font size */
        }

        .header-top-right ul li.point a {
            padding: 0 5px;
            /* Further reduce padding */
            display: flex;
            /* Ensure flex display for proper alignment */
            margin-left: -20px;
            /* Adjust margin */
        }

        .header-top-right ul li.point {

            margin-left: -60px;
            margin-top: 10px;
        }

        .header-top-right ul li.point a i {
            font-size: 0px;
            /* Smaller icon size for small screens */

            display: none;

        }

        .header-top-right ul li.point a span {
            width: 22px;
            /* Further reduce width */
            height: 18px;
            /* Further reduce height */
            font-size: 8px;
            /* Further reduce font size */
            /* bottom: 8px; */
            right: 47px;
            /* Adjust positioning */
            margin-top: -5px;
            padding: 0 17px
        }

        .header-top-right ul li.signin-option a {

            margin-top: -25px;


        }

        .align-self-center {
            margin-top: -15px;

        }
    }

    @media (max-width: 390px) and (min-width: 375px) {

        .canvas_open a {

            width: 25px;
        }

        .mobile-bar-logo {

            width: 100px;
        }
    }


    /* Optional: Adjust the icon and dropdown styles */
    .signin-option .nav-link {
        color: #333;
        /* Set icon color */
        font-size: 18px;
        /* Adjust icon size */
        padding: 5px 10px;
        /* Adjust spacing */
    }

    .signin-option .dropdown-menu {
        min-width: 150px;
        /* Set minimum width for dropdown */
    }

    .signin-option .dropdown-menu a {
        display: flex;
        align-items: center;
    }

    .signin-option .dropdown-menu a i {
        font-size: 16px;
        /* Icon size inside dropdown */
    }

    @media (max-width: 576px) {
        .signin-option .nav-link {
            font-size: 16px;
            /* Smaller icon size */
            padding: 5px;
            /* Less padding for small screens */
        }

        .signin-option .dropdown-menu a {
            font-size: 14px;
            /* Smaller text size */
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
                            <!-- <div class="select-category">
                                <select name="cate">
                                    <option value="0">Select Category</option>
                                    <?php
                                    $select = $pdo->prepare("SELECT * FROM tbl_category ORDER BY catid DESC");
                                    $select->execute();
                                    $count = 0;

                                    while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
                                        if ($count < 10) {
                                            echo '<a href="shop.php?category=' . $row['catid'] . '"<option value="' . $row['catid'] . '" style="height: 50px; line-height: 50px;">' . $row['category'] . '</a></option>';
                                        }
                                        $count++;
                                    }
                                    ?>
                                  
                                </select>
                            </div> -->

                            <!-- part2 -->

                            <div class="select-category">
                                <select name="cate" onchange="navigateToCategory(this)">
                                    <option value="0">Select Category</option>
                                    <?php
                                    $select = $pdo->prepare("SELECT * FROM tbl_category ORDER BY catid DESC");
                                    $select->execute();
                                    $count = 0;

                                    while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
                                        if ($count < 10) {
                                            echo '<option value="shop.php?category=' . $row['catid'] . '" style="height: 50px; line-height: 50px;">' . $row['category'] . '</option>';
                                        }
                                        $count++;
                                    }
                                    ?>
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
                                    <span><a href="tel:080-6554-4316" style="color:black">080-6554-4316</a></span>
                                </li>

                                <?php

                                // Fetch user data
                                $view = mysqli_query($con, "SELECT * FROM login WHERE mobile = '$mobile'");
                                if (!$view) {
                                    die("Database query failed: " . mysqli_error($con));
                                }

                                $data = mysqli_fetch_assoc($view);

                                // Check if data is retrieved
                                if ($data) {
                                    $points = isset($data['points']) ? $data['points'] : 0; // Set to 0 if not set
                                } else {
                                    $points = 0; // Default to 0 if no user found
                                }

                                echo '

                                <li class="point">
                                    <span style="font-weight: 700;">Points :</span>
                                    <a href="#" style="color:white;background:#7ca440;padding:10px">
                                        <i style="font-size:15px;color:white" class="fa-solid fa-yen-sign"></i>
                                        ' . $points . ' 
                                    </a>
                                </li>';

                                ?>


                                <!-- <li class="wishlist">
                                    <a href="wishlist.html"><i class="bi bi-suit-heart"></i> <span>2</span></a>
                                </li> -->

                                <?php

                                if (!$_SESSION['name']) {

                                ?>
                                    <li class="signin-option">
                                        <a href="login.php"><i class="far fa-user"></i></a>
                                    </li>

                                <?php
                                } else {

                                ?>



                                    <!-- if session_name exist -->

                                    <li class="signin-option">
                                        <a href="./account.php"><i class="far fa-user"></i></a>
                                    </li>
                                <?php


                                }

                                ?>



                                <li>



                                </li>




                                <!-- end session_name exist -->

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
                                <?php

                                // Fetch user data
                                $view = mysqli_query($con, "SELECT * FROM login WHERE mobile = '$mobile'");
                                if (!$view) {
                                    die("Database query failed: " . mysqli_error($con));
                                }

                                $data = mysqli_fetch_assoc($view);

                                // Check if data is retrieved
                                if ($data) {
                                    $points = isset($data['points']) ? $data['points'] : 0; // Set to 0 if not set
                                } else {
                                    $points = 0; // Default to 0 if no user found
                                }

                                echo '
                                <li class="point">
                                    <span style="font-weight:700">Points:</span> <a href="#" style="color:black"><i
                                            style="font-size:large" class="fa-solid fa-yen-sign"> </i><span
                                            style="gap:2px;"><small>¥</small> ' . $points . '  </span></a>
                                </li>';

                                ?>

                                <!-- <li class="wishlist">
                                    <a href="wishlist.html"><i class="bi bi-suit-heart"></i> <span>2</span></a>
                                </li> -->
                                <li class="signin-option" style="display:none">
                                    <a href="login.html"><i class="far fa-user"></i></a>
                                </li>

                                <!-- if session_name exist -->

                                <li class="signin-option">
                                    <a href="./account.php"><i class="far fa-user"></i></a>
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
                                        <a href="blogpage.php">Blog</a>

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
                <!-- <div id="menu" class="text-left ">
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

                         <li>
                            category list
                         </li>


                        <li>
                            <a href="blogpage.php"> Blog</a>
                        </li>


                        <li class="menu-item-has-children">
                            <a href="contact.html"> Contact Us</a>
                        </li>
                    </ul>
                </div> -->
                <div id="menu" class="text-left">
                    <ul class="offcanvas_main_menu">
                        <li class="active"><a href="./index.php">Home</a></li>
                        <li class="menu-item-has-children"><a href="about.html">About Us</a></li>
                        <li><a href="./shop.php">Shop</a></li>

                        <!-- Category List with Dropdown Subcategories -->
                        <li class="menu-item-has-children">
                            <a href="#">Category List <i class="fa-solid fa-circle-chevron-down"></i></a>
                            <ul style="display: none;">
                                <li><a href="#">Category 1</a></li>
                                <li><a href="#">Category 2</a></li>
                                <li class="menu-item-has-children">
                                    <a href="#">Category 3</a>
                                    <ul>
                                        <li><a href="#">Subcategory 3.1</a></li>
                                        <li><a href="#">Subcategory 3.2</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Category 4</a></li>
                            </ul>
                        </li>

                        <li><a href="blogpage.php">Blog</a></li>
                        <li class="menu-item-has-children"><a href="contact.html">Contact Us</a></li>
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
                    <h2>Total : <span id="total-price">¥ 0.00</span></h2>
                </div>
                <div class="button-b">
                    <!-- <a class="button-2" id="view-cart" href="cart.php">
                        <span>View Cart</span>
                        <i class="fa-solid fa-spinner fa-spin" id="loading-spinner" style="display:none;"></i>
                    </a> -->
                    <a class="button-1 " href="cart.php"><i class="fa-solid fa-cart-shopping"></i> Checkout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- End Mincart Section -->

    <!-- Progress Bar Alert -->
    <div id="add-to-cart-alert" style="display: none; position: fixed; top: 20px; right: 20px; z-index: 1000;">
        <div class="alert alert-success" style="width: 300px;">
            <i style="font-size:20px;color:#4CAF50;font-weight:700" class="fa-regular fa-circle-check"></i><strong>
                Success!</strong> Product added to cart.
            <div class="progress" style="height: 5px;">
                <div class="progress-bar" role="progressbar" style="width: 100%; transition: width 2s;"></div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            // Handle click on category menu item
            $('.menu-item-has-children > a').on('click', function(event) {
                event.preventDefault(); // Prevent the default link behavior

                // Toggle "open" class on the clicked item
                const $parentLi = $(this).parent(); // Get the parent <li> element
                if ($parentLi.hasClass('open')) {
                    // If it's already open, close it
                    $parentLi.removeClass('open');
                } else {
                    // Close any other open menus
                    $('.menu-item-has-children').removeClass('open');
                    // Open the clicked menu
                    $parentLi.addClass('open');
                }
            });

            // Close the menu if clicking outside of it
            $(document).on('click', function(event) {
                // Check if the click happened outside the menu
                if (!$(event.target).closest('.menu').length) {
                    $('.menu-item-has-children').removeClass('open'); // Close all open menus
                }
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the dropdown list element
            var signinOption = document.getElementById('signinDropdown');

            // Add a click event listener to the whole <li>
            signinOption.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default link behavior
                // Toggle the dropdown
                var dropdownMenu = signinOption.querySelector('.dropdown-menu');
                dropdownMenu.classList.toggle('show');
            });

            // Close the dropdown if clicked outside
            document.addEventListener('click', function(event) {
                if (!signinOption.contains(event.target)) {
                    var dropdownMenu = signinOption.querySelector('.dropdown-menu');
                    dropdownMenu.classList.remove('show');
                }
            });
        });
    </script>

    <script>
        function navigateToCategory(select) {
            const url = select.value;
            if (url !== "0") {
                window.location.href = url;
            }
        }
    </script>




    <script src="./assets/js/update.js"></script>
</body>

</html>