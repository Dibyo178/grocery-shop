<?php
include_once 'connectdb.php';

if (isset($_POST['catid'])) {
    $categoryId = $_POST['catid'];

    // Fetch distinct subcategories based on category ID
    $select = $pdo->prepare("SELECT DISTINCT subcategory FROM subcategory WHERE category= :category_id");
    $select->bindParam(':category_id', $categoryId);
    $select->execute();

    echo '<option value="" disabled selected>Select Subcategory</option>';
    while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
        echo '<option value="' . $row['subcategory'] . '">' . $row['subcategory'] . '</option>'; // Assuming 'subcategory' contains the subcategory name
    }
}
?>
