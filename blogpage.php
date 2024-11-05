<?php
include './connection.php';
include './connectdb.php';

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



// Define the number of results per page
$results_per_page = 6;

// Find out the number of results stored in the database
$result = mysqli_query($con, "SELECT COUNT(id) AS total FROM blog");
$row = mysqli_fetch_assoc($result);
$total_results = $row['total'];

// Determine the number of total pages available
$total_pages = ceil($total_results / $results_per_page);

// Determine which page number visitor is currently on
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$current_page = max(1, min($total_pages, $current_page)); // Ensure page is within bounds

// Determine the SQL LIMIT starting number for the results on the displaying page
$start_from = ($current_page - 1) * $results_per_page;

// Retrieve selected results from database
// $view = mysqli_query($con, "SELECT * FROM blog ORDER BY id DESC LIMIT $start_from, $results_per_page");

?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <!-- Start Header Area -->
    <?php include './header.php'; ?>
    <!-- End Header Area -->

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
                <!-- Single Blog Item -->

                <?php 
                              
                              $index=1; //default 1 count
                              
                              $select=$pdo->prepare("select * from blog  order by id desc limit $start_from, $results_per_page ");
                              
                              $select->execute();
                              
                              while($row=$select->fetch(PDO::FETCH_OBJ)){

                                $id=$row->id;
                                $name=$row->name;
                                $image=$row->image;
                                $date=$row->date;
                                // $name=$row->name;

                                ?>
            
                    <div class="col-lg-4 col-md-6 mb-30">
                        <div class="blog-item">
                            <div class="thumbnail">
                                <a href="blog.php?id=<?php echo $id; ?>">
                                    <img src="./Admin/blogimage/<?php echo $image; ?>" alt="blog">
                                </a>
                            </div>
                            <div class="content">
                                <div class="meta">
                                    <span><a href="#"><i class="fas fa-user"></i> by: Admin</a></span>
                                </div>
                                <h2 class="title"><a href="blog.php?id=<?php echo $id; ?>"><?php echo $data['name']; ?></a></h2>
                                <div class="btm-meta">
                                    <div class="date">
                                        <span><i class="far fa-calendar-alt"></i> <?php $formatted_date = date(" F j, Y", strtotime($date)); echo $formatted_date; ?></span>
                                    </div>
                                    <div class="read-more">
                                        <a href="blog.php?id=<?php echo $id; ?>">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php

                    $index++;

                              }

                     ?>
               
            </div>

            <!-- Pagination -->
            <div class="row mt-15 mb-30">
                <div class="col-12 text-center">
                    <div class="fr-pagination">
                        <ul>
                            <!-- Previous Page Link -->
                            <?php if ($current_page > 1) : ?>
                                <li><a href="?page=<?php echo $current_page - 1; ?>"><i class="fas fa-angle-left"></i></a></li>
                            <?php endif; ?>

                            <!-- Page Number Links -->
                            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                                <li <?php echo ($i == $current_page) ? 'class="active"' : ''; ?>>
                                    <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>

                            <!-- Next Page Link -->
                            <?php if ($current_page < $total_pages) : ?>
                                <li><a href="?page=<?php echo $current_page + 1; ?>"><i class="fas fa-angle-right"></i></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog Section -->

    <!-- Start Footer Area -->
    <?php include './footer.php'; ?>
    <!-- End Footer Area -->

    <div class="scroll-area">
        <i class="fa fa-angle-up"></i>
    </div>

    <!-- Js Files -->
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
