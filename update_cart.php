<?php
session_start();
header('Content-Type: application/json');
$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
    $db = new mysqli("localhost", "root", "", "grocery-shop");

    if ($db->connect_error) {
        echo json_encode(["success" => false, "message" => "Database connection failed."]);
        exit;
    }

    if (!isset($_SESSION['random_id_counter'])) {
        $_SESSION['random_id_counter'] = 1;
    } else {
        $_SESSION['random_id_counter']++;
    }

    $current_random_id = $_SESSION['random_id_counter'];

    foreach ($data as $item) {
        $product_name = $db->real_escape_string($item['product_name']);
        $price = $db->real_escape_string($item['price']);
        $qty = $db->real_escape_string($item['qty']);
        $subtotal = $db->real_escape_string($item['subtotal']);

        $sql = "INSERT INTO final_cart (product_name, price, qty, subtotal, random_id) VALUES ('$product_name', '$price', '$qty', '$subtotal', '$current_random_id')";

        if (!$db->query($sql)) {
            echo json_encode(["success" => false, "message" => "Error inserting data. SQL Error: " . $db->error]);
            exit;
        }
    }

    echo json_encode(["success" => true, "random_id" => $current_random_id, "message" => "Cart updated successfully."]);
    $db->close();
} else {
    echo json_encode(["success" => false, "message" => "Invalid data received."]);
}
