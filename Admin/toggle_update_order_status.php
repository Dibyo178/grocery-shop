<?php
include_once 'connectdb.php';

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);

    // Check current status
    $select = $pdo->prepare("SELECT status FROM orders WHERE id = ?");
    $select->execute([$id]);
    $order = $select->fetch(PDO::FETCH_OBJ);

    // Toggle status
    $newStatus = $order->status == 1 ? 0 : 1;
    $update = $pdo->prepare("UPDATE orders SET status = ? WHERE id = ?");
    $update->execute([$newStatus, $id]);

    if ($update) {
        echo 'success';
    } else {
        echo 'error';
    }
}
?>
