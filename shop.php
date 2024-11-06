<?php


include_once './connectdb.php';

include_once './connection.php';


?>


<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-">

    <head>
        <!-- Open Graph Tags -->
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://yourwebsite.com/product/PRODUCT_ID" />
        <meta property="og:title" content="Product Name" />
        <meta property="og:description" content="Product Description" />
        <meta property="og:image" content="https://yourwebsite.com/path-to-product-image.jpg" />
        <meta property="og:image:width" content="1200" />
        <meta property="og:image:height" content="630" />
    </head>

    <link rel="shortcut icon" href="./assets/logo/mobile/favicon.png" type="image/x-icon">

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
    .fr-pagination {
        display: flex;
        justify-content: center;
        list-style: none;
        padding: 0;
        margin-top: 15px;
        /* Margin above the pagination */
        margin-bottom: 15px;
        /* Add margin below the pagination */
    }

    .fr-pagination li {
        margin: 0 5px;
        /* Spacing between pagination items */
    }

    .fr-pagination .page-link {
        display: inline-block;
        padding: 8px 12px;
        border: 1px solid #ddd;
        color: #000;
        text-decoration: none;
        border-radius: 4px;
    }

    .fr-pagination .page-link.active {
        background-color: #ccc;
        color: #fff;
    }

    .fr-pagination .page-link.disabled {
        pointer-events: none;
        opacity: 0.5;
        cursor: default;
    }

    /* Responsive styles for mobile devices */
    @media (max-width: 768px) {
        .fr-pagination {
            margin-top: 10px;
            /* Adjusted margin for mobile */
            margin-bottom: 10px;
            /* Adjusted margin for mobile */
        }

        .fr-pagination li {
            margin: 0 3px;
            /* Reduced spacing for mobile */
        }

        .fr-pagination .page-link {
            padding: 6px 10px;
            /* Adjusted padding for smaller screens */
            font-size: 12px;
            /* Smaller font size for mobile */
        }
    }

    /* Further adjustment if necessary */
    @media (max-width: 480px) {
        .fr-pagination {
            /*margin-bottom: 5px; /* Even smaller margin for very small screens */

            margin-top: -00px;

        }

    }



    .product-thumbnail img {

        width: 100%;
        height: 100%;
        /* Ensures all images have the same height */
        object-fit: contain !important;
        /* Ensures images are cropped proportionally */
        transition: all 0.5s ease;
    }


    @media (min-width: 768px) {
        .product-thumbnail img {
            width: auto;
            /* Adjust image width for larger devices */
            height: 200px;
            /* Set a fixed height for larger devices */
        }
    }

    @media (max-width: 767px) {
        .product-thumbnail img {
            height: 150px;
            /* Set a smaller fixed height for mobile devices */
        }
    }
</style>

