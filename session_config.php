
<?php

function configure_session()
{
    $is_https = !empty($_SERVER["HTTPS"])
        && $_SERVER["HTTPS"] !== "off";

    ini_set("session.use_strict_mode", "1");
    ini_set("session.use_only_cookies", "1");

    session_set_cookie_params([
        "lifetime" => 0,
        "path" => "/",
        "secure" => $is_https,
        "httponly" => true,
        "samesite" => "Strict"
    ]);
}


function start_secure_session()
{
    if (session_status() === PHP_SESSION_NONE) {
        configure_session();
        session_start();
    }
}


function regenerate_session_id()
{
    if (!session_regenerate_id(true)) {
        throw new RuntimeException(
            "Failed to regenerate session ID."
        );
    }
}


function require_login()
{
    if (empty($_SESSION["logged_in"])) {
        header("Location: login.php");
        exit;
    }
}

?>
