<?php
// Start the session
session_start();

// Include database connection file
include('db_connection.php');

// Check if the ID is set in the query string
if (!isset($_GET['id'])) {
    die("No order ID specified.");
}

$order_id = $_GET['id'];

// Delete the order from the database
$sql = "DELETE FROM tb_orders WHERE order_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $order_id);

if ($stmt->execute()) {
    header('Location: orders.php');
    exit;
} else {
    echo "<script>alert('Error deleting order.'); window.location.href = 'orders.php';</script>";
}
?>
