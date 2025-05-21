<?php
include('db.php'); // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Find the user from the database
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify the password
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['login_message'] = 'Login successful!'; // Store success message in session
            header("Location: home.php");
            exit();  // Ensure no further code is executed
        } else {
            echo 'Invalid username or password';
        }
    } else {
        echo 'Invalid username or password';
    }
}
?>
