<?php
require_once "includes/init.php";

// Only log out from the Logout button (a POST with a valid token),
// so a link on another site can't log people out.
if ($_SERVER["REQUEST_METHOD"] !== "POST" || !csrf_valid()) {
    redirect("index.php");
}

$_SESSION = [];

// Remove the session cookie too
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), "", time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
}

session_destroy();
redirect("index.php");
