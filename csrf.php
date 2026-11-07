<?php
// CSRF protection: every POST form carries a per-session token,
// and the server only acts on a POST when the token matches.
// Requires session_start() to have been called first.

function csrf_token()
{
    if (empty($_SESSION["csrf_token"])) {
        $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
    }
    return $_SESSION["csrf_token"];
}

// Hidden input to print inside each <form method="post">.
function csrf_field()
{
    return '<input type="hidden" name="csrf_token" value="' . csrf_token() . '">';
}

// True when the submitted token matches the session's token.
function csrf_valid()
{
    return isset($_POST["csrf_token"], $_SESSION["csrf_token"])
        && is_string($_POST["csrf_token"])
        && hash_equals($_SESSION["csrf_token"], $_POST["csrf_token"]);
}
