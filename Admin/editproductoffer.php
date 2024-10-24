<?php

include_once 'connectdb.php';

session_start();

if ($_SESSION['username'] == "" or $_SESSION['role'] == "") {

  header("location:index.php");
}


if ($_SESSION['role'] == "Admin") {

  include_once 'header.php';
} else {

  include_once './headeruser.php';
}


$id = $_GET['id'];

$select = $pdo->prepare("select * from addfood where id=$id");
$select->execute();
$row = $select->fetch(PDO::FETCH_ASSOC);



$id_db = $row['id'];

$name_db = $row['name'];

$price_db = $row['price'];

$role_db = $row['role'];

$logo_db = $row['image'];




if (isset($_POST['btnupdate'])) {


  $username = $_POST['txtname'];




  $f_name = $_FILES['myfile']['name'];

  if (!empty($f_name)) {

    $f_tmp =  $_FILES['myfile']['tmp_name'];


    $f_size =  $_FILES['myfile']['size'];


    $f_extension = explode('.', $f_name);
    $f_extension = strtolower(end($f_extension));

    $f_newfile =  uniqid() . '.' . $f_extension;

    $store = "FoodImages/" . $f_newfile;


    if ($f_extension == 'jpg' || $f_extension == 'jpeg' ||  $f_extension == 'png' || $f_extension == 'gif') {

      if ($f_size >= 1000000) {



        $error = '<script type="text/javascript">
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
      } else {

        if (move_uploaded_file($f_tmp, $store)) {

          $f_newfile;
          if (!isset($error)) {

            $update = $pdo->prepare("update addfood set image=:logo,name=:username  where id = $id");



            $update->bindParam(':username', $username);



            $update->bindParam(':logo', $f_newfile);


            if ($update->execute()) {

              echo '<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Edit Product Offer Successfull!",
  text: "Added",
  icon: "success",
  button: "Ok",
});


});

</script>';
            } else {

              echo '<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "ERROR!",
  text: "Edit Product Offer Fail",
  icon: "error",
  button: "Ok",
});


});

</script>';
            }
          }
        }
      }
    } else {



      $error = '<script type="text/javascript">
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
  } else {

    $update = $pdo->prepare("update addfood set  image=:logo, name=:username where id = $id");

    $update->bindParam(':username', $username);

    $update->bindParam(':logo', $logo_db);


    if ($update->execute()) {

      $error = '<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Product Offer Update Successfuly",
  text: "Update",
  icon: "success",
  button: "Ok",
});


});

</script>';

      echo $error;
    } else {

      $error = '<script type="text/javascript">
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


$select = $pdo->prepare("select * from addfood where id =$id");
$select->execute();
$row = $select->fetch(PDO::FETCH_ASSOC);



$name_db = $row['name'];

$logo_db = $row['image'];




?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     Edit Product Offer Details

    </h1>

  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <!--------------------------
        | Your Page Content Here |
        -------------------------->
    <div class="box box-danger">


      <form action="" method="post" name="formproduct" enctype="multipart/form-data">


        <div class="box-body">



          <div class="col-md-6">


            <!-- <div class="form-group">
                  <label >View link</label></label>
                  <input type="text" class="form-control" name="link1" 
                value="<?php echo  $link_db ?>"   placeholder="Enter Link" required>
                </div> -->

            <div class="form-group">
              <label>Product offret link</label>
              <input type="Name" name="txtname" value="<?php echo  $name_db; ?>" class="form-control" id="exampleInputName" placeholder="Enter a name" required>
            </div>



            <div class="form-group">
              <label>Images</label>

              <img src="FoodImages/<?php echo $logo_db; ?>" class="img-responsive" width="50px" height="50px" />

              <input type="file" class="input-group" name="myfile">
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