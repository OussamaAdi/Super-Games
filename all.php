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
    <title>Games</title>
</head>

<body>






    <h2 align="center" id="Titles">All Games</h2><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <a href="witcher.php"><img class="card-img-top" src="Photos/witcherr.jpg" alt=""></a>
                    <div class="card-body">
                        <h8 class="card-title">
                            <a id="gText" href="witcher.php">Witcher 3: The Wild Hunt</a><br>
                        </h8>
                        <h7 style="color: rgb(120, 120, 120); font-size:15px">CD PROJEKT RED</h7>
                        <h5 style="color: rgb(220, 220, 220);">$<del>60</del>&nbsp&nbsp$15</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <a href="zombie.php"><img class="card-img-top" src="Photos/zombiee.jpg" alt=""></a>
                    <div class="card-body">
                        <h8 class="card-title">
                            <a id="gText" href="zombie.php">Zombie Army Dead War 4</a><br>
                        </h8>
                        <h7 style="color: rgb(120, 120, 120); font-size:15px">Rebellion Developments</h7>
                        <h5 style="color: rgb(220, 220, 220);">$<del>60</del>&nbsp&nbsp$30</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <a href="maneater.php"><img class="card-img-top" src="Photos/maneaterr.jpg" alt=""></a>
                    <div class="card-body">
                        <h8 class="card-title">
                            <a id="gText" href="maneater.php">ManEater</a><br>
                        </h8>
                        <h7 style="color: rgb(120, 120, 120); font-size:15px">Tripwire Interactive</h7>
                        <h5 style="color: rgb(220, 220, 220);">$<del>60</del>&nbsp&nbsp$42</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <a href="odyssey.php"><img class="card-img-top" src="Photos/Odysseyy.jpg" alt=""></a>
                    <div class="card-body">
                        <h8 class="card-title">
                            <a id="gText" href="odyssey.php">Assassins Creed Odyssey</a><br>
                        </h8>
                        <h7 style="color: rgb(120, 120, 120); font-size:15px">Ubisoft</h7>
                        <h5 style="color: rgb(220, 220, 220);">$<del>60</del>&nbsp&nbsp$24</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <a href="control.php"><img class="card-img-top" src="Photos/Control.png" alt=""></a>
                    <div class="card-body">
                        <h8 class="card-title">
                            <a id="gText" href="control.php">Control</a><br>
                        </h8>
                        <h7 style="color: rgb(120, 120, 120); font-size:15px">Remedy Entertainment</h7>
                        <h5 style="color: rgb(220, 220, 220);">$28</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <a href="satisfactory.php"><img class="card-img-top" src="Photos/Satisfactory.jpg" alt=""></a>
                    <div class="card-body">
                        <h8 class="card-title">
                            <a id="gText" href="satisfactory.php">Satisfactory</a><br>
                        </h8>
                        <h7 style="color: rgb(120, 120, 120); font-size:15px">Coffee Stain Studios</h7>
                        <h5 style="color: rgb(220, 220, 220);">$15</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <a href="tetris.php"><img class="card-img-top" src="Photos/Tetris.jpg" alt=""></a>
                    <div class="card-body">
                        <h8 class="card-title">
                            <a id="gText" href="tetris.php">Tetris Effect</a><br>
                        </h8>
                        <h7 style="color: rgb(120, 120, 120); font-size:15px">Resonair, Monstars</h7>
                        <h5 style="color: rgb(220, 220, 220);">$15</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <a href="snowrunner.php"><img class="card-img-top" src="Photos/Snowrunner.jpg" alt=""></a>
                    <div class="card-body">
                        <h8 class="card-title">
                            <a id="gText" href="snowrunner.php">SnowRunner</a><br>
                        </h8>
                        <h7 style="color: rgb(120, 120, 120); font-size:15px">Saber Interactive</h7>
                        <h5 style="color: rgb(220, 220, 220);">$40</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <a href="reddead.php"><img class="card-img-top" src="Photos/Red Dead vertical.jpg" alt=""></a>
                    <div class="card-body">
                        <h8 class="card-title">
                            <a id="gText" href="reddead.php">Red Dead Redemption 2</a><br>
                        </h8>
                        <h7 style="color: rgb(120, 120, 120); font-size:15px">Rockstar Games</h7>
                        <h5 style="color: rgb(220, 220, 220);">$60</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <a href="gta.php"><img class="card-img-top" src="Photos/GTA vertical.jpg" alt=""></a>
                    <div class="card-body">
                        <h8 class="card-title">
                            <a id="gText" href="gta.php">GTA V</a><br>
                        </h8>
                        <h7 style="color: rgb(120, 120, 120); font-size:15px">Rockstar Games</h7>
                        <h5 style="color: rgb(220, 220, 220);">$30</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <a href="starwarsJ.php"><img class="card-img-top" src="Photos/Star Wars vertical.jpg" alt=""></a>
                    <div class="card-body">
                        <h8 class="card-title">
                            <a id="gText" href="starwarsJ.php">Star Wars Jedi: Fallen Order</a><br>
                        </h8>
                        <h7 style="color: rgb(120, 120, 120); font-size:15px">Respawn Entertainment</h7>
                        <h5 style="color: rgb(220, 220, 220);">$30</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <a href="anno.php"><img class="card-img-top" src="Photos/Anno vertical.png" alt=""></a>
                    <div class="card-body">
                        <h8 class="card-title">
                            <a id="gText" href="anno.php">Anno 1800</a><br>
                        </h8>
                        <h7 style="color: rgb(120, 120, 120); font-size:15px">Ubisoft Blue Byte</h7>
                        <h5 style="color: rgb(220, 220, 220);">$65</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <a href="cyberpunk.php"><img class="card-img-top" src="Photos/Cyberpunk-compressed.jpg" alt=""></a>
                    <div class="card-body">
                        <h8 class="card-title">
                            <a id="gText" href="cyberpunk.php">Cyberpunk 2077</a><br>
                        </h8>
                        <h7 style="color: rgb(120, 120, 120); font-size:15px">CD PROJEKT RED</h7>
                        <h5 style="color: rgb(220, 220, 220);">$60</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <a href="borderlands.php"><img class="card-img-top" src="Photos/Borderlands3  vertical-compressed.jpg" alt=""></a>
                    <div class="card-body">
                        <h8 class="card-title">
                            <a id="gText" href="borderlands.php">Borderlands 3</a><br>
                        </h8>
                        <h7 style="color: rgb(120, 120, 120); font-size:15px">Gearbox Software</h7>
                        <h5 style="color: rgb(220, 220, 220);">$60</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <a href="starwarsB.php"><img class="card-img-top" src="Photos/starwarsB.jpg" alt=""></a>
                    <div class="card-body">
                        <h8 class="card-title">
                            <a id="gText" href="starwarsB.php">Star Wars Battlefront II</a><br>
                        </h8>
                        <h7 style="color: rgb(120, 120, 120); font-size:15px">DICE, Motive Studios</h7>
                        <h5 style="color: rgb(220, 220, 220);">$40</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <a href="doom.php"><img class="card-img-top" src="Photos/doomE.jpg" alt=""></a>
                    <div class="card-body">
                        <h8 class="card-title">
                            <a id="gText" href="doom.php">DOOM Eternal</a><br>
                        </h8>
                        <h7 style="color: rgb(120, 120, 120); font-size:15px">id Software</h7>
                        <h5 style="color: rgb(220, 220, 220);">$45</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <a href="ghost.php"><img class="card-img-top" src="Photos/Ghost-compressed.jpg" alt=""></a>
                    <div class="card-body">
                        <h8 class="card-title">
                            <a id="gText" href="ghost.php">Ghost of Tsushima</a><br>
                        </h8>
                        <h7 style="color: rgb(120, 120, 120); font-size:15px">Sucker Punch Productions</h7>
                        <h5 style="color: rgb(220, 220, 220);">$60</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

    #li a.active {
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
</style>

</html>