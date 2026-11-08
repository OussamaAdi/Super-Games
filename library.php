<?php
require_once "includes/init.php";

if (!is_logged_in()) {
    redirect("login.php");
}

$games = library_games($con, current_user_id());

$page_title = "Library";
$active_nav = "library";
include "includes/header.php";
?>
<?php if (!$games) { ?>
<p class="empty-message">You don't own any games yet. <a href="all.php">Browse all games</a></p>
<?php } ?>

<?php foreach ($games as $game) { ?>
<div class="container" style="--accent: <?php echo e($game["accent_color"]); ?>;">
    <div class="row store-row">
        <div class="col-md-2">
            <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo e($game["banner_image"]); ?>" alt="<?php echo e($game["title"]); ?>">
        </div>
        <div class="col-md-6 col-xl-8"><br>
            <h3><a href="<?php echo e(game_url($game["slug"])); ?>"><?php echo e($game["title"]); ?></a></h3>
        </div>
        <div class="col-md-4 col-xl-2">
            <?php if ($game["status"] === "coming_soon") { ?>
            <span class="btn-store">Coming Soon</span>
            <?php } else { ?>
            <!-- Mock store: there is nothing to download -->
            <button class="btn-store" type="button" disabled>Download (demo)</button>
            <?php } ?>
        </div>
    </div>
</div>
<div class="container">
    <hr class="store-divider">
</div>
<?php } ?>
<?php $footer_space = 288; include "includes/footer.php"; ?>
