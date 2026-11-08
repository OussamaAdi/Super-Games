<?php
require_once "includes/init.php";

// Which games appear where on the home page. Titles, prices and images come from the database.
$carousel_slugs = ["starwarsJ", "borderlands", "reddead", "cyberpunk", "gta"];
$best_selling_slugs = ["control", "satisfactory", "tetris", "snowrunner"];

// Spotlight panel: marketing text for a few games. The title uses the game's
// colour from the database; color2 is used for the smaller lines.
$spotlight = [
    "anno" => [
        "title"    => "Anno 1800",
        "tagline"  => "PIONEERS OF A NEW DAWN",
        "text1"    => "The path you choose will define your world. Are you an innovator or an exploiter? A conqueror or a liberator? How the world remembers your name is up to you.",
        "text2"    => "In Anno 1800, players will take charge of their own fortune as they navigate the rapidly evolving technological landscape and malicious political arena of the 19th century.",
        "headline" => "Lead the Industrial Revolution in Anno 1800!",
        "color2"   => "rgb(175, 152, 108)",
    ],
    "starwarsB" => [
        "title"    => "Battlefront II",
        "tagline"  => "HEROES ARE BORN ON THE BATTLEFRONT",
        "text1"    => "Put your mastery of the blaster, lightsaber, and the Force to the test online and offline in STAR WARS Battlefront II",
        "text2"    => "Embark on an endless Star Wars™ journey from the best-selling Star Wars™ video game franchise of all time. Experience rich multiplayer battlegrounds across all three eras - prequel, classic and new trilogy.",
        "headline" => "A new hero, a story untold",
        "color2"   => "rgb(34, 137, 255)",
    ],
    "doom" => [
        "title"    => "DOOM",
        "tagline"  => "RIP AND TEAR!",
        "text1"    => "Hell’s armies have invaded Earth. Become the Slayer in an epic single-player campaign to conquer demons across dimensions and stop the final destruction of humanity.",
        "text2"    => "Armed with a shoulder-mounted flamethrower, retractable wrist-mounted blade, upgraded guns and mods, and abilities, you're faster, stronger, and more versatile than ever.",
        "headline" => "The Only Thing they Fear... Is You.",
        "color2"   => "rgb(211, 139, 31)",
    ],
    "ghost" => [
        "title"    => "Ghost",
        "tagline"  => "BE A SAMURAI",
        "text1"    => "In War-Torn Tsushima, Ancient Beauty Endures: In this open-world action adventure, you’ll roam vast countrysides and expansive terrain to encounter rich characters, and discover ancient landmarks.",
        "text2"    => "The Rise of the Ghost: In his quest to reclaim Tsushima, Jin must seek support from old friends and new unlikely allies. He must break away from tradition.",
        "headline" => "Forge a New Path as the Ghost",
        "color2"   => "rgb(156, 33, 29)",
    ],
];

$carousel = games_by_slugs($con, $carousel_slugs);
$on_sale = games_on_sale($con);
$spotlight_games = games_by_slugs($con, array_keys($spotlight));
$best_selling = games_by_slugs($con, $best_selling_slugs);

$page_title = "Super Games";
$active_nav = "home";
$body_class = "user-accent";
include "includes/header.php";
?>
<div class="container store-top">
    <div class="store-header">
        <h4>Store</h4>
        <a class="view-all" href="all.php">View All</a>
    </div>
    <div id="featured" class="carousel slide" data-ride="carousel" data-interval="4000">
        <ol class="carousel-indicators">
            <?php $i = 0; foreach ($carousel as $game) { ?>
            <li data-target="#featured" data-slide-to="<?php echo $i; ?>"<?php echo $i === 0 ? ' class="active"' : ""; ?>></li>
            <?php $i++; } ?>
        </ol>
        <div class="carousel-inner">
            <?php $i = 0; foreach ($carousel as $game) { ?>
            <div class="carousel-item<?php echo $i === 0 ? " active" : ""; ?>">
                <a href="<?php echo e(game_url($game["slug"])); ?>"><img class="d-block w-100" src="<?php echo e($game["banner_image"]); ?>" alt="<?php echo e($game["title"]); ?>"></a>
            </div>
            <?php $i++; } ?>
        </div>
        <a class="carousel-control-prev" href="#featured" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#featured" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<h2 class="section-title">On Sale</h2>
<div class="container">
    <div class="row">
        <?php foreach ($on_sale as $game) { include "includes/game_card.php"; } ?>
    </div>
</div>

<?php if ($spotlight_games) {
    $first_slug = array_keys($spotlight_games)[0];
    $first = $spotlight_games[$first_slug];
    $first_text = $spotlight[$first_slug];
?>
<div id="spotlight" class="spotlight" style="--accent: <?php echo e($first["accent_color"]); ?>; --accent2: <?php echo e($first_text["color2"]); ?>;">
    <div class="spotlight-thumbs">
        <?php foreach ($spotlight_games as $slug => $game) { $text = $spotlight[$slug]; ?>
        <button type="button" class="spotlight-thumb"
            data-image="<?php echo e($game["banner_image"]); ?>"
            data-link="<?php echo e(game_url($slug)); ?>"
            data-color="<?php echo e($game["accent_color"]); ?>"
            data-color2="<?php echo e($text["color2"]); ?>"
            data-title="<?php echo e($text["title"]); ?>"
            data-tagline="<?php echo e($text["tagline"]); ?>"
            data-text1="<?php echo e($text["text1"]); ?>"
            data-text2="<?php echo e($text["text2"]); ?>"
            data-headline="<?php echo e($text["headline"]); ?>">
            <img src="<?php echo e($game["banner_image"]); ?>" alt="Show <?php echo e($game["title"]); ?>">
        </button>
        <?php } ?>
    </div>
    <div class="row spotlight-main">
        <div class="col-lg-9">
            <a id="spotlight-link" href="<?php echo e(game_url($first_slug)); ?>">
                <img id="spotlight-image" class="img-fluid rounded mb-4 w-100" src="<?php echo e($first["banner_image"]); ?>" alt="">
            </a>
        </div>
        <div class="col-lg-3 spotlight-text">
            <h1 id="spotlight-title" class="accent"><?php echo e($first_text["title"]); ?></h1>
            <h6 id="spotlight-tagline" class="accent2"><?php echo e($first_text["tagline"]); ?></h6>
            <p id="spotlight-text1"><?php echo e($first_text["text1"]); ?></p>
            <p id="spotlight-text2"><?php echo e($first_text["text2"]); ?></p>
            <h6 id="spotlight-headline" class="accent2"><?php echo e($first_text["headline"]); ?></h6>
        </div>
    </div>
</div>
<?php } ?>

<h2 class="section-title">Best Selling</h2>
<div class="container">
    <div class="row">
        <?php foreach ($best_selling as $game) { include "includes/game_card.php"; } ?>
    </div>
</div>
<?php include "includes/footer.php"; ?>
