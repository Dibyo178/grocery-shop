<?php
// save_account.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "grocery-shop";

session_start();

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Connection failed: " . $conn->connect_error]);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $address = $conn->real_escape_string($_POST['address']);
    $mobile = $conn->real_escape_string($_POST['mobile']);

    // Verify user session
    if (!isset($_SESSION['mobile'])) {
        echo json_encode(["success" => false, "message" => "User not logged in."]);
        exit;
    }

    $user_id = $_SESSION['mobile'];

    // Ensure all fields are filled
    if(empty($name) || empty($address) || empty($mobile)) {
        echo json_encode(["success" => false, "message" => "All fields are required."]);
        exit;
    }

    // Prepare and execute update statement
    $stmt = $conn->prepare("UPDATE login SET name = ?, address = ?, mobile = ? WHERE mobile = ?");
    $stmt->bind_param("sssi", $name, $address, $mobile, $user_id);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        error_log("SQL Error on Update: " . $stmt->error);
        echo json_encode(["success" => false, "message" => "Update failed. SQL Error: " . $stmt->error]);
    }

    $stmt->close();
}

$conn->close();
?>
