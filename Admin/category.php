<?php

include_once 'connectdb.php';
session_start();

if ($_SESSION['username'] == "" or $_SESSION['role'] == "") {
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

// Insert Category with Image
if (isset($_POST['btnsave'])) {
    $category = $_POST['txtcategory'];
    $image = $_FILES['categoryImage']['name'];
    $image_tmp = $_FILES['categoryImage']['tmp_name'];

    if (empty($category) || empty($image)) {
        $error = '<script type="text/javascript">
            jQuery(function validation() {
                swal({
                    title: "Field is empty",
                    text: "Please fill all fields",
                    icon: "error",
                    button: "ok",
                });
            });
        </script>';
        echo $error;
    } else {
        // Move image to a directory
        move_uploaded_file($image_tmp, "category_images/" . $image);

        $insert = $pdo->prepare("INSERT INTO tbl_category(category, image) VALUES(:category, :image)");
        $insert->bindParam(':category', $category);
        $insert->bindParam(':image', $image);

        if ($insert->execute()) {
            echo '<script type="text/javascript">
            jQuery(function validation() {
                swal({
                    title: "Well Done",
                    text: "Category and Image Added",
                    icon: "success",
                    button: "ok",
                });
            });
        </script>';
        } else {
            echo '<script type="text/javascript">
            jQuery(function validation() {
                swal({
                    title: "Opps!!",
                    text: "Category is not added",
                    icon: "warning",
                    button: "ok",
                });
            });
        </script>';
        }
    }
}

// Update Category with Image
if (isset($_POST['btnupdate'])) {
    $category = $_POST['txtcategory'];
    $id = $_POST['txtid'];
    $new_image = $_FILES['categoryImage']['name'];
    $image_tmp = $_FILES['categoryImage']['tmp_name'];

    if (empty($category)) {
        $errorupdate = '<script type="text/javascript">
            jQuery(function validation() {
                swal({
                    title: "Error",
                    text: "Field is empty, please fill in the category",
                    icon: "error",
                    button: "ok",
                });
            });
        </script>';
        echo $errorupdate;
    } else {
        // Fetch the old image if a new one is not provided
        if (empty($new_image)) {
            $select = $pdo->prepare("SELECT image FROM tbl_category WHERE catid=:id");
            $select->bindParam(':id', $id);
            $select->execute();
            $row = $select->fetch(PDO::FETCH_OBJ);
            $new_image = $row->image; // Use old image if no new one is provided
        } else {
            move_uploaded_file($image_tmp, "category_images/" . $new_image); // Upload new image
        }

        $update = $pdo->prepare("UPDATE tbl_category SET category=:category, image=:image WHERE catid=:id");
        $update->bindParam(':category', $category);
        $update->bindParam(':image', $new_image);
        $update->bindParam(':id', $id);

        if ($update->execute()) {
            echo '<script type="text/javascript">
            jQuery(function validation() {
                swal({
                    title: "Good Job",
                    text: "Your category is updated",
                    icon: "success",
                    button: "ok",
                });
            });
        </script>';
        } else {
            echo '<script type="text/javascript">
            jQuery(function validation() {
                swal({
                    title: "Sorry",
                    text: "Your category is not updated",
                    icon: "error",
                    button: "ok",
                });
            });
        </script>';
        }
    }
}

// Delete Category
if (isset($_POST['btndelete'])) {
    $delete = $pdo->prepare("DELETE FROM tbl_category WHERE catid=:id");
    $delete->bindParam(':id', $_POST['btndelete']);

    if ($delete->execute()) {
        echo '<script type="text/javascript">
        jQuery(function validation() {
            swal({
                title: "Deleted",
                text: "Your category has been deleted",
                icon: "success",
                button: "ok",
            });
        });
    </script>';
    } else {
        echo '<script type="text/javascript">
        jQuery(function validation() {
            swal({
                title: "Sorry",
                text: "Your category could not be deleted",
                icon: "error",
                button: "ok",
            });
        });
    </script>';
    }
}

?>

<!-- HTML Content Wrapper -->
<div class="content-wrapper">
    <section class="content-header">
        <h1>Product Category</h1>
    </section>

    <section class="content container-fluid">
        <div class="box box-danger">
            <div class="box-body">
                <form role="form" action="" method="post" enctype="multipart/form-data">
                    <?php
                    if (isset($_POST['btnedit'])) {
                        $select = $pdo->prepare("SELECT * FROM tbl_category WHERE catid=:id");
                        $select->bindParam(':id', $_POST['btnedit']);
                        $select->execute();
                        $row = $select->fetch(PDO::FETCH_OBJ);
                        echo '
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Category</label>
                                <input type="hidden" name="txtid" class="form-control" value="' . $row->catid . '">
                                <input type="text" name="txtcategory" class="form-control" value="' . $row->category . '">
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="categoryImage" class="form-control">
                                <img src="category_images/' . $row->image . '" alt="' . $row->category . '" width="100">
                            </div>
                            <button type="submit" name="btnupdate" class="btn btn-info">Update</button>
                        </div>';
                    } else {
                        echo '
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Category</label>
                                <input type="text" name="txtcategory" class="form-control" placeholder="Enter a Category">
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="categoryImage" class="form-control">
                            </div>
                            <button type="submit" name="btnsave" class="btn btn-warning">Save</button>
                        </div>';
                    }
                    ?>

                    <div class="col-md-8">
                        <table id="tablecategory" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $index = 1;
                                $select = $pdo->prepare("SELECT * FROM tbl_category ORDER BY catid DESC");
                                $select->execute();
                                while ($row = $select->fetch(PDO::FETCH_OBJ)) {
                                    echo '
    <tr>
        <td>' . $index . '</td>
        <td>' . $row->category . '</td>
        <td><img src="category_images/' . $row->image . '" width="100"></td>
        
        <td>';

                                    // Display the correct button based on status
                                    if ($row->status == 1) {
                                        echo '<p><a href="categorystatus.php?tid=' . $row->catid . '&status=0" class="btn btn-success">Visible</a></p>';
                                    } else {
                                        echo '<p><a href="categorystatus.php?tid=' . $row->catid . '&status=1" class="btn btn-danger">Invisible</a></p>';
                                    }

                                    echo '</td>
        <td>
            <button type="submit" name="btnedit" value="' . $row->catid . '" class="btn btn-success">Edit</button>
        </td>
        <td>
            <button type="submit" name="btndelete" value="' . $row->catid . '" class="btn btn-danger">Delete</button>
        </td>
    </tr>';
                                    $index++;
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function() {
        $('#tablecategory').DataTable();
    });
</script>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?php
include_once 'footer.php';
?>