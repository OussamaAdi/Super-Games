<?php
require_once "includes/init.php";

// Already logged in: go to the home page
if (is_logged_in()) {
    redirect("index.php");
}

$username = $password = "";
$username_err = $password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim(isset($_POST["username"]) ? (string) $_POST["username"] : "");
    if ($username === "") {
        $username_err = "Please enter username.";
    }

    // Passwords are used exactly as typed, not trimmed
    $password = isset($_POST["password"]) ? (string) $_POST["password"] : "";
    if ($password === "") {
        $password_err = "Please enter your password.";
    }

    if (empty($username_err) && empty($password_err)) {
        if (login_is_throttled($con, $username)) {
            $password_err = "Too many failed attempts. Please wait " . LOGIN_WINDOW_MINUTES . " minutes and try again.";
        } else {
            $user = db_row($con, "SELECT id, username, password FROM users WHERE username = ?", "s", [$username]);

            if ($user && password_matches($password, $user["password"])) {
                login_clear_failures($con, $username);

                // New session id on login, so an id set before login can't be reused
                session_regenerate_id(true);
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = (int) $user["id"];
                $_SESSION["username"] = $user["username"];

                redirect("index.php");
            }

            login_record_failure($con, $username);
            // Same message whether the username or the password was wrong
            $password_err = "Invalid username or password.";
        }
    }
}

$page_title = "Login";
$active_nav = "login";
include "includes/header.php";
?>
<div class="container"><div class="auth-form auth-login">
    <h2>Login</h2>
    <p>Please fill in your credentials to login.</p>
    <form action="login.php" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input id="username" type="text" name="username" class="form-control" value="<?php echo e($username); ?>">
            <span class="form-error"><?php echo e($username_err); ?></span>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" class="form-control">
            <span class="form-error"><?php echo e($password_err); ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-outline" value="Login">
        </div>
        <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
    </form>
</div></div>
<?php $show_footer = false; include "includes/footer.php"; ?>
