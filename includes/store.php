<?php
// The store: games, cart and library (purchases).

// Link to a game's page.
function game_url($slug)
{
    return "game.php?slug=" . rawurlencode($slug);
}

// "$60" for whole amounts, "$14.99" otherwise.
function format_price($amount)
{
    $amount = (float) $amount;
    return "$" . (floor($amount) == $amount ? number_format($amount, 0) : number_format($amount, 2));
}

function game_is_on_sale($game)
{
    return $game["list_price"] !== null && (float) $game["list_price"] > (float) $game["price"];
}

function game_by_slug($con, $slug)
{
    return db_row($con, "SELECT * FROM games WHERE slug = ?", "s", [(string) $slug]);
}

// Every game, in All Games order.
function all_games($con)
{
    return db_rows($con, "SELECT * FROM games ORDER BY sort_order, title");
}

// The given games, keyed by slug and in the order the slugs were given.
function games_by_slugs($con, array $slugs)
{
    $by_slug = [];
    foreach (all_games($con) as $game) {
        $by_slug[$game["slug"]] = $game;
    }
    $result = [];
    foreach ($slugs as $slug) {
        if (isset($by_slug[$slug])) {
            $result[$slug] = $by_slug[$slug];
        }
    }
    return $result;
}

function games_on_sale($con)
{
    return db_rows($con, "SELECT * FROM games WHERE list_price > price ORDER BY sort_order, title");
}

function game_screenshots($con, $game_id)
{
    return db_rows($con, "SELECT image FROM game_screenshots WHERE game_id = ? ORDER BY sort_order", "i", [(int) $game_id]);
}

function game_reviews($con, $game_id)
{
    return db_rows($con, "SELECT outlet, author, quote, url FROM game_reviews WHERE game_id = ? ORDER BY sort_order", "i", [(int) $game_id]);
}

// Games in the user's cart, oldest first.
function cart_games($con, $user_id)
{
    return db_rows($con,
        "SELECT g.* FROM cart_items c JOIN games g ON g.id = c.game_id WHERE c.user_id = ? ORDER BY c.added_at, g.sort_order",
        "i", [(int) $user_id]);
}

// Games the user owns, oldest purchase first.
function library_games($con, $user_id)
{
    return db_rows($con,
        "SELECT g.*, p.price_paid, p.purchased_at FROM purchases p JOIN games g ON g.id = p.game_id WHERE p.user_id = ? ORDER BY p.purchased_at, g.sort_order",
        "i", [(int) $user_id]);
}

function user_owns_game($con, $user_id, $game_id)
{
    return db_row($con, "SELECT 1 FROM purchases WHERE user_id = ? AND game_id = ?", "ii", [(int) $user_id, (int) $game_id]) !== null;
}

function game_in_cart($con, $user_id, $game_id)
{
    return db_row($con, "SELECT 1 FROM cart_items WHERE user_id = ? AND game_id = ?", "ii", [(int) $user_id, (int) $game_id]) !== null;
}

// Adding a game that is already in the cart does nothing.
function add_to_cart($con, $user_id, $game_id)
{
    return db_query($con, "INSERT IGNORE INTO cart_items (user_id, game_id) VALUES (?, ?)", "ii", [(int) $user_id, (int) $game_id]) === true;
}

// Records the purchase at the current price and takes the game out of the cart.
// Both happen together or not at all.
function buy_game($con, $user_id, $game_id)
{
    $user_id = (int) $user_id;
    $game_id = (int) $game_id;

    mysqli_begin_transaction($con);
    $ok = db_query($con,
            "INSERT IGNORE INTO purchases (user_id, game_id, price_paid) SELECT ?, id, price FROM games WHERE id = ?",
            "ii", [$user_id, $game_id]) === true
        && db_query($con, "DELETE FROM cart_items WHERE user_id = ? AND game_id = ?", "ii", [$user_id, $game_id]) === true;

    if ($ok) {
        mysqli_commit($con);
    } else {
        mysqli_rollback($con);
    }
    return $ok;
}

// Message to show after a redirect like "cart.php?done=bought". Only fixed texts are used.
function store_notice()
{
    $messages = [
        "bought" => "Added to your library.",
    ];
    $key = (isset($_GET["done"]) && is_string($_GET["done"])) ? $_GET["done"] : "";
    return isset($messages[$key]) ? $messages[$key] : "";
}
