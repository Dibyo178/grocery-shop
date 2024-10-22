<?php
include_once 'connectdb.php';
session_start();

if ($_SESSION['username'] == "" || $_SESSION['role'] == "") {
    header("location:index.php");
}

if ($_SESSION['role'] == "Admin") {
    include_once 'header.php';
} else if ($_SESSION['role'] == "User-Nayasarak") {
    include_once 'headeruser.php';
} else if ($_SESSION['role'] == "User-Zindabazar") {
    include_once './zindabazarHeader.php';
} else {
    include_once './manikpirHeader.php';
}

// Add Product Offer
if (isset($_POST['btnaddproduct'])) {
    $username = $_POST['txtname'];
    $price = $_POST['txtprice'];

    // Upload image
    $f_name = $_FILES['myfile']['name'];
    $f_tmp = $_FILES['myfile']['tmp_name'];
    $f_size = $_FILES['myfile']['size'];
    $f_extension = explode('.', $f_name);
    $f_extension = strtolower(end($f_extension));
    $f_newfile = uniqid() . '.' . $f_extension;
    $store = "slider-image/" . $f_newfile;

    if (in_array($f_extension, ['jpg', 'jpeg', 'png', 'gif'])) {
        if ($f_size >= 1000000) {
            echo '<script type="text/javascript">
            jQuery(function validation(){
                swal({
                  title: "Error!",
                  text: "Max file size should be 1MB!",
                  icon: "warning",
                  button: "Ok",
                });
            });
            </script>';
        } else {
            if (move_uploaded_file($f_tmp, $store)) {
                $productimage = $f_newfile;
                if (!isset($error)) {
                    $insert = $pdo->prepare("INSERT INTO tbl_slider(image, text1, text2) VALUES(:logo, :text1, :text2)");
                    $insert->bindParam(':logo', $productimage);
                    $insert->bindParam(':text1', $username);
                    $insert->bindParam(':text2', $price);

                    if ($insert->execute()) {
                        echo '<script type="text/javascript">
                        jQuery(function validation(){
                            swal({
                              title: "Product Added Successfully!",
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
                              text: "Product Addition Failed",
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
        echo '<script type="text/javascript">
        jQuery(function validation(){
            swal({
              title: "Warning!",
              text: "Only jpg, jpeg, png, and gif files are allowed!",
              icon: "error",
              button: "Ok",
            });
        });
        </script>';
    }
}

// Delete functionality
if (isset($_GET['deleteid'])) {
    $delete = $pdo->prepare("DELETE FROM tbl_slider WHERE id=" . $_GET['deleteid']);
    if ($delete->execute()) {
        echo '<script type="text/javascript">
        jQuery(function validation(){
            swal({
              title: "Product Deleted!",
              text: "Deleted",
              icon: "warning",
              button: "Ok",
            });
        });
        </script>';
    }
}
?>

<style>
/* Add this to your CSS file */
.form-control {
    position: relative; /* Ensure it's placed correctly */
    z-index: 10; /* Ensures it's above any other overlapping elements */
}

</style>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <section class="content-header">
        <h1>Add Product Offer Details</h1>
    </section>

    <section class="content container-fluid">
        <div class="box box-danger">
            <div class="box-header with-border"></div>

            <!-- Form start -->
            <form role="formproduct" action="" method="post" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="col-md-4">
                        <label style="margin-top: -5px;color:red">* Optoinal Text1 and Text 2 *</label>
                        <div class="form-group">
                            <label>Text1</label>
                            <input type="text" name="txtname" class="form-control" id="exampleInputName" placeholder="Enter a Text 1" >
                        </div>

                        <div class="form-group">
                            <label>Text2</label>
                            <input type="text" name='txtprice' class="form-control" id="exampleInputPrice" placeholder="Enter a Text 2" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Food Image</label>
                        <input type="file" name="myfile" class="input-group" required>
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
                                    <th>Text 1</th>
                                    <th>Text 2</th>
                                    
                                    <th>Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $index = 1;
                                $select = $pdo->prepare("SELECT * FROM tbl_slider ORDER BY id ASC");
                                $select->execute();
                                while ($row = $select->fetch(PDO::FETCH_OBJ)) {
                                    echo '
                                    <tr>
                                        <td>' . $index . '</td>
                                        <td>' . $row->text1 . '</td>
                                        <td>' . $row->text2 . '</td>
                                      
                                        <td><img src="slider-image/' . $row->image . '" class="img-rounded" width="40px" height="40px"/></td>
                                        <td>
                                            <a href="editslider.php?id=' . $row->id . '" class="btn btn-info" role="button">
                                                <span class="fa fa-pencil-square" style="color:#ffffff" data-toggle="tooltip" title="Edit Product"></span>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="AddFood.php?deleteid=' . $row->id . '" class="btn btn-danger" role="button">
                                                <span class="glyphicon glyphicon-trash" title="delete"></span>
                                            </a>
                                        </td>
                                    </tr>';
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
</div>

<script>
    // To prevent form resubmission on page refresh
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?php
include_once 'footer.php';
?>
