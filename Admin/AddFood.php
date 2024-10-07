<?php
 

include_once 'connectdb.php';

session_start();

 if($_SESSION['username']=="" OR $_SESSION['role']==""){
      
      header("location:index.php");
  }
  

  if ($_SESSION['role'] == "Admin") {

    include_once 'header.php';
} else if(($_SESSION['role'] == "User-Nayasarak")) {

    include_once 'headeruser.php';
}

else if(($_SESSION['role'] == "User-Zindabazar")) {

    include_once './zindabazarHeader.php';
}

else{

    include_once './manikpirHeader.php';

}



if(isset($_POST['btnaddproduct'])){
   

    $username=$_POST['txtname'];
    
    $price=$_POST['txtprice'];

    $userrole=$_POST['txtselect_option'];
  

    
//    upload images
    
    
    $f_name= $_FILES['myfile']['name'];
    
    
    
$f_tmp = $_FILES['myfile']['tmp_name'];

    
 $f_size =  $_FILES['myfile']['size'];
    
$f_extension = explode('.',$f_name);
 $f_extension= strtolower(end($f_extension));
    
  $f_newfile =  uniqid().'.'. $f_extension;   
  
    $store = "FoodImages/".$f_newfile;
    
    
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
     
$insert=$pdo->prepare("insert into addfood(image,name,price,role) values(:logo,:name,:price,:role)"); 
     
 
     
     
    //  $insert->bindParam(':pdescription',$description);
     $insert->bindParam(':logo',$productimage);

     $insert->bindParam(':name',$username);

     $insert->bindParam(':price',$price);
     
     $insert->bindParam(':role',$userrole);

     
     
     
if($insert->execute()){
    
    echo'<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Add Food Offer Successfull!",
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
  text: "Add Food Offer Fail",
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
    
    $delete=$pdo->prepare("delete from addfood where id=".$_GET['deleteid']);
    
   
    
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
       Add Food Offer Details
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
                  <label>Price</label>
                  <input type="text" name='txtprice' class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                </div>

                  <div class="form-group">
                  <label>Branch</label>
                  <select class="form-control" name="txtselect_option" required>
                   <option value="" disabled selected>Select Role</option>
                    <option>Branch1</option>
                    <option>Branch2</option>
                    <option>Branch3</option>
                  </select>
                </div>

  
                  </div>
                      

                  <div class="form-group">
                  <label >Food Image</label>
                  <input type="file" name="myfile" class="input-group"  required>
                  <p>Image</p>
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
                                  <th>Price</th>
                                  <th>Branch</th>
                                  <th>Image</th>
                                  <th>Edit</th>
                                  <th>Delete</th>
                              </tr>
                          </thead>
                          
                          <tbody>
                              
                              <?php 
                              
                              $index=1; //default 1 count
                              
                              $select=$pdo->prepare("select * from addfood order by id asc");
                              
                              $select->execute();
                              
                              while($row=$select->fetch(PDO::FETCH_OBJ)){
                                  
                                echo '
                                
                                  <tr>
                                  <td>'.$index.'</td>

                                  <td>'.$row->name.'</td>
                                   
                                  <td>'.$row->price.'</td>

                                    <td>'.$row->role.'</td>
                                     
                                    <td><img src = "FoodImages/'.$row->image.'" class="img-rounded" width="40px" height="40px"/></td>
                               

                                      <td>
                                      <a href="EditFood.php?id='.$row->id .'" class="btn btn-info" role="button"><span class="fa fa-pencil-square" style="color:#ffffff" data-toggle="tooltip" title="Edit Product"></span></a>   
                                          
                                          </td>
                                      
                                       <td>
                                    
                                     
                         <a href="AddFood.php?deleteid='.$row->id.'" class="btn btn-danger" name="btndelete" role="button"><span class="glyphicon glyphicon-trash" title="delete"></span></a>
                                    
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