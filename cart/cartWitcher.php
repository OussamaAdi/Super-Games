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
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="Photos/witcher/w4.jpg" alt="">
            </div>

            <div class="col-md-8">
                <h3 style="color: white;">The Witcher 3: Wild Hunt</h3>
                <h4 style="color: white;">$15</h4>
            </div>

            <div class="col-md-2">
            <form method="post"><?php echo csrf_field(); ?>
                        <button class="btn btn-primary" id="witcherB" type="submit" name="witcherB"">Buy</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <hr id="hr">
    </div>
</body>

<style>
    .row {
        margin: 0px;
        padding: 0px;
    }

    #witcherB {
        background-color: rgb(30, 30, 30);
        font-size: 18px;
        border: none;
        text-align: center;
        padding: 16px 32px;
        cursor: pointer;
        transition-duration: 0.3s;
        display: inline-block;
        color: white;
        border: 2px solid rgb(20, 20, 20);
        border-radius: 5px;
        margin-top: 10px;
    }
    #witcherB:hover {
        color: rgb(192,192,192);
        background-color: rgb(20, 20, 20);
        border-color: rgb(192,192,192);
    }

</style>

</html>