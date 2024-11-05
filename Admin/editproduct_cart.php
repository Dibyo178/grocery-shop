<?php

include_once 'connectdb.php';
session_start();

if ($_SESSION['username'] == "" || $_SESSION['role'] == "") {
    header("location:index.php");
}

if ($_SESSION['role'] == "Admin") {
    include_once 'header.php';
} else {
    include_once './headeruser.php';
}

$id = $_GET['id'];

$select = $pdo->prepare("SELECT * FROM product_cart WHERE id = :id");
$select->bindParam(':id', $id);
$select->execute();
$row = $select->fetch(PDO::FETCH_ASSOC);

$id_db = $row['id'];
$name_db = $row['name'];
$price_db = $row['price'];
$previous_price_db = $row['previous_price'];
$tax_db = $row['tax'];
$txtdiscountprice_db = $row['txtdiscountprice'];
$category_db = $row['category'];
$logo_db = $row['image'];
$product_type_db = $row['product_type'];

if (isset($_POST['btnupdate'])) {
    $username = $_POST['txtname'];
    $price = $_POST['txtprice'];
    $previous_price = $_POST['txtpreviousprice'];
    $previous_price = $_POST['txtpreviousprice'];
    $discount_price = $_POST['txtdiscountprice'];
    $product_type = $_POST['product_type'];
    $taxprice = $_POST['txttax'];

    $f_name = $_FILES['myfile']['name'];
    
    if (!empty($f_name)) {
        $f_tmp = $_FILES['myfile']['tmp_name'];
        $f_size = $_FILES['myfile']['size'];
        $f_extension = strtolower(pathinfo($f_name, PATHINFO_EXTENSION));
        $f_newfile = uniqid() . '.' . $f_extension;
        $store = "FoodImages/" . $f_newfile;

        if (in_array($f_extension, ['jpg', 'jpeg', 'png', 'gif'])) {
            if ($f_size >= 1000000) {
                echo '<script>
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
                    $update = $pdo->prepare("UPDATE product_cart 
                                             SET image = :logo, name = :username, price = :price, previous_price = :previous_price, product_type = :product_type, txtdiscountprice = :txtdiscountprice ,tax=:tax
                                             WHERE id = :id");
                    $update->bindParam(':username', $username);
                    $update->bindParam(':price', $price);
                    $update->bindParam(':previous_price', $previous_price);
                    $update->bindParam(':tax', $taxprice);
                    $update->bindParam(':product_type', $product_type);
                    $update->bindParam(':txtdiscountprice', $discount_price);
                    $update->bindParam(':logo', $f_newfile);
                    $update->bindParam(':id', $id);

                    if ($update->execute()) {
                        echo '<script>
                            jQuery(function validation(){
                                swal({
                                    title: "Product Updated!",
                                    text: "Product updated successfully.",
                                    icon: "success",
                                    button: "Ok",
                                });
                            });
                        </script>';
                    } else {
                        echo '<script>
                            jQuery(function validation(){
                                swal({
                                    title: "ERROR!",
                                    text: "Update failed!",
                                    icon: "error",
                                    button: "Ok",
                                });
                            });
                        </script>';
                    }
                }
            }
        } else {
            echo '<script>
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
    } else {
        $update = $pdo->prepare("UPDATE product_cart 
                                 SET name = :username, price = :price, previous_price = :previous_price, product_type = :product_type, txtdiscountprice = :txtdiscountprice, image = :logo , tax=:tax
                                 WHERE id = :id");
        $update->bindParam(':username', $username);
        $update->bindParam(':price', $price);
        $update->bindParam(':previous_price', $previous_price);
        $update->bindParam(':tax', $taxprice);
        $update->bindParam(':product_type', $product_type);
        $update->bindParam(':txtdiscountprice', $discount_price);
        $update->bindParam(':logo', $logo_db);  // Keep existing image
        $update->bindParam(':id', $id);

        if ($update->execute()) {
            echo '<script>
                jQuery(function validation(){
                    swal({
                        title: "Product Updated!",
                        text: "Product updated successfully.",
                        icon: "success",
                        button: "Ok",
                    });
                });
            </script>';
        } else {
            echo '<script>
                jQuery(function validation(){
                    swal({
                        title: "ERROR!",
                        text: "Update failed!",
                        icon: "error",
                        button: "Ok",
                    });
                });
            </script>';
        }
    }
}

?>

<!-- HTML form code -->
<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit Product Cart Details</h1>
    </section>
    <section class="content container-fluid">
        <div class="box box-danger">
            <form action="" method="post" name="formproduct" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control productid" name="txtselect_option" required>
                                <option value="" disabled>Select Category</option>
                                <?php
                                $select = $pdo->prepare("SELECT * FROM tbl_category ORDER BY catid DESC");
                                $select->execute();
                                while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<option>' . $row['category'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Product Title</label>
                            <input type="text" name="txtname" class="form-control" value="<?php echo $name_db; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" name="txtprice" class="form-control" value="<?php echo $price_db; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Previous Price</label>
                            <input type="text" name="txtpreviousprice" class="form-control" value="<?php echo $previous_price_db; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Tax</label>
                            <input type="text" name="txttax" class="form-control" value="<?php echo $tax_db ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Select Product Type</label><br>
                            <input type="radio" id="noproducttype" name="product_type" value="No Product Type" <?php if ($product_type_db == 'No Product Type') echo 'checked'; ?> onclick="toggleDiscountField()">
                            <label for="new">No Product Type</label>
                            <input type="radio" id="new" name="product_type" value="New" <?php if ($product_type_db == 'New') echo 'checked'; ?> onclick="toggleDiscountField()">
                            <label for="new">New</label>
                            <input type="radio" id="discount" name="product_type" value="Discount" <?php if ($product_type_db == 'Discount') echo 'checked'; ?> onclick="toggleDiscountField()">
                            <label for="discount">Discount</label>
                        </div>
                        <div class="form-group" id="discountField" style="<?php echo $product_type_db == 'Discount' ? '' : 'display:none;'; ?>">
                            <label>Discount Price</label>
                            <input type="text" name="txtdiscountprice" class="form-control" value="<?php echo $txtdiscountprice_db; ?>">
                        </div>
                        <div class="form-group">
                            <label>Product Image</label><br>
                            <img src="FoodImages/<?php echo $logo_db; ?>" class="img-responsive" width="50px" height="50px">
                            <input type="file" name="myfile" class="input-group">
                            <p>Image size should be less than 1MB. Allowed types: jpg, jpeg, png, gif.</p>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-warning" name="btnupdate">Edit Details</button>
                </div>
            </form>
        </div>
    </section>
</div>

<script>
  $('.productid').select2();
    //Date picker
    $('#datepicker').datepicker({
        autoclose: true
    });
    
</script>  
<script>
    function toggleDiscountField() {
        var discountField = document.getElementById('discountField');
        var discountRadio = document.getElementById('discount');
        if (discountRadio.checked) {
            discountField.style.display = 'block';
        } else {
            discountField.style.display = 'none';
        }
    }
</script>

<?php include_once 'footer.php'; ?>
