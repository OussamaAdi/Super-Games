<?php
// One page for every game: game.php?slug=reddead
// The layout is the original game page's, filled in from the database.
require_once "includes/init.php";

$slug = (isset($_GET["slug"]) && is_string($_GET["slug"])) ? $_GET["slug"] : "";
$game = game_by_slug($con, $slug);

if (!$game) {
    http_response_code(404);
    $page_title = "Game not found";
    include "includes/header.php";
    ?>
    <div class="container text-center">
        <h2>Game not found</h2>
        <p><a href="all.php">See all games</a></p>
    </div>
    <?php
    include "includes/footer.php";
    exit;
}

$user_id = current_user_id();
$owned = $user_id && user_owns_game($con, $user_id, $game["id"]);
$in_cart = $user_id && !$owned && game_in_cart($con, $user_id, $game["id"]);

// Buy / Add to Cart: save first, then redirect so a refresh doesn't resubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!$user_id) {
        redirect("login.php");
    }

    $done = "";
    $action = isset($_POST["action"]) ? $_POST["action"] : "";
    if (!$owned && csrf_valid()) {
        if ($action === "cart") {
            add_to_cart($con, $user_id, $game["id"]);
        } elseif ($action === "buy" && buy_game($con, $user_id, $game["id"])) {
            $done = "bought";
        }
    }
    redirect(game_url($game["slug"]) . ($done ? "&done=" . $done : ""));
}

$notice = store_notice();
$screenshots = game_screenshots($con, $game["id"]);
$reviews = game_reviews($con, $game["id"]);
$coming_soon = ($game["status"] === "coming_soon");

// Reviews sit in two columns of two, like the original page
$review_columns = [array_slice($reviews, 0, 2), array_slice($reviews, 2, 2)];

$page_title = $game["title"];
$active_nav = "home";
$accent = $game["accent_color"];
$body_class = "user-accent game-" . $game["slug"] . ($coming_soon ? " game-coming-soon" : "");
include "includes/header.php";
?>
<div class="container game-top">
    <div class="row">
        <div class="column">
            <nav class="game-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="crumb-link js-back" href="all.php">Back</a></li>
                    <li class="breadcrumb-item"><a class="crumb-link" href="all.php">All Games</a></li>
                    <li class="breadcrumb-item active accent" aria-current="page"><?php echo e($game["title"]); ?></li>
                </ol>
            </nav>
            <div id="screenshots" class="carousel slide" data-ride="carousel" data-interval="3000">
                <ol class="carousel-indicators">
                    <?php foreach ($screenshots as $i => $shot) { ?>
                    <li data-target="#screenshots" data-slide-to="<?php echo $i; ?>"<?php echo $i === 0 ? ' class="active"' : ""; ?>></li>
                    <?php } ?>
                </ol>
                <div class="carousel-inner">
                    <?php foreach ($screenshots as $i => $shot) { ?>
                    <div class="carousel-item<?php echo $i === 0 ? " active" : ""; ?>">
                        <img class="d-block w-100" src="<?php echo e($shot["image"]); ?>" alt="<?php echo e($game["title"]); ?> screenshot <?php echo $i + 1; ?>">
                    </div>
                    <?php } ?>
                </div>
                <a class="carousel-control-prev" href="#screenshots" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#screenshots" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <?php $n = 0; foreach ($review_columns as $column) { if (!$column) { continue; } ?>
        <div class="column">
            <?php foreach ($column as $review) { $n++; ?>
            <div class="card review-card review-<?php echo $n; ?>">
                <div class="card-body">
                    <?php if ($review["url"] === "") { ?>
                    <!-- Status card (e.g. "Early Access / No Reviews") -->
                    <h5 class="card-title accent"><?php echo e($review["outlet"]); ?></h5>
                    <h6 class="card-subtitle mb-1 text-muted"><?php echo e($review["author"]); ?></h6>
                    <?php } else { ?>
                    <h5 class="card-title"><?php echo e($review["outlet"]); ?></h5>
                    <h6 class="card-subtitle mb-1 text-muted"><?php echo e($review["author"]); ?></h6>
                    <p class="card-text"><?php echo e($review["quote"]); ?></p>
                    <a class="card-link review-link" href="<?php echo e($review["url"]); ?>" target="_blank" rel="noopener">Read Full Review</a>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</div><br><br>

<div class="row game-info">
    <div class="col-md-3">
        <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo e($game["detail_image"]); ?>" alt="<?php echo e($game["title"]); ?>">
    </div>
    <div class="col-md-8">
        <h3 class="game-price"><?php echo format_price($game["price"]); ?></h3>
        <h3><?php echo e($game["title"]); ?></h3>
        <?php if ($notice !== "") { ?>
        <p class="notice"><?php echo e($notice); ?></p>
        <?php } ?>
        <?php foreach (preg_split('/\R/', $game["description"]) as $paragraph) { ?>
        <p><?php echo e($paragraph); ?></p>
        <?php } ?>
    </div>
    <div class="col-md-1 game-buttons"><br><br>
        <div class="row-md-1">
            <?php if (!$user_id) { ?>
            <a class="btn-buy" href="login.php">Log in</a>
            <?php } elseif ($owned) { ?>
            <a class="btn-buy" href="library.php">Owned</a>
            <?php } else { ?>
            <form method="post">
                <?php echo csrf_field(); ?>
                <button class="btn-buy" type="submit" name="action" value="buy"><?php echo $coming_soon ? "Pre-order" : "Buy"; ?></button>
            </form>
            <br>
            <?php if ($in_cart) { ?>
            <a class="btn-wish btn-in-cart" href="cart.php" title="This game is in your cart. Click to view your cart."><i class="fa fa-check"></i> In Cart</a>
            <?php } else { ?>
            <form method="post">
                <?php echo csrf_field(); ?>
                <button class="btn-wish" type="submit" name="action" value="cart" title="Add to Cart" aria-label="Add to Cart"><i class="fa fa-shopping-cart"></i></button>
            </form>
            <?php } ?>
            <?php } ?>
        </div>
    </div>
</div><br>
<?php include "includes/footer.php"; ?>
