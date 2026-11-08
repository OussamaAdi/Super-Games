<?php
require_once "includes/init.php";

if (!is_logged_in()) {
    redirect("login.php");
}
$user_id = current_user_id();

// Buy: save first, then redirect so the list is current and a refresh doesn't resubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $done = "";
    $game_id = isset($_POST["game_id"]) ? (int) $_POST["game_id"] : 0;
    if (csrf_valid() && game_in_cart($con, $user_id, $game_id) && buy_game($con, $user_id, $game_id)) {
        $done = "bought";
    }
    redirect("cart.php" . ($done ? "?done=" . $done : ""));
}

$games = cart_games($con, $user_id);
$notice = store_notice();

$page_title = "Cart";
$active_nav = "cart";
include "includes/header.php";
?>
<h3 class="text-center">Bought games are in the Library</h3><br>
<?php if ($notice !== "") { ?>
<p class="notice text-center"><?php echo e($notice); ?></p>
<?php } ?>

<?php if (!$games) { ?>
<p class="empty-message">Your cart is empty. <a href="all.php">Browse all games</a></p>
<?php } ?>

<?php foreach ($games as $game) { ?>
<div class="container" style="--accent: <?php echo e($game["accent_color"]); ?>;">
    <div class="row store-row">
        <div class="col-md-2">
            <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo e($game["banner_image"]); ?>" alt="<?php echo e($game["title"]); ?>">
        </div>
        <div class="col-md-6 col-xl-8">
            <h3><a href="<?php echo e(game_url($game["slug"])); ?>"><?php echo e($game["title"]); ?></a></h3>
            <h4><?php echo format_price($game["price"]); ?></h4>
        </div>
        <div class="col-md-4 col-xl-2">
            <form method="post">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="game_id" value="<?php echo (int) $game["id"]; ?>">
                <button class="btn-store" type="submit">Buy</button>
            </form>
        </div>
    </div>
</div>
<div class="container">
    <hr class="store-divider">
</div>
<?php } ?>
<?php $footer_space = 288; include "includes/footer.php"; ?>
