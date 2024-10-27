<?php

include_once 'connectdb.php';

session_start();

if (empty($_SESSION['username']) || empty($_SESSION['role'])) {
    header("location:index.php");
    exit();
}

include_once $_SESSION['role'] === "Admin" ? 'header.php' : 'headeruser.php';

$id = $_GET['id'];
$select = $pdo->prepare("SELECT * FROM blog WHERE id = :id");
$select->execute([':id' => $id]);
$row = $select->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    echo "Blog not found.";
    exit();
}

$id_db = $row['id'];
$name_db = $row['name'];
$des_db = $row['description'];
$logo_db = $row['image'];

if (isset($_POST['btnupdate'])) {
    $username = $_POST['txtname'];
    $description = $_POST['description'];
    $f_name = $_FILES['myfile']['name'];

    if (!empty($f_name)) {
        $f_tmp = $_FILES['myfile']['tmp_name'];
        $f_size = $_FILES['myfile']['size'];
        $f_extension = strtolower(pathinfo($f_name, PATHINFO_EXTENSION));
        $f_newfile = uniqid() . '.' . $f_extension;
        $store = "blogimage/" . $f_newfile;

        if (in_array($f_extension, ['jpg', 'jpeg', 'png', 'gif'])) {
            if ($f_size <= 1000000) {
                if (move_uploaded_file($f_tmp, $store)) {
                    $update = $pdo->prepare("UPDATE blog SET image = :logo, name = :username, description = :description WHERE id = :id");
                    $update->bindParam(':username', $username);
                    $update->bindParam(':description', $description);
                    $update->bindParam(':logo', $f_newfile);
                    $update->bindParam(':id', $id);
                    
                    if ($update->execute()) {
                        echo '<script>swal({ title: "Success!", text: "Blog updated successfully.", icon: "success", button: "Ok" });</script>';
                    } else {
                        echo '<script>swal({ title: "Error!", text: "Failed to update blog.", icon: "error", button: "Ok" });</script>';
                    }
                }
            } else {
                echo '<script>swal({ title: "Error!", text: "Max file size is 1MB.", icon: "warning", button: "Ok" });</script>';
            }
        } else {
            echo '<script>swal({ title: "Warning!", text: "Only jpg, jpeg, png, and gif formats are allowed.", icon: "error", button: "Ok" });</script>';
        }
    } else {
        $update = $pdo->prepare("UPDATE blog SET name = :username, description = :description WHERE id = :id");
        $update->bindParam(':username', $username);
        $update->bindParam(':description', $description);
        $update->bindParam(':id', $id);

        if ($update->execute()) {
            echo '<script>swal({ title: "Success!", text: "Blog updated successfully.", icon: "success", button: "Ok" });</script>';
        } else {
            echo '<script>swal({ title: "Error!", text: "Failed to update blog.", icon: "error", button: "Ok" });</script>';
        }
    }
}

?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit Blog Details</h1>
    </section>
    <section class="content container-fluid">
        <div class="box box-danger">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Blog Title</label>
                            <input type="text" name="txtname" value="<?php echo htmlspecialchars($name_db); ?>" class="form-control" placeholder="Enter a blog title" required>
                        </div>
                        <div class="form-group">
                            <label>Blog Description</label>
                            <textarea name="description" cols="40" rows="5" class="form-control" placeholder="Enter blog description" required><?php echo htmlspecialchars($des_db); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <img src="blogimage/<?php echo htmlspecialchars($logo_db); ?>" class="img-responsive" width="50" height="50" alt="Blog Image" />
                            <input type="file" class="form-control-file" name="myfile">
                            <p class="help-block">Upload logo (jpg, jpeg, png, gif).</p>
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
    $('#datepicker').datepicker({ autoclose: true });
</script>

<?php include_once 'footer.php'; ?>
