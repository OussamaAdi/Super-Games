<?php
require_once "includes/init.php";

$page_title = "Contact";
$active_nav = "contact";
include "includes/header.php";
?>
<div class="container text-center accent contact-page">
    <?php if (is_logged_in()) { ?>
    <h1><?php echo e($_SESSION["username"]); ?>, You can contact us via Email</h1>
    <?php } else { ?>
    <h1>You can contact us via Email</h1>
    <?php } ?>
    <h2>We’re here to help!</h2>
    <h2 class="contact-email">supergames@gmail.com</h2>
</div>
<?php $footer_space = 120; include "includes/footer.php"; ?>
