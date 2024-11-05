<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<?php

 include_once './connectdb.php';

 include_once './connection.php';




if(isset($_POST['btnaddproduct'])){
   
	$username = $_POST['name'];

    $description = $_POST['message'];
	
    $phone	= $_POST['phone'];
    $address = $_POST['address'];
    $subject = $_POST['subject'];

     
$insert=$pdo->prepare("insert into  table_form(name,address,description,subject,phone)
 values(:name,:address,:description,:subject,:phone)"); 
 
     
     
  
     $insert->bindParam(':name',$username);
     $insert->bindParam(':address',$address);
     $insert->bindParam(':description',$username);
     $insert->bindParam(':subject',$subject);
     $insert->bindParam(':phone',$subject);

     
     
     
if($insert->execute()){
    
    echo'<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Message Send Successfully!",
  text: "Send Message",
  icon: "success",
  button: "Ok",
}).then(() => {


 window.location.href = "index.php";
                  
              });


});

</script>';
    
    
}else{
    
   echo'<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "ERROR!",
  text: "Fail",
  icon: "error",
  button: "Ok",
});


});

</script>';  
    
}     
  
     
 } 
     
           
 
 


?>

<!DOCTYPE html>
<html  class="no-js" lang="en">
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

	<?php include './header.php'; ?>
	<!-- End Mincart Section -->

	<!-- Start Breadcrumb Area -->
	<section class="breadcrumb-area pt-100 pb-100" style="background-image:url('assets/discount-images/contact.png');">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="breadcrumb-content">
						<h2 style="color:black">Contact Us</h2>
						<ul>
							<li><a href="index.html" style="color:black">Home</a></li>
							<li><i class="fas fa-angle-double-right" style="color:black"></i></li>
							<li style="color:black">Contact Us</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Breadcrumb Area -->

	<!-- Start Contact Section -->
	<section class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 align-self-center">
					<div class="contact-form">
						<h2>Get In Touch</h2>
						<form  action="" method="POST">
							<div class="row">
								<div class="col-md-6">
									<div class="single-input">
										<input type="text" name="name" placeholder="Your Name">
										<i class="fas fa-user"></i>
									</div>
								</div>
								<div class="col-md-6">
									<div class="single-input">
										<input type="text" name="phone" placeholder="Your Phone">
										<i class="fas fa-mobile-alt"></i>
									</div>
								</div>
								<div class="col-md-6">
									<div class="single-input">
										<input type="text" name="address" placeholder="Your Address">
										<i class="fas fa-home-alt"></i>
									</div>
								</div>
								<div class="col-md-6">
									<div class="single-input">
										<input type="text" name="subject" placeholder="Your Subjects">
										<i class="fas fa-file-alt"></i>
									</div>
								</div>
								<div class="col-12">
									<div class="single-input">
										<textarea name="message" placeholder="Write Message" spellcheck="false"></textarea>
										<i class="fas fa-pen"></i>
									</div>
								</div>
								<div class="col-12">
									<button type="submit" name="btnaddproduct" class="button-1">Send Message</button>
								</div>
							</div>
						</form>
						<!-- <p class="ajax-response"></p> -->
					</div>
				</div>
				<div class="col-lg-4 align-self-center">
					<div class="contact-form-info">
						<h2>Don't hesitate to contact us</h2>
						<div class="contact-info-list">
							<div class="item mb-20">
								<div class="icon">
									<i class="fas fa-home"></i>
								</div>
								<div class="content">
									<h4>Locations</h4>
									<p>〒348-0044 Saitamaken, Hanyu City, Kamiiwase 545</p>
								</div>
							</div>
							<div class="item mb-20">
								<div class="icon">
									<i class="far fa-envelope"></i>
								</div>
								<div class="content">
									<h4>Drop A Mail</h4>
									<p>zamanmd4316@gmail.com</p>
									
								</div>
							</div>
							<div class="item">
								<div class="icon">
									<i class="fas fa-mobile-alt"></i>
								</div>
								<div class="content">
									<h4>Call Us</h4>
									<p> 080 6554 4316</p>
									<p> 080 9538 5717</p>
									<p> 09088781550</p>
									 
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Contact Section -->
	
	<!-- Start Subscribe Form -->

	<!-- End Subscribe Form -->

	<!-- Start Footer Area -->
	<?php include './footer.php' ?>
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
	<script src="./assets/js/cart.js"></script>

	<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>