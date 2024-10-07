<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include_once 'connectdb.php';

session_start();

 if($_SESSION['username']=="" OR $_SESSION['role']=="User"){
      
      header("location:index.php");
  }


 include_once 'header.php';

$id=$_GET['id'];

$select=$pdo->prepare("select * from tbl_user where userid=$id");
$select->execute();
$row=$select->fetch(PDO::FETCH_ASSOC);

$id_db=$row['userid'];



$name_db=$row['username'];

$email_db=$row['useremail'];

$passaword_db=$row['password'];

$role_db=$row['role'];

$logo_db=$row['image'];

//update product list


if(isset($_POST['btnupdate'])){
    


    $username=$_POST['txtname'];
    $useremail=$_POST['txtemail'];
    $password=$_POST['txtpassword'];
    $userrole=$_POST['txtselect_option'];

    
    $f_name= $_FILES['myfile']['name'];
    
    if(!empty($f_name)){

$f_tmp =  $_FILES['myfile']['tmp_name'];        
        
        
$f_size =  $_FILES['myfile']['size'];
        
    
$f_extension = explode('.',$f_name);
 $f_extension= strtolower(end($f_extension));
    
  $f_newfile =  uniqid().'.'. $f_extension;   
  
    $store = "registrationImages/".$f_newfile;
    
    
if($f_extension=='jpg' || $f_extension=='jpeg' ||  $f_extension=='png' || $f_extension=='gif'){
 
    if($f_size>=1000000 ){
        
       
        
        $error= '<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Error!",
  text: "Max file should be 1MB!",
  icon: "warning",
  button: "Ok",
});


});

</script>';
       
  echo $error;      
        
        
        
    }else{
      
       if(move_uploaded_file($f_tmp,$store)){
           
           $f_newfile;
            if(!isset($error)){
     
$update=$pdo->prepare("update tbl_user set  image=:logo, username=:username , useremail=:useremail, password=:password, role=:role  where userid = $id");
        
  

$update->bindParam(':username',$username);
//  $update->bindParam(':pcategory',$category_txt);
 $update->bindParam(':useremail',$useremail);
 $update->bindParam(':password', $password);

 $update->bindParam(':role', $userrole);
     
   
     $update->bindParam(':logo',$f_newfile);
        
     
if($update->execute()){
    
    echo'<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Edit Registration Successfully!",
  text: "Details Update",
  icon: "success",
  button: "Ok",
});


});

</script>';
    
    
}else{
    
   echo'<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "ERROR!",
  text: "Added Fail",
  icon: "error",
  button: "Ok",
});


});

</script>';  

// Display PDO errors
// print_r($update->errorInfo());
    
}     
    
 } 
           
           
           
           
           
       } 
        
        
        
    }   
    
    
    
}else
{
    
  
    
      $error= '<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Warning!",
  text: "only jpg ,jpeg, png and gif can be upload!",
  icon: "error",
  button: "Ok",
});


});

</script>';
       
  echo $error;      
  
}  
        
    }
    else{
        
        $update=$pdo->prepare("update tbl_user set  image=:logo, username=:username , useremail=:useremail, password=:password, role=:role  where userid = $id");
        
        $update->bindParam(':username',$username);
        //  $update->bindParam(':pcategory',$category_txt);
         $update->bindParam(':useremail',$useremail);
         $update->bindParam(':password', $password);
    
         $update->bindParam(':role', $userrole);
        
      
        
    $update->bindParam(':logo',$logo_db);
        
        
        if($update->execute()){
            
$error= '<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Registration Details Update Successfully",
  text: "Update",
  icon: "success",
  button: "Ok",
});


});

</script>';
       
  echo $error;      
        
        }
        else{
            
$error= '<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Error",
  
  text: "only jpg ,jpeg, png and gif can be upload!",
  icon: "error",
  button: "Ok",
});


});

</script>';
       
  echo $error;      
        
        }
    }
    
    
    
}


$select=$pdo->prepare("select * from tbl_user where userid =$id");
$select->execute();
$row=$select->fetch(PDO::FETCH_ASSOC);



$name_db=$row['username'];

$email_db=$row['useremail'];

$passaword_db=$row['password'];

$role_db=$row['role'];

$logo_db=$row['image'];

// $username_db=$row['user_name'];


?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Edit Registration Details
<!--        <small>Optional description</small>-->
      </h1>

    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
                <div class="box box-danger">
    
            
             <form action="" method="post"  name="formproduct" enctype="multipart/form-data" >

            
            <div class="box-body">
            
           
                
            <div class="col-md-6">


                <!-- <div class="form-group">
                  <label >View link</label></label>
                  <input type="text" class="form-control" name="link1" 
                value="<?php echo  $link_db ?>"   placeholder="Enter Link" required>
                </div> -->

                <div class="form-group">
                  <label >Name</label>
                  <input type="Name" name="txtname" value="<?php echo  $name_db; ?>"  class="form-control" id="exampleInputName" placeholder="Enter a name" required>
                </div>
                  
                     <div class="form-group">
                  <label >Email address</label>
                  <input type="email" name='txtemail' value="<?php echo  $email_db; ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="text" name='txtpassword' value="<?php echo  $passaword_db; ?>" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                </div>

                <div class="form-group">
                  <label>Role</label>
                  <select class="form-control" name="txtselect_option" required>
                   <option value="" disabled selected>Select Role</option>
                    <option value="Admin"<?php echo ($role_db=='Admin')?'selected':''?>>Admin</option>
                    <!-- <option value="User"<?php echo ($role_db=='User')?'selected':''?>>User</option> -->
                    
                    
                     
                  </select>
                </div>


                <div class="form-group">
                  <label >User logo</label>
                  
                  <img src = "registrationImages/<?php echo $logo_db; ?>" class="img-responsive" width="50px" height="50px"/>  
                  
                  <input type="file" class="input-group" name="myfile" >
                  <p>upload logo</p>
                </div>    

                     
                 </div>      
                
           
            
            
        
             </div>
                
            <div class="box-footer">
             
             
                  
                    
        <button type="submit" class="btn btn-warning" name="btnupdate">Edit Details</button>  
                  
                   
                   
         </div>
             
        </form>
        
        </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
<!-- add footer-->


<script>
    //Date picker
    $('#datepicker').datepicker({
        autoclose: true
    });
    
</script>   

<?php 
 
  include_once 'footer.php';
  
?>