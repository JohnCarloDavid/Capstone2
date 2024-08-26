<?php
// Start the session
session_start();

// Include database connection file
include('db_connection.php');

// Check if the user is logged in, if not then redirect to the login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    http_response_code(403);
    echo "Unauthorized access!";
    exit;
}

// Check if product_id and action are set
if (isset($_POST['product_id']) && isset($_POST['action'])) {
    $product_id = $_POST['product_id'];
    $action = $_POST['action'];

    // Determine whether to increase or decrease the quantity
    if ($action == 'increase') {
        $sql = "UPDATE tb_inventory SET quantity = quantity + 1 WHERE product_id = ?";
    } elseif ($action == 'decrease') {
        $sql = "UPDATE tb_inventory SET quantity = quantity - 1 WHERE product_id = ? AND quantity > 0";
    } else {
        http_response_code(400);
        echo "Invalid action!";
        exit;
    }

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $product_id);

    if ($stmt->execute()) {
        echo "Success!";
    } else {
        http_response_code(500);
        echo "Failed to update quantity!";
    }
    
    $stmt->close();
} else {
    http_response_code(400);
    echo "Required data not provided!";
}

$conn->close();
?>
