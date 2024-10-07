<?php

include_once 'connectdb.php';
session_start();

if ($_SESSION['username'] == "" || $_SESSION['role'] == "") {
    header("location:index.php");
    exit;
}

// Check if the ID is passed in the URL
if (isset($_GET['id'])) {
    $order_id = $_GET['id'];

    // Fetch the current status of the order
    $select = $pdo->prepare("SELECT status FROM orders WHERE id = :id");
    $select->execute(['id' => $order_id]);
    $order = $select->fetch(PDO::FETCH_ASSOC);

    if ($order) {
        // Toggle the status (assuming 1 is 'checked' and 0 is 'unchecked')
        $new_status = $order['status'] == 1 ? 0 : 1;

        // Update the order status
        $update = $pdo->prepare("UPDATE orders SET status = :status WHERE id = :id");
        if ($update->execute(['status' => $new_status, 'id' => $order_id])) {
            $_SESSION['success'] = "Order status updated successfully!";
        } else {
            $_SESSION['error'] = "Failed to update order status.";
        }
    } else {
        $_SESSION['error'] = "Order not found.";
    }
} else {
    $_SESSION['error'] = "No order ID provided.";
}

// Redirect back to the order list page
header("location:placing_order.php");
exit;

?>
