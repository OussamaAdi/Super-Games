<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

include "header2.php";

include "connection.php";

$dbCustRecordss = mysqli_query($con, "SELECT COUNT(borderlands) c FROM library WHERE id = '" . $_SESSION["id"] . "';");
$row = mysqli_fetch_assoc($dbCustRecordss);
$C = $row['c'];

if (isset($_POST['cartB'])) {
    if ($C == 1) {
    }
    if ($C == 0) {
        $dbCustRecords = mysqli_query($con, "UPDATE cart SET borderlands='1' where id='" . $_SESSION["id"] . "'");
    }
}

if (isset($_POST['buyB'])) {
    $dbCustRecords = mysqli_query($con, "UPDATE cart SET borderlands= NULL where id='" . $_SESSION["id"] . "'");
    $dbCustRecords = mysqli_query($con, "UPDATE library SET borderlands='1' where id='" . $_SESSION["id"] . "'");
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
    <title>Borderlands 3</title>
</head>

<body>


    <div id="C1" class="container">
        <div style="max-width: 900px;" class="row">
            <div class="column">
                <nav id="breadC" aria-label="breadcrumb">
                    <ol style="background-color: rgb(20, 20, 20);" class="breadcrumb">
                    <li class="breadcrumb-item"><a onclick="goBack()" id="home">Back</a></li>
                        <li class="breadcrumb-item"><a id="home" href="all.php">All Games</a></li>
                        <li style="color: rgb(250,186,0);" class="breadcrumb-item active" aria-current="page">Borderlands 3</li>
                    </ol>
                </nav>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="Photos/border-min.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="Photos/borderlands/b1-min.jpg" alt="Second slide">
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
                        <h5 style="color: white;" class="card-title">PC Gamer</h5>
                        <h6 style="color: grey;" class="card-subtitle mb-1 text-muted">James Davenport</h6>
                        <p style="color: grey;" class="card-text">Borderlands 3 is an endless font of bad jokes and cool guns in the series' most vapid story yet</p>
                        <a id="article" href="https://www.pcgamer.com/borderlands-3-review/" target="https://www.pcgamer.com/borderlands-3-review/" class="card-link">Read Full Review</a>
                    </div>
                </div>
                <div id="review1" class="card" style="width: 15rem;">
                    <div class="card-body">
                        <h5 style="color: white;" class="card-title">Game Informer</h5>
                        <h6 style="color: grey;" class="card-subtitle mb-1 text-muted">Matt Miller</h6>
                        <p style="color: grey;" class="card-text">An old formula executed well, Borderlands 3 rarely takes chances or strays from expectation</p>
                        <a id="article" href="https://www.gameinformer.com/review/borderlands-3/borderlands-3-review-sticking-to-its-guns" target="https://www.gameinformer.com/review/borderlands-3/borderlands-3-review-sticking-to-its-guns" class="card-link">Read Full Review</a>
                    </div>
                </div>
            </div>
            <div class="column">
                <div id="review2" class="card" style="width: 15rem;">
                    <div class="card-body">
                        <h5 style="color: white;" class="card-title">IGN</h5>
                        <h6 style="color: grey;" class="card-subtitle mb-1 text-muted">James Duggan</h6>
                        <p style="color: grey;" class="card-text">Borderlands 3 sticks to its guns and outdoes itself with an amazing arsenal of weapons, and missions.</p>
                        <a id="article" href="https://www.ign.com/articles/2019/09/09/borderlands-3-review" target="https://www.ign.com/articles/2019/09/09/borderlands-3-review" class="card-link">Read Full Review</a>
                    </div>
                </div>
                <div id="review3" class="card" style="width: 15rem;">
                    <div class="card-body">
                        <h5 style="color: white;" class="card-title">Eurogamer</h5>
                        <h6 style="color: grey;" class="card-subtitle mb-1 text-muted">Vikki Blake</h6>
                        <p style="color: grey;" class="card-text">The humour is even more annoying, the guns even more amazing, more divisive than it's ever been.</p>
                        <a id="article" href="https://www.eurogamer.net/articles/2019-09-19-borderlands-3-review-bigger-better-and-even-more-polarising-than-ever-before" target="https://www.eurogamer.net/articles/2019-09-19-borderlands-3-review-bigger-better-and-even-more-polarising-than-ever-before" class="card-link">Read Full Review</a>
                    </div>
                </div>
            </div>
        </div>

    </div><br><br>





    <div id="row2" class="row">
        <div class="col-md-3">
                <img id="newsImg" class="img-fluid rounded mb-3 mb-md-0" src="Photos/borderlands/b2-min.jpg" alt="">
        </div>
        <div style="color: white;" class="col-md-8">
            <h3 id="price">$60</h3>
            <h3>Borderlands 3</h3>
            <p id="paragraph">The original shooter-looter returns</p>
            <p id="paragraph">Packing bazillions of guns and a mayhem-fueled adventure!</p>
            <p id="paragraph">Blast through new worlds & enemies and save your home from the most ruthless cult leaders in the galaxy</p>
            <p id="paragraph">Stop the fanatical Calypso Twins from uniting the bandit clans and claiming the galaxy’s ultimate power</p>
        </div>
        <div id="buttons" class="col-md-1"><br><br>
            <div class="row-md-1">
                <form method="post">
                    <button id="buy" type="submit" name="buyB">Buy</button>
                </form>
                <br>
                <form method="post">
                    <button type="submit" name="cartB" data-toggle="tooltip" data-placement="top" title="Add to Cart" id="wish"><i class="fa fa-shopping-cart" style="font-size:20px;padding: 0px 0px 0px 0px;max-width: 30px;margin: 0px 0px 0px 0px;"></i></button>
                </form>
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
        color: rgb(250,186,0);
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
        border-bottom: 4px solid rgb(250,186,0);
        color: white;
        padding: 18px 24px 18px 24px;
    }

    #li a.active {
        border-top: none;
        border-right: none;
        border-left: none;
        border-bottom: 4px solid rgb(250,186,0);
        color: white;
    }

    #price {
        position: absolute;
    }
    @media screen and (min-width: 800px) {
        #price {
            margin-left: 830px;
        }
    }

    @media screen and (min-width: 1400px) {
        #price {
            margin-left: 930px;
        }
    }

    #price {
        position: absolute;
        margin-left: 930px;
    }

    #wish {
        background-color: rgb(30, 30, 30);
        border: none;
        position: absolute;
        padding: 16px 32px;
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
        color: rgb(250,186,0);
        background-color: rgb(20, 20, 20);
        border-color: rgb(250,186,0);
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
    }

    #buy:hover {
        color: rgb(250,186,0);
        background-color: rgb(20, 20, 20);
        border-color: rgb(250,186,0);
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
        color: rgb(250,186,0);
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
        color: rgb(250,186,0);
        text-decoration: none;
    }

    #C1 {
        
    }
    @media screen and (min-width: 800px) {
        #C1 {
            margin-left: 72px;
            max-width: 770px;
        }
    }

    @media screen and (min-width: 1400px) {
        #C1 {
            margin-left: 92px;
            max-width: 850px;
        }
    }

    #review {
        background-color: rgb(42, 42, 42);
    }
    @media screen and (min-width: 50px) {
        #review {
            margin-left: 780px;
            margin-top: -478px;
        }
    }

    @media screen and (min-width: 1400px) {
        #review {
            margin-left: 880px;
            margin-top: -478px;
        }
    }

    #review1 {
        background-color: rgb(42, 42, 42);
    }
    @media screen and (min-width: 50px) {
        #review1 {
            margin-left: 780px;
            margin-top: 17px;
        }
    }

    @media screen and (min-width: 1400px) {
        #review1 {
            margin-left: 880px;
            margin-top: 17px;
        }
    }

    #review2 {
        background-color: rgb(42, 42, 42);
    }
    @media screen and (min-width: 50px) {
        #review2 {
            margin-left: 1025px;
            margin-top: -479px;
        }
    }

    @media screen and (min-width: 1400px) {
        #review2 {
            margin-left: 1150px;
            margin-top: -479px;
        }
    }

    #review3 {
        background-color: rgb(42, 42, 42);
    }
    @media screen and (min-width: 50px) {
        #review3 {
            margin-left: 1025px;
            margin-top: 16px;
        }
    }

    @media screen and (min-width: 1400px) {
        #review3 {
            margin-left: 1150px;
            margin-top: 16px;
        }
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