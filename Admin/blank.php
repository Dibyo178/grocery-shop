<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'connectdb.php';
include_once './connection.php';
session_start();

if ($_SESSION['username'] == "" || $_SESSION['role'] == "") {
    header("location:index.php");
}

if ($_SESSION['role'] == "Admin") {
    include_once 'header.php';
} else {
    include_once './headeruser.php';
}

if (isset($_POST['btnaddproduct'])) {

    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $product_category = $_POST['product_category'];
    $txttittle = $_POST['txttittle'];
    $txtprice = $_POST['txtprice'];
    $product_qty = $_POST['product_qty'];

    // Upload images
    $f_name = $_FILES['myfile']['name'];
    $f_name2 = $_FILES['myfile2']['name'];
    $f_name3 = $_FILES['myfile3']['name'];
    $f_name4 = $_FILES['myfile4']['name'];

    // All image file set temporary variables
    $f_tmp = $_FILES['myfile']['tmp_name'];
    $f_tmp2 = $_FILES['myfile2']['tmp_name'];
    $f_tmp3 = $_FILES['myfile3']['tmp_name'];
    $f_tmp4 = $_FILES['myfile4']['tmp_name'];

    // File sizes
    $f_size = $_FILES['myfile']['size'];
    $f_size2 = $_FILES['myfile2']['size'];
    $f_size3 = $_FILES['myfile3']['size'];
    $f_size4 = $_FILES['myfile4']['size'];

    // File extensions
    $f_extension = strtolower(pathinfo($f_name, PATHINFO_EXTENSION));
    $f_extension2 = strtolower(pathinfo($f_name2, PATHINFO_EXTENSION));
    $f_extension3 = strtolower(pathinfo($f_name3, PATHINFO_EXTENSION));
    $f_extension4 = strtolower(pathinfo($f_name4, PATHINFO_EXTENSION));

    // New file names
    $f_newfile = uniqid() . '.' . $f_extension;
    $f_newfile2 = uniqid() . '.' . $f_extension2;
    $f_newfile3 = uniqid() . '.' . $f_extension3;
    $f_newfile4 = uniqid() . '.' . $f_extension4;

    // Store paths
    $store = "productimages/" . $f_newfile;
    $store2 = "productimages/" . $f_newfile2;
    $store3 = "productimages/" . $f_newfile3;
    $store4 = "productimages/" . $f_newfile4;

    // Validate file extensions and sizes
    $valid_extensions = ['jpg', 'jpeg', 'png', 'gif'];
    if (in_array($f_extension, $valid_extensions) && in_array($f_extension2, $valid_extensions) && in_array($f_extension3, $valid_extensions) && in_array($f_extension4, $valid_extensions)) {

        if ($f_size <= 1000000 && $f_size2 <= 1000000 && $f_size3 <= 1000000 && $f_size4 <= 1000000) {

            if (move_uploaded_file($f_tmp, $store) && move_uploaded_file($f_tmp2, $store2) && move_uploaded_file($f_tmp3, $store3) && move_uploaded_file($f_tmp4, $store4)) {

                $productimage = $f_newfile;
                $productimage2 = $f_newfile2;
                $productimage3 = $f_newfile3;
                $productimage4 = $f_newfile4;

                $insert = $pdo->prepare("INSERT INTO product_cart(name,price,category,product_qty,subcategory,product_category,image,image2,image3,image4)
                    VALUES(:name,:price,:category,:product_qty,:subcategory,:product_category,:image,:image2,:image3,:image4)");

                $insert->bindParam(':name', $txttittle);
                $insert->bindParam(':price', $txtprice);
                $insert->bindParam(':category', $category);
                $insert->bindParam(':product_qty', $product_qty);
                $insert->bindParam(':subcategory', $subcategory);
                $insert->bindParam(':product_category', $product_category);
                $insert->bindParam(':image', $productimage);
                $insert->bindParam(':image2', $productimage2);
                $insert->bindParam(':image3', $productimage3);
                $insert->bindParam(':image4', $productimage4);

                if ($insert->execute()) {
                    echo '<script type="text/javascript">
                        swal("Add Product Successful!", "Added", "success");
                    </script>';
                } else {
                    echo '<script type="text/javascript">
                        swal("Error!", "Add Failed", "error");
                    </script>';
                }
            }

        } else {
            echo '<script type="text/javascript">
                swal("Error!", "Max file size should be 1MB!", "warning");
            </script>';
        }

    } else {
        echo '<script type="text/javascript">
            swal("Warning!", "Only jpg, jpeg, png, and gif files are allowed!", "error");
        </script>';
    }
}

// Delete product
if (isset($_GET['deleteid'])) {
    $delete = $pdo->prepare("DELETE FROM product_cart WHERE id=" . $_GET['deleteid']);
    if ($delete->execute()) {
        echo '<script type="text/javascript">
            swal("Product Deleted!", "Deleted successfully", "warning");
        </script>';
    }
}

?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Add Product Details</h1>
    </section>

    <section class="content container-fluid">
        <div class="box box-danger">
            <div class="box-header with-border"></div>
            <form role="formproduct" action="" method="post" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category" id="category" required>
                                <option value="" disabled selected>Select Category</option>
                                <?php
                                $select = $pdo->prepare("SELECT * FROM tbl_category ORDER BY catid DESC");
                                $select->execute();
                                while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<option value="' . $row['catid'] . '">' . $row['category'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Product SubCategory</label>
                            <select class="form-control" name="subcategory" id="subcategory" required>
                                <option value="" disabled selected>Select Subcategory</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Product Category</label>
                            <select class="form-control" name="product_category" id="product_category" required>
                                <option value="" disabled selected>Select Product Category</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Product Title</label>
                            <input type="text" name="txttittle" class="form-control" placeholder="Enter a title" required>
                        </div>

                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" name='txtprice' class="form-control" placeholder="Enter a price" required>
                        </div>

                        <div class="form-group">
                            <label>Product quantity</label>
                            <input type="text" name='product_qty' class="form-control" placeholder="Enter a quantity" required>
                        </div>

                        <!-- image 1 -->

                        <div class="form-group">
                            <label> Upload Product Image 1</label>
                            <input type="file" name="myfile" class="input-group" required>
                            <p>Image</p>
                        </div>

                        <!-- image 2 -->

                        <div class="form-group">
                            <label> Upload Product Image 1</label>
                            <input type="file" name="myfile2" class="input-group" required>
                            <p>Image</p>
                        </div>

                        <!-- image 3 -->

                        <div class="form-group">
                            <label> Upload Product Image 1</label>
                            <input type="file" name="myfile3" class="input-group" required>
                            <p>Image</p>
                        </div>

                        <!-- image 4 -->

                        <div class="form-group">
                            <label> Upload Product Image 1</label>
                            <input type="file" name="myfile4" class="input-group" required>
                            <p>Image</p>
                        </div>
                        

                        <div class="box-footer">
                            <button type="submit" name='btnaddproduct' class="btn btn-info">Add Details</button>
                        </div>
                    </div>

                    <div class="col-md-8" style="overflow-x:auto;">

                    <table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>SubCategory</th>
            <th>Product Category</th>
            <th>Image1</th>
            <th>Image2</th>
            <th>Image3</th>
            <th>image4</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $index = 1;

        // SQL query to get product_cart, category name, and subcategory name
        $query = "
            SELECT pc.*, c.category AS category_name, sc.product_category AS subcategory_name
            FROM product_cart pc
            JOIN tbl_category c ON pc.category = c.catid
            JOIN subcategory sc ON pc.product_category = sc.subid
            ORDER BY pc.id DESC
        ";

        // Execute the query
        $view = mysqli_query($con, $query);

        // Loop through the results
        while ($data = mysqli_fetch_assoc($view)) {
            $name = $data['name'];
            $price = $data['price'];
            $image = $data['image'];
            $image2 = $data['image2'];
            $image3 = $data['image3'];
            $image4 = $data['image4'];
            $category_name = $data['category_name']; // Updated to show category name
            $subcategory_name = $data['subcategory']; // Updated to show subcategory name
            $product_category_name = $data['subcategory_name']; // Updated to show subcategory name
            $status = $data['status'];
        ?>

            <tr>
                <td><?php echo $index; ?></td>
                <td><?php echo $name; ?></td>
                <td><i class="fa-solid fa-bangladeshi-taka-sign"></i> <?php echo $price; ?></td>
                <td><?php echo $category_name; ?></td> <!-- Show category name -->
                <td><?php echo $subcategory_name; ?></td> <!-- Show subcategory (product category) name -->
                <td><?php echo $product_category_name; ?></td> <!-- Show subcategory (product category) name -->
                <td>
                    <img src="productimages/<?php echo $image; ?>" class="img-rounded" width="40px" height="40px"/>
                </td>

                <td>
                    <img src="productimages/<?php echo $image2; ?>" class="img-rounded" width="40px" height="40px"/>
                </td>

                <td>
                    <img src="productimages/<?php echo $image3; ?>" class="img-rounded" width="40px" height="40px"/>
                </td>

                <td>
                    <img src="productimages/<?php echo $image4; ?>" class="img-rounded" width="40px" height="40px"/>
                </td>
                <td>
                    <?php
                    if ($data['status'] == 1) {
                        echo '<p><a href="status.php?tid=' . $data['id'] . '&status=0" class="btn btn-success">Available</a></p>';
                    } else {
                        echo '<p><a href="status.php?tid=' . $data['id'] . '&status=1" class="btn btn-danger">Unavailable</a></p>';
                    }
                    ?>
                </td>
                <td>
                    <a href="editproduct_cart.php?id=<?php echo $data['id']; ?>" class="btn btn-info" role="button">
                        <span class="fa fa-pencil-square" style="color:#ffffff" data-toggle="tooltip" title="Edit Product"></span>
                    </a>
                </td>
                <td>
                    <a href="product_cart.php?deleteid=<?php echo $data['id']; ?>" class="btn btn-danger" role="button">
                        <span class="glyphicon glyphicon-trash" title="delete"></span>
                    </a>
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
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Fetch subcategories based on selected category
        $('#category').change(function() {
            var catid = $(this).val();
            $.ajax({
                type: 'POST',
                url: 'fetch_subcategories.php',
                data: {
                    catid: catid
                },
                success: function(response) {
                    $('#subcategory').html(response);
                    $('#product_category').html('<option value="" disabled selected>Select Product Category</option>'); // Reset product category
                }
            });
        });

        // Fetch product categories based on selected subcategory
        $('#subcategory').change(function() {
            var subcategoryName = $(this).val(); // Get the selected subcategory
            $.ajax({
                type: 'POST',
                url: 'fetch_product_categories.php',
                data: {
                    subcategory: subcategoryName
                },
                success: function(response) {
                    $('#product_category').html(response);
                }
            });
        });
    });
</script>




<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>


<?php
include_once 'footer.php';
?>