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
</head>

<body>
    <ul id="ul">
        <a style="float:left" href="index.php"><img id="img" src="Photos/Logo.png" alt=""></a>
        <li id="li"><a class="btnn active" href="index.php">Home</a></li>
        <li id="li"><a class="btnn active1" href="news.php">News</a></li>
        <li id="li"><a class="btnn active2" href="about.php">About</a></li>
        <li id="li"><a class="btnn active3" href="contact.php">Contact</a></li>
        <li id="li" style="float:right"><a class="btnn" href="logout.php"><span id="log" class="fa fa-sign-out"></span>Logout</a></li>
        <li id="name" style="float:right"><?php echo htmlspecialchars($_SESSION["username"], ENT_QUOTES, 'UTF-8'); ?></li>
        <li id="li" style="float:right"><a class="btnn active4" href="cart.php">Cart</a></li>
        <li id="li" style="float:right"><a class="btnn active5" href="library.php">Library</a></li>
    </ul><br><br><br><br>
    <a id="reset" href="reset-password.php">Reset Password</a>
</body>

<style>
    #reset {
        float: right;
        margin-top: -34px;
        padding: 6px 10px 4px 10px;
        color: rgb(214, 214, 214);
        text-decoration: none;
        transition-duration: 0.3s;
        font-size: 13px;
        background-color: rgb(42, 42, 42);
        border-top: none;
        border-right: none;
        border-left: none;
        border-bottom: 2px solid rgb(42, 42, 42);
    }
    #reset:hover {
        color: white;
        border-bottom: 2px solid rgb(0, 124, 248);
    }
    #name {
        cursor: default;
        font-size: 18px;
        color: rgb(214, 214, 214);
        padding: 17px 19px;
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

    #log {
        margin: 0px;
        padding: 0px;
    }
</style>

</html>