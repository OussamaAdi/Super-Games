<?php

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    include "header.php";
}
// Check if the user is logged in, if not then redirect him to login page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    include "header2.php";
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
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/all.min.js"></script>
    <title>News</title>
</head>

<body>










<br>
    <div id="row" class="row">
        <h4 id="head">News</h4><br>
        <h4 id="head1" style="color: white;">Now Available:</h4>
        <div class="col-sm-6 portfolio-item">

            <div class="card h-100">
                <a style="max-width: 660px;" href="starwarsJ.php"><img class="card-img-top" src="Photos/Starwars.jpg" alt=""></a>
                <div class="card-body">
                    <h8 class="card-title">
                        <a id="gText" href="starwarsJ.php">Star Wars Jedi: Fallen Order</a><br>
                    </h8>
                    <h7 style="color: rgb(120, 120, 120); font-size:15px">Respawn Entertainment</h7>
                    <p style="color: rgb(220, 220, 220);">Aided by a former Jedi Knight, a prickly pilot, and a fearless droid companion, you must escape the sinister machinations of the Imperial forces in this story driven adventure.</p>

                </div>
            </div>
        </div>
        <div class="col-sm-6 portfolio-item">
            <div class="card h-100">
                <a style="max-width: 660px;" href="reddead.php"><img class="card-img-top" src="Photos/Reddead.jpg" alt=""></a>
                <div class="card-body">
                    <h8 class="card-title">
                        <a id="gText" href="reddead.php">Red Dead Redemption 2</a><br>
                    </h8>
                    <h7 style="color: rgb(120, 120, 120); font-size:15px">Rockstar Studios</h7>
                    <p style="color: rgb(220, 220, 220);">Red Dead Redemption 2, the critically acclaimed open world epic from Rockstar Games and the highest rated game of the console generation, now enhanced for PC with new Story Mode content, visual upgrades and more.</p>

                </div>
            </div>
        </div>
    </div><br>


    <hr id="hr"><br>



    <div id="row1" class="row">
        <h4 id="head1" style="color: white;">Coming Soon:</h4>
        <div class="col-sm-6 portfolio-item">
            <div class="card h-100">
                <p id="imgg" style="max-width: 660px;"><img class="card-img-top" src="Photos/Origins.jpg" alt=""></p>
                <div class="card-body">
                    <h8 class="card-title">
                        <h5 id="gText">Assassin's Creed: Origins</h5><br>
                    </h8>
                    <h7 style="color: rgb(120, 120, 120); font-size:15px">Ubisoft Montreal</h7>
                    <p style="color: rgb(220, 220, 220);">Ancient Egypt, a land of majesty and intrigue, is disappearing in a ruthless fight for power. Unveil dark secrets and forgotten myths as you go back to the one founding moment: The Origins of the Assassin’s Brotherhood.</p>

                </div>
            </div>
        </div>
        <div class="col-sm-6 portfolio-item">
            <div class="card h-100">
                <p id="imgg" style="max-width: 660px;"><img class="card-img-top" src="Photos/mw.jpg" alt=""></p>
                <div class="card-body">
                    <h8 class="card-title">
                        <h5 id="gText">Call of Duty: Modern Warfare</h5><br>
                    </h8>
                    <h7 style="color: rgb(120, 120, 120); font-size:15px">Infinity Ward, Sledgehammer Games</h7>
                    <p style="color: rgb(220, 220, 220);">Partner with special forces and freedom fighters to retrieve stolen chemical weapons. Covert operations will take you across Europe and the Middle East in order to stop full scale global war.</p>

                </div>
            </div>
        </div>
    </div><br><br><br>












    <div style="max-width: 1525px;" class="container">

        <div id="row2" class="row">
            <h4 id="newcontent">New Content:</h4>
            <div class="col-md-3">
                <a href="witcher.php">
                    <img id="newsImg" class="img-fluid rounded mb-3 mb-md-0" src="Photos/witcherB&W.jpg" alt="">
                </a>
            </div>
            <div style="color: white;" class="col-md-8">
                <h3>The Witcher 3: Wild Hunt – Blood and Wine</h3>
                <p id="paragraph">Blood and Wine is the second and final expansion pack for The Witcher 3: Wild Hunt</p>
                <p id="paragraph">Explore an entirely new part of The Witcher’s vast open world — the land of wine, Toussaint</p>
                <p id="paragraph">Hunt down an elusive beast terrorizing the kingdom</p>
                <p id="paragraph">Embark on your final quest in a world still brimming with things to do</p>
            </div>
        </div>

        <hr id="hr1">


        <div id="row2" class="row">
            <div class="col-md-3">
                <a href="ghost.php">
                    <img id="newsImg" class="img-fluid rounded mb-3 mb-md-0" src="Photos/ghostLegends.jpg" alt="">
                </a>
            </div>
            <div style="color: white;" class="col-md-8">
                <h3>Ghost of Tsushima: Legends</h3>
                <p id="paragraph">Legends is a co-op multiplayer mode for Ghost of Tsushima</p>
                <p id="paragraph">It is a cooperative mode in which players are able to choose from classes: Samurai, Hunter, Ronin, or Assassin</p>
                <p id="paragraph">It is free to download for owners of Ghost of Tsushima</p>
                <p id="paragraph">Players are able to cooperatively take on new missions based on Japanese mythology</p>
            </div>
        </div>


        <hr id="hr1">

        <div id="row2" class="row">
            <div class="col-md-3">
                <a href="doom.php">
                    <img id="newsImg" class="img-fluid rounded mb-3 mb-md-0" src="Photos/doomAG.jpg" alt="">
                </a>
            </div>
            <div style="color: white;" class="col-md-8">
                <h3>Doom Eternal: The Ancient Gods - Part One</h3>
                <p id="paragraph">The Ancient Gods – Part One is the first campaign expansion for the critically acclaimed DOOM Eternal</p>
                <p id="paragraph">Experience a new mission in your eternal fight against evil. Unleash your vengeance and face your greatest test</p>
                <p id="paragraph">From the industrial rain-swept decks of the oceanic UAC Atlantica Facility on Earth to the Blood Swamps of Hell</p>
                <p id="paragraph">Change your tactics as you face Hell’s newest threats that add more depth and challenge to combat</p>
            </div>
        </div>


        <hr id="hr1">



        <div id="row2" class="row">
            <div class="col-md-3">
                <a href="odyssey.php">
                    <img id="newsImg" class="img-fluid rounded mb-3 mb-md-0" src="Photos/acFate-min.jpg" alt="">
                </a>
            </div>
            <div style="color: white;" class="col-md-8">
                <h3>Assassin’s Creed Odyssey - The Fate of Atlantis</h3>
                <p id="paragraph">Venture into the fabled realms of Greek mythology to discover your hero's true power</p>
                <p id="paragraph">Explore three new worlds from Greek mythology: Elysium, the Underworld, and Atlantis!</p>
                <p id="paragraph">Face legendary trials and encounter the gods themselves, including Persephone, Hades, Poseidon, and more!</p>
                <p id="paragraph">Delve deeper into Assassin's Creed lore and uncover the mysterious power of the First Civilisation</p>
            </div>
        </div>
    </div>














    <br>
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

    #li a.active1 {
        border-top: none;
        border-right: none;
        border-left: none;
        border-bottom: 4px solid rgb(0, 124, 248);
        color: white;
    }

    #log {
        margin: 0px;
        padding: 0px;
    }
    #newcontent {
        position: absolute;
        margin-top: -45px;
        margin-left: 15px;
        color: white;
    }

    #gText {
        margin: 0px;
        padding: 0px;
        position: absolute;
    }

    #imgg {
        margin: 0px;
    }

    #paragraph {
        margin: 10px 0px 10px 0px;
    }

    #hr {
        border-color: rgb(45, 45, 45);
        border-width: 3px;
        max-width: 1363px;
    }

    #hr1 {
        border-color: rgb(45, 45, 45);
        border-width: 4px;
        max-width: 1335px;
    }

    #row {
        margin-left: auto;
        margin-right: auto;
        padding-top: 20px;
        width: 90%;
        background-color: rgb(30, 30, 30);
        border-radius: 10px;
    }

    #row1 {
        margin-left: auto;
        margin-right: auto;
        padding-top: 44px;
        width: 90%;
        background-color: rgb(30, 30, 30);
        border-radius: 10px;
    }

    #row2 {
        margin-left: auto;
        margin-right: auto;
        width: 90%;
        background-color: rgb(20, 20, 20);
    }

    #head {
        margin-top: -60px;
        margin-left: 15px;
        width: 90%;
        color: white;
        font-size: 20px;
    }

    #head1 {
        margin-top: -35px;
        margin-left: 15px;
        width: 90%;
        color: white;
        font-size: 20px;
    }
</style>



</html>