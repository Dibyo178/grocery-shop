<?php

include_once 'connectdb.php';

session_start();

if (empty($_SESSION['username']) || empty($_SESSION['role'])) {
    header("location:index.php");
    exit();
}

if ($_SESSION['role'] == "Admin") {
    include_once 'header.php';
}  else {
    include_once './headeruser.php';
}

if (isset($_POST['btnsave'])) {
    $area = $_POST['txtarea'];
    $price = $_POST['txtprice'];

    if (empty($area)) {
        echo '<script type="text/javascript">
            jQuery(function validation(){
                swal({
                    title: "Field is empty",
                    text: "Please Fill Field",
                    icon: "error",
                    button: "ok",
                });
            });
        </script>';
    } else {
        $insert = $pdo->prepare("INSERT INTO discount (token, price) VALUES (:area, :price)");
        $insert->bindParam(':area', $area);
        $insert->bindParam(':price', $price);

        if ($insert->execute()) {
            echo '<script type="text/javascript">
                jQuery(function validation(){
                    swal({
                        title: "Add Area",
                        text: "Discount is Added",
                        icon: "success",
                        button: "ok",
                    });
                });
            </script>';
        } else {
            echo '<script type="text/javascript">
                jQuery(function validation(){
                    swal({
                        title: "Oops!!",
                        text: "Discount is not Added",
                        icon: "warning",
                        button: "ok",
                    });
                });
            </script>';
        }
    }
}

if (isset($_POST['btnupdate'])) {
    $area = $_POST['txtarea'];
    $price = $_POST['txtprice'];
    $id = $_POST['txtid'];

    if (empty($area)) {
        echo '<script type="text/javascript">
            jQuery(function validation(){
                swal({
                    title: "Error",
                    text: "Field is empty please fill up",
                    icon: "error",
                    button: "ok",
                });
            });
        </script>';
    } else {
        $update = $pdo->prepare("UPDATE discount SET token = :area, price = :price WHERE id = :id");
        $update->bindParam(':area', $area);
        $update->bindParam(':price', $price);
        $update->bindParam(':id', $id);

        if ($update->execute()) {
            echo '<script type="text/javascript">
                jQuery(function validation(){
                    swal({
                        title: "Good Job",
                        text: "Discount is updated",
                        icon: "success",
                        button: "ok",
                    });
                });
            </script>';
        } else {
            echo '<script type="text/javascript">
                jQuery(function validation(){
                    swal({
                        title: "Sorry",
                        text: "Discount is not Updated",
                        icon: "error",
                        button: "ok",
                    });
                });
            </script>';
        }
    }
}

if (isset($_POST['btndelete'])) {
    $id = $_POST['btndelete'];
    $delete = $pdo->prepare("DELETE FROM discount WHERE id = :id");
    $delete->bindParam(':id', $id);

    if ($delete->execute()) {
        echo '<script type="text/javascript">
            jQuery(function validation(){
                swal({
                    title: "Deleted",
                    text: "Discount is Deleted",
                    icon: "success",
                    button: "ok",
                });
            });
        </script>';
    } else {
        echo '<script type="text/javascript">
            jQuery(function validation(){
                swal({
                    title: "Sorry",
                    text: "Discount is not Deleted",
                    icon: "error",
                    button: "ok",
                });
            });
        </script>';
    }
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Add Discount</h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box box-danger">
            <div class="box-header with-border"></div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                <form role="form" action="" method="post">
                    <?php
                    if (isset($_POST['btnedit'])) {
                        $select = $pdo->prepare("SELECT * FROM discount WHERE id = :id");
                        $select->bindParam(':id', $_POST['btnedit']);
                        $select->execute();

                        if ($select) {
                            $row = $select->fetch(PDO::FETCH_OBJ);

                            echo '
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Token Name</label>
                                        <input type="hidden" name="txtid" class="form-control" value="'.$row->id.'" />
                                        <input type="text" name="txtarea" class="form-control" value="'.$row->token.'" placeholder="Enter a area" />
                                    </div>
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" name="txtprice" class="form-control" value="'.$row->price.'" placeholder="Enter a delivery charge" />
                                    </div>
                                    <button type="submit" name="btnupdate" class="btn btn-info">Update</button>
                                </div>';
                        }
                    } else {
                        echo '
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Token Name</label>
                                    <input type="text" name="txtarea" class="form-control" placeholder="Enter a area" />
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" name="txtprice" class="form-control" placeholder="Enter a delivery charge" />
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
                                    <th>Token</th>
                                    <th>price</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $index = 1;
                                $select = $pdo->prepare("SELECT * FROM discount ORDER BY id  ASC");
                                $select->execute();

                                while ($row = $select->fetch(PDO::FETCH_OBJ)) {
                                    echo '
                                    <tr>
                                        <td>'.$index.'</td>
                                        <td>'.$row->token.'</td>
                                        <td>'.$row->price.'</td>
                                        <td>
                                            <button type="submit" name="btnedit" value="'.$row->id.'" class="btn btn-success">Edit</button>
                                        </td>
                                        <td>
                                            <button type="submit" name="btndelete" value="'.$row->id.'" class="btn btn-danger">Delete</button>
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
            <!-- /.box-body -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
$(document).ready(function() {
    $('#tablecategory').DataTable();
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
