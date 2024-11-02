<?php


include_once "./connectdb.php";

include_once "./connection.php";



?>
<!DOCTYPE html>

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

<body>


    <?php include './header.php'; ?>



    <!-- Start Hero Slider Area -->
    <section class="heros-sldier-area">
        <div class="hero-slider-style-2 owl-carousel">
            <!-- Single -->

            <?php

            $select = $pdo->prepare("select * from tbl_slider");
            $select->execute();
            while($row = $select->fetch(PDO::FETCH_ASSOC)){

            $text1_db = $row['text1'];

            $text2_db = $row['text2'];

            $logo_db = $row['image'];

            ?>
            <div class="hero-slider-item">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6  order-lg-first order-last align-self-center">
                            <div class="hero-slider-content">
                                <h4><?php echo $text1_db;?></h4>
                                <h2><?php echo $text2_db; ?></h2>
                                <div class="hero-btn">
                                    <a class="button-1" href="shop.php">Shop Now</a>
                                    <a class="button-3" href="#category">Category</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="hero-slider-rimg">
                                <img class="hero-img" src="./Admin/slider-image/<?php  echo $logo_db;?>" alt="img">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        

        

            <?php

}

            ?>
    
        </div>
    </section>
    <!-- End Hero Slider Area -->

    <!-- Larg banner -->
    <div class="pt-70 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-30 d-flex">
                    <div class="lg-banner-item">
                        <a href="shop.php">
                            <img src="./assets/discount-images/bg-remove/j1.png" alt="banner">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12 mb-30">
                            <div class="lg-banner-item">
                                <a href="shop.php">
                                    <img src="assets/Halal/b2.png" alt="banner">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-30">
                            <div class="lg-banner-item">
                                <a href="shop.php">
                                    <img src="assets/Halal/b3.png" alt="banner">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Larg banner -->



    <!-- Start Shop Category -->
    <section class="shop-category pt-20 pb-20">
        <div class="container">
            <!-- Section Headding -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-headding text-center  mb-50">
                        <h2><span>Shop by category</span></h2>
                    </div>
                </div>
            </div>
            <div class="row" id="category">

                <!-- Single -->
                <div class="col-lg-3 col-6 mb-30">
                    <div class="s2-cate-item">
                        <div class="thumbn">
                            <a href="shop.php">
                                <img src="assets/Halal/bg-remove/bens-dry-removebg-preview.png" alt="img">
                            </a>
                        </div>
                        <div class="con">
                            <h4><a href="shop.php">
                                    Beans & Dry Fruit </a></h4>
                            <!-- <span>(24 item)</span> -->
                        </div>
                    </div>
                </div>
                <!-- Single -->
                <div class="col-lg-3 col-6 mb-30">
                    <div class="s2-cate-item">
                        <div class="thumbn">
                            <a href="shop.php">
                                <img src="assets/Halal/bg-remove/beef-removebg-preview.png" alt="img">
                            </a>
                        </div>
                        <div class="con">
                            <h4><a href="shop.php">Beef </a></h4>
                            <!-- <span>(94 item)</span> -->
                        </div>
                    </div>
                </div>
                <!-- Single -->
                <div class="col-lg-3 col-6 mb-30">
                    <div class="s2-cate-item">
                        <div class="thumbn">
                            <a href="shop.php">
                                <img src="assets/Halal/bg-remove/chicken-removebg-preview.png" alt="img">
                            </a>
                        </div>
                        <div class="con">
                            <h4><a href="shop.php">
                                    Chicken </a></h4>
                            <!-- <span>(11 item)</span> -->
                        </div>
                    </div>
                </div>

                <!-- Single -->
                <div class="col-lg-3 col-6 mb-30">
                    <div class="s2-cate-item">
                        <div class="thumbn">
                            <a href="shop.php">
                                <img src="assets/Halal/bg-remove/masla-removebg-preview.png" alt="img">
                            </a>
                        </div>
                        <div class="con">
                            <h4><a href="shop.php">
                                    Masala & Spices </a></h4>
                            <!-- <span>(11 item)</span> -->
                        </div>
                    </div>
                </div>
                <!-- Single -->
                <div class="col-lg-3 col-6 mb-30">
                    <div class="s2-cate-item">
                        <div class="thumbn">
                            <a href="shop.php">
                                <img src="./assets/Halal/bg-remove/Bangladeshi-food.png" alt="img">


                            </a>
                        </div>
                        <div class="con">
                            <h4><a href="shop.php">
                                    Bangladeshi Food </a></h4>
                            <!-- <span>(78 item)</span> -->
                        </div>
                    </div>
                </div>

                <!-- Single -->
                <div class="col-lg-3 col-6 mb-30">
                    <div class="s2-cate-item">
                        <div class="thumbn">
                            <a href="shop.php">
                                <img src="assets/Halal/bg-remove/frozen_and_dry-removebg-preview.png" alt="img">
                            </a>
                        </div>
                        <div class="con">
                            <h4><a href="shop.php">
                                    Frozen & Dry Fish </a></h4>
                            <!-- <span>(99 item)</span> -->
                        </div>
                    </div>
                </div>
                <!-- Single -->
                <div class="col-lg-3 col-6 mb-30">
                    <div class="s2-cate-item">
                        <div class="thumbn">
                            <a href="shop.php">
                                <img src="assets/Halal/bg-remove/indonetian-removebg-preview.png" alt="img">
                            </a>
                        </div>
                        <div class="con">
                            <h4><a href="shop.php">
                                    Indonesian Food </a></h4>
                            <!-- <span>(32 item)</span> -->
                        </div>
                    </div>
                </div>

                <!-- Single -->
                <div class="col-lg-3 col-6 mb-30">
                    <div class="s2-cate-item">
                        <div class="thumbn">
                            <a href="shop.php">
                                <img src="assets/Halal/bg-remove/Cos-removebg-preview.png" alt="img">
                            </a>
                        </div>
                        <div class="con">
                            <h4><a href="shop.php">
                                    Cosmetics </a></h4>
                            <!-- <span>(11 item)</span> -->
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-6 mb-30">
                    <div class="s2-cate-item">
                        <div class="thumbn">
                            <a href="shop.php">
                                <img src="assets/Halal/bg-remove/mutton-removebg-preview.png" alt="img">
                            </a>
                        </div>
                        <div class="con">
                            <h4><a href="shop.php">

                                    Mutton </a></h4>
                            <!-- <span>(11 item)</span> -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6 mb-30">
                    <div class="s2-cate-item">
                        <div class="thumbn">
                            <a href="shop.php">
                                <img src="assets/Halal/bg-remove/meat-fish-removebg-preview.png" alt="img">
                            </a>
                        </div>
                        <div class="con">
                            <h4><a href="shop.php">

                                    Meat & Fish </a></h4>
                            <!-- <span>(11 item)</span> -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6 mb-30">
                    <div class="s2-cate-item">
                        <div class="thumbn">
                            <a href="shop.php">
                                <img src="assets/Halal/bg-remove/srilankan-removebg-preview.png" alt="img">
                            </a>
                        </div>
                        <div class="con">
                            <h4><a href="shop.php">

                                    Srilankan Food </a></h4>
                            <!-- <span>(11 item)</span> -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6 mb-30">
                    <div class="s2-cate-item">
                        <div class="thumbn">
                            <a href="shop.php">
                                <img src="assets/Halal/bg-remove/OIL-removebg-preview.png" alt="img">
                            </a>
                        </div>
                        <div class="con">
                            <h4><a href="shop.php">

                                    Oil and Ghee </a></h4>
                            <!-- <span>(11 item)</span> -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6 mb-30">
                    <div class="s2-cate-item">
                        <div class="thumbn">
                            <a href="shop.php">
                                <img src="assets/Halal/bg-remove/meat-fish-removebg-preview.png" alt="img">
                            </a>
                        </div>
                        <div class="con">
                            <h4><a href="shop.php">

                                    Meat & Fish </a></h4>
                            <!-- <span>(11 item)</span> -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6 mb-30">
                    <div class="s2-cate-item">
                        <div class="thumbn">
                            <a href="shop.php">
                                <img src="assets/Halal/bg-remove/Nepal-removebg-preview.png" alt="img">
                            </a>
                        </div>
                        <div class="con">
                            <h4><a href="shop.php">


                                    Nepali Food </a></h4>
                            <!-- <span>(11 item)</span> -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6 mb-30">
                    <div class="s2-cate-item">
                        <div class="thumbn">
                            <a href="shop.php">
                                <img src="assets/Halal/bg-remove/ramadan-removebg-preview.png" alt="img">
                            </a>
                        </div>
                        <div class="con">
                            <h4><a href="shop.php">


                                    Ramadan Food </a></h4>
                            <!-- <span>(11 item)</span> -->
                        </div>
                    </div>
                </div>



                <div class="col-lg-3 col-6 mb-30">
                    <div class="s2-cate-item">
                        <div class="thumbn">
                            <a href="shop.php">
                                <img src="assets/Halal/bg-remove/snaks-removebg-preview.png" alt="img">
                            </a>
                        </div>
                        <div class="con">
                            <h4><a href="shop.php">



                                    Snacks </a></h4>
                            <!-- <span>(11 item)</span> -->
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-6 mb-30">
                    <div class="s2-cate-item">
                        <div class="thumbn">
                            <a href="shop.php">
                                <img src="assets/Halal/bg-remove/Bangladeshi-food.png" alt="img">
                            </a>
                        </div>
                        <div class="con">
                            <h4><a href="shop.php">



                                    Rice and Atta </a></h4>
                            <!-- <span>(11 item)</span> -->
                        </div>
                    </div>
                </div>



                <div class="col-lg-3 col-6 mb-30">
                    <div class="s2-cate-item">
                        <div class="thumbn">
                            <a href="shop.php">
                                <img src="assets/Halal/bg-remove/pakistani-removebg-preview.png" alt="img">
                            </a>
                        </div>
                        <div class="con">
                            <h4><a href="shop.php">


                                    Pakistani Food </a></h4>
                            <!-- <span>(11 item)</span> -->
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- End Shop Category -->

    <!-- discount and promotion -->



    <!-- end fiodcount and promotion -->

    <!-- Feature Products -->
    <section class="pt-30 pb-50">
        <div class="container">
            <!-- Section Headding -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-headding text-center  mb-50">
                        <h2><span>Discounts and promotions</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="feature-product-slider owl-carousel">

                        <div class="product-item feature" data-id="3" data-name="Raddish Vegetable" data-price="200">
                            <div class="sale-badge"><span>Discount</span></div>
                            <div class="product-thumbnail">
                                <a href="product-details.html">
                                    <img src="assets/discount-images/bg-remove/marmite.png" alt="Marmite product image">
                                </a>
                                <a class="wishlist" href="wishlist.html"><i class="far fa-heart"></i></a>
                                <div class="product-overly-btn">
                                    <ul>
                                        <li><a href="#" class="add-to-cart"><i
                                                    class="fas fa-shopping-cart"></i><span>Add to Cart</span></a></li>
                                        <li><a data-bs-toggle="modal" data-bs-target="#quickViewModal" href="#"><i
                                                    class="far fa-eye"></i><span>Quick view</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a href="product-details.html">Raddish Vegetable</a></h4>
                                <div class="pricing">
                                    <span>¥200 <del>¥210</del></span>
                                </div>

                                <div class="tax" style="display:none">
                                    <span>¥20</span>
                                </div>


                            </div>
                        </div>
                        <!-- Single -->
                        <div class="product-item feature">
                            <div class="sale-badge"><span>20%</span></div>
                            <!-- Thumbnail -->
                            <div class="product-thumbnail">
                                <a href="product-details.html">
                                    <img src="assets/discount-images/bg-remove/beta.png" alt="product">
                                </a>
                                <a class="wishlist" href="wishlist.html"><i class="far fa-heart"></i></a>
                                <div class="product-overly-btn">
                                    <ul>
                                        <li><a href="cart.html"><i class="fas fa-shopping-cart"></i><span>Add to
                                                    Cart</span></a></li>
                                        <li><a data-bs-toggle="modal" data-bs-target="#quickViewModal" href="#"><i
                                                    class="far fa-eye"></i><span>Quick view</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Content -->
                            <div class="product-content">
                                <!-- <div class="ratting">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div> -->
                                <h4><a href="product-details.html">Belta Coconut Vinegar 350ml</a></h4>
                                <div class="pricing">
                                    <span>¥250 <del>¥320.</del></span>
                                </div>
                            </div>
                        </div>
                        <!-- Single -->
                        <div class="product-item feature">
                            <div class="sale-badge"><span>25%</span></div>
                            <!-- Thumbnail -->
                            <div class="product-thumbnail">
                                <a href="product-details.html">
                                    <img src="assets/discount-images/bg-remove/marmite.png" alt="product">
                                </a>
                                <a class="wishlist" href="wishlist.html"><i class="far fa-heart"></i></a>
                                <div class="product-overly-btn">
                                    <ul>
                                        <li><a href="cart.html"><i class="fas fa-shopping-cart"></i><span>Add to
                                                    Cart</span></a></li>
                                        <li><a data-bs-toggle="modal" data-bs-target="#quickViewModal" href="#"><i
                                                    class="far fa-eye"></i><span>Quick view</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Content -->
                            <div class="product-content">
                                <!-- <div class="ratting">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div> -->
                                <h4><a href="product-details.html">Marmite Yeast extract</a></h4>
                                <div class="pricing">
                                    <span>$200 <del>¥480.</del></span>
                                </div>
                            </div>
                        </div>
                        <!-- Single -->
                        <div class="product-item feature">
                            <div class="sale-badge"><span>10%</span></div>
                            <!-- Thumbnail -->
                            <div class="product-thumbnail">
                                <a href="product-details.html">
                                    <img src="assets/discount-images/bg-remove/la-monisa.png" alt="product">
                                </a>
                                <a class="wishlist" href="wishlist.html"><i class="far fa-heart"></i></a>
                                <div class="product-overly-btn">
                                    <ul>
                                        <li><a href="cart.html"><i class="fas fa-shopping-cart"></i><span>Add to
                                                    Cart</span></a></li>
                                        <li><a data-bs-toggle="modal" data-bs-target="#quickViewModal" href="#"><i
                                                    class="far fa-eye"></i><span>Quick view</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Content -->
                            <div class="product-content">
                                <!-- <div class="ratting">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div> -->
                                <h4><a href="product-details.html">La Molisana Cous Cous (500G)</a></h4>
                                <div class="pricing">
                                    <span>¥380 <del>¥480</del></span>
                                </div>
                            </div>
                        </div>
                        <!-- Single -->
                        <div class="product-item feature">
                            <!-- Thumbnail -->
                            <div class="product-thumbnail">
                                <a href="product-details.html">
                                    <img src="assets/discount-images/bg-remove/beason.png" alt="product">
                                </a>
                                <a class="wishlist" href="wishlist.html"><i class="far fa-heart"></i></a>
                                <div class="product-overly-btn">
                                    <ul>
                                        <li><a href="cart.html"><i class="fas fa-shopping-cart"></i><span>Add to
                                                    Cart</span></a></li>
                                        <li><a data-bs-toggle="modal" data-bs-target="#quickViewModal" href="#"><i
                                                    class="far fa-eye"></i><span>Quick view</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Content -->
                            <div class="product-content">
                                <!-- <div class="ratting">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div> -->
                                <h4><a href="product-details.html">Beason (1kg)</a></h4>
                                <div class="pricing">
                                    <span>¥490 <del>¥530</del></span>
                                </div>
                            </div>
                        </div>
                        <!-- Single -->
                        <div class="product-item feature">
                            <div class="sale-badge"><span>30%</span></div>
                            <!-- Thumbnail -->
                            <div class="product-thumbnail">
                                <a href="product-details.html">
                                    <img src="assets/discount-images/bg-remove/dry-lptoa.png" alt="product">
                                </a>
                                <a class="wishlist" href="wishlist.html"><i class="far fa-heart"></i></a>
                                <div class="product-overly-btn">
                                    <ul>
                                        <li><a href="cart.html"><i class="fas fa-shopping-cart"></i><span>Add to
                                                    Cart</span></a></li>
                                        <li><a data-bs-toggle="modal" data-bs-target="#quickViewModal" href="#"><i
                                                    class="far fa-eye"></i><span>Quick view</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Content -->
                            <div class="product-content">
                                <!-- <div class="ratting">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div> -->
                                <h4><a href="product-details.html">Dry Loitta Fish (200gm)</a></h4>
                                <div class="pricing">
                                    <span>¥490 <del>¥530</del></span>
                                </div>
                            </div>
                        </div>
                        <!-- Single -->
                        <div class="product-item feature">
                            <div class="sale-badge"><span>25%</span></div>
                            <!-- Thumbnail -->
                            <div class="product-thumbnail">
                                <a href="product-details.html">
                                    <img src="assets/discount-images/bg-remove/wai-wai.png" alt="product">
                                </a>
                                <a class="wishlist" href="wishlist.html"><i class="far fa-heart"></i></a>
                                <div class="product-overly-btn">
                                    <ul>
                                        <li><a href="cart.html"><i class="fas fa-shopping-cart"></i><span>Add to
                                                    Cart</span></a></li>
                                        <li><a data-bs-toggle="modal" data-bs-target="#quickViewModal" href="#"><i
                                                    class="far fa-eye"></i><span>Quick view</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Content -->
                            <div class="product-content">
                                <!-- <div class="ratting">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div> -->
                                <h4><a href="product-details.html">WAI WAI Chicken Flavor (6P Set)</a></h4>
                                <div class="pricing">
                                    <span>¥490 <del>¥500</del></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature Products -->

    <!-- add to cart -->

    <!-- Part 1: Feature Products -->

    <section class="pt-30 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center mb-50">
                        <h2><span>Newest products</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="feature-product-slider owl-carousel">
                        <!-- Single Product Item -->
                        <div class="product-item" data-id="1" data-name="Raddish Vegetable" data-price="200">
                            <div class="sale-badge"><span>new</span></div>
                            <div class="product-thumbnail">
                                <a href="product-details.html">
                                    <img src="assets/discount-images/bg-remove/marmite.png" alt="Marmite product image">
                                </a>
                                <a class="wishlist" href="wishlist.html"><i class="far fa-heart"></i></a>
                                <div class="product-overly-btn">
                                    <ul>
                                        <li><a href="#" class="add-to-cart"><i
                                                    class="fas fa-shopping-cart"></i><span>Add to Cart</span></a></li>
                                        <li><a data-bs-toggle="modal" data-bs-target="#quickViewModal" href="#"><i
                                                    class="far fa-eye"></i><span>Quick view</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a href="product-details.html">Raddish Vegetable</a></h4>
                                <div class="pricing">
                                    <span>¥200 <del>¥210</del></span>
                                </div>

                                <div class="tax" style="display:none">
                                    <span>¥20</span>
                                </div>


                            </div>
                        </div>

                        <div class="product-item" data-id="2" data-name="Another Vegetable" data-price="100">
                            <div class="sale-badge"><span>new</span></div>
                            <div class="product-thumbnail">
                                <a href="product-details.html">
                                    <img src="assets/discount-images/bg-remove/ダウンロード-16-removebg-preview.png"
                                        alt="Another product image">
                                </a>
                                <a class="wishlist" href="wishlist.html"><i class="far fa-heart"></i></a>
                                <div class="product-overly-btn">
                                    <ul>
                                        <li><a href="#" class="add-to-cart"><i
                                                    class="fas fa-shopping-cart"></i><span>Add to Cart</span></a></li>
                                        <li><a data-bs-toggle="modal" data-bs-target="#quickViewModal" href="#"><i
                                                    class="far fa-eye"></i><span>Quick view</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a href="product-details.html">Another Vegetable</a></h4>
                                <div class="pricing">
                                    <span>¥100 <del>¥400</del></span>
                                </div>
                                <div class="tax" style="display:none">
                                    <span>¥10</span>
                                </div>

                            </div>
                        </div>
                        <!-- Repeat product items as needed... -->
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- end add to cart -->



    <!-- Start Newest Products -->
    <section class="pt-30 pb-50">
        <div class="container">
            <!-- Section Headding -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-headding text-center  mb-50">
                        <h2><span>Newest products</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="feature-product-slider owl-carousel">

                        <div class="product-item" data-id="1" data-name="Raddish Vegetable" data-price="200">
                            <div class="sale-badge"><span>new</span></div>
                            <div class="product-thumbnail">
                                <a href="product-details.html">
                                    <img src="assets/discount-images/bg-remove/marmite.png" alt="Marmite product image">
                                </a>
                                <a class="wishlist" href="wishlist.html"><i class="far fa-heart"></i></a>
                                <div class="product-overly-btn">
                                    <ul>
                                        <li><a href="#" class="add-to-cart"><i
                                                    class="fas fa-shopping-cart"></i><span>Add to Cart</span></a></li>
                                        <li><a data-bs-toggle="modal" data-bs-target="#quickViewModal" href="#"><i
                                                    class="far fa-eye"></i><span>Quick view</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a href="product-details.html">Raddish Vegetable</a></h4>
                                <div class="pricing">
                                    <span>¥200 <del>¥210</del></span>
                                </div>

                                <div class="tax" style="display:none">
                                    <span>¥20</span>
                                </div>


                            </div>
                        </div>
                        <!-- Single -->

                        <!-- Single -->
                        <div class="product-item">
                            <div class="sale-badge"><span>new</span></div>
                            <!-- Thumbnail -->
                            <div class="product-thumbnail">
                                <a href="product-details.html">
                                    <img src="assets/discount-images/bg-remove/beta.png" alt="product">
                                </a>
                                <a class="wishlist" href="wishlist.html"><i class="far fa-heart"></i></a>
                                <div class="product-overly-btn">
                                    <ul>
                                        <li><a href="cart.html"><i class="fas fa-shopping-cart"></i><span>Add to
                                                    Cart</span></a></li>
                                        <li><a data-bs-toggle="modal" data-bs-target="#quickViewModal" href="#"><i
                                                    class="far fa-eye"></i><span>Quick view</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Content -->
                            <div class="product-content">
                                <!-- <div class="ratting">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div> -->
                                <h4><a href="product-details.html">Raddish Vegitable</a></h4>
                                <div class="pricing">
                                    <span>¥200 <del>¥210</del></span>
                                </div>
                            </div>
                        </div>
                        <!-- Single -->
                        <div class="product-item">
                            <div class="sale-badge"><span>new</span></div>
                            <!-- Thumbnail -->
                            <div class="product-thumbnail">
                                <a href="product-details.html">
                                    <img src="assets/discount-images/bg-remove/beason.png" alt="product">
                                </a>
                                <a class="wishlist" href="wishlist.html"><i class="far fa-heart"></i></a>
                                <div class="product-overly-btn">
                                    <ul>
                                        <li><a href="cart.html"><i class="fas fa-shopping-cart"></i><span>Add to
                                                    Cart</span></a></li>
                                        <li><a data-bs-toggle="modal" data-bs-target="#quickViewModal" href="#"><i
                                                    class="far fa-eye"></i><span>Quick view</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Content -->
                            <div class="product-content">
                                <!-- <div class="ratting">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div> -->
                                <h4><a href="product-details.html">Raddish Vegitable</a></h4>
                                <div class="pricing">
                                    <span>¥200 <del>¥210</del></span>
                                </div>
                            </div>
                        </div>
                        <!-- Single -->
                        <div class="product-item">
                            <div class="sale-badge"><span>new</span></div>
                            <!-- Thumbnail -->
                            <div class="product-thumbnail">
                                <a href="product-details.html">
                                    <img src="assets/discount-images/bg-remove/wai-wai.png" alt="product">
                                </a>
                                <a class="wishlist" href="wishlist.html"><i class="far fa-heart"></i></a>
                                <div class="product-overly-btn">
                                    <ul>
                                        <li><a href="cart.html"><i class="fas fa-shopping-cart"></i><span>Add to
                                                    Cart</span></a></li>
                                        <li><a data-bs-toggle="modal" data-bs-target="#quickViewModal" href="#"><i
                                                    class="far fa-eye"></i><span>Quick view</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Content -->
                            <div class="product-content">
                                <!-- <div class="ratting">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div> -->
                                <h4><a href="product-details.html">Raddish Vegitable</a></h4>
                                <div class="pricing">
                                    <span>¥200 <del>¥210</del></span>
                                </div>
                            </div>
                        </div>
                        <!-- Single -->
                        <div class="product-item">
                            <div class="sale-badge"><span>new</span></div>
                            <!-- Thumbnail -->
                            <div class="product-thumbnail">
                                <a href="product-details.html">
                                    <img src="assets/discount-images/bg-remove/la-monisa.png" alt="product">
                                </a>
                                <a class="wishlist" href="wishlist.html"><i class="far fa-heart"></i></a>
                                <div class="product-overly-btn">
                                    <ul>
                                        <li><a href="cart.html"><i class="fas fa-shopping-cart"></i><span>Add to
                                                    Cart</span></a></li>
                                        <li><a data-bs-toggle="modal" data-bs-target="#quickViewModal" href="#"><i
                                                    class="far fa-eye"></i><span>Quick view</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Content -->
                            <div class="product-content">
                                <!-- <div class="ratting">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div> -->
                                <h4><a href="product-details.html">Raddish Vegitable</a></h4>
                                <div class="pricing">
                                    <span>¥200 <del>¥210</del></span>
                                </div>
                            </div>
                        </div>
                        <!-- Single -->
                        <div class="product-item">
                            <div class="sale-badge"><span>new</span></div>
                            <!-- Thumbnail -->
                            <div class="product-thumbnail">
                                <a href="product-details.html">
                                    <img src="assets/discount-images/bg-remove/dry-lptoa.png" alt="product">
                                </a>
                                <a class="wishlist" href="wishlist.html"><i class="far fa-heart"></i></a>
                                <div class="product-overly-btn">
                                    <ul>
                                        <li><a href="cart.html"><i class="fas fa-shopping-cart"></i><span>Add to
                                                    Cart</span></a></li>
                                        <li><a data-bs-toggle="modal" data-bs-target="#quickViewModal" href="#"><i
                                                    class="far fa-eye"></i><span>Quick view</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Content -->
                            <div class="product-content">
                                <!-- <div class="ratting">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div> -->
                                <h4><a href="product-details.html">Raddish Vegitable</a></h4>
                                <div class="pricing">
                                    <span>¥200 <del>¥210</del></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Newest Products -->

    <!-- Start Deal Section -->
    <section class="deal-section pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="deal-section-img">
                        <img src="assets/discount-images/bg-remove/beef.png" alt="del">
                    </div>
                </div>
                <div class="col-lg-7 align-self-center">
                    <div class="deal-section-content">
                        <h4>Friday Hot Deals</h4>
                        <h2>Fresh Beef Available in Every Friday </h2>

                        <div class="dh-btn mt-30">
                            <a class="button-3" href="shop.php" style="background-color:#679509;color:#fff">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Deal Section -->

    <!-- Start Product Widgets -->


    <!-- End Product Widgets -->

    <!-- Start Call Now Section -->
    <!-- <section class="call-now pt-120 pb-120" style="background-image:url('assets/img/call-bg.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="call-now-content">
                        <h4>any question you have</h4>
                        <h2>897-876-987-90</h2>
                        <div class="cl-btn mt-20">
                            <a class="button-1" href="tel:+123456789">MAKE A CALL</a>
                            <a class="button-3" href="contact.html">Contact us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="call-now-shap">
            <img src="assets/img/call.png" alt="img">
        </div>
    </section> -->
    <!-- End Call Now Section -->



    <!-- Start Free  Shipping Area -->
    <section class="pt-30 pb-30">
        <div class="container">
            <div class="shipping-item-full">
                <div class="row">
                    <!-- Single -->
                    <div class="col-lg-4 col-md-6 mb-30">
                        <div class="shipping-item">
                            <div class="iocn">
                                <i class="bi bi-truck"></i>
                            </div>
                            <div class="content">
                                <h3> Convenient & Quick</h3>
                                <p>
                                    No waiting in traffic, no haggling, no worries carrying Food,they're delivered right
                                    at your door. </p>
                            </div>
                        </div>
                    </div>
                    <!-- Single -->
                    <div class="col-lg-4 col-md-6 mb-30">
                        <div class="shipping-item">
                            <div class="iocn">
                                <i class="fab fa-pagelines"></i>
                            </div>
                            <div class="content">
                                <h3> Get Fresh Products</h3>
                                <p>
                                    Our fresh produce is sourced In our store, you get the best from us.we are always
                                    sourced halal products </p>
                            </div>
                        </div>
                    </div>
                    <!-- Single -->
                    <div class="col-lg-4 col-md-6 mb-30">
                        <div class="shipping-item">
                            <div class="iocn">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="content">
                                <h3> Product Purchaes Offer</h3>
                                <p>
                                    Order more than <span style="color:#679509;font-weight:700">¥8000</span> & get free
                                    delivery</p>
                            </div>
                        </div>
                    </div>
                    <!-- Single -->
                    <!-- <div class="col-lg-3 col-md-6 mb-30">
                        <div class="shipping-item">
                            <div class="iocn">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            <div class="content">
                                <h3> Safe Payment</h3>
                                <p>We are using secure payment methods.</p>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Free  Shipping Area -->



    <!-- Start Latest Blog -->
    <section class="section-padding-2">
        <div class="container">
            <!-- Section Headding -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-headding text-center  mb-50">
                        <h2><span>Latest Blog</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Single -->

                <?php

                $index = 1;

                $view = mysqli_query($con, "SELECT * FROM blog ORDER BY id DESC LIMIT 3");


                while ($data = mysqli_fetch_assoc($view)) {


                    $name = $data['name'];

                    $description = $data['description'];

                    $date = $data['date'];



                    $image = $data['image'];


                    ?>

                    <div class="col-lg-4 col-md-6 mb-30">
                        <div class="blog-item">
                            <div class="thumbnail">
                                <a href="blog.php">
                                    <img src="./Admin/blogimage/<?php echo $image; ?>" alt="blog">
                                </a>
                            </div>
                            <div class="content">
                                <div class="meta">
                                    <span><a href="#"><i class="fas fa-user"></i> by: Admin</a></span>
                                    <!-- <span><a href="#"><i class="bi bi-tags-fill"></i> Vegetables</a></span> -->
                                </div>
                                <h2 class="title"><a href="blog.php"><?php echo $name; ?></a></h2>
                                <div class="btm-meta">
                                    <div class="date">
                                        <span><i class="far fa-calendar-alt"></i> <?php echo $date; ?></span>
                                    </div>
                                    <div class="read-more">
                                        <a href="blog.php">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php

                    $index++;
                }
                ;
                ?>


                <!-- Single -->

            </div>
        </div>
    </section>
    <!-- End Latest Blog -->

    <!-- Start Subscribe Form -->

    <!-- End Subscribe Form -->

    <!-- Start Footer Area -->
    <?php include './footer.php'; ?>
    <!-- End Footer Area -->

    <!-- Start Quick View Modal Content -->
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
                                        <a href="#"><img src="assets/img/product/1.jpg" alt="img"></a>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab2" role="tabpanel">
                                    <div class="modal_tab_img">
                                        <a href="#"><img src="assets/img/product/2.jpg" alt="img"></a>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab3" role="tabpanel">
                                    <div class="modal_tab_img">
                                        <a href="#"><img src="assets/img/product/3.jpg" alt="img"></a>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab4" role="tabpanel">
                                    <div class="modal_tab_img">
                                        <a href="#"><img src="assets/img/product/4.jpg" alt="img"></a>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab5" role="tabpanel">
                                    <div class="modal_tab_img">
                                        <a href="#"><img src="assets/img/product/5.jpg" alt="img"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="modal_tab_button">
                                <ul class="nav product_navactive owl-carousel" role="tablist">
                                    <li>
                                        <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab"
                                            aria-controls="tab1" aria-selected="false"><img
                                                src="assets/img/product/1.jpg" alt="img"></a>
                                    </li>
                                    <li>
                                        <a class="nav-link" data-toggle="tab" href="#tab2" role="tab"
                                            aria-controls="tab2" aria-selected="false"><img
                                                src="assets/img/product/2.jpg" alt="img"></a>
                                    </li>
                                    <li>
                                        <a class="nav-link button_three" data-toggle="tab" href="#tab3" role="tab"
                                            aria-controls="tab3" aria-selected="false"><img
                                                src="assets/img/product/3.jpg" alt="img"></a>
                                    </li>
                                    <li>
                                        <a class="nav-link" data-toggle="tab" href="#tab4" role="tab"
                                            aria-controls="tab4" aria-selected="false"><img
                                                src="assets/img/product/4.jpg" alt="img"></a>
                                    </li>
                                    <li>
                                        <a class="nav-link" data-toggle="tab" href="#tab5" role="tab"
                                            aria-controls="tab5" aria-selected="false"><img
                                                src="assets/img/product/5.jpg" alt="img"></a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="quickview-modal-content-full">
                            <!-- Ratting -->
                            <div class="ratting">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><small>( 25 Reviews )</small></span>
                            </div>
                            <!-- Title -->
                            <h3>Vegetables Juices</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ac dui sed nunc sagittis
                                maximus. Sed lobortis commodo dapibus. Nunc placerat, massa nec blandit egestas, eros
                                diam lacinia lectus</p>
                            <!-- Price -->
                            <div class="pricing">
                                <span>$200 <del>$210</del></span>
                            </div>
                            <!-- Category -->
                            <div class="cate">
                                <span><strong>Categories:</strong></span>
                                <span><a href="#">Cover,</a></span>
                                <span><a href="#">Seat,</a></span>
                                <span><a href="#">Car,</a></span>
                                <span><a href="#">Parts</a></span>
                            </div>
                            <!-- Add To Cart -->
                            <div class="quantity-add-cart">
                                <span class="quantity">
                                    <input type="number" min="1" max="1000" step="1" value="1">
                                </span>
                                <div class="cart-btn">
                                    <a class="button-1" href="#"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                                </div>
                            </div>
                            <div class="quick-view-sahre mt-50">
                                <span><strong>Share :</strong></span>
                                <span><a href="#"><i class="fab fa-facebook-f"></i></a></span>
                                <span><a href="#"><i class="fab fa-twitter"></i></a></span>
                                <span><a href="#"><i class="fab fa-pinterest-p"></i></a></span>
                                <span><a href="#"><i class="fab fa-instagram"></i></a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Quick View Modal Content -->
    <div class="scroll-area">
        <i class="fa fa-angle-up"></i>
    </div>



    <!-- banner modal -->

    <?php include './banner_modal.php' ?>


    <!-- Js File -->
    <script src="aseets/js/update.js"></script>
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

    <script src="./assets/js/update.js"></script>



    <script src="./assets/js/cart.js"></script>

    <!-- Add this script at the end of your HTML or in your JavaScript file -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const categoryButton = document.querySelector('.button-3'); // Assuming this class is used for the category button

            categoryButton.addEventListener('click', function (event) {
                event.preventDefault(); // Prevent the default anchor click behavior
                const targetSection = document.getElementById('category'); // Target the category section
                targetSection.scrollIntoView({
                    behavior: 'smooth' // Smooth scroll
                });
            });
        });
    </script>





</body>

</html>