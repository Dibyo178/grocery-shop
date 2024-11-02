<?php



include_once 'tokenconnect.php';

include_once './connectdb.php';

include_once './connection.php';

// session_start();

$user = $_SESSION['userid'];



$msg = "";

if (!isset($_SESSION['userid'])) {

?>
  <script>
    window.location.href = 'index.php';
  </script>

<?php
}




if ($_SESSION['username'] == "" or $_SESSION['role'] == "User-Nayasarak" or $_SESSION['role'] == "User-Zindabazar" or $_SESSION['role'] == "User-Manikpir") {

  header("location:index.php");
}

include_once 'header.php';

error_reporting(0);


$uid = $_SESSION['userid'];

if (isset($_POST['btnsave'])) {

  $to_id = mysqli_real_escape_string($con, $_POST['txtselect_option']);

  $description = mysqli_real_escape_string($con, $_POST['txtdescription']);


  mysqli_query($con, "insert into tbl_notify(form_id,to_id,message) values('$uid','$to_id','$description')");



  $msg = "Message Send";
}


// $res_msg=mysqli_query($con,"select tbl_user.username,tbl_notify.message,tbl_notify.id from tbl_user, tbl_notify where tbl_notify.status=0 and tbl_notify.to_id='$uid' and tbl_user.userid=tbl_notify.form_id");


$res_msg = mysqli_query($con, "select * from orders where status= 0");

$unread_count = mysqli_num_rows($res_msg);

$sql = "select userid,username from tbl_user ";

$res_user = mysqli_query($con, $sql);



?>

<?php

$select = $pdo->prepare("select * from tbl_user");
$select->execute();
$row = $select->fetch(PDO::FETCH_ASSOC);

$image_logo =  $row['image'];

?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Zaman Halal Food</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">



  <!-- jQuery 3 -->
  <!--<script src="bower_components/jquery/dist/jquery.min.js"></script>-->
  <!-- Bootstrap 3.3.7 -->
  <!--<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>-->
  <!-- iCheck -->
  <!--<script src="plugins/iCheck/icheck.min.js"></script>-->

  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script src="bower_components/sweetalert/sweetalert.js"></script>

  <!-- DataTables -->
  <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

  <link rel="shortcut icon" href="../assets/logo/favicon.png" type="image/x-icon">

  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->

  <link rel="stylesheet" href="./main.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">


  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">


  <!--sweetaletrt library-->

  <link rel="stylesheet" href="./pages/UI/general.html">




  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <link rel="stylesheet" href="main.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <link rel="stylesheet" href="main.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap datepicker -->
  <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- bootstrap color picker -->


  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">

  <!-- iCheck 1.0.1 -->
  <script src="plugins/iCheck/icheck.min.js"></script>

  <!-- Select2 -->
  <script src="bower_components/select2/dist/js/select2.full.min.js"></script>

  <script src="Chart.js-2.8.0/dist/Chart.min.js"></script>

</head>

<style>
  @media (min-width: 991px) {


    .logo {
      display: flex !important;
      align-items: center !important;
      /* Vertically center the logo */
      justify-content: center !important;
      /* Horizontally center the logo */
      height: 100% !important;
      /* Ensure it takes the full height of the header */
      margin: 5px auto !important;
      /* Center the logo horizontally */
    }

    .logo-mini,
    .logo-lg {
      margin-top: 0 !important;
      /* Reset any top margin if necessary */
    }

    .logo-lg img,
    .logo-mini img {
      max-width: 100% !important;
      /* Ensure the image scales properly */
      max-height: 60px !important;
      /* Adjust the height as needed */
    }

  }


  .navbar-nav>.notifications-menu>.dropdown-menu>li .menu,
  .navbar-nav>.messages-menu>.dropdown-menu>li .menu,
  .navbar-nav>.tasks-menu>.dropdown-menu>li .menu {


    max-height: 200px !important;
    margin: 0 !important;
    padding: 0 !important;
    list-style: none !important;
    overflow-x: hidden !important;
  }
