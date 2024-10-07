<?php

include_once 'connectdb.php';

if (isset($_POST['id'])) {
    $orderId = $_POST['id'];

    // Fetch the current status from the database
    $select = $pdo->prepare("SELECT status FROM orders WHERE id = :id");
    $select->bindParam(':id', $orderId);
    $select->execute();
    $row = $select->fetch(PDO::FETCH_ASSOC);

    if ($row && $row['status'] == 0) { // Check if the status is 0 (unchecked)
        // Update the status to 1 (checked)
        $update = $pdo->prepare("UPDATE orders SET status = 1 WHERE id = :id");
        $update->bindParam(':id', $orderId);

        if ($update->execute()) {
            echo 'success';
        } else {
            echo 'error';
        }
    } else {
        echo 'error'; // If already checked or any other issue
    }
} else {
    echo 'error';
}

