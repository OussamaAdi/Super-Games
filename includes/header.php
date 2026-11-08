<?php
// Top of every page: <head> and the navigation bar.
// Before including it, a page can set:
//   $page_title  text for the browser tab
//   $active_nav  menu item to highlight: home, news, about, contact, library, cart, login or signup
//   $accent      CSS colour for highlights on this page (default blue)
//   $body_class  extra CSS classes for <body>
$page_title = isset($page_title) ? $page_title : "Super Games";
$active_nav = isset($active_nav) ? $active_nav : "";
$accent = isset($accent) ? $accent : "rgb(0, 124, 248)";
$body_class = isset($body_class) ? $body_class : "";

// Menu link with the "active" class when it is the current page.
function nav_link($key, $href, $label, $active_nav)
{
    $class = ($key === $active_nav) ? ' class="active"' : "";
    return '<a' . $class . ' href="' . $href . '">' . $label . '</a>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($page_title); ?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo e(asset("style.css")); ?>">
</head>
<body class="<?php echo e($body_class); ?>" style="--accent: <?php echo e($accent); ?>;">
    <nav class="site-nav">
        <ul class="nav-links">
            <li class="nav-logo"><a href="index.php"><img src="Photos/Logo.png" alt="Super Games home"></a></li>
            <li><?php echo nav_link("home", "index.php", "Home", $active_nav); ?></li>
            <li><?php echo nav_link("news", "news.php", "News", $active_nav); ?></li>
            <li><?php echo nav_link("about", "about.php", "About", $active_nav); ?></li>
            <li><?php echo nav_link("contact", "contact.php", "Contact", $active_nav); ?></li>
        </ul>
        <ul class="nav-links">
            <?php if (is_logged_in()) { ?>
            <li><?php echo nav_link("library", "library.php", "Library", $active_nav); ?></li>
            <li><?php echo nav_link("cart", "cart.php", "Cart", $active_nav); ?></li>
            <li class="nav-user"><?php echo e($_SESSION["username"]); ?></li>
            <li>
                <!-- Logout is a form so it can carry the CSRF token -->
                <form class="nav-logout" method="post" action="logout.php">
                    <?php echo csrf_field(); ?>
                    <button type="submit"><i class="fa fa-sign-out"></i>Logout</button>
                </form>
            </li>
            <?php } else { ?>
            <li><?php echo nav_link("signup", "register.php", '<i class="fa fa-user-plus"></i>Sign up', $active_nav); ?></li>
            <li><?php echo nav_link("login", "login.php", '<i class="fa fa-sign-in"></i>Login', $active_nav); ?></li>
            <?php } ?>
        </ul>
    </nav>
    <?php if (is_logged_in()) { ?>
    <a class="reset-link" href="reset-password.php">Reset Password</a>
    <?php } ?>
    <main class="page">
