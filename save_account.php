<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name"; // replace with your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if POST data exists
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $address = $conn->real_escape_string($_POST['address']);
    $mobile = $conn->real_escape_string($_POST['mobile']);

    // Query to check if user already exists (assuming unique identifier, like user_id from a session variable)
    $user_id = 1; // Replace with dynamic user_id from session or authentication mechanism

    $checkQuery = "SELECT * FROM users WHERE user_id = '$user_id'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        // Update existing user details
        $updateQuery = "UPDATE users SET name = '$name', address = '$address', mobile = '$mobile' WHERE user_id = '$user_id'";
        if ($conn->query($updateQuery) === TRUE) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "message" => "Update failed."]);
        }
    } else {
        // Insert new user details
        $insertQuery = "INSERT INTO users (user_id, name, address, mobile) VALUES ('$user_id', '$name', '$address', '$mobile')";
        if ($conn->query($insertQuery) === TRUE) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "message" => "Insert failed."]);
        }
    }
}

$conn->close();
?>
