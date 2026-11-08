<?php
// Opens the database connection ($con) and adds small query helpers.

$config_file = __DIR__ . "/config.php";
if (!file_exists($config_file)) {
    die("Missing includes/config.php: copy includes/config.example.php to includes/config.php and fill in your database details.");
}
$db_config = require $config_file;

$con = mysqli_connect($db_config["host"], $db_config["user"], $db_config["password"], $db_config["database"]);
if (!$con) {
    // Keep connection details out of the page; they go to the PHP error log.
    error_log("Database connection failed: " . mysqli_connect_error());
    die("Could not connect to the database.");
}
mysqli_set_charset($con, "utf8mb4");

// Runs a prepared query. $types and $params work like mysqli_stmt_bind_param,
// e.g. db_query($con, "SELECT * FROM games WHERE slug = ?", "s", [$slug]).
// Returns a mysqli_result for SELECT, true for other queries, false on failure.
function db_query($con, $sql, $types = "", array $params = [])
{
    db_last_error(0);
    $stmt = mysqli_prepare($con, $sql);
    if (!$stmt) {
        db_last_error(mysqli_errno($con));
        error_log("Query failed to prepare: " . mysqli_error($con));
        return false;
    }
    if ($types !== "") {
        mysqli_stmt_bind_param($stmt, $types, ...$params);
    }
    if (!mysqli_stmt_execute($stmt)) {
        db_last_error(mysqli_stmt_errno($stmt));
        error_log("Query failed: " . mysqli_stmt_error($stmt));
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

// MySQL error number of the last failed db_query (0 if it worked), e.g. 1062
// for a duplicate key. Called with a number, it stores that number instead.
function db_last_error($set = null)
{
    static $errno = 0;
    if ($set !== null) {
        $errno = (int) $set;
    }
    return $errno;
}

// All rows of a SELECT as associative arrays.
function db_rows($con, $sql, $types = "", array $params = [])
{
    $result = db_query($con, $sql, $types, $params);
    return $result ? mysqli_fetch_all($result, MYSQLI_ASSOC) : [];
}

// The first row of a SELECT, or null.
function db_row($con, $sql, $types = "", array $params = [])
{
    $rows = db_rows($con, $sql, $types, $params);
    return $rows ? $rows[0] : null;
}
