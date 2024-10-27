<?php
error_reporting(E_ERROR | E_PARSE);
session_start();

$username = isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest';
$mobile = isset($_SESSION['mobile']) ? $_SESSION['mobile'] : 'Not set';

header('Content-Type: application/json');
$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
    $db = new mysqli("localhost", "root", "", "grocery-shop");

    if ($db->connect_error) {
        echo json_encode(["success" => false, "message" => "Database connection failed."]);
        exit;
    }

    $random_id = $db->real_escape_string($data['random_id']);
    $discount = $db->real_escape_string($data['discount']);
    $tax = $db->real_escape_string($data['tax']);
    $subtotal = $db->real_escape_string($data['subtotal']);
    $grand_total = $db->real_escape_string($data['grand_total']);

    $sql = "INSERT INTO temporary_cart (discount, tax, subtotal, grand_total, random_id,name,mobile) 
            VALUES ('$discount', '$tax', '$subtotal', '$grand_total', '$random_id','$username','$mobile')";

    if ($db->query($sql)) {
        echo json_encode(["success" => true, "message" => "Proceed to checkout successful."]);
    } else {
        echo json_encode(["success" => false, "message" => "Error during checkout. SQL Error: " . $db->error]);
    }

    $db->close();
} else {
    echo json_encode(["success" => false, "message" => "Invalid data received."]);
}
