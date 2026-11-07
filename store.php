<?php
// Cart and library actions. Needs connection.php for $con.
//
// The cart and library tables have one column per game. Column names can't be
// bound as query parameters, so they are checked against this list first.
const STORE_GAMES = [
    "reddead", "cyberpunk", "gta", "borderlands", "witcher", "zombie",
    "maneater", "odyssey", "anno", "starwarsB", "starwarsJ", "doom",
    "ghost", "control", "satisfactory", "tetris", "snowrunner",
];

function store_column($game)
{
    if (!in_array($game, STORE_GAMES, true)) {
        throw new InvalidArgumentException("Unknown game: " . $game);
    }
    return "`" . $game . "`";
}

// The user's row from `cart` or `library`, as an array (empty if there is none).
function store_row($con, $table, $user_id)
{
    $table = ($table === "library") ? "library" : "cart";
    $result = db_user_query($con, "SELECT * FROM $table WHERE id = ? LIMIT 1", $user_id);
    $row = $result ? mysqli_fetch_assoc($result) : null;
    return $row ? $row : [];
}

function user_has_game($con, $table, $game, $user_id)
{
    store_column($game);
    $row = store_row($con, $table, $user_id);
    return !empty($row[$game]);
}

function add_to_cart($con, $game, $user_id)
{
    $column = store_column($game);
    return db_user_query($con, "UPDATE cart SET $column = 1 WHERE id = ?", $user_id) === true;
}

// Moves a game from the cart to the library. Both updates happen together or not at all.
function buy_game($con, $game, $user_id)
{
    $column = store_column($game);

    mysqli_begin_transaction($con);
    $ok = db_user_query($con, "UPDATE cart SET $column = NULL WHERE id = ?", $user_id) === true
        && db_user_query($con, "UPDATE library SET $column = 1 WHERE id = ?", $user_id) === true;

    if ($ok) {
        mysqli_commit($con);
    } else {
        mysqli_rollback($con);
    }
    return $ok;
}

// Message to show after a redirect like "page.php?done=bought". Only fixed texts are used.
function store_notice()
{
    $messages = [
        "bought" => "Added to your library.",
    ];
    $key = (isset($_GET["done"]) && is_string($_GET["done"])) ? $_GET["done"] : "";
    return isset($messages[$key]) ? $messages[$key] : "";
}
