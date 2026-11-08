<?php
// Login helpers: session check, password rules and failed-login throttling.

const PASSWORD_MIN_LENGTH = 8;

// Failed logins allowed within the window before login is paused.
const LOGIN_WINDOW_MINUTES = 15;
const LOGIN_MAX_FAILS_PER_USER = 5;   // same username from the same IP
const LOGIN_MAX_FAILS_PER_IP = 20;    // any usernames from the same IP

function is_logged_in()
{
    return isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true;
}

function current_user_id()
{
    return is_logged_in() ? (int) $_SESSION["id"] : 0;
}

// Passwords are used exactly as typed, but accounts created before that
// change were hashed from the trimmed text, so accept that form as well.
function password_matches($password, $hash)
{
    if (password_verify($password, $hash)) {
        return true;
    }
    $trimmed = trim($password);
    return $trimmed !== $password && password_verify($trimmed, $hash);
}

function client_ip()
{
    return isset($_SERVER["REMOTE_ADDR"]) ? $_SERVER["REMOTE_ADDR"] : "";
}

// The login_attempts table stores at most 50 characters of the username.
function attempt_username($username)
{
    return substr($username, 0, 50);
}

// True when this IP has failed too often recently, for this username or overall.
function login_is_throttled($con, $username)
{
    $row = db_row($con,
        "SELECT COALESCE(SUM(username = ?), 0) AS user_fails, COUNT(*) AS ip_fails
         FROM login_attempts
         WHERE ip = ? AND attempted_at > NOW() - INTERVAL " . LOGIN_WINDOW_MINUTES . " MINUTE",
        "ss", [attempt_username($username), client_ip()]);

    if (!$row) {
        return false;
    }
    return $row["user_fails"] >= LOGIN_MAX_FAILS_PER_USER || $row["ip_fails"] >= LOGIN_MAX_FAILS_PER_IP;
}

function login_record_failure($con, $username)
{
    db_query($con, "INSERT INTO login_attempts (username, ip) VALUES (?, ?)", "ss", [attempt_username($username), client_ip()]);
    // Old attempts are no longer needed.
    db_query($con, "DELETE FROM login_attempts WHERE attempted_at < NOW() - INTERVAL 1 DAY");
}

function login_clear_failures($con, $username)
{
    db_query($con, "DELETE FROM login_attempts WHERE username = ? AND ip = ?", "ss", [attempt_username($username), client_ip()]);
}
