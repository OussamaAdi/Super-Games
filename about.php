<?php
require_once "includes/init.php";

$points = [
    ["A curated selection of games", "From exceptional AAAs, unique indies to the best of classic gaming. Every game is here because we chose it for you."],
    ["Feeding your inner collector", "Offering games with as many goodies as possible is the Super Games way - even if it means exploring our long forgotten basements and attics."],
    ["Respecting game creators", "When you're with us, you can be sure that all games are legitimate, and your purchases support rightful owners and creators."],
];

// Partner logos, shown in two rows of five like the original page
$partner_rows = [
    ["cd-removebg-preview", "Pfizer", "sun", "Halflife", "JD"],
    ["Wii", "NamcoBandai", "Figma", "Dragonair", "Xbox"],
];

$page_title = "About";
$active_nav = "about";
include "includes/header.php";
?>
<div class="about-page">
    <div class="container about-intro">
        <h1 class="about-heading accent">Hand-picking the best in gaming</h1>
        <p class="about-lead">A selection of great DRM-free games, from modern hits to all-time classics, that you really shouldn't miss.</p>
        <div class="row about-points">
            <?php foreach ($points as $point) { ?>
            <div class="column about-point">
                <h4 class="accent"><?php echo e($point[0]); ?></h4>
                <p><?php echo e($point[1]); ?></p>
            </div>
            <?php } ?>
        </div>
    </div>

    <div class="container">
        <hr class="about-divider">
    </div>

    <h1 class="about-heading">We Work with 100+ Partners Including:</h1>
    <div class="container">
        <?php foreach ($partner_rows as $row) { ?>
        <div class="row">
            <?php foreach ($row as $logo) { ?>
            <div class="column">
                <img class="partner-logo" src="Photos/Logos/<?php echo e($logo); ?>.png" alt="">
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</div>
<?php include "includes/footer.php"; ?>
