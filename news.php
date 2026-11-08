<?php
require_once "includes/init.php";

// Hand-written news. Store games link to their game page; the others aren't sold here.
$available = [
    ["slug" => "starwarsJ", "title" => "Star Wars Jedi: Fallen Order", "developer" => "Respawn Entertainment", "image" => "Photos/Starwars.jpg",
     "text" => "Aided by a former Jedi Knight, a prickly pilot, and a fearless droid companion, you must escape the sinister machinations of the Imperial forces in this story driven adventure."],
    ["slug" => "reddead", "title" => "Red Dead Redemption 2", "developer" => "Rockstar Studios", "image" => "Photos/Reddead.jpg",
     "text" => "Red Dead Redemption 2, the critically acclaimed open world epic from Rockstar Games and the highest rated game of the console generation, now enhanced for PC with new Story Mode content, visual upgrades and more."],
];

$coming_soon = [
    ["title" => "Assassin's Creed: Origins", "developer" => "Ubisoft Montreal", "image" => "Photos/Origins.jpg",
     "text" => "Ancient Egypt, a land of majesty and intrigue, is disappearing in a ruthless fight for power. Unveil dark secrets and forgotten myths as you go back to the one founding moment: The Origins of the Assassin’s Brotherhood."],
    ["title" => "Call of Duty: Modern Warfare", "developer" => "Infinity Ward, Sledgehammer Games", "image" => "Photos/mw.jpg",
     "text" => "Partner with special forces and freedom fighters to retrieve stolen chemical weapons. Covert operations will take you across Europe and the Middle East in order to stop full scale global war."],
];

$new_content = [
    ["slug" => "witcher", "image" => "Photos/witcherB&W.jpg", "title" => "The Witcher 3: Wild Hunt – Blood and Wine", "points" => [
        "Blood and Wine is the second and final expansion pack for The Witcher 3: Wild Hunt",
        "Explore an entirely new part of The Witcher’s vast open world — the land of wine, Toussaint",
        "Hunt down an elusive beast terrorizing the kingdom",
        "Embark on your final quest in a world still brimming with things to do",
    ]],
    ["slug" => "ghost", "image" => "Photos/ghostLegends.jpg", "title" => "Ghost of Tsushima: Legends", "points" => [
        "Legends is a co-op multiplayer mode for Ghost of Tsushima",
        "It is a cooperative mode in which players are able to choose from classes: Samurai, Hunter, Ronin, or Assassin",
        "It is free to download for owners of Ghost of Tsushima",
        "Players are able to cooperatively take on new missions based on Japanese mythology",
    ]],
    ["slug" => "doom", "image" => "Photos/doomAG.jpg", "title" => "Doom Eternal: The Ancient Gods - Part One", "points" => [
        "The Ancient Gods – Part One is the first campaign expansion for the critically acclaimed DOOM Eternal",
        "Experience a new mission in your eternal fight against evil. Unleash your vengeance and face your greatest test",
        "From the industrial rain-swept decks of the oceanic UAC Atlantica Facility on Earth to the Blood Swamps of Hell",
        "Change your tactics as you face Hell’s newest threats that add more depth and challenge to combat",
    ]],
    ["slug" => "odyssey", "image" => "Photos/acFate-min.jpg", "title" => "Assassin’s Creed Odyssey - The Fate of Atlantis", "points" => [
        "Venture into the fabled realms of Greek mythology to discover your hero's true power",
        "Explore three new worlds from Greek mythology: Elysium, the Underworld, and Atlantis!",
        "Face legendary trials and encounter the gods themselves, including Persephone, Hades, Poseidon, and more!",
        "Delve deeper into Assassin's Creed lore and uncover the mysterious power of the First Civilisation",
    ]],
];

$page_title = "News";
$active_nav = "news";
include "includes/header.php";
?>
<!-- Same layout as the original News page -->
<br>
<div class="row news-box">
    <h4 class="news-title">News</h4><br>
    <h4 class="news-subtitle">Now Available:</h4>
    <?php foreach ($available as $item) { ?>
    <div class="col-sm-6 game-card">
        <div class="card">
            <a class="news-image" href="<?php echo e(game_url($item["slug"])); ?>"><img class="card-img-top" src="<?php echo e($item["image"]); ?>" alt="<?php echo e($item["title"]); ?>"></a>
            <div class="card-body">
                <span class="card-title">
                    <a class="news-card-title" href="<?php echo e(game_url($item["slug"])); ?>"><?php echo e($item["title"]); ?></a><br>
                </span>
                <span class="game-card-developer"><?php echo e($item["developer"]); ?></span>
                <p class="news-text"><?php echo e($item["text"]); ?></p>
            </div>
        </div>
    </div>
    <?php } ?>
</div><br>
<hr class="news-divider"><br>
<div class="row news-box news-box-second">
    <h4 class="news-subtitle">Coming Soon:</h4>
    <?php foreach ($coming_soon as $item) { ?>
    <div class="col-sm-6 game-card">
        <div class="card">
            <p class="news-image"><img class="card-img-top" src="<?php echo e($item["image"]); ?>" alt="<?php echo e($item["title"]); ?>"></p>
            <div class="card-body">
                <span class="card-title">
                    <h5 class="news-card-title"><?php echo e($item["title"]); ?></h5><br>
                </span>
                <span class="game-card-developer"><?php echo e($item["developer"]); ?></span>
                <p class="news-text"><?php echo e($item["text"]); ?></p>
            </div>
        </div>
    </div>
    <?php } ?>
</div><br><br><br>
<div class="container news-extras">
    <?php foreach ($new_content as $i => $item) { ?>
    <?php if ($i > 0) { ?><hr class="news-extra-divider"><?php } ?>
    <div class="row news-extra">
        <?php if ($i === 0) { ?><h4 class="news-extra-heading">New Content:</h4><?php } ?>
        <div class="col-md-3">
            <a href="<?php echo e(game_url($item["slug"])); ?>"><img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo e($item["image"]); ?>" alt="<?php echo e($item["title"]); ?>"></a>
        </div>
        <div class="col-md-8">
            <h3><?php echo e($item["title"]); ?></h3>
            <?php foreach ($item["points"] as $point) { ?>
            <p><?php echo e($point); ?></p>
            <?php } ?>
        </div>
    </div>
    <?php } ?>
</div>
<?php $footer_space = 24; include "includes/footer.php"; ?>
