<?php // One game's card on the home page and All Games. Expects $game. ?>
<div class="col-lg-3 col-md-4 col-sm-6 game-card">
    <div class="card">
        <a href="<?php echo e(game_url($game["slug"])); ?>"><img class="card-img-top" src="<?php echo e($game["card_image"]); ?>" alt="<?php echo e($game["title"]); ?>"></a>
        <div class="card-body">
            <a class="game-card-title" href="<?php echo e(game_url($game["slug"])); ?>"><?php echo e($game["title"]); ?></a><br>
            <span class="game-card-developer"><?php echo e($game["developer"]); ?></span>
            <h5 class="game-card-price">
                <?php if (game_is_on_sale($game)) { ?><del><?php echo format_price($game["list_price"]); ?></del><?php } ?>
                <?php echo format_price($game["price"]); ?>
            </h5>
        </div>
    </div>
</div>
