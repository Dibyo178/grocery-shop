<?php
include './connection.php';
include './connectdb.php';

// Debugging error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Define the number of results per page
$results_per_page = 6;

// Find out the number of results stored in the database
$result = mysqli_query($con, "SELECT COUNT(id) AS total FROM blog");
$row = mysqli_fetch_assoc($result);
$total_results = $row['total'];
$total_pages = ceil($total_results / $results_per_page);

// Determine which page number visitor is currently on
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$current_page = max(1, min($total_pages, $current_page)); // Ensure page is within bounds

// Determine the SQL LIMIT starting number for the results on the displaying page
$start_from = ($current_page - 1) * $results_per_page;

// Retrieve selected results from database
$view = mysqli_query($con, "SELECT * FROM blog ORDER BY date DESC LIMIT $start_from, $results_per_page");

// Check for query success
if (!$view) {
    die("Query failed: " . mysqli_error($con));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaman Halal Food - Blog</title>
    <link rel="shortcut icon" href="./assets/logo/mobile/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.all.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
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
                            <li>Blog Page</li>
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
                <?php if (mysqli_num_rows($view) > 0) : ?>
                    <?php while ($data = mysqli_fetch_assoc($view)) : ?>
                        <div class="col-lg-4 col-md-6 mb-30">
                            <div class="blog-item">
                                <div class="thumbnail">
                                    <a href="blog.php?id=<?php echo $data['id']; ?>">
                                        <img src="./Admin/blogimage/<?php echo $data['image']; ?>" alt="blog">
                                    </a>
                                </div>
                                <div class="content">
                                    <h2 class="title"><a href="blog.php?id=<?php echo $data['id']; ?>"><?php echo $data['name']; ?></a></h2>
                                    <div class="date">
                                        <span><?php echo $data['date']; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>No blog posts found.</p>
                <?php endif; ?>
            </div>

            <!-- Pagination -->
            <div class="row mt-15 mb-30">
                <div class="col-12 text-center">
                    <div class="fr-pagination">
                        <ul>
                            <?php if ($current_page > 1) : ?>
                                <li><a href="?page=<?php echo $current_page - 1; ?>"><i class="fas fa-angle-left"></i></a></li>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                                <li <?php echo ($i == $current_page) ? 'class="active"' : ''; ?>>
                                    <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>

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

    <!-- JavaScript Files -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>