<body>

    <?php include './header.php'; ?>

    <!-- Start Breadcrumb Area -->
    <section class="breadcrumb-area pt-100 pb-100" style="background-image:url('./assets/discount-images/shop.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-content">
                        <h2>Shop</h2>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><i class="fas fa-angle-double-right"></i></li>
                            <li>Shop</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Breadcrumb Area -->

    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row mb-30">
                        <div class="col-12">
                            <div class="ltn__shop-options">
                                <div class="list-single">
                                    <div class="ltn__grid-list-tab-menu ">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="gridView-tab" data-bs-toggle="tab"
                                                    data-bs-target="#gridView" role="tab" aria-controls="gridView"
                                                    aria-selected="true"><i class="fas fa-th"></i></button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="listView-tab" data-bs-toggle="tab"
                                                    data-bs-target="#listView" role="tab" aria-controls="listView"
                                                    aria-selected="false"><i class="fas fa-list-ul"></i></button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="list-single">
                                    <div class="showing-product-number text-right">
                                        <span id="showing-results"></span>
                                    </div>
                                </div>
                                <!-- <div class="list-single">
                                    <div class="woo-product-shorting">

                                        <?php
                                        $select = $pdo->prepare("SELECT * FROM product_cart ORDER BY id ASC");
                                        $select->execute();

                                        $row = $select->fetch(PDO::FETCH_OBJ);
                                        $id = $row->id;
                                        $name = $row->name;
                                        $new_price = $row->price;
                                        $previous_price = $row->previous_price;
                                        $image = $row->image;
                                        $product_type = $row->product_type;
                                        $discount = $row->txtdiscountprice;
                                        ?>
                                        <select name="sort">
                                            <option value="0">Default Sorting</option>
                                            <option value="1">Sort by discount items</option>
                                            <option value="2">Sort by new arrivals</option>
                                            <option value="3">Sort by price: low to high</option>
                                            <option value="4">Sort by price: high to low</option>
                                        </select>
                                    </div>
                                </div> -->
                                <!-- Main Page Code -->

                                <div class="list-single">
                                    <div class="woo-product-shorting">
                                        <!-- Sorting Dropdown -->
                                        <select id="sort" name="sort">
                                            <option value="id ASC">Default Sorting</option>
                                            <option value="txtdiscountprice DESC">Sort by discount items</option>
                                            <option value="created_at DESC">Sort by new arrivals</option>
                                            <option value="price ASC">Sort by price: low to high</option>
                                            <option value="price DESC">Sort by price: high to low</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Products -->
                    <div class="row">
                        <div class="tab-content" id="myTabContent">
                            <!-- Shop GridView -->
                            <div class="tab-pane fade show active shop-gridview" id="gridView" role="tabpanel"
                                aria-labelledby="gridView-tab">
                                <div class="row" id="productGrid">
                                    <?php include 'fetch_sorted_products.php'; ?>
                                </div>
                            </div>

                            <!-- Shop ListView -->
                            <div class="tab-pane fade" id="listView" role="tabpanel" aria-labelledby="listView-tab">
                                <div class="row" id="productList">
                                    <?php include 'fetch_sorted_products.php'; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="row mt-15 mb-30">
                        <div class="col-12 text-center">
                            <div class="fr-pagination">
                                <ul>
                                    <li><a href="#" class="page-link prev-page disabled" id="prev-page"><i
                                                class="fas fa-angle-left"></i></a></li>
                                    <!-- Pagination links will be dynamically added here by JS -->
                                    <li><a href="#" class="page-link next-page" id="next-page"><i
                                                class="fas fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- End Shop Page -->



    <!-- Start Subscribe Form -->

    <!-- End Subscribe Form -->

    <!-- Start Footer Area -->
    <?php include './footer.php' ?>
    <!-- End Footer Area -->

    <!-- Start Quick View Modal Content -->
    <!-- Quick View Modal -->
    <div class="modal fade" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModal" aria-hidden="true">
        <div class="modal-dialog quick-view-modal">
            <div class="modal-content quick-view-modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="modal_tab">
                            <div class="tab-content product-details-large">
                                <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                    <div class="modal_tab_img">
                                        <a href="#"><img id="modalProductImage" src="" alt="Product Image"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-6 col-md-6">
                        <div class="quickview-modal-content-full">
                            <h3 id="modalProductName"></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ac dui sed nunc sagittis
                                maximus.</p>
                            <!-- Category -->
                            <div class="cate">
                                <span><strong>Categories:</strong></span>
                                <span><a href="#">Cover,</a></span>
                                <span><a href="#">Seat,</a></span>
                                <span><a href="#">Car,</a></span>
                                <span><a href="#">Parts</a></span>
                            </div>
                            <div class="pricing"><span style="font-size:35px"><strong>Price:</strong></span>
                                <span><i class="fa-solid fa-yen-sign"></i> <span id="modalProductPrice"></span>
                                    <del><span style="font-size:30px" id="modalPreviousPrice"></span></del></span>
                            </div>
                            <div class="quantity-add-cart">
                                <!-- <span class="quantity">
                                    <input type="number" min="1" max="1000" step="1" value="1">
                                </span> -->
                                <div class="cart-btn">
                                    <a class="button-1 add-to-cart" href="#"><i class="fas fa-shopping-cart"></i> Add to
                                        Cart</a>
                                    <input type="hidden" id="modalProductId" value="">
                                </div>
                            </div>
                            <div class="quick-view-sahre mt-50">
                                <span><strong>Share :</strong></span>
                                <div class="quick-view-sahre mt-50">
                                    <span><strong>Share :</strong></span>
                                    <span><a href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank"><i
                                                class="fab fa-facebook-f"></i></a></span>
                                    <span><a href="https://twitter.com/share?url=" target="_blank"><i
                                                class="fab fa-twitter"></i></a></span>
                                    <span><a href="https://pinterest.com/pin/create/button/?url=" target="_blank"><i
                                                class="fab fa-pinterest-p"></i></a></span>
                                    <span><a href="https://www.instagram.com/?url=" target="_blank"><i
                                                class="fab fa-instagram"></i></a></span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Quick View Modal Content -->


        <!-- list quick modal -->


        <!-- end list quick modal -->
        <div class="scroll-area">
            <i class="fa fa-angle-up"></i>
        </div>

        <!-- Js File -->
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
        <script src="./assets/js/cart.js"></script>

        <!-- jQuery and JavaScript -->
        <!-- jQuery and JavaScript -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
                const itemsPerPage = 12; // Number of items to show per page
                const totalItems = $('.product-item:visible').length; // Count only visible items
                const totalPages = Math.ceil(totalItems / itemsPerPage); // Calculate total pages based on visible items
                let currentPage = 1; // Track the current page

                // Function to create pagination links
                function createPagination() {
                    $('.fr-pagination ul').empty(); // Clear existing pagination links

                    // Create Previous button
                    $('.fr-pagination ul').append(`
            <li>
                <a href="#" class="page-link prev-page ${currentPage === 1 ? 'disabled' : ''}" id="prev-page">
                    <i class="fas fa-angle-left"></i>
                </a>
            </li>
        `);

                    // Create individual page numbers
                    for (let i = 1; i <= totalPages; i++) {
                        $('.fr-pagination ul').append(`
                <li>
                    <a href="#" class="page-link ${currentPage === i ? 'active' : ''}">${i}</a>
                </li>
            `);
                    }

                    // Create Next button
                    $('.fr-pagination ul').append(`
            <li>
                <a href="#" class="page-link next-page ${currentPage === totalPages ? 'disabled' : ''}" id="next-page">
                    <i class="fas fa-angle-right"></i>
                </a>
            </li>
        `);
                }

                // Function to show the current page of product items
                function showPage(page) {
                    // Hide all product items
                    $('.product-item').hide();

                    // Calculate start and end index
                    const start = (page - 1) * itemsPerPage;
                    const end = start + itemsPerPage;

                    // Show products for the current page
                    $('.product-item').slice(start, end).show();

                    // Update showing results text
                    const showingStart = start + 1;
                    const showingEnd = Math.min(end, totalItems);
                    $('#showing-results').text(`Showing ${showingStart}–${showingEnd} of ${totalItems} results`);

                    // Update pagination links
                    createPagination();
                }

                // Initialize pagination and show the first page
                createPagination();
                showPage(currentPage);

                // Handle pagination clicks
                $('.fr-pagination').on('click', '.page-link', function (e) {
                    e.preventDefault();

                    // Ignore if the button is disabled
                    if ($(this).hasClass('disabled')) return;

                    // Check if it's a prev or next button click
                    if ($(this).hasClass('prev-page')) {
                        currentPage--; // Go to the previous page
                    } else if ($(this).hasClass('next-page')) {
                        currentPage++; // Go to the next page
                    } else {
                        // Click on page number
                        currentPage = parseInt($(this).text()); // Update to the clicked page number
                    }

                    // Show the current page
                    showPage(currentPage);
                });
            });
        </script>


        <script>
            $(document).on('click', '.quick-view', function (e) {
                e.preventDefault();

                // Get data from the clicked product item
                let productItem = $(this).closest('.product-item');
                let productName = productItem.data('name');
                let productPrice = productItem.data('price');
                let productImage = productItem.data('image');
                let previousPrice = productItem.find('.pricing del').text();

                // Populate modal fields
                $('#modalProductName').text(productName);
                $('#modalProductPrice').text(productPrice);
                $('#modalPreviousPrice').text(previousPrice);
                $('#modalProductImage').attr('src', productImage);

                // Show the modal
                $('#quickViewModal').modal('show');
            });
        </script>

        <!-- <script>
            document.addEventListener('DOMContentLoaded', function () {
                const quickViewButtons = document.querySelectorAll('.quick-view');

                quickViewButtons.forEach(button => {
                    button.addEventListener('click', function (event) {
                        event.preventDefault();
                        const productUrl = this.getAttribute('data-url');

                        // Assuming you have an iframe in the modal to load the product page
                        const modalBody = document.querySelector('#quickViewModal .modal-body');
                        modalBody.innerHTML = `<iframe src="${productUrl}" width="100%" height="400" frameborder="0"></iframe>`;
                    });
                });
            });
        </script> -->

        <script>
            function openQuickViewModal(product) {
                const productUrl = `https://yourwebsite.com/product/${product.id}`;
                document.querySelector('.quick-view-sahre a[href*="twitter.com"]').setAttribute(
                    'href', `https://twitter.com/share?url=${encodeURIComponent(productUrl)}&text=${encodeURIComponent(product.name)}`
                );
                document.querySelector('.quick-view-sahre a[href*="pinterest.com"]').setAttribute(
                    'href', `https://pinterest.com/pin/create/button/?url=${encodeURIComponent(productUrl)}&media=${encodeURIComponent(product.image)}&description=${encodeURIComponent(product.name)}`
                );
                // Instagram link remains simple
            }

        </script>



        <!-- jQuery for handling sorting without page reload -->
        <!-- jQuery for handling sorting without page reload -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#sort').change(function () {
                    var sortValue = $(this).val();

                    $.ajax({
                        url: 'fetch_sorted_products.php',
                        type: 'GET',
                        data: { sort: sortValue },
                        success: function (data) {
                            $('#productGrid').html(data);  // Update Grid view
                            $('#productList').html(data);  // Update List view
                        },
                        error: function (xhr, status, error) {
                            console.error("Error: " + status + " " + error);
                        }
                    });
                });
            });
        </script>



</body>

</html>