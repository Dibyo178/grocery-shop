<?php
 

include_once 'connectdb.php';

session_start();

 if($_SESSION['username']=="" OR $_SESSION['role']==""){
      
      header("location:index.php");
  }
  

  if($_SESSION['role']=="Admin"){
      
    include_once 'header.php';
 }
else{
    
    include_once 'headeruser.php';
}


if(isset($_POST['btnaddproduct'])){
   

    $username=$_POST['txtname'];
    $useremail=$_POST['txtemail'];
    $password=$_POST['txtpassword'];
    $userrole=$_POST['txtselect_option'];
  

    
//    upload images
    
    
    $f_name= $_FILES['myfile']['name'];
    
    
    
$f_tmp = $_FILES['myfile']['tmp_name'];

    
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
           
           $productimage=$f_newfile;
            if(!isset($error)){
     
$insert=$pdo->prepare("insert into tbl_user(logo,username,useremail,password,role) values(:logo,:name,:email,:pass,:role)"); 
     
 
     
     
    //  $insert->bindParam(':pdescription',$description);
     $insert->bindParam(':logo',$productimage);

     $insert->bindParam(':name',$username);
    
     $insert->bindParam(':email',$useremail);
     
     $insert->bindParam(':pass',$password);
     
     $insert->bindParam(':role',$userrole);

     
     
     
if($insert->execute()){
    
    echo'<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Add Registration Successfull!",
  text: "Added",
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
  text: "Added  Fail",
  icon: "error",
  button: "Ok",
});


});

</script>';  
    
}     
  
     
 } 
     
           
       } 
        
        
        
    }   
    
    
    
} else

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


//delete btn


if(isset($_GET['deleteid'])){
    
    $delete=$pdo->prepare("delete from tbl_user where userid=".$_GET['deleteid']);
    
   
    
 if( $delete->execute()){
     
     
    echo '<script type="text/javascript">
             jQuery(function validation(){
               
        swal({
              title: "Account !!",
              text: "Delete",
              icon: "warning",
             button: "ok",
         })
             
             });
         </script>';
 }



}

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Resgistration Details Add
<!--        <small>Optional description</small>-->
      </h1>
<!--
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
-->
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        
        
        
        <div class="box box-danger">
            <div class="box-header with-border">
        

            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
     <form role="formproduct" action="" method="post" enctype="multipart/form-data">

            
              <div class="box-body">
              
                 
                 <div class="col-md-4">
                    

                 <div class="form-group">
                  <label >Name</label>
                  <input type="Name" name="txtname" class="form-control" id="exampleInputName" placeholder="Enter a name" required>
                </div>
                  
                     <div class="form-group">
                  <label >Email address</label>
                  <input type="email" name='txtemail' class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name='txtpassword' class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                </div>

                  <div class="form-group">
                  <label>Role</label>
                  <select class="form-control" name="txtselect_option" required>
                   <option value="" disabled selected>Select Role</option>
                    <option>Admin</option>
                    <!-- <option>User</option> -->
                    
                    
                     
                  </select>
                </div>

  
                  </div>
                      

                  <div class="form-group">
                  <label > User Image</label>
                  <input type="file" name="myfile" class="input-group"  required>
                  <p>upload logo</p>
                </div>

             

                <div class="box-footer">
                    
                    
                    <button type="submit" name='btnaddproduct' class="btn btn-info">Add Details</button>

             </div>
             


                <div class="col-md-8">
                
                    <table class="table table-striped">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Password</th>
                                  <th>Role</th>
                                  <th>Image</th>
                                  <th>Edit</th>
                                  <th>Delete</th>
                              </tr>
                          </thead>
                          
                          <tbody>
                              
                              <?php 
                              
                              $index=1; //default 1 count
                              
                              $select=$pdo->prepare("select * from tbl_user  order by userid asc");
                              
                              $select->execute();
                              
                              while($row=$select->fetch(PDO::FETCH_OBJ)){
                                  
                                echo '
                                
                                  <tr>
                                  <td>'.$index.'</td>

                                  <td>'.$row->username.'</td>
                                   
                                  <td>'.$row->useremail.'</td>
                                  
                                   <td>'.$row->password.'</td>
                                   
                                    <td>'.$row->role.'</td>
                                     
                                    <td><img src = "registrationImages/'.$row->image.'" class="img-rounded" width="40px" height="40px"/></td>
                               

                                      <td>
                                      <a href="registratinedit.php?id='.$row->userid .'" class="btn btn-info" role="button"><span class="fa fa-pencil-square" style="color:#ffffff" data-toggle="tooltip" title="Edit Product"></span></a>   
                                          
                                          </td>
                                      
                                       <td>
                                    
                                     
                         <a href="regi.php?deleteid='.$row->userid.'" class="btn btn-danger" name="btndelete" role="button"><span class="glyphicon glyphicon-trash" title="delete"></span></a>
                                    
                                      </td>
                                       </tr>
                                    
                                ';
                                  
                                  $index++;
                              }
                              
                              
                              
                              ?>
                          </tbody>
                    </table>
                  
                </div>
                
                 
               
            </div>
            
            
                                 </form>
            
        </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
<!-- add footer-->

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<script>
    //Date picker
    $('#datepicker').datepicker({
        autoclose: true
    });
    
</script>


<?php 
 
  include_once 'footer.php';
  
?>