<?php
// Initialize the session
session_start();
require_once "csrf.php";

// Only log out from the Logout button (a POST with a valid token),
// so a link on another site can't log people out.
if ($_SERVER["REQUEST_METHOD"] !== "POST" || !csrf_valid()) {
    header("location: index.php");
    exit;
}

// Unset all of the session variables
$_SESSION = array();

// Remove the session cookie too
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), "", time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
}

// Destroy the session.
session_destroy();

// Redirect to the home page
header("location: index.php");
exit;
?>