<?php
// Include the database connection
include('db_connection.php');

// Check if a remove button was clicked
if (isset($_GET['remove_id'])) {
    $remove_id = $_GET['remove_id'];

    // SQL query to delete the order from the orders table
    $delete_sql = "DELETE FROM orders WHERE order_id = ?";
    
    // Prepare and bind the statement
    if ($stmt = $conn->prepare($delete_sql)) {
        $stmt->bind_param("i", $remove_id);
        if ($stmt->execute()) {
            echo "Order removed successfully.";
        } else {
            echo "Error removing order.";
        }
        $stmt->close();
    }
}

// SQL query to fetch confirmed orders from the orders table
$sql = "SELECT order_id, product_name, product_image, product_price FROM orders WHERE status = 'confirmed'";
$result = $conn->query($sql);

// Check if there are any confirmed orders
if ($result->num_rows > 0) {
    $orders = [];
    // Store each order's relevant details (order_id, product_name, product_image, product_price) in an array
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }
} else {
    $orders = [];
}

// Close the database connection
$conn->close();

// Include the HTML part that will display the orders
include('orders.html');
?>
