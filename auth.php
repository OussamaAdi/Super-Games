<?php
// Login helpers: session check, password rules, failed-login throttling,
// and the per-user cart/library rows. Needs connection.php for $con.

const PASSWORD_MIN_LENGTH = 8;

// Failed logins allowed within the window before login is paused.
const LOGIN_WINDOW_MINUTES = 15;
const LOGIN_MAX_FAILS_PER_USER = 5;   // same username from the same IP
const LOGIN_MAX_FAILS_PER_IP = 20;    // any usernames from the same IP

function is_logged_in()
{
    return isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true;
}

// Passwords are no longer trimmed, but accounts created before that change
// were hashed from the trimmed text, so accept that form as well.
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
    $sql = "SELECT COALESCE(SUM(username = ?), 0), COUNT(*)
            FROM login_attempts
            WHERE ip = ? AND attempted_at > NOW() - INTERVAL " . LOGIN_WINDOW_MINUTES . " MINUTE";

    $stmt = mysqli_prepare($con, $sql);
    if (!$stmt) {
        error_log("login_attempts table missing? Run sql/login_attempts.sql");
        return false;
    }

    $user = attempt_username($username);
    $ip = client_ip();
    mysqli_stmt_bind_param($stmt, "ss", $user, $ip);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $user_fails, $ip_fails);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    return $user_fails >= LOGIN_MAX_FAILS_PER_USER || $ip_fails >= LOGIN_MAX_FAILS_PER_IP;
}

function login_record_failure($con, $username)
{
    $stmt = mysqli_prepare($con, "INSERT INTO login_attempts (username, ip) VALUES (?, ?)");
    if (!$stmt) {
        return;
    }
    $user = attempt_username($username);
    $ip = client_ip();
    mysqli_stmt_bind_param($stmt, "ss", $user, $ip);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // Old attempts are no longer needed.
    mysqli_query($con, "DELETE FROM login_attempts WHERE attempted_at < NOW() - INTERVAL 1 DAY");
}

function login_clear_failures($con, $username)
{
    $stmt = mysqli_prepare($con, "DELETE FROM login_attempts WHERE username = ? AND ip = ?");
    if (!$stmt) {
        return;
    }
    $user = attempt_username($username);
    $ip = client_ip();
    mysqli_stmt_bind_param($stmt, "ss", $user, $ip);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

// Every user needs one row in `cart` and one in `library`. Creates any that are missing.
function ensure_user_rows($con, $user_id)
{
    $ok = true;
    foreach (["cart", "library"] as $table) {
        $sql = "INSERT INTO $table (id) SELECT ? FROM DUAL WHERE NOT EXISTS (SELECT 1 FROM $table WHERE id = ?)";
        $ok = db_user_query($con, $sql, $user_id) && $ok;
    }
    return $ok;
}
