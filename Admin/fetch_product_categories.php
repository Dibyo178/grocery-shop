<?php
include_once 'connectdb.php';

if (isset($_POST['subcategory'])) {
    $subcategoryName = $_POST['subcategory'];

    // Fetch all product categories based on subcategory name
    $select = $pdo->prepare("SELECT subid, product_category FROM subcategory WHERE subcategory = :subcategory");
    $select->bindParam(':subcategory', $subcategoryName);
    $select->execute();

    echo '<option value="" disabled selected>Select Product Category</option>';
    
    while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
        echo '<option value="' . $row['subid'] . '">' . $row['product_category'] . '</option>'; // Assuming 'product_category' contains the product category name
    }
    
    // If no product categories are found
    if ($select->rowCount() === 0) {
        echo '<option value="">No product categories found for this subcategory</option>';
    }
} else {
    echo '<option value="">No subcategory selected</option>'; // Handle case where subcategory isn't set
}
?>
