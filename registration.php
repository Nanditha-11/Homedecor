<?php
session_start();

// Check if there's a register success message
if (isset($_SESSION['register_message'])) {
    $register_message = $_SESSION['register_message'];
    unset($_SESSION['register_message']); // Clear the message after showing it
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful - Home Decor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1> <center> <i> Home Decor - Registration </i> </center></h1>
    </header>

    <main>
        <!-- Display registration message if available -->
        <?php if (isset($register_message)) : ?>
            <div class="success-message">
                <p><?php echo $register_message; ?></p>
            </div>
        <?php endif; ?>

        <section class="welcome-message">
            <h2>Welcome!</h2>
            <p>Your registration was successful. You can now <a href="login.html">log in</a> to your account.</p>
        </section>
    </main>

    
</body>
</html>
