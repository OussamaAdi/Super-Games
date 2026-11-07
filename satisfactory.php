<?php
// Initialize the session
session_start();

require_once "connection.php";
require_once "csrf.php";
require_once "auth.php";
require_once "store.php";

// Game column in the cart and library tables
$game = "satisfactory";

// Guests can view the page; buying needs an account
$logged_in = is_logged_in();
$owned = $logged_in && user_has_game($con, "library", $game, $_SESSION["id"]);
$in_cart = $logged_in && !$owned && user_has_game($con, "cart", $game, $_SESSION["id"]);

// Buy / Add to Cart: handle the form before the page is drawn, then redirect
// so a refresh doesn't resubmit it
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!$logged_in) {
        header("location: login.php");
        exit;
    }

    $done = "";
    if (!$owned && csrf_valid()) {
        if (isset($_POST["cartB"])) {
            add_to_cart($con, $game, $_SESSION["id"]);
        }
        if (isset($_POST["buyB"]) && buy_game($con, $game, $_SESSION["id"])) {
            $done = "bought";
        }
    }
    header("location: " . basename(__FILE__) . ($done ? "?done=" . $done : ""));
    exit;
}

$notice = store_notice();

if ($logged_in) {
    include "header2.php";
} else {
    include "header.php";
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/all.min.js"></script>
    <script src="script.js"></script>
    <title>Satisfactory</title>
</head>

<body>


    <div id="C1" class="container">
        <div style="max-width: 900px;" class="row">
            <div class="column">
                <nav id="breadC" aria-label="breadcrumb">
                    <ol style="background-color: rgb(20, 20, 20);" class="breadcrumb">
                    <li class="breadcrumb-item"><a onclick="goBack()" id="home">Back</a></li>
                        <li class="breadcrumb-item"><a id="home" href="all.php">All Games</a></li>
                        <li style="color: rgb(220,123,16);" class="breadcrumb-item active" aria-current="page">Satisfactory</li>
                    </ol>
                </nav>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="Photos/satisfactory/s1.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="Photos/satisfactory/s2.jpg" alt="Second slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="column">
                <div id="review" class="card" style="width: 15rem;">
                    <div class="card-body">
                        <h5 style="color: rgb(220,123,16);" class="card-title">Early Access</h5>
                        <h6 style="color: grey;" class="card-subtitle mb-1 text-muted">No Reviews</h6>
                    </div>
                </div>
            </div>
        </div>

    </div><br><br>





    <div id="row2" class="row">
        <div class="col-md-3">
                <img id="newsImg" class="img-fluid rounded mb-3 mb-md-0" src="Photos/satisfactory/s3-compressed.jpg" alt="">
        </div>
        <div style="color: white;" class="col-md-8">
            <h3 id="price">$15</h3>
            <h3>Satisfactory</h3>
            <?php if ($notice !== "") { ?><p id="notice" style="color: rgb(0, 124, 248);"><?php echo $notice; ?></p><?php } ?>
            <p id="paragraph">Satisfactory is a first-person open-world factory building game with a dash of exploration and combat.</p>
            <p id="paragraph">Play alone or with friends, explore an alien planet, create multi-story factories, and enter conveyor belt heaven!</p>
            <p id="paragraph">This is an early access game</p>
            <p id="paragraph">Early Access games are still under development and may change significantly over time.</p>
        </div>
        <div id="buttons" class="col-md-1"><br><br>
            <div class="row-md-1">
                <?php if (!$logged_in) { ?>
                    <a id="buy" style="text-decoration: none; white-space: nowrap;" href="login.php">Log in</a>
                <?php } elseif ($owned) { ?>
                    <a id="buy" style="text-decoration: none; white-space: nowrap;" href="library.php">Owned</a>
                <?php } else { ?>
                <form method="post"><?php echo csrf_field(); ?>
                    <button id="buy" type="submit" name="buyB">Pre-order</button>
                </form>
                <br>
                <?php if ($in_cart) { ?>
                    <a id="wish" style="text-decoration: none; white-space: nowrap; padding: 16px 12px;" href="cart.php" title="This game is in your cart. Click to view your cart."><i class="fa fa-check" style="font-size:20px;padding: 0px;margin: 0px;"></i> In Cart</a>
                <?php } else { ?>
                <form method="post"><?php echo csrf_field(); ?>
                    <button type="submit" name="cartB" data-toggle="tooltip" data-placement="top" title="Add to Cart" id="wish"><i class="fa fa-shopping-cart" style="font-size:20px;padding: 0px 0px 0px 0px;max-width: 30px;margin: 0px 0px 0px 0px;"></i></button>
                </form>
                <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div><br>





    <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="https://www.w3schools.com/" target="https://www.w3schools.com/">Web design</a></li>
                            <li><a href="https://www.w3schools.com/" target="https://www.w3schools.com/">Development</a></li>
                            <li><a href="https://www.w3schools.com/" target="https://www.w3schools.com/">Hosting</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="Terms.html" target="Terms.html">Terms of service</a></li>
                            <li><a href="Privacy.html" target="Privacy.html">Privacy Policy</a></li>
                            <li><a href="RefundP.html" target="RefundP.html">Refund Policy</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>Super Games</h3>
                        <p>© 2021, Super Games, Inc. All rights reserved. Super, Super Games, the Super Games logo, are trademarks or registered trademarks of Super Games, Inc. in the United States of America and elsewhere.</p>
                    </div>
                </div>
                <div align="center">
                    <a id="site" href="http://www.facebook.com" target="http://www.facebook.com" class="fa fa-facebook"></a>
                    <a id="site" href="http://www.twitter.com" target="http://www.twitter.com" class="fa fa-twitter"></a>
                    <a id="site" href="http://www.instagram.com" target="http://www.instagram.com" class="fa fa-instagram"></a>
                    <a id="site" href="https://www.reddit.com/" target="https://www.reddit.com/" class="fa fa-reddit-alien"></a>
                </div>

                <p class="copyright">Super Games © 2021</p>

            </div>
        </footer>
    </div>







</body>

<style>
    #name {
        color: rgb(220,123,16);
    }

    #img {
        height: 60px;
        width: 70px;
        margin-left: -17px;
        margin-right: 17px;
        margin-top: 3px;
        padding: 0px;
    }

    #ul {
        list-style-type: none;
        margin: 0;
        overflow: hidden;
        background-color: rgb(42, 42, 42);
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 99;
        text-decoration: none;

    }

    #li {
        float: left;
        text-decoration: none;
        padding: 0px;
    }

    #li a {
        display: block;
        color: rgb(214, 214, 214);
        text-align: center;
        padding: 18px 19px;
        text-decoration: none;
        border-top: none;
        border-right: none;
        border-left: none;
        border-bottom: 4px solid rgb(42, 42, 42);
        transition-duration: 0.4s;
    }

    #li a:hover:not(.active) {
        border-top: none;
        border-right: none;
        border-left: none;
        border-bottom: 4px solid rgb(220,123,16);
        color: white;
        padding: 18px 24px 18px 24px;
    }

    #li a.active {
        border-top: none;
        border-right: none;
        border-left: none;
        border-bottom: 4px solid rgb(220,123,16);
        color: white;
    }

    #log {
        margin: 0px;
        padding: 0px;
    }

    #price {
        position: absolute;
    }
    @media screen and (min-width: 800px) {
        #price {
            margin-left: 860px;
        }
    }

    @media screen and (min-width: 1400px) {
        #price {
            margin-left: 955px;
        }
    }

    #wish {
        background-color: rgb(30, 30, 30);
        border: none;
        position: absolute;
        padding: 16px 55px;
        text-align: center;
        cursor: pointer;
        transition-duration: 0.2s;
        display: inline-block;
        color: white;
        border: 2px solid rgb(20, 20, 20);
        border-radius: 5px;
        margin-top: -15px;
    }

    #wish:hover {
        color: rgb(220,123,16);
        background-color: rgb(20, 20, 20);
        border-color: rgb(220,123,16);
    }

    #buy {
        background-color: rgb(30, 30, 30);
        font-size: 18px;
        border: none;
        text-align: center;
        padding: 16px 32px;
        cursor: pointer;
        transition-duration: 0.4s;
        display: inline-block;
        color: white;
        border: 2px solid rgb(20, 20, 20);
        border-radius: 5px;
        white-space: nowrap;
    }

    #buy:hover {
        color: rgb(220,123,16);
        background-color: rgb(20, 20, 20);
        border-color: rgb(220,123,16);
    }

    #buttons {
        width: 90%;
        margin-left: auto;
        margin-right: auto;

    }

    hr {
        border-width: 2px;
        border-color: grey;
        max-width: 1337px;
    }

    #article {
        color: rgb(220,123,16);
        transition-duration: 0.3s;
    }

    #article:hover {
        color: white;
    }

    #breadC {
        margin-left: -16px;
    }

    #home {
        color: white;
        text-decoration: none;
        transition-duration: 0.4s;
        cursor: pointer;
    }

    #home:hover {
        color: rgb(220,123,16);
        text-decoration: none;
    }

    #C1 {
        margin-left: 92px;
        max-width: 850px;
    }

    #review {
        margin-left: 880px;
        margin-top: -478px;
        background-color: rgb(42, 42, 42);
    }

    #review1 {
        background-color: rgb(42, 42, 42);
        margin-left: 880px;
        margin-top: 17px;
    }

    #review2 {
        margin-left: 1150px;
        margin-top: -479px;
        background-color: rgb(42, 42, 42);
    }

    #review3 {
        margin-left: 1150px;
        margin-top: 16px;
        background-color: rgb(42, 42, 42);
    }

    #paragraph {
        margin: 10px 0px 10px 0px;
    }

    #row2 {
        margin-left: auto;
        margin-right: auto;
        width: 90%;
        background-color: rgb(20, 20, 20);
    }
</style>

<script>

</script>

</html>