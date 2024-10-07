<?php

include_once 'connectdb.php';

session_start();

if ($_SESSION['username'] == "" or $_SESSION['role'] == "User") {

  header("location:index.php");
}


include_once 'header.php';

$id = $_GET['id'];

$select = $pdo->prepare("select * from gallery where id=$id");
$select->execute();
$row = $select->fetch(PDO::FETCH_ASSOC);

$id_db = $row['id'];

$logo_db = $row['image'];



//update product list


if (isset($_POST['btnupdate'])) {



  $f_name = $_FILES['myfile']['name'];

  if (!empty($f_name)) {

    $f_tmp =  $_FILES['myfile']['tmp_name'];


    $f_size =  $_FILES['myfile']['size'];


    $f_extension = explode('.', $f_name);
    $f_extension = strtolower(end($f_extension));

    $f_newfile =  uniqid() . '.' . $f_extension;

    $store = "galleryimage/" . $f_newfile;


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

            $update = $pdo->prepare("update gallery set  image=:logo  where id  = $id");




            $update->bindParam(':logo', $f_newfile);


            if ($update->execute()) {

              echo '<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Add gallery Successfull!",
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
  text: "Fail",
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

    $update = $pdo->prepare("update gallery set  image=:logo where id = $id");





    $update->bindParam(':logo', $logo_db);

  


    if ($update->execute()) {

      $error = '<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Gallery Update Successfuly",
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


$select = $pdo->prepare("select * from gallery where id =$id");
$select->execute();
$row = $select->fetch(PDO::FETCH_ASSOC);





$logo_db = $row['image'];



// $username_db=$row['user_name'];


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Edit Gallery Details
      <!--        <small>Optional description</small>-->
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
              <label>image</label>

              <img src="galleryimage/<?php echo $logo_db; ?>" class="img-responsive" width="50px" height="50px" />

              <input type="file" class="input-group" name="myfile">
              <p>upload logo</p>
            </div>


          </div>





        </div>

        <div class="box-footer">




          <button type="submit" class="btn btn-warning" name="btnupdate">Edit Image</button>



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