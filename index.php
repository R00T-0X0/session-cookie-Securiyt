
<?php

require_once __DIR__ . '/session_config.php';

start_secure_session();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Session and Cookie Security</title>
</head>

<body>

    <h1>Session and Cookie Security</h1>

    <p>
        Welcome to the secure session management system.
    </p>

    <?php if (!empty($_SESSION["logged_in"])): ?>

        <p>
            Logged in as:
            <?php echo htmlspecialchars($_SESSION["username"]); ?>
        </p>

        <a href="dashboard.php">Dashboard</a>

        <br><br>

        <a href="logout.php">Logout</a>

    <?php else: ?>

        <a href="login.php">Login</a>

    <?php endif; ?>

    <br><br>

    <a href="cookie_test.php">Cookie Security Test</a>

</body>
</html>
