<?php
require_once "includes/init.php";

$games = all_games($con);

$page_title = "All Games";
$active_nav = "home";
include "includes/header.php";
?>
<h2 class="section-title page-top-title">All Games</h2>
<div class="container">
    <div class="row">
        <?php foreach ($games as $game) { include "includes/game_card.php"; } ?>
    </div>
</div>
<?php include "includes/footer.php"; ?>
