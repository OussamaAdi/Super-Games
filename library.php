<?php
// Initialize the session
session_start();

require_once "connection.php";
require_once "auth.php";
require_once "store.php";

// Check if the user is logged in, if not then redirect him to login page
if (!is_logged_in()) {
    header("location: login.php");
    exit;
}

// Library items in display order: game column => item template
$library_items = [
    "reddead"      => "library/libraryRed.php",
    "cyberpunk"    => "library/libraryCyber.php",
    "gta"          => "library/libraryGta.php",
    "borderlands"  => "library/libraryBorder.php",
    "witcher"      => "library/libraryWitcher.php",
    "zombie"       => "library/libraryZombie.php",
    "maneater"     => "library/libraryManeater.php",
    "odyssey"      => "library/libraryOdyssey.php",
    "anno"         => "library/libraryAnno.php",
    "starwarsB"    => "library/libraryStarwarsB.php",
    "starwarsJ"    => "library/libraryStarwarsJ.php",
    "doom"         => "library/libraryDoom.php",
    "ghost"        => "library/libraryGhost.php",
    "control"      => "library/libraryControl.php",
    "satisfactory" => "library/librarySatisfactory.php",
    "tetris"       => "library/libraryTetris.php",
    "snowrunner"   => "library/librarySnowrunner.php",
];

$library = store_row($con, "library", $_SESSION["id"]);

include "header2.php";
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
    <title>Library</title>
</head>

<body>




    <?php
    // Show each game the user owns
    foreach ($library_items as $game => $file) {
        if (!empty($library[$game])) {
            include $file;
        }
    }
    ?>








    <br><br><br><br><br><br><br><br><br><br><br><br>
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
    #hr {
        border-width: 3px;
        border-color: rgb(42, 42, 42);
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

    #li a:hover {
        border-top: none;
        border-right: none;
        border-left: none;
        border-bottom: 4px solid rgb(0, 124, 248);
        color: white;
        padding: 18px 24px 18px 24px;
    }

    #li a.active5 {
        border-top: none;
        border-right: none;
        border-left: none;
        border-bottom: 4px solid rgb(0, 124, 248);
        color: white;
    }
</style>


</html>