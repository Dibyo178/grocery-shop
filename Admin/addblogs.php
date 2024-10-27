<?php
include_once 'connectdb.php';
session_start();

if ($_SESSION['username'] == "" || $_SESSION['role'] == "") {
    header("location:index.php");
}

if ($_SESSION['role'] == "Admin") {
    include_once 'header.php';
}  else {
    include_once './headeruser.php';
}

// Add Product Offer
if (isset($_POST['btnaddproduct'])) {

    $username = $_POST['txtname'];

    $description = $_POST['description'];

    // Upload image
    $f_name = $_FILES['myfile']['name'];
    $f_tmp = $_FILES['myfile']['tmp_name'];
    $f_size = $_FILES['myfile']['size'];
    $f_extension = explode('.', $f_name);
    $f_extension = strtolower(end($f_extension));
    $f_newfile = uniqid() . '.' . $f_extension;
    $store = "blogimage/" . $f_newfile;

    if (in_array($f_extension, ['jpg', 'jpeg', 'png', 'gif'])) {
        if ($f_size >= 10000000) {
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
                    // Corrected INSERT query
                    $insert = $pdo->prepare("INSERT INTO blog(image, name,description) VALUES(:logo, :name,:description)");
                    $insert->bindParam(':logo', $productimage);
                    $insert->bindParam(':name', $username);

                    $insert->bindParam(':description', $username);

                    if ($insert->execute()) {
                        echo '<script type="text/javascript">
                        jQuery(function validation(){
                            swal({
                              title: "Blog Added Successfully!",
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
                              text: "Blog Add Failed",
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
    $delete = $pdo->prepare("DELETE FROM addfood WHERE id=" . $_GET['deleteid']);
    if ($delete->execute()) {
        echo '<script type="text/javascript">
        jQuery(function validation(){
            swal({
              title: "Blog Deleted!",
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
.form-control {
    position: relative;
    z-index: 10;
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
                        <div class="form-group">
                            <label>Blog Title</label>
                            <input type="text" name="txtname" class="form-control" id="exampleInputName" placeholder="Enter a blog title" required>
                        </div>

                        <div class="form-group">
                            <label>Blog Description</label>
                            <!-- <input type="text" name="txtname" class="form-control" id="exampleInputName" placeholder="Enter a link" required> -->
                             <textarea name="description" id="" cols="40" rows="5"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Product Image</label>
                            <input type="file" name="myfile" class="input-group" required>
                            <!-- <p>Image size should be less than 1MB. Allowed types: jpg, jpeg, png, gif.</p> -->
                        </div>

                        <div class="box-footer">
                            <button type="submit" name='btnaddproduct' class="btn btn-info">Add Details</button>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Link</th>
                                    <th>Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $index = 1;
                                $select = $pdo->prepare("SELECT * FROM blog ORDER BY id ASC");
                                $select->execute();
                                while ($row = $select->fetch(PDO::FETCH_OBJ)) {
                                    echo '
                                    <tr>
                                        <td>' . $index . '</td>
                                        <td>' . $row->name . '</td>
                                        
                                        <td>' . $row->description. '</td>
                                    
                                        <td><img src="blogimage/' . $row->image . '" class="img-rounded" width="40px" height="40px"/></td>
                                        <td>
                                            <a href="editblog.php?id=' . $row->id . '" class="btn btn-info" role="button">
                                                <span class="fa fa-pencil-square" style="color:#ffffff" data-toggle="tooltip" title="Edit Product"></span>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="deleteid=' . $row->id . '" class="btn btn-danger" role="button">
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
