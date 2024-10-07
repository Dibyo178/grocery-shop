<?php
 
 error_reporting(E_ALL);

// Report all PHP errors
error_reporting(-1);

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
   

    $subCategory=$_POST['subcategory'];

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
     
$insert=$pdo->prepare("insert into product_cart(image,name,price,category,subcategory) values(:logo,:name,:price,:category,:subcategory)"); 
     
 
     
     
    //  $insert->bindParam(':pdescription',$description);
     $insert->bindParam(':logo',$productimage);

     $insert->bindParam(':name',$username);

     $insert->bindParam(':price',$price);

     $insert->bindParam(':category',$userrole);

     $insert->bindParam(':subcategory',$subCategory);
    

     
     
     
if($insert->execute()){
    
    echo'<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Add Product Cart Successfull!",
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
  text: "Add Product Cart Fail",
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
    
    $delete=$pdo->prepare("delete from product_cart where id=".$_GET['deleteid']);
    
   
    
 if( $delete->execute()){
     
     
    echo '<script type="text/javascript">
             jQuery(function validation(){
               
        swal({
              title: "Product Cart !!",
              text: "Delete",
              icon: "warning",
             button: "ok",
         })
             
             });
         </script>';
 }



}

?>

<style>


    table.dataTable thead .sorting_asc:after {
        display: none;
    }

    table.dataTable thead .sorting:after {
        display: none;
    }

    table.dataTable thead .sorting_asc:after {

        display: none !important;
    }

    table.dataTable thead .sorting:after {

        display: none !important;

    }

</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="./bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Add Product Details
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
                  <label>Category</label>
                  <select class="form-control" name="txtselect_option" required>
                <option value="" disabled selected>Select Category</option>
                 
                  <?php 
                      
                $select= $pdo->prepare("select * from tbl_category order by catid desc");
                      
                      $select->execute();
                      
                      while($row=$select->fetch(PDO::FETCH_ASSOC)){
                          extract($row)
                            
                      ?>
                      
                      <option ><?php echo $row['category']; ?></option>
                      
                      <?php
                      }
                      
                      ?>
                       
                    
                    
                     
                  </select>
                </div>
                    

                <div class="form-group">
                  <label >Product SubCategory</label>
                  <input type="Name" name="subcategory" class="form-control" id="exampleInputName" placeholder="Enter a title" required>
                </div>

                 <div class="form-group">
                  <label>Product Title</label>
                  <input type="Name" name="txtname" class="form-control" id="exampleInputName" placeholder="Enter a title" required>
                </div>

                <div class="form-group">
                  <label>Price</label>
                  <input type="text" name='txtprice' class="form-control" id="exampleInputPassword1" placeholder="Enter a price" required>
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
             


                <div class="col-md-8" style="overflow-x:auto;">
                
                    <table id="example1" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Name</th>
                                  <th>Price</th>

                                  <th>Category</th>
                                  <th>Sub-Category</th>
                                  
                                  <th>Image</th>
                                  <th>Status</th>
                                  <th>Edit</th>
                                  <th>Delete</th>
                              </tr>
                          </thead>
                          
                          <tbody>
                              
                          <?php 
                            
                            $index=1;
                            
                            $view= mysqli_query($con,"select * from  product_cart ");
                            
                            while($data=mysqli_fetch_assoc($view)){
                              
                             $name=$data['name'];
                                
                             $price=$data['price'];
                                
                             $image=$data['image'];

                             $category=$data['category'];

                             $subCategory=$data['subCategory'];    

                             $status=$data['status'];
                                
                          
                                
                           
                                
                                 
                             
                              ?>
                <tr>
                <td><?php echo $index; ?></td>

<td ><?php echo $name; ?></td>

<td > <i class="fa-solid fa-bangladeshi-taka-sign"></i>  <?php echo $price; ?></td>

<td> <?php echo $category; ?></td>


<td>

  <?php

       echo ' <img src = "FoodImages/'.$image.'" class="img-rounded" width="40px" height="40px"/>';
   ?>


</td>

<td>

                                    <?php 
                                     
                      if($data['status']==1){
        echo '<p><a href="status.php?tid='.$data['id'].'&status=0" class="btn btn-success">Available</a></p>';
                                      }
                                     else{ 
                                         
         echo '<p><a href="status.php?tid='.$data['id'].'&status=1" class="btn btn-danger">Unavailable</a></p>';
                                     }
                                       
                                     ?>
 </td>


 



<td>

  <?php

   echo '<a href="editproduct_cart.php?id='.$data['id'] .'" class="btn btn-info" role="button"><span class="fa fa-pencil-square" style="color:#ffffff" data-toggle="tooltip" title="Edit Product"></span></a>';

   ?>

</td>


<td>

<?php 

echo '<a href="product_cart.php?deleteid='.$data['id'].'" class="btn btn-danger" name="btndelete" role="button"><span class="glyphicon glyphicon-trash" title="delete"></span></a>';


 ?>
</td>

                                </tr>

                                    
                                <?php
                                  
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

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>




<?php 
 
  include_once 'footer.php';
  
?>