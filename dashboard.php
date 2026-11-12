
<?php

require_once __DIR__ . '/session_config.php';


start_secure_session();

require_login();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>

    <h1>Welcome to Dashboard</h1>

    <p>
        Hello,
        <?php echo htmlspecialchars($_SESSION["username"]); ?>
    </p>

    <h3>Session Information</h3>

    <p>
        Session ID:
        <?php echo htmlspecialchars(session_id()); ?>
    </p>

    <p>
        Login Status: Authenticated
    </p>

    <a href="cookie_test.php">Test Cookie Security</a>

    <br><br>

    <a href="logout.php">Logout</a>

</body>
</html>
