<?php
// Include database connection
include('db_connection.php');

// Check if the form is submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $full_name = $_POST['name'];
    $phone_number = $_POST['phone'];
    $street_address = $_POST['street'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $payment_method = $_POST['payment'];

    // SQL query to insert form data into the checkout table
    $sql = "INSERT INTO checkout (full_name, phone_number, street_address, state, city, pincode, payment_method)
            VALUES ('$full_name', '$phone_number', '$street_address', '$state', '$city', '$pincode', '$payment_method')";

    // Execute the query and check if the insertion was successful
    if ($conn->query($sql) === TRUE) {
        echo "Order placed successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
