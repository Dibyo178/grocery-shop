<?php
include_once 'connectdb.php';
session_start();

// Redirect if not logged in
if ($_SESSION['username'] == "" || $_SESSION['role'] == "") {
    header("location:index.php");
}

// Include the appropriate header based on the user role
if ($_SESSION['role'] == "Admin") {
    include_once 'header.php';
} else {
    include_once './headeruser.php';
}

// Add Product Offer
if (isset($_POST['btnaddproduct'])) {
    $description = $_POST['description'];

    // Upload image
    $f_name = $_FILES['myfile']['name'];
    $f_tmp = $_FILES['myfile']['tmp_name'];
    $f_size = $_FILES['myfile']['size'];
    $f_extension = strtolower(pathinfo($f_name, PATHINFO_EXTENSION));
    $f_newfile = uniqid() . '.' . $f_extension;
    $store = "aboutimages/" . $f_newfile;

    if (in_array($f_extension, ['jpg', 'jpeg', 'png', 'gif'])) {
        if ($f_size <= 1000000) { // 1MB file size limit
            if (move_uploaded_file($f_tmp, $store)) {
                $productimage = $f_newfile;
                
                // Corrected INSERT query
                $insert = $pdo->prepare("INSERT INTO about(image, description) VALUES(:logo, :description)");
                $insert->bindParam(':logo', $productimage);
                $insert->bindParam(':description', $description);

                if ($insert->execute()) {
                    echo '<script type="text/javascript">
                    jQuery(function validation(){
                        swal({
                          title: "Success!",
                          text: "About Details Added Successfully!",
                          icon: "success",
                          button: "Ok",
                        });
                    });
                    </script>';
                } else {
                    print_r($insert->errorInfo()); // Display error information
                }
            }
        } else {
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
    $delete = $pdo->prepare("DELETE FROM about WHERE id = :id");
    $delete->bindParam(':id', $_GET['deleteid'], PDO::PARAM_INT);
    
    if ($delete->execute()) {
        echo '<script type="text/javascript">
        jQuery(function validation(){
            swal({
              title: "About Details Deleted!",
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
        <h1>Add About</h1>
    </section>

    <section class="content container-fluid">
        <div class="box box-danger">
            <div class="box-header with-border"></div>

            <!-- Form start -->
            <form role="formproduct" action="" method="post" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>About Description</label>
                            <textarea name="description" id="" cols="40" rows="5" required></textarea>
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="myfile" class="input-group" required>
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
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $index = 1;
                                $select = $pdo->prepare("SELECT * FROM about ORDER BY id ASC");
                                $select->execute();
                                while ($row = $select->fetch(PDO::FETCH_OBJ)) {
                                    echo '
                                    <tr>
                                        <td>' . $index . '</td>
                                        <td>' . htmlspecialchars($row->description) . '</td>
                                        <td><img src="aboutimages/' . htmlspecialchars($row->image) . '" class="img-rounded" width="40px" height="40px"/></td>
                                        <td>
                                            <a href="editabout.php?id=' . $row->id . '" class="btn btn-info" role="button">
                                                <span class="fa fa-pencil-square" style="color:#ffffff" data-toggle="tooltip" title="Edit Product"></span>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="?deleteid=' . $row->id . '" class="btn btn-danger" role="button">
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
