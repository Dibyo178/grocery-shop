<!--all javascript file-->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>

<script src="bower_components/sweetalert/sweetalert.js"></script>


<!-- session = user data store (insepect)-->

<?php 



 include_once 'connectdb.php';

//include_once 'tokenconnect.php';
   
 // does not showw error message 

 error_reporting(E_ERROR | E_PARSE);
  
  session_start();

if(isset($_POST['btn_login'])){
    
    $username= $_POST['txt_name'];
    
    $password =  $_POST['txt_password'];
    
    
    
//    echo $username." - ".$password;
    
    $select= $pdo->prepare("select * from tbl_user where username='$username' AND password='$password'");
    
    $select->execute();
    
    $row =$select->fetch(PDO::FETCH_ASSOC);
    
    if($row['username']==$username AND $row['password']==$password AND $row['role']=='Admin'){ //admin
        
        $_SESSION['userid']=$row['userid'];
        $_SESSION['username']=$row['username'];
        $_SESSION['useremail']=$row['useremail'];
        $_SESSION['role']=$row['role'];
        
        
       echo '<script type="text/javascript">
             jQuery(function validation(){
               
        swal({
              title: "Successfully Login!' .$_SESSION['username'].'",
              text: "Details Matched",
              icon: "success",
             button: "Loading....",
         })
             
             });
         </script>';
        
        header('refresh:3;dashboard.php');
    }
    else if($row['username']==$username AND $row['password']==$password AND $row['role']=='User')  //user
    {
        
              $_SESSION['userid']=$row['userid'];
        $_SESSION['username']=$row['username'];
        $_SESSION['useremail']=$row['useremail'];
        $_SESSION['role']=$row['role'];
//         echo $success='login successfull';
        
         echo '<script type="text/javascript">
             jQuery(function validation(){
               
        swal({
              title: "Successfully Login!' .$_SESSION['username'].'",
              text: "Details Matched",
              icon: "success",
             button: "Loading....",
         })
             
             });
         </script>';
        header('refresh:4;user.php');
    }
        else if($row['username']==$username AND $row['password']==$password AND $row['role']=='User-Manikpir')  //user
    {
        
              $_SESSION['userid']=$row['userid'];
        $_SESSION['username']=$row['username'];
        $_SESSION['useremail']=$row['useremail'];
        $_SESSION['role']=$row['role'];
//         echo $success='login successfull';
        
         echo '<script type="text/javascript">
             jQuery(function validation(){
               
        swal({
              title: "Successfully Login!' .$_SESSION['username'].'",
              text: "Details Matched",
              icon: "success",
             button: "Loading....",
         })
             
             });
         </script>';
        header('refresh:1;Manikpir.php');
    }
     else if($row['username']==$username AND $row['password']==$password AND $row['role']=='User-Zindabazar')  //user
    {
        
              $_SESSION['userid']=$row['userid'];
        $_SESSION['username']=$row['username'];
        $_SESSION['useremail']=$row['useremail'];
        $_SESSION['role']=$row['role'];
//         echo $success='login successfull';
        
         echo '<script type="text/javascript">
             jQuery(function validation(){
               
        swal({
              title: "Successfully Login!' .$_SESSION['username'].'",
              text: "Details Matched",
              icon: "success",
             button: "Loading....",
         })
             
             });
         </script>';
        header('refresh:1;Zindabazar.php');
    }
    
    
    else{
          
            
          
         echo '<script type="text/javascript">
             jQuery(function validation(){
               
        swal({
              title: "Warning Name Or Password is Wrong!",
              text: "Try again",
              icon: "error",
             button: "ok",
         })
             
             });
         </script>';
    
    }
    
}

 ?>






<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Account Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="icon" type="image" href="../assets/logo/mobile/favicon.png">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <link rel="stylesheet" href="main.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page account-bg">
    <div class="login-container">
        <div class="login-box">
            <div class="login-logo">
                <img src="../assets/logo/favicon.png" alt="Bazar Logo" class="logo-img">
            </div>

            <div class="login-box-body">
                <form action="" method="post">
                    <div class="form-group regi-from-group">
                        <input type="text" class="form-control form-input regi-from-input" placeholder="Name" name="txt_name" required>
                        <span class="input-icon regi-icon">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>
                    <div class="form-group regi-from-group">
                        <input type="password" class="form-control form-input regi-from-input" placeholder="Password" name="txt_password" required>
                        <span class="input-icon regi-icon">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <a href="#" onclick="swal('To Get Password','Please connect to Admin','error')" class="forgot-password regi-password-btn">I forgot my password</a>
                        </div>
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block index_btn regi-index-btn" name='btn_login'>Login</button>
                        </div>
                    </div>
                </form>
            </div>

          
        </div>
    </div>

    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
</body>


</html>