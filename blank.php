<?php

include './connection.php';

include './connectdb.php';



?>


<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Zaman Halal Food</title>

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

<body>
    <!-- Preloader -->

    <!-- Start Header Area -->

    <?php include './header.php'; ?>

    <!-- End Mincart Section -->

    <!-- Start Breadcrumb Area -->
    <section class="breadcrumb-area pt-100 pb-100" style="background-image:url('./assets/discount-images/blog.png');">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-content">
                        <h2>Blog Page</h2>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><i class="fas fa-angle-double-right"></i></li>
                            <li>Blogpage</li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- End Breadcrumb Area -->


    <!-- Start Blog Section -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Single -->

                <?php

                $index = 1;

                $view = mysqli_query($con, "select * from  blog ");

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
                                    <img src="./Admin/blogimage/<?php echo $image ;?>" alt="blog">
                                </a>
                            </div>
                            <div class="content">
                                <div class="meta">
                                    <span><a href="#"><i class="fas fa-user"></i> by: Admin</a></span>
                                    <!-- <span><a href="#"><i class="bi bi-tags-fill"></i> Vegetables</a></span> -->
                                </div>
                                <h2 class="title"><a href="blog.php"><?php echo $name ;?></a></h2>
                                <div class="btm-meta">
                                    <div class="date">
                                        <span><i class="far fa-calendar-alt"></i> <?php echo $date;?></span>
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
                };
                ?>


            </div>
            <!-- Pagination -->
            <div class="row mt-15 mb-30">
                <div class="col-12 text-center">
                    <div class="fr-pagination">
                        <ul>
                            <li><a href="#"><i class="fas fa-angle-left"></i></a></li>
                            <li><a href="#">1</a></li>
                            <li><span>2</span></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#"><i class="fas fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog Section -->


    <!-- Start Subscribe Form -->

    <!-- End Subscribe Form -->

    <!-- Start Footer Area -->

    <?php include './footer.php'; ?>
    <!-- End Footer Area -->
    <div class="scroll-area">
        <i class="fa fa-angle-up"></i>
    </div>


    <!-- Js File -->
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
</body>

</html>