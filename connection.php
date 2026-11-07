<?php
// Opens the database connection ($con). Load it with require_once so each
// page uses a single connection.

$config_file = __DIR__ . "/config.php";
if (!file_exists($config_file)) {
    die("Missing config.php: copy config.example.php to config.php and fill in your database details.");
}
$db_config = require $config_file;

$con = mysqli_connect($db_config["host"], $db_config["user"], $db_config["password"], $db_config["database"]);
if (!$con) {
    // Keep connection details out of the page; they go to the PHP error log.
    error_log("Database connection failed: " . mysqli_connect_error());
    die("Could not connect to the database.");
}

// Runs a prepared query whose only parameter is a user id (every "?" in $sql
// must be that id). Returns a mysqli_result for SELECT, true for other
// queries, or false on failure.
function db_user_query($con, $sql, $user_id)
{
    $stmt = mysqli_prepare($con, $sql);
    if (!$stmt) {
        return false;
    }

    $ids = array_fill(0, substr_count($sql, "?"), (int) $user_id);
    mysqli_stmt_bind_param($stmt, str_repeat("i", count($ids)), ...$ids);

    if (!mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        return false;
    }

    if (mysqli_stmt_field_count($stmt) === 0) {
        mysqli_stmt_close($stmt);
        return true;
    }

    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}
