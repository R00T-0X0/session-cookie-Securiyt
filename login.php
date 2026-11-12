
<?php

require_once __DIR__ . '/session_config.php';

start_secure_session();

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";

    if ($username === "admin" && $password === "12345") {

        regenerate_session_id();

        $_SESSION["logged_in"] = true;
        $_SESSION["username"] = $username;

        header("Location: dashboard.php");
        exit;

    } else {
        $error = "Invalid username or password.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secure Login</title>
</head>
<body>

    <h1>Secure Login</h1>

    <form method="POST">

        <label>Username:</label>
        <input type="text" name="username" required>

        <br><br>

        <label>Password:</label>
        <input type="password" name="password" required>

        <br><br>

        <button type="submit">Login</button>

    </form>

    <p style="color:red;">
        <?php echo htmlspecialchars($error); ?>
    </p>

    <a href="index.php">Home</a>

</body>
</html>
