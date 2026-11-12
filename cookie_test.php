
<?php

require_once __DIR__ . '/session_config.php';

start_secure_session();

$is_https = !empty($_SERVER["HTTPS"])
    && $_SERVER["HTTPS"] !== "off";


function create_protected_cookie($is_https)
{
    setcookie("protected_cookie_v2", "Protected_Value", [
        "expires" => time() + 3600,
        "path" => "/",
        "secure" => $is_https,
        "httponly" => true,
        "samesite" => "Strict"
    ]);
}


function create_unprotected_cookie($is_https)
{
    setcookie("unprotected_cookie_v2", "Unprotected_Value", [
        "expires" => time() + 3600,
        "path" => "/",
        "secure" => $is_https,
        "httponly" => false,
        "samesite" => "Lax"
    ]);
}


if (!isset($_GET["check"])) {

    create_protected_cookie($is_https);

    create_unprotected_cookie($is_https);

    header("Location: cookie_test.php?check=1");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cookie Security Test</title>
</head>

<body>

    <h1>Cookie Security Test</h1>

    <h3>Protected Cookie</h3>
    <p>HttpOnly: true</p>
    <p>SameSite: Strict</p>

    <h3>Unprotected Cookie</h3>
    <p>HttpOnly: false</p>
    <p>SameSite: Lax</p>

    <h3>JavaScript Cookie Test</h3>

    <p id="cookie-result"></p>

    <script>

        const cookies = document.cookie;

        const protectedCookie =
            cookies.includes("protected_cookie_v2=");

        const unprotectedCookie =
            cookies.includes("unprotected_cookie_v2=");

        const result = document.getElementById("cookie-result");

        result.innerHTML =
            "Protected Cookie: " +
            (protectedCookie
                ? "JavaScript CAN read it."
                : "JavaScript CANNOT read it.") +
            "<br>" +
            "Unprotected Cookie: " +
            (unprotectedCookie
                ? "JavaScript CAN read it."
                : "JavaScript CANNOT read it.");

    </script>

    <br><br>

    <a href="dashboard.php">Back to Dashboard</a>

</body>
</html>
