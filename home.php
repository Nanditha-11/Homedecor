<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect to the login page
    header("Location: login.html");
    exit();
}

// Check if there's a login success message
if (isset($_SESSION['login_message'])) {
    $login_message = $_SESSION['login_message'];
    unset($_SESSION['login_message']); // Clear the message after showing it
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Home Decor</title>
    <!-- Link to external CSS file -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1> <center> <i> Home Decor - Welcome </i> </center></h1>
    </header>

    <main>
        <!-- Display login message if available -->
        <?php if (isset($login_message)) : ?>
            <div class="success-message">
                <p><?php echo $login_message; ?></p>
            </div>
        <?php endif; ?>

        <section class="welcome-message">
           <p> <h2>Welcome !</h2> </p>
            <p>Thank you for visiting our Home Decor store. Explore our wide range of products to beautify your home.</p>
        </section>
    </main>

</body>
</html>