</style>

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">


    <!-- Main Header -->
    <header class="main-header" style="background: #fff;">

      <!-- Logo -->
      <a href="dashboard.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><span class="logo-lg"><img style="width:100px;height:35px" src="../assets/logo/favicon.png" alt=""></span>
        </span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img style="width:120px;height:60px" src="../assets/logo/Zaman-Halal-Food-Logo-Main.png" alt=""></span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation" style="bacckground-color:'#fff' !important">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->



            <!-- Notifications: style can be found in dropdown.less -->
            <li class="dropdown notifications-menu">

              <?php

              if ($unread_count != 0) {



              ?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background:none">
                  <img src="./bell.gif" style="width: 45px;" alt="">
                  <span style="top:14px;right:14px" class="label label-warning" id="count"><?php echo $unread_count; ?></span>

                </a>

              <?php

              } else {

              ?>

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o" style="color:black"></i>
                  <span class="label label-warning" id="count"><?php echo $unread_count; ?></span>

                </a>

              <?php
              }

              ?>
              <ul class="dropdown-menu">
                <li class="header">You have <?php echo $unread_count; ?> notifications


                </li>
                <li>
                  <!-- inner menu: contains the actual data -->


                  <ul class="menu">
                    <li>
                      <a href="placing_order.php" style="color: black;">
                        <?php if ($unread_count > 0) {

                          $index = 1;
                          while ($row_message = mysqli_fetch_assoc($res_msg)) {


                        ?>


                            <p style="padding: 5px;color:black">
                              <strong>

                                <?php echo $index; ?>.
                                <?php echo $row_message['name']; ?>
                              </strong>
                              Placed new order
                              <span><a href="./placing_order.php" class="btn btn-danger"><span class="glyphicon glyphicon-shopping-cart" style="color:#ffffff" data-toggle="tooltip" title="New Cart"></span></a></span>
                            </p>


                        <?php

                            $index++;
                          }
                        }; ?>
                      </a>

                  </ul>
                </li>

              </ul>

            </li>



            <!-- User Account Menu -->
            <li class="dropdown user user-menu">

              <!-- Menu Toggle Button -->


              <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                <div style="display: flex; flex-direction: column; align-items: center;">
                  <!-- The user image in the navbar-->
                  <img src="./registrationImages/<?php echo $image_logo; ?>" style="background:#fff;width:35px;height:35px;border: 1px solid green;padding:2px" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs" style="color: #16b527;
    text-align: center;
    font-weight: 700;"><?php echo $_SESSION['username']; ?></span>
                </div>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="./registrationImages/<?php echo $image_logo; ?>" style="padding:10px; background:#fff" class="img-circle" alt="User Image">

                  <p style="color:black">
                    <?php echo $_SESSION['useremail']; ?>
                    <small style="font-weight:700;">Admin</small>
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">

                  <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="changepassword.php" class="btn btn-default btn-flat"><span class="ch_pass">Change Password</span></a>
                  </div>
                  <div class="pull-right">
                    <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <!--
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
-->
          </ul>
        </div>
      </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel " style="margin-top:17px;">
          <div class="pull-left image ">
            <img src="./registrationImages/<?php echo $image_logo; ?>" style="width:100px;padding:5px;border-radius:5px" alt="User Image">

          </div>
          <div class="pull-left info">
            <p style="color:#4bd34b !important;margin-top:15px">Welcome-<?php echo $_SESSION['username']; ?></p>
            <!-- Status -->
            <!--          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
          </div>
        </div>

        <!-- search form (Optional) -->
        <!--
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
-->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">

          <!-- Optionally, you can add icons to the links -->
          <li class="active"><a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

          

          <li class="active"><a href="category.php"> <i class="fa-solid fa-cart-plus"></i> <span>Product Category</span></a></li>

         <!-- <li class="treeview">
          <a href="category.php">
          <i class="fa-solid fa-cart-plus"></i> <span>Product Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="category.php"><i class="fa fa-list-alt"></i> <span>Add Product Category</span></a></li>
          <li><a href="Subcategory.php"><i class="fa fa-list-alt"></i> <span>Add Product SubCategory</span></a></li>
          </ul>
        </li>  -->


        <li><a href="./slider.php"><i class="fa-solid fa-sliders"></i><span> Add Homepage Slider</span></a></li>

          <li><a href="addArea.php"><i class="fa-solid fa-truck"></i> <span>Add Delivery Area</span></a></li>


           

          <!-- <li><a href="addProductOffer.php"><i class="fa-solid fa-bag-shopping"></i><span> Add Products Offer </span></a></li> -->

          <li><a href="placing_order.php"><i class="fa-solid fa-clipboard-list"></i><span> Place Order </span></a></li>


          <li><a href="product_cart.php"><i class="fa-solid fa-cart-shopping"></i><span> Product Cart</span></a></li>

          <li><a href="addblogs.php"><i class="fa-regular fa-file-lines"></i><span> Add Blogs </span></a></li>





          <!--
          <li><a href="addProduct.php"><i class="fa fa-product-hunt"></i> <span>Add Product</span></a></li>
          
           <li><a href="productlist.php"><i class="fa fa-th-list"></i> <span>Product List</span></a></li>
           
           
-->
          <!-- <li class="treeview">
          <a href="#">
            <i class="fas fa-receipt"></i> <span>Reception</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          
        
          
 <li><a href="createToken.php"><i class="fa fa-plus-square" aria-hidden="true"></i>Create Token Grapics</a></li>

 
           
  <li><a href="receiveToken.php"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>Receive Token Production </a></li>            
          
            <li><a href="createinvoice.php"><i class="fas fa-file-invoice"></i>    Create Invoice</a></li>
              <li><a href="orderlist.php"><i class="fa fa-first-order"></i> <span>Invoicelist</span></a></li>
          </ul>
</li> -->


          <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Sales Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="tablereport.php"><i class="fa fa-circle-o"></i>Table Report</a></li>
            <li><a href="graphreport.php"><i class="fa fa-circle-o"></i>Grpah Report</a></li>
          </ul>
 </li> -->



          <li><a href="table_form.php"><i class="fa-solid fa-table-list"></i> <span>Contact List</span></a></li>

          <!-- <li><a href="gallery.php"><i class="fa-solid fa-file-image"></i> <span> Gallery</span></a></li> -->

          <li><a href="adddiscount.php"><i class="fa-solid fa-file-image"></i> <span>Add Discount</span></a></li>


          <li><a href="registration.php"><i class="fa fa-user-circle"></i> <span>Registration</span></a></li>

          <!-- <li><a href="send_msg.php"><i class="fa-solid fa-message"></i> <span>Message</span></a></li> -->

        </ul>
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>

    <script>
      $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
      });


      $(document).ready(function() {
        $('.btndelete').click(function() {
          var tdh = $(
            this);
          var id = $(this).attr(
            "id");
          swal({
              title: "Do you want to delete Message?",
              text: "Once message is deleted, you can not recover it!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (
                willDelete) {

                $.ajax({
                  url: 'admindelete.php',
                  type: 'post',
                  data: {
                    pidd: id
                  },
                  success: function(data) {
                    tdh.parents('tr')
                      .hide();
                  }


                });



                swal("Your Message has been deleted!", {
                  icon: "success",
                });
              } else {
                swal(
                  "Your message is safe!");
              }
            });



        });
      });
    </script>