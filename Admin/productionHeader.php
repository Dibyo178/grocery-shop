<?php



include_once 'tokenconnect.php';

// session_start();

$msg="";

if(!isset($_SESSION['userid'])){
    
    ?>
    <script>
        
        window.location.href='index.php';
          
  </script>
  
  <?php
}



 
  if($_SESSION['username']=="" OR $_SESSION['role']=="User"){
      
      header("location:index.php");
  }

// include_once 'header.php';

 error_reporting(0);


  $uid=$_SESSION['userid'];

if(isset($_POST['btnsave'])){

$to_id=mysqli_real_escape_string($con,$_POST['txtselect_option']);
    
$description=mysqli_real_escape_string($con,$_POST['txtdescription']);


   mysqli_query($con,"insert into tbl_notify(form_id,to_id,message) values('$uid','$to_id','$description')");
    
    
    
    $msg="Message Send";

    
    
}


$res_msg=mysqli_query($con,"select tbl_user.username,tbl_notify.message,tbl_notify.id from tbl_user, tbl_notify where tbl_notify.status=0 and tbl_notify.to_id='$uid' and tbl_user.userid=tbl_notify.form_id");


$unread_count=mysqli_num_rows($res_msg);

$sql= "select userid,username from tbl_user ";

$res_user=mysqli_query($con,$sql);



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
  <title>Adlink</title>
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

<link rel="icon" type="image" href="Adlink%20png.png" style="background:#fff" >
 
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  
    <link rel="stylesheet" href="main.css">
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
  <header class="main-header" >

     <!-- Logo -->
    <a href="dashboard.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><span class="logo-lg"><img style="width:40px;height:25px" src="hisabana.png" alt=""></span>
</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img style="width:70px;height:45px" src="hisabana.png" alt=""></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation" style="bacckground-color:'#BF1E2E' !important">
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
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning" id="count"><?php echo $unread_count; ?></span>
            </a>
             <ul class="dropdown-menu">
              <li class="header">You have <?php echo $unread_count; ?> notifications
            
              
              </li>
              <li>
                <!-- inner menu: contains the actual data -->
               
                       
                <ul class="menu">
                  <li>
                    <a href="#">
                           <?php if($unread_count>0){
                     while($row_message=mysqli_fetch_assoc($res_msg)){
                        
                           
                        ?>
                        
                 
                            <p>
                                <strong>
                                <?php echo $row_message['username']; ?>
                            </strong>
                            <?php echo $row_message['message']; ?>
                            
                            <span><button id='<?php echo $row_message['id'] ; ?>' class="btn btn-danger btndelete"><span class="glyphicon glyphicon-trash" style="color:#ffffff" data-toggle="tooltip" title="Delete Order"></span></button></span>
                            </p>
                        
                         
                    <?php }} ;?>
                    </a>
                 
                </ul>
              </li>
              
            </ul>
            
          </li>
    
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="Adlink%20png.png" style="background:#fff;width:40px;height:30px" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $_SESSION['username']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="Adlink%20png.png" style="padding:10px; background:#fff"  class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['useremail']; ?>
                  <small>Managing Director</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
<!--
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
-->
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="changepassword.php" class="btn btn-default btn-flat">Change Password</a>
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
      <div class="user-panel ">
        <div class="pull-left image ">
                   <img src="adlinkSmall.png" style="background:#fff;width:100px;padding:5px;border-radius:5px"  alt="User Image">

        </div>
        <div class="pull-left info">
          <p style="color:#4bd34b !important">Welcome-<?php echo $_SESSION['username']; ?></p>
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
        
        <li><a href="category.php"><i class="fa fa-list-alt"></i> <span>Category</span></a></li>
        
        
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i> <span>Service</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addProduct.php"><i class="fa fa-plus-square"></i>Add Service</a></li>
            <li><a href="productlist.php"><i class="fa fa-list"></i>Service List</a></li>
          </ul>
        </li>
         
<!--
          <li><a href="addProduct.php"><i class="fa fa-product-hunt"></i> <span>Add Product</span></a></li>
          
           <li><a href="productlist.php"><i class="fa fa-th-list"></i> <span>Product List</span></a></li>
           
           
-->
               <li class="treeview">
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
        </li>
           
 
           
                     <!--order create-->
                     
                     
                     
          <li class="treeview">
          <a href="#">
            <i class='fas fa-pen-nib'></i> <span>Grapics</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
<!--            <li><a href="createToken.php"><i class="fa fa-plus-square" aria-hidden="true"></i>Create Token</a></li>-->
            <li><a href="tokenList.php"><i class="fa fa-list-ul"></i>Token List</a></li>
             <li><a href="tokenProduction.php"><i class="fa fa-plus-circle" aria-hidden="true"></i>Create Token Production</a></li>
          </ul>
        </li>              
                
                   
                               <li class="treeview">
          <a href="#">
            <i class="fa fa-industry"></i> <span>Production</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
<!--            <li><a href="addcustomer.php"><i class="fa fa-plus-circle"></i>Add Customer</a></li>-->
            <li><a href="productiontoken.php"><i class="fa fa-list-ul"></i>Production Token List</a></li>
            
              <li><a href="tokenReception.php"><i class="fa fa-plus-square"></i>Create Token Reception</a></li>
            
          </ul>
        </li>
           
                    
<!--
                     
             <li class="treeview">
          <a href="#">
            <i class="ion ion-bag"></i> <span>Order</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="createToken.php"><i class="fa fa-plus-square" aria-hidden="true"></i>Create Token</a></li>
            <li><a href="createinvoice.php"><i class="fa fa-list-ul"></i>Create Invoice</a></li>
          </ul>
        </li>         
-->
            
                     
                              
                                                
           
<!--            <li><a href="createorder.php"><i class="fa fa-plus-circle"></i> <span>Createorder</span></a></li>-->
            
          
            
            
            
             <li class="treeview">
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
        </li>
          
         <li><a href="registration.php"><i class="fa fa-user-circle"></i> <span>Registration</span></a></li>
         
         <li><a href="send_msg.php"><i class="fa fa-user-circle"></i> <span>Message</span></a></li>
<!--
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li>
-->
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