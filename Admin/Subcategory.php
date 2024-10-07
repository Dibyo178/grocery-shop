<?php
include_once 'connectdb.php';
session_start();

if ($_SESSION['username'] == "" OR $_SESSION['role'] == "") {
    header("location:index.php");
}

if ($_SESSION['role'] == "Admin") {
    include_once 'header.php';
} else {
    include_once './headeruser.php';
}

// Save subcategory
if (isset($_POST['btnsave'])) {
    $category_id = $_POST['category_select'];
    $subcategory = $_POST['txtsubcategory'];
    $product_category = $_POST['txtproductcategory']; // New input for product_category

    if (empty($category_id) || empty($subcategory) || empty($product_category)) {
        echo '<script type="text/javascript">
            jQuery(function validation() {
                swal({
                    title: "Field is empty",
                    text: "Please fill all fields",
                    icon: "error",
                    button: "ok"
                });
            });
        </script>';
    } else {
        $insert = $pdo->prepare("INSERT INTO subcategory (category, subcategory, product_category) VALUES (:category_id, :subcategory, :product_category)");
        $insert->bindParam(':category_id', $category_id);
        $insert->bindParam(':subcategory', $subcategory);
        $insert->bindParam(':product_category', $product_category);

        if ($insert->execute()) {
            echo '<script type="text/javascript">
                jQuery(function validation() {
                    swal({
                        title: "Well Done",
                        text: "Subcategory is Added",
                        icon: "success",
                        button: "ok"
                    });
                });
            </script>';
        } else {
            echo '<script type="text/javascript">
                jQuery(function validation() {
                    swal({
                        title: "Oops!",
                        text: "Subcategory is not Added",
                        icon: "warning",
                        button: "ok"
                    });
                });
            </script>';
        }
    }
}

// Update subcategory
if (isset($_POST['btnupdate'])) {
    $category_id = $_POST['category_select'];
    $subcategory = $_POST['txtsubcategory'];
    $product_category = $_POST['txtproductcategory']; // New input for product_category
    $id = $_POST['txtid'];

    if (empty($category_id) || empty($subcategory) || empty($product_category)) {
        echo '<script type="text/javascript">
            jQuery(function validation() {
                swal({
                    title: "Error",
                    text: "Please fill all fields",
                    icon: "error",
                    button: "ok"
                });
            });
        </script>';
    } else {
        $update = $pdo->prepare("UPDATE subcategory SET category=:category_id, subcategory=:subcategory, product_category=:product_category WHERE subid=:id");
        $update->bindParam(':category_id', $category_id);
        $update->bindParam(':subcategory', $subcategory);
        $update->bindParam(':product_category', $product_category);
        $update->bindParam(':id', $id);

        if ($update->execute()) {
            echo '<script type="text/javascript">
                jQuery(function validation() {
                    swal({
                        title: "Good Job",
                        text: "Subcategory Updated",
                        icon: "success",
                        button: "ok"
                    });
                });
            </script>';
        } else {
            echo '<script type="text/javascript">
                jQuery(function validation() {
                    swal({
                        title: "Sorry",
                        text: "Subcategory is not Updated",
                        icon: "error",
                        button: "ok"
                    });
                });
            </script>';
        }
    }
}

// Delete subcategory
if (isset($_POST['btndelete'])) {
    $delete = $pdo->prepare("DELETE FROM subcategory WHERE subid=" . $_POST['btndelete']);
    if ($delete->execute()) {
        echo '<script type="text/javascript">
            jQuery(function validation() {
                swal({
                    title: "Deleted",
                    text: "Subcategory Deleted",
                    icon: "success",
                    button: "ok"
                });
            });
        </script>';
    } else {
        echo '<script type="text/javascript">
            jQuery(function validation() {
                swal({
                    title: "Sorry",
                    text: "Subcategory is not Deleted",
                    icon: "error",
                    button: "ok"
                });
            });
        </script>';
    }
}
?>

<!-- HTML Section -->
<div class="content-wrapper">
    <section class="content-header">
        <h1>Product Subcategory</h1>
    </section>

    <section class="content container-fluid">
        <div class="box box-danger">
            <div class="box-header with-border"></div>

            <div class="box-body">
                <form role="form" action="" method="post">
                    <?php
                    if (isset($_POST['btnedit'])) {
                        $select = $pdo->prepare("SELECT * FROM subcategory WHERE subid=" . $_POST['btnedit']);
                        $select->execute();
                        $row = $select->fetch(PDO::FETCH_OBJ);
                    ?>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category_select" class="form-control">
                                    <?php
                                    // Fetch categories to populate the dropdown
                                    $category_stmt = $pdo->prepare("SELECT * FROM tbl_category");
                                    $category_stmt->execute();
                                    while ($category_row = $category_stmt->fetch(PDO::FETCH_OBJ)) {
                                        $selected = ($category_row->catid == $row->category_id) ? "selected" : "";
                                        echo "<option value='$category_row->catid' $selected>$category_row->category</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Subcategory</label>
                                <input type="text" name="txtsubcategory" class="form-control" value="<?= $row->subcategory ?>" placeholder="Enter Subcategory">
                            </div>
                            <div class="form-group">
                                <label>Product Category</label> <!-- New input for product_category -->
                                <input type="text" name="txtproductcategory" class="form-control" value="<?= $row->product_category ?>" placeholder="Enter Product Category">
                            </div>
                            <input type="hidden" name="txtid" value="<?= $row->subid ?>" />
                            <button type="submit" name="btnupdate" class="btn btn-info">Update</button>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category_select" class="form-control">
                                    <option value="">Select Category</option>
                                    <?php
                                    // Fetch categories to populate the dropdown
                                    $category_stmt = $pdo->prepare("SELECT * FROM tbl_category");
                                    $category_stmt->execute();
                                    while ($category_row = $category_stmt->fetch(PDO::FETCH_OBJ)) {
                                        echo "<option value='$category_row->catid'>$category_row->category</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Subcategory</label>
                                <input type="text" name="txtsubcategory" class="form-control" placeholder="Enter Subcategory">
                            </div>
                            <div class="form-group">
                                <label>Product Category</label> <!-- New input for product_category -->
                                <input type="text" name="txtproductcategory" class="form-control" placeholder="Enter Product Category">
                            </div>
                            <button type="submit" name="btnsave" class="btn btn-warning">Save</button>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="col-md-8">
                        <table id="tablesubcategory" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    <th>Product Category</th> <!-- Display product_category -->
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $index = 1;
                                $select = $pdo->prepare("SELECT sc.*, c.category FROM subcategory sc JOIN tbl_category c ON sc.category = c.catid ORDER BY subid DESC");
                                $select->execute();
                                while ($row = $select->fetch(PDO::FETCH_OBJ)) {
                                    echo "<tr>
                                        <td>{$index}</td>
                                        <td>{$row->category}</td>
                                        <td>{$row->subcategory}</td>
                                        <td>{$row->product_category}</td> <!-- Display product_category -->
                                        <td><button type='submit' name='btnedit' value='{$row->subid}' class='btn btn-success'>Edit</button></td>
                                        <td><button type='submit' name='btndelete' value='{$row->subid}' class='btn btn-danger'>Delete</button></td>
                                    </tr>";
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
    $('#tablesubcategory').DataTable();
});
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
</script>

<?php include_once 'footer.php'; ?>
