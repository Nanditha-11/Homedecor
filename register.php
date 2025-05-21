<?php
session_start();
include('db.php'); // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['new-username']);
    $password = mysqli_real_escape_string($conn, $_POST['new-password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirm-password']);

    if ($password !== $confirmPassword) {
        $_SESSION['register_message'] = ' Passwords do not match!';
    } else {
        // Check if the username already exists
        $query = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $_SESSION['register_message'] = ' Username already taken!';
        } else {
            // Hash the password for security
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert the new user into the database
            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";
            
            if ($conn->query($sql) === TRUE) {
                $_SESSION['register_message'] = ' Registration Successful!';
            } else {
                $_SESSION['register_message'] = ' Error: ' . $conn->error;
            }
        }
    }
    header("Location: registration.php"); // Redirect to success page
    exit();
}
?>
