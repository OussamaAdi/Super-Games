<?php
// Initialize the session
session_start();

require_once "connection.php";
require_once "auth.php";

// Already logged in: go to the home page
if (is_logged_in()) {
    header("location: index.php");
    exit;
}

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty (passwords are used exactly as typed, not trimmed)
    $password = isset($_POST["password"]) ? (string) $_POST["password"] : "";
    if ($password === "") {
        $password_err = "Please enter your password.";
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {

        if (login_is_throttled($con, $username)) {
            $password_err = "Too many failed attempts. Please wait " . LOGIN_WINDOW_MINUTES . " minutes and try again.";
        } else {
            $login_ok = false;
            $sql = "SELECT id, username, password FROM users WHERE username = ?";

            if ($stmt = mysqli_prepare($con, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $username);

                if (mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_bind_result($stmt, $id, $db_username, $hashed_password);
                    if (mysqli_stmt_fetch($stmt) && password_matches($password, $hashed_password)) {
                        $login_ok = true;
                    }
                }
                mysqli_stmt_close($stmt);
            }

            if ($login_ok) {
                login_clear_failures($con, $username);

                // New session id on login, so an id set before login can't be reused
                session_regenerate_id(true);
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $id;
                $_SESSION["username"] = $db_username;

                // Accounts made before sign-up created these rows may still be missing them
                ensure_user_rows($con, $id);

                header("location: index.php");
                exit;
            }

            login_record_failure($con, $username);
            // Same message whether the username or the password was wrong
            $password_err = "Invalid username or password.";
        }
    }
}

include "header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
    <br><br>
    <div class="container">
        <div class="wrapper">
            <h2 id="login">Login</h2>
            <p id="please">Please fill in your credentials to login.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label id="username">Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label id="password">Password</label>
                    <input type="password" name="password" class="form-control">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group">
                    <input id="loginB" type="submit" class="btn btn-primary" value="Login">
                </div>
                <p id="dont">Don't have an account? <a id="link" href="register.php">Sign up now</a>.</p>
            </form>
        </div>
    </div>
</body>

<style type="text/css">
    .wrapper {
        width: 500px;
        padding: 30px;
        margin-left: auto;
        margin-right: auto;
        color: white;
    }
    #login {
        color: white;
        font-size: 20px;
    }

    #please {
        color: white;
        font-size: 20px;
    }

    #username {
        color: white;
        font-size: 20px;
    }

    #password {
        color: white;
        font-size: 20px;
    }

    #dont {
        color: white;
        font-size: 20px;
    }

    #link {
        text-decoration: none;
    }

    #link:hover {
        color: white;
    }

    #loginB {
        color: grey;
        border: 2px solid grey;
        background-color: rgb(20, 20, 20);
        transition-duration: 0.3s;
    }

    #loginB:hover {
        color: white;
        border: 2px solid rgb(0, 124, 248);
        background-color: rgb(20, 20, 20);
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

    #li a.active4 {
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