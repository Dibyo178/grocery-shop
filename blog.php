<?php
include_once 'connectdb.php';

include_once 'connection.php';

$id = $_GET['id'];

$select = $pdo->prepare("SELECT * FROM blog WHERE id = :id");
$select->bindParam(':id', $id);
$select->execute();
$row = $select->fetch(PDO::FETCH_ASSOC);

$id_db = $row['id'];

$name_db = $row['name'];

$description_db = $row['description'];

$image_db = $row['image'];

$date_db = $row['date'];

?>


<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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

</head>

<body>
	<!-- Preloader -->
	<?php include './header.php' ?>
	<!-- End Mincart Section -->

	<!-- Start Breadcrumb Area -->
	<section class="breadcrumb-area pt-100 pb-100" style="background-image:url('assets/discount-images/blog.png');">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="breadcrumb-content">
						<h2>Blog Details</h2>
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><i class="fas fa-angle-double-right"></i></li>
							<li>Blog Details</li>
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
				<div class="col-lg-8 mb-40">
					<div class="blog-details">
						<!-- Content -->
						<div class="blog-details-content mb-30">
							<div class="thumbnail">
								<img src="./Admin/blogimage/<?php echo $image_db; ?>" alt="blog">
							</div>
							<div class="content">
								<!-- <div class="cate">
									<a href="#">Food</a>
									<a href="#">Health</a>
								</div> -->
								<h2 class="title">
									<h2 class="title"><?php echo $name_db;?></h2>
								</h2>
								<div class="meta mb-20">
									<!-- <span><i class="far fa-eye"></i> 206 Views</span> -->
									<!-- <span><i class="far fa-comments"></i> 05 Comments</span> -->
									<span><i class="far fa-calendar-alt"></i> <?php $formatted_date = date(" F j, Y", strtotime($date_db)); echo $formatted_date;?></span>
								</div>
								<p><?php echo $description_db;  ?></p>
								

							</div>
						</div>


					</div>
				</div>


				<div class="col-lg-4">
					<!-- Single -->
					<!-- <div class="widgets-single mb-30">
						<h2>Search Objects</h2>
						<div class="wi-search-form">
							<form action="#">
								<input type="text" name="search" placeholder="Enter Keyword">
								<button type="submit"><i class="bi bi-search"></i></button>
							</form>
						</div>
					</div> -->
					<!-- Single -->

					<!-- Single -->
					<div class="widgets-single mb-30">
						<h2>Other Blogs</h2>
						<div class="popular-blog-full">
							<!-- single -->

							<?php 
                              
                              $index=1; //default 1 count
                              
                              $select=$pdo->prepare("select * from blog  order by id desc limit 5 ");
                              
                              $select->execute();
                              
                              while($row=$select->fetch(PDO::FETCH_OBJ)){

                                $id=$row->id;
                                $name=$row->name;
                                $image=$row->image;
                                $date=$row->date;
                                // $name=$row->name;

                                ?>

							<div class="item">
								<div class="thumb">
									<a href="blog.php?id=<?php echo $id ?>">
										<img src="./Admin/blogimage/<?php echo $image; ?>" alt="blog">
									</a>
								</div>
								<div class="content">
									<h4><a href="blog.php?id=<?php echo $id ?>"><?php echo $name; ?></a></h4>

								</div>
							</div>

						  <?php

						   $index++;

							  }

						  ?>
					
						</div>
					</div>
					<!-- Single -->

					<!-- Single -->
					<div class="widgets-single mb-30">
						<h2>Recent Products</h2>
						<div class="wi-top-rated-p">

						<?php 
                              
                              $index=1; //default 1 count
                              
                              $select=$pdo->prepare("select * from product_cart  order by id desc limit 5 ");
                              
                              $select->execute();
                              
                              while($row=$select->fetch(PDO::FETCH_OBJ)){

                                $id=$row->id;
                                $name=$row->name;
                                $image=$row->image;
                                $old_price=$row->previous_price;
                                $new_price=$row->price;
                            
                                // $name=$row->name;

                                ?>
							<!-- Single -->
							<div class="single mb-20">
								<div class="thumb">
									<a href="shop.php?product=<?php echo $id;?>">
										<img src="./Admin/FoodImages/<?php echo $image;?>" alt="product">
									</a>
								</div>
								<div class="content">

									<h4 class="title">
										<a href="shop.php?id=<?php echo $id?>"><?php echo $name;?></a>
									</h4>
									<div class="pricing">
										<span>¥<?php echo $old_price;?> <del>¥<?php echo $new_price;?></del></span>
									</div>
								</div>
							</div>
							<!-- Single -->

						       <?php

							      $index++;

							    }

							    ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Blog Section -->


	<!-- Start Subscribe Form -->

	<!-- End Subscribe Form -->

	<!-- Start Footer Area -->
	<?php include 'footer.php'; ?>
	<!-- End Footer Area -->

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
</body>

</html>