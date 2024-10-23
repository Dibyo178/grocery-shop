<?php
error_reporting(E_ALL);
include_once 'connectdb.php';
session_start();

// Session check
if (empty($_SESSION['username']) || empty($_SESSION['role'])) {
    header("location:index.php");
    exit; // Always exit after header redirection
}

// Header based on role
if ($_SESSION['role'] == "Admin") {
    include_once 'header.php';
} else {
    include_once './headeruser.php';
}

// Add product logic
if (isset($_POST['btnaddproduct'])) {
  $category = $_POST['txtselect_option'];
  $username = $_POST['txtname'];
  $price = $_POST['txtprice'];
  $txtpreviousprice = $_POST['txtpreviousprice'];
  $discount = $_POST['txtdiscountprice'];
  $product_type = $_POST['product_type'];

  // File upload logic
  $f_name = $_FILES['myfile']['name'];
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
              $productimage = $f_newfile;

              $insert = $pdo->prepare("INSERT INTO product_cart (image, name, price, previous_price, category, product_type, txtdiscountprice) 
              VALUES (:logo, :name, :price, :previous_price, :category, :product_type, :txtdiscountprice)");

              $insert->bindParam(':logo', $productimage);
              $insert->bindParam(':name', $username);
              $insert->bindParam(':price', $price);
              $insert->bindParam(':previous_price', $txtpreviousprice);
              $insert->bindParam(':category', $category);
              $insert->bindParam(':product_type', $product_type);
              $insert->bindParam(':txtdiscountprice', $discount);

              if ($insert->execute()) {
                  echo '<script>
                      jQuery(function validation(){
                          swal({
                              title: "Success!",
                              text: "Product added successfully!",
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
                              text: "Failed to add product!",
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
}

// Delete product
if (isset($_GET['deleteid'])) {
  $delete = $pdo->prepare("DELETE FROM product_cart WHERE id = :id");
  $delete->bindParam(':id', $_GET['deleteid']);

  if ($delete->execute()) {
      echo '<script>
          jQuery(function validation(){
              swal({
                  title: "Product Deleted!",
                  text: "The product has been removed.",
                  icon: "warning",
                  button: "Ok",
              });
          });
      </script>';
  }
}


// Set all products to available
if (isset($_POST['btnallavailable'])) {
    $update = $pdo->prepare("UPDATE product_cart SET status = 1");
    if ($update->execute()) {
        echo '<script>
            jQuery(function validation(){
                swal({
                    title: "Success!",
                    text: "All products are now available!",
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
                    text: "Failed to update product statuses!",
                    icon: "error",
                    button: "Ok",
                });
            });
        </script>';
    }
}
?>

<style>
  table.dataTable thead .sorting_asc:after, 
  table.dataTable thead .sorting:after {
    display: none !important;
  }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="./bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<!-- Content Wrapper -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>Add Product Details</h1>
  </section>

  <section class="content container-fluid">
    <div class="box box-danger">
      <form role="formproduct" action="" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="col-md-4">
            <!-- Form Fields -->
            <div class="form-group">
              <label>Category</label>
              <select class="form-control productid" name="txtselect_option" required>
                <option value="" disabled selected>Select Category</option>
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
              <input type="text" name="txtname" class="form-control" placeholder="Enter a title" required>
            </div>
            <div class="form-group">
              <label>Price</label>
              <input type="text" name="txtprice" class="form-control" placeholder="Enter a price" required>
            </div>
            <div class="form-group">
              <label>Previous Price</label>
              <input type="text" name="txtpreviousprice" class="form-control" placeholder="Enter previous price" required>
            </div>
            <div class="form-group">
              <label>Select Product Type</label><br>
              <input type="radio" id="new" name="product_type" value="New" checked onclick="toggleDiscountField()">
              <label for="new">New</label>
              <input type="radio" id="discount" name="product_type" value="Discount" onclick="toggleDiscountField()">
              <label for="discount">Discount</label>
            </div>
            <div class="form-group" id="discountField" style="display:none;">
              <label>Discount Price</label>
              <input type="text" name="txtdiscountprice" class="form-control" placeholder="Enter discount price">
            </div>
            <div class="form-group">
              <label>Product Image</label>
              <input type="file" name="myfile" class="input-group" required>
              <p>Image size should be less than 1MB. Allowed types: jpg, jpeg, png, gif.</p>
            </div>
            <div class="box-footer">
              <button type="submit" name="btnaddproduct" class="btn btn-info">Add Details</button>
            </div>
          </div>

          </form>

          <!-- All Available Button Form -->
<form method="post" class="col-md-8">
    <button type="submit" name="btnallavailable" class="btn btn-warning">All Available</button>
</form>

          <!-- Display Products Table -->
          <div class="col-md-8" style="overflow-x:auto;">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Product Type</th>
            <th>Discount</th>
            <th>Image</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
              <tbody>
                <?php
                $index = 1;
                $select = $pdo->query("SELECT * FROM product_cart");
                while ($data = $select->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <tr>
                    <td><?php echo $index; ?></td>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['price']; ?></td>
                    <td><?php echo $data['category']; ?></td>
                    <td><?php echo $data['product_type']; ?></td>
                    <td><?php echo $data['txtdiscountprice']; ?></td>
                    <td><img src="FoodImages/<?php echo $data['image']; ?>" width="100" height="70"></td>
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
 $(function() {
    $('#example1').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': true, // Enable searching
        'ordering': true,  // Enable column ordering
        'info': true,
        'autoWidth': false
    });
});

</script>

<script>
  function toggleDiscountField() {
      var discountField = document.getElementById('discountField');
      var isDiscountChecked = document.getElementById('discount').checked;
      discountField.style.display = isDiscountChecked ? 'block' : 'none';
  }
</script>

<?php include_once 'footer.php'; ?>
