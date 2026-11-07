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
    <title>Super Games</title>
</head>

<body>









    <div id="C1" class="container">
        <h4 id="store">Store</h4><br>
        <a id="view" href="all.php">View All</a>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="4000">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="starwarsJ.php"><img class="d-block w-100" src="Photos/Starwars.jpg" alt="First slide"></a>
                </div>
                <div class="carousel-item">
                    <a href="borderlands.php"><img class="d-block w-100" src="Photos/border-min.jpg" alt="Second slide"></a>
                </div>
                <div class="carousel-item">
                    <a href="reddead.php"><img class="d-block w-100" src="Photos/Reddead.jpg" alt="Third slide"></a>
                </div>
                <div class="carousel-item">
                    <a href="cyberpunk.php"><img class="d-block w-100" src="Photos/cyberpunkk.jpg" alt="Fourth slide"></a>
                </div>
                <div class="carousel-item">
                    <a href="gta.php"><img class="d-block w-100" src="Photos/GTA.jpg" alt="Fifth slide"></a>
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
    </div><br><br><br>










    <h2 align="center" id="Titles">On Sale</h2><br>
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









    <div id="wrapper" style="background-color: rgb(30, 30, 30); padding: 25px 0px 0px 0px;">
        <div id="column1" class="column">
            <div id="row1" class="row">
                <img onclick="changeText(annoTitle1, annoTitle2, annoTitle3, annoInfo1, annoInfo2, this, gold1, gold2, gold2, link1);" id="sideImg" src="Photos/Anno.jpg" alt="">
            </div>
            <div id="row1" class="row">
                <img onclick="changeText(battleTitle1, battleTitle2, battleTitle3, battleInfo1, battleInfo2, this, blue1, blue, blue, link2);" id="sideImg" src="Photos/battlefront-min.png" alt="">
            </div>
            <div id="row1" class="row">
                <img onclick="changeText(doomTitle1, doomTitle2, doomTitle3, doomInfo1, doomInfo2, this, orange, orange, orange, link3);" id="sideImg" src="Photos/doom.jpg" alt="">
            </div>
            <div id="row1" class="row">
                <img onclick="changeText(ghostTitle1, ghostTitle2, ghostTitle3, ghostInfo1, ghostInfo2, this, red, red, red, link4);" id="sideImg" src="Photos/Ghost.jpg" alt="">
            </div>
        </div>
        <div id="row" class="row">
            <div class="col-lg-9">
                <a id="link" href="anno.php">
                    <img src="Photos/Anno.jpg" class="img-fluid rounded mb-4" id="expandedImg" style="width:100%">
                </a>
            </div>
            <div class="col-lg-3">
                <h1 id="title1">Anno 1800</h1>
                <h6 id="title2">PIONEERS OF A NEW DAWN</h6>
                <br>
                <p id="info1" style="color: white;">The path you choose will define your world. Are you an innovator or an exploiter? A conqueror or a liberator?How the world remembers your name is up to you.</p>
                <br>
                <p id="info2" style="color: white;">In Anno 1800, players will take charge of their own fortune as they navigate the rapidly evolving technological landscape and malicious political arena of the 19th century.</p>
                <br>
                <h6 id="title3">Lead the Industrial Revolution in Anno 1800!</h6>
            </div>
        </div>
    </div><br><br><br>








    <h2 align="center" id="Titles">Best Selling</h2><br>
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
    #wrapper {
        margin-left: auto;
        margin-right: auto;
    }
    
    @media screen and (min-width: 800px) {
        #wrapper {
            width: 1310px;
            border-radius: 15px;
        }
    }

    @media screen and (min-width: 1400px) {
        #wrapper {
            width: 1519px;
        }
    }

    #store {
        padding: 0px;
        margin: 0px;
        color: white;
    }

    #view {
        position: absolute;
        margin-top: -60px;
        margin-left: 880px;
        font-size: 20px;
        text-decoration: none;
        color: grey;
        border: 2px solid grey;
        border-left: none;
        border-right: none;
        border-top: none;
        padding: 5px 10px 5px 10px;
        transition-duration: 0.3s;
    }

    #view:hover {
        color: white;
        border-color: rgb(0, 124, 248);
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

    #row {
        max-width: 1200px;
        margin-left: 300px;

    }

    #row1 {
        width: 30%;
        padding: 10px;
        margin-left: 55px;
        margin-top: -10px;
    }

    #column1 {
        position: absolute;
    }

    #column1:after {
        content: "";
        display: table;
        clear: both;
    }

    #sideImg {
        max-width: 180px;
        cursor: pointer;
        opacity: 0.7;
        border-radius: 13px;
        padding: 6px 0px 6px 0px;
    }

    #sideImg:hover {
        opacity: 1;
    }

    #name {
        color: rgb(0, 124, 248);
    }
</style>

<script src="script.js"></script>

</html>